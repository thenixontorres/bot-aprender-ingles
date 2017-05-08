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
        $pagos = pago::all();
        $min = 3000;
        $max = 0;
        foreach ($pagos as $pago) {
           $concepto =  explode("/", $pago->concepto);
           if ($concepto[2] < $min) {
                $min = $concepto[2];
            }

            if ($concepto[2] > $max) {
                $max = $concepto[2];
            }

        }

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
        
        $min = 3000;
        $max = 0;
        
        $mes = $request['mes'];
        $ano = $request['ano'];

        $giros = array();
        $pagos = pago::all();

        foreach ($pagos as $pago) {    

        $concepto =  explode("/", $pago->concepto);
            if ($concepto[2] > $min) {
                $min = $concepto[2];
            }

            if ($concepto[2] > $max) {
                $max = $concepto[2];
            }
            if ($concepto[1] == $mes && $concepto[2] == $ano) {
                $giros = array_add($giros, 'pago', $pago
                    );
            }
        }

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
        dd($giros);    
        return view('giros.index')
        ->with('giros',$giros)
        ->with('min',$min)
        ->with('max',$max)
        ->with('meses', $meses);
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
