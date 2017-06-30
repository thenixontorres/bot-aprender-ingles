<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatecontratoRequest;
use App\Http\Requests\UpdatecontratoRequest;
use App\Repositories\contratoRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\contrato;
use App\Models\estado;
use App\Models\municipio;
use App\Models\planes;
use App\Models\clausula;
use App\Models\persona;
use App\Models\empresa;
use App\Models\pago;
use App\Models\ruta;
use Auth;
use Carbon\Carbon;

class contratoController extends InfyOmBaseController
{
    /** @var  contratoRepository */
    private $contratoRepository;

    public function __construct(contratoRepository $contratoRepo)
    {
        $this->contratoRepository = $contratoRepo;
    }

    /**
     * Display a listing of the contrato.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->contratoRepository->pushCriteria(new RequestCriteria($request));
        $contratos = $this->contratoRepository->all();
        $estados = estado::all();
        $rutas = ruta::all();
        $municipios = municipio::all();

        return view('contratos.index')
        ->with('municipios', $municipios)
        ->with('rutas', $rutas)
        ->with('estados', $estados)
        ->with('contratos', $contratos);
    }
    //Listar contratos Individuales
    public function individuales(Request $request)
    {
        $contratos = contrato::where('tipo_contrato','Individual')->get();
        $estados = estado::all();
        $municipios = municipio::all();
        $rutas = ruta::all();

        return view('contratos.individuales_index')
        ->with('municipios', $municipios)
        ->with('estados', $estados)
        ->with('rutas', $rutas)
        ->with('contratos', $contratos);
    }

    //Listar contratos Colectivos
    public function colectivos(Request $request)
    {
        $contratos = contrato::where('tipo_contrato','Colectivo')->get();
        $estados = estado::all();
        $municipios = municipio::all();
        $rutas = ruta::all();

        return view('contratos.colectivos_index')
            ->with('rutas', $rutas)
            ->with('municipios', $municipios)
            ->with('estados', $estados)
            ->with('contratos', $contratos);
    }

    /**
     * Show the form for creating a new contrato.
     *
     * @return Response
     */
    public function create()
    {
        return view('contratos.create');
    }

    public function individuales_create()
    {   
        $estados = estado::all();
        $municipios = municipio::all();
        $planes = planes::all();
        $clausulas = clausula::all();
        $rutas = ruta::all();

        return view('contratos.individuales_create')
        ->with('rutas', $rutas)
        ->with('planes', $planes)
        ->with('municipios', $municipios)
        ->with('estados', $estados)
        ->with('clausulas', $clausulas);
    }

    public function colectivos_create()
    {   
        $estados = estado::all();
        $municipios = municipio::all();
        $planes = planes::all();
        $clausulas = clausula::all();
        $rutas = ruta::all();

        return view('contratos.colectivos_create')
        ->with('rutas', $rutas)
        ->with('planes', $planes)
        ->with('municipios', $municipios)
        ->with('estados', $estados)
        ->with('clausulas', $clausulas);
    }

    /**
     * Store a newly created contrato in storage.
     *
     * @param CreatecontratoRequest $request
     *
     * @return Response
     */
    public function store(CreatecontratoRequest $request)
    {
        
        $input = $request->all();
        /*$planes = planes::where('id', $request->plan_id)->get();
        $plan = $planes->first();
        //el monto se guarda como string para que no cambie al editar el monto del plan
        $monto_total = $plan->monto; 
        */
        //calcular el mes de vencimiento
        $fecha_inicio = $request->fecha_inicio;
        $fecha_inicio = explode("/", $fecha_inicio);
        $dia_inicio = $fecha_inicio[0];
        $mes_inicio = $fecha_inicio[1];
        $ano_fin = $fecha_inicio[2];

        $mes_fin = $mes_inicio+5;

        if($mes_fin >  12){
            $mes_fin = $mes_fin-12;
            $ano_fin = $ano_fin+1;
        }

        $fecha_vencimiento =  array($dia_inicio, $mes_fin, $ano_fin);  
        $fecha_vencimiento = implode("/", $fecha_vencimiento);

        //Crear el contrato 
        $contrato = new contrato();    
        $contrato->numero = $request->numero;
        $contrato->monto_inicial = $request->monto_inicial;
        $contrato->monto_total = $request->monto_total;
        $contrato->fecha_inicio = $request->fecha_inicio;
        $contrato->fecha_vencimiento = $fecha_vencimiento;
        $contrato->tipo_contrato = $request->tipo_contrato;
        $contrato->fecha_inicio = $request->fecha_inicio;
        $contrato->clausula_id = $request->clausula_id;
        $contrato->plan_id = $request->plan_id;
        $contrato->tiempo_pago = 'Mensual';
        $contrato->estado = 'Activo';
        $contrato->ruta_id = $request->ruta_id;
        $contrato->user_id = Auth::user()->id;
        $contrato->save();

        $contrato_id = $contrato->id;

        $persona = new persona();
            $persona->nombre = $request->nombre; 
            $persona->apellido = $request->apellido;
            $persona->cedula = $request->cedula; 
            $persona->sexo = $request->sexo;        
            $persona->fecha_nac = $request->fecha_nac; 
            $persona->parentesco = 'Titular';
            $persona->telefono = $request->telefono;
            $persona->municipio_id = $request->municipio_id;         
            $persona->direccion = $request->direccion;
            $persona->contrato_id = $contrato_id;
            $persona->save();

        $dateTime = date_create_from_format('d/m/Y', $request->fecha_inicio);
        $carbon = Carbon::instance($dateTime);

        $prev = null;
        //se pre-cargan los pagos bajo el status pendiente
        for ($i=1; $i<7 ; $i++) { 
            $pago = new pago();
            //en este punto solo se trabaja a 6 meses
            $pago->monto = $contrato->monto_total/6;
            $pago->numero_cuota = $i;
            $pago->estatus = 'pendiente';
            if ($prev == null) {
                $prev = $carbon;
            }
                $next = $prev->addMonths(1);
                $prev = $next;
            $pago->concepto =  $next;
            $pago->contrato_id = $contrato->id;
            $pago->save();            
        }   

        if ($request->tipo_contrato == 'Individual'){          

            Flash::success('Contrato Individual registrado con exito.');
            return redirect()->route('contratos.individuales');
            }else{

            $empresa = new empresa();
            $empresa->nombre = $request->empresa_nombre; 
            $empresa->telefono = $request->empresa_telefono;
            $empresa->municipio_id = $request->empresa_municipio_id;         
            $empresa->direccion = $request->empresa_direccion;
            $empresa->contrato_id = $contrato_id;
            $empresa->save();         

            Flash::success('Contrato Colectivo registrado con exito.');
            return redirect()->route('contratos.colectivos');    
            }
    }

    /**
     * Display the specified contrato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contrato = $this->contratoRepository->findWithoutFail($id);

        if (empty($contrato)) {
            Flash::error('Contrato no encontrado');

            return redirect()->back();
        }
        $dia_ac = date('d');
        $mes_ac = date('m');
        $año_ac = date('Y');
        if ($contrato->tipo_contrato == 'Individual'){
        return view('contratos.individuales_show')->with('contrato', $contrato)->with('dia_ac', $dia_ac)->with('mes_ac', $mes_ac)->with('año_ac', $año_ac);    
        }else{
        return view('contratos.colectivos_show')->with('contrato', $contrato)->with('dia_ac', $dia_ac)->with('mes_ac', $mes_ac)->with('año_ac', $año_ac);
        }
    }

    /**
     * Show the form for editing the specified contrato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contrato = $this->contratoRepository->findWithoutFail($id);
        $estados = estado::all();
        $municipios = municipio::all();
        $planes = planes::all();
        $clausulas = clausula::all();
        $rutas = ruta::all();

        if (empty($contrato)) {
            Flash::error('Contrato no encontrado.');

            return redirect()->back();
        }

        if ($contrato->tipo_contrato == "Individual") {
            return view('contratos.individuales_edit')->with('contrato', $contrato)
            ->with('rutas', $rutas)
            ->with('planes', $planes)
            ->with('municipios', $municipios)
            ->with('estados', $estados)
            ->with('clausulas', $clausulas);   
        }else{
            return view('contratos.colectivos_edit')->with('contrato', $contrato)
            ->with('rutas', $rutas)
            ->with('planes', $planes)
            ->with('municipios', $municipios)
            ->with('estados', $estados)
            ->with('clausulas', $clausulas);
        }
    }

    /**
     * Update the specified contrato in storage.
     *
     * @param  int              $id
     * @param UpdatecontratoRequest $request
     *
     * @return Response

     */

    public function giros(){
        $pagos = pago::orderBy('updated_at', 'DESC')->get();
        if (count($pagos)<1) {
            Flash::error('No hay pagos registrador');
            return redirect()->back();
        }
        $min = $pagos->first();
        $min = $min->updated_at->format('Y');
        $max = $pagos->last();
        $max = $max->updated_at->format('Y');
        $meses = array(
            ['mes' => 'Enero', 'valor' =>'01'],
            ['mes' => 'Febrero', 'valor' =>'02'],
            ['mes' => 'Marzo', 'valor' =>'03'],
            ['mes' => 'Abril', 'valor' =>'04'],
            ['mes' => 'Mayo', 'valor' =>'05'],
            ['mes' => 'Junio', 'valor' =>'06'],
            ['mes' => 'Julio', 'valor' =>'07'],
            ['mes' => 'Agosto', 'valor' =>'08'],
            ['mes' => 'Septiembre', 'valor' =>'09'],
            ['mes' => 'Octubre', 'valor' =>'10'],
            ['mes' => 'Noviebre', 'valor' =>'11'],
            ['mes' => 'Diciembre', 'valor' =>'12'],
        );
                   
        $giros = null;
        return view('giros.index')
        ->with('giros',$giros)
        ->with('min',$min)
        ->with('max',$max)
        ->with('meses', $meses);
    }

    public function buscar_giros(Request $request){
        
        $pagos = pago::orderBy('updated_at', 'DESC')->get();
        $min = $pagos->first();
        $min = $min->updated_at->format('Y');
        $max = $pagos->last();
        $max = $max->updated_at->format('Y');
        $meses = array(
            ['mes' => 'Enero', 'valor' =>'01'],
            ['mes' => 'Febrero', 'valor' =>'02'],
            ['mes' => 'Marzo', 'valor' =>'03'],
            ['mes' => 'Abril', 'valor' =>'04'],
            ['mes' => 'Mayo', 'valor' =>'05'],
            ['mes' => 'Junio', 'valor' =>'06'],
            ['mes' => 'Julio', 'valor' =>'07'],
            ['mes' => 'Agosto', 'valor' =>'08'],
            ['mes' => 'Septiembre', 'valor' =>'09'],
            ['mes' => 'Octubre', 'valor' =>'10'],
            ['mes' => 'Noviebre', 'valor' =>'11'],
            ['mes' => 'Diciembre', 'valor' =>'12'],
        );
        
        $mes = $request['mes'];
        $ano = $request['ano'];
        $total = null;
        if ($request->estatus == 'todos') {
            $giros = pago::whereMonth('concepto','=', $mes)->whereYear('concepto','=',$ano)->get();
        }else{
            $giros = pago::whereMonth('concepto','=', $mes)->whereYear('concepto','=',$ano)->where('estatus', $request->estatus)->get();    
        }
        
        foreach ($giros as $giro) {
            $total = $total+$giro->monto;
        }

        $total = number_format($total, 2, ',','');
        
        return view('giros.index')
        ->with('giros',$giros)
        ->with('min',$min)
        ->with('max',$max)
        ->with('meses', $meses)
        ->with('total', $total)
        ->with('mess', $mes)
        ->with('ano', $ano);
    }

    public function cierre(){
        $pagos = pago::orderBy('updated_at', 'DESC')->get();
        if (count($pagos)<1) {
            Flash::error('No hay pagos registrador');
            return redirect()->back();
        }
        
        $min = $pagos->first();
        $min = $min->updated_at->format('Y');
        $max = $pagos->last();
        $max = $max->updated_at->format('Y');
        $meses = array(
            ['mes' => 'Enero', 'valor' =>'01'],
            ['mes' => 'Febrero', 'valor' =>'02'],
            ['mes' => 'Marzo', 'valor' =>'03'],
            ['mes' => 'Abril', 'valor' =>'04'],
            ['mes' => 'Mayo', 'valor' =>'05'],
            ['mes' => 'Junio', 'valor' =>'06'],
            ['mes' => 'Julio', 'valor' =>'07'],
            ['mes' => 'Agosto', 'valor' =>'08'],
            ['mes' => 'Septiembre', 'valor' =>'09'],
            ['mes' => 'Octubre', 'valor' =>'10'],
            ['mes' => 'Noviebre', 'valor' =>'11'],
            ['mes' => 'Diciembre', 'valor' =>'12'],
        );
        $cierre = null;
        return view('cierre.index')
        ->with('cierre',$cierre)
        ->with('min',$min)
        ->with('max',$max)
        ->with('meses', $meses);
    }

    public function consultar_cierre(Request $request){
        
        //cuanto se cobro en este mes/ano
        $mes = $request['mes'];
        $ano = $request['ano'];
        $cancelados = pago::whereMonth('updated_at','=', $mes)->whereYear('updated_at','=',$ano)->where('estatus', 'cancelado')->get();
        $total_cancelados = 0;
        foreach ($cancelados as $cancelado) {
            $total_cancelados = $total_cancelados+$cancelado->monto;
        }
        $total_cancelados = number_format($total_cancelados, 2, ',','');
        
        //cuanto falta por cobrar
        $pendientes = pago::whereMonth('concepto','=', $mes)->whereYear('concepto','=',$ano)->where('estatus', 'cancelado')->get();
        $total_pendientes = 0;
        foreach ($pendientes as $pendiente) {
            $total_pendientes = $total_pendientes+$pendiente->monto;
        }
        $total_pendientes = number_format($total_pendientes, 2, ',','');

        //nuevos contratos
        $nuevos = contrato::whereMonth('created_at','=', $mes)->whereYear('created_at','=',$ano)->get();
        $count_nuevos = count($nuevos);
        $pagos = pago::orderBy('updated_at', 'DESC')->get();
        $min = $pagos->first();
        $min = $min->updated_at->format('Y');
        $max = $pagos->last();
        $max = $max->updated_at->format('Y');
        $meses = array(
            ['mes' => 'Enero', 'valor' =>'01'],
            ['mes' => 'Febrero', 'valor' =>'02'],
            ['mes' => 'Marzo', 'valor' =>'03'],
            ['mes' => 'Abril', 'valor' =>'04'],
            ['mes' => 'Mayo', 'valor' =>'05'],
            ['mes' => 'Junio', 'valor' =>'06'],
            ['mes' => 'Julio', 'valor' =>'07'],
            ['mes' => 'Agosto', 'valor' =>'08'],
            ['mes' => 'Septiembre', 'valor' =>'09'],
            ['mes' => 'Octubre', 'valor' =>'10'],
            ['mes' => 'Noviebre', 'valor' =>'11'],
            ['mes' => 'Diciembre', 'valor' =>'12'],
        );
        
        return view('cierre.index')
        ->with('min',$min)
        ->with('max',$max)
        ->with('meses', $meses)
        ->with('mess', $mes)
        ->with('ano', $ano)
        ->with('cancelados', $cancelados)
        ->with('pendientes', $pendientes)
        ->with('total_cancelados', $total_cancelados)
        ->with('total_pendientes', $total_pendientes)
        ->with('nuevos', $nuevos)
        ->with('count_nuevos', $count_nuevos);
    }

    public function rutas(){
        $estados = estado::all();
        $municipios = municipio::all();
        $titulares = null;
        return view('rutas.index')
        ->with('estados',$estados)
        ->with('municipios',$municipios)
        ->with('titulares',$titulares);
    }

    public function buscar_rutas(Request $request){
        $estados = estado::all();
        $municipios = municipio::all();
        $request = $request->all();
        $municipio_id = $request['municipio_id'];
        
        $titulares = persona::where('parentesco','Titular')->where('municipio_id',$municipio_id)->get();

        return view('rutas.index')
        ->with('estados',$estados)
        ->with('municipios',$municipios)
        ->with('titulares',$titulares);
    }

    public function recibo($id){
        $contrato = contrato::where('id', $id)->first();
        $titular = persona::where('contrato_id', $contrato->id)->where('parentesco', 'Titular')->first();
            return view('contratos.recibo')
            ->with('contrato', $contrato)
            ->with('titular', $titular);      
    }

    public function update($id, UpdatecontratoRequest $request)
    {
        $contrato = $this->contratoRepository->findWithoutFail($id);

        if (empty($contrato)) {
            Flash::error('Contrato no encontrado');

            return redirect()->back();
        }

        //calcular el mes de vencimiento
        $fecha_inicio = $request->fecha_inicio;
        $fecha_inicio = explode("/", $fecha_inicio);
        $dia_inicio = $fecha_inicio[0];
        $mes_inicio = $fecha_inicio[1];
        $ano_fin = $fecha_inicio[2];

        $mes_fin = $mes_inicio+5;

        if($mes_fin >  12){
            $mes_fin = $mes_fin-12;
            $ano_fin = $ano_fin+1;
        }

        $fecha_vencimiento =  array($dia_inicio, $mes_fin, $ano_fin);  
        $fecha_vencimiento = implode("/", $fecha_vencimiento);

        $contrato->numero = $request->numero; 
        $contrato->monto_inicial = $request->monto_inicial;
        $contrato->fecha_inicio = $request->fecha_inicio;
        $contrato->fecha_vencimiento = $fecha_vencimiento;
        $contrato->clausula_id = $request->clausula_id;
        $contrato->estado = $request->estado;
        $contrato->ruta_id = $request->ruta_id;
        $contrato->user_id = Auth::user()->id;
        $contrato->save();

        if ($contrato->tipo_contrato == "Individual") {
            Flash::success('Contrato actualizado con exito.');
            return redirect(route('contratos.individuales'));
        }else{
            Flash::success('Contrato actualizado con exito.');
            return redirect(route('contratos.colectivos'));
        }
    }

    /**
     * Remove the specified contrato from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contrato = $this->contratoRepository->findWithoutFail($id);

        if (empty($contrato)) {
            Flash::error('contrato not found');

            return redirect(route('contratos.index'));
        }

        $this->contratoRepository->delete($id);

        Flash::success('contrato deleted successfully.');

        return redirect(route('contratos.index'));
    }
}
