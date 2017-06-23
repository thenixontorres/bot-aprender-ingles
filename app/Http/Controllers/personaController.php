<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatepersonaRequest;
use App\Http\Requests\UpdatepersonaRequest;
use App\Repositories\personaRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\persona;
use App\Models\estado;
use App\Models\municipio;
use App\Models\planes;
use App\Models\clausula;
use App\Models\empresa;
use App\Models\contrato;
use App\User;
class personaController extends InfyOmBaseController
{
    /** @var  personaRepository */
    private $personaRepository;

    public function __construct(personaRepository $personaRepo)
    {
        $this->personaRepository = $personaRepo;
    }

    /**
     * Display a listing of the persona.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->personaRepository->pushCriteria(new RequestCriteria($request));
        $personas = $this->personaRepository->all();

        return view('personas.index')
            ->with('personas', $personas);
    }

    public function userIndex()
    {
        $users = User::all();

        return view('personas.userindex')
            ->with('users', $users);
    }
    /**
     * Show the form for creating a new persona.
     *
     * @return Response
     */
    public function create()
    {
        return view('personas.create');
    }

    public function usercreate()
    {
        return view('personas.usercreate');
    }

    public function userstore(Request $request)
    {

        $count = count(User::where('cedula', $request->cedula)->first());
        if ($count>0) {
             Flash::error('La cedula ya existe');
            return redirect()->back();
        }

        $count = count(User::where('email', $request->email)->first());
        if ($count>0) {
             Flash::error('El email ya existe');
            return redirect()->back();
        }

        $user = new User();
        $user->fill($request->all());
        $user->username = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        Flash::success('Usuario resgistrado con exito');
        return redirect()->route('personas.userindex');
    }

    public function useredit($id)
    {   
        $user = user::where('id', $id)->first();

        if (empty($user)) {
            Flash::error('Usuario no encontrado.');

            return redirect()->back();
        }
        return view('personas.useredit')
        ->with('user', $user);
    }
    /**
     * Store a newly created persona in storage.
     *
     * @param CreatepersonaRequest $request
     *
     * @return Response
     */


    public function store(CreatepersonaRequest $request)
    {
        $input = $request->all();

        $titular = persona::where('contrato_id',$request->contrato_id)->where('parentesco','Titular')->get();
        $titular = $titular->first();

        $persona = new persona();
            $persona->nombre = $request->nombre; 
            $persona->apellido = $request->apellido;
            $persona->cedula = $request->cedula; 
            $persona->sexo = $request->sexo;        
            $persona->fecha_nac = $request->fecha_nac; 
            $persona->parentesco = $request->parentesco;
            $persona->telefono = $request->telefono;
            $persona->municipio_id = $titular->municipio_id;
            if($request->observacion != null){
                $persona->observacion = $request->observacion;
            }
            $persona->direccion = $titular->direccion;
            $persona->contrato_id = $request->contrato_id;
            $persona->save();    
        Flash::success('Beneficiario Registrado con exito.');

        return redirect()->back();
    }

    /**
     * Display the specified persona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $personas = persona::where('contrato_id', $id)->get();

        if (empty($personas)) {
            Flash::error('Este contrato no tiene personas.');

            return redirect()->back();
        }

        return view('personas.show')->with('personas', $personas);
    }

    /**
     * Show the form for editing the specified persona.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            Flash::error('Persona no encontrada.');

            return redirect()->back();
        }
        $estados = estado::all();
        $municipios = municipio::all();
        return view('personas.edit')
        ->with('municipios', $municipios)
        ->with('estados', $estados)
        ->with('persona', $persona);
    }

    /**
     * Update the specified persona in storage.
     *
     * @param  int              $id
     * @param UpdatepersonaRequest $request
     *
     * @return Response
     */
    public function userupdate($id, Request $request)
    {
        
        $persona = User::where('id', $id)->first();

        if (empty($persona)) {
            Flash::error('Persona no encontrada.');

            return redirect()->back();
        }

        $count = count(User::where('cedula', $request->cedula)->where('id', '!=', $persona->id)->first());
        if ($count>0) {
             Flash::error('La cedula ya existe');
            return redirect()->back();
        }
        $count = count(User::where('email', $request->email)->where('id', '!=', $persona->id)->first());
        if ($count>0) {
             Flash::error('El email ya existe');
            return redirect()->back();
        }

        $persona->fill($request->all());
        if (!empty($request->password)) {
            $personas->password = bcrypt($request->password);
        }
        $persona->username = $request->email;
        $persona->save();

        Flash::success('Persona actualizada con exito.');
        return redirect(route('personas.userindex'));    
    }

    public function update($id, UpdatepersonaRequest $request)
    {
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            Flash::error('Persona no encontrada.');

            return redirect()->back();
        }

        $persona = $this->personaRepository->update($request->all(), $id);

        Flash::success('Persona actualizada con exito.');
        if ($persona->contrato->tipo_contrato == "Individual") {
            return redirect(route('contratos.individuales'));
        }else{
            return redirect(route('contratos.colectivos'));
        }     
    }

    /**
     * Remove the specified persona from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function userdestroy($id)
    {
        $user = user::where('id', $id)->first();

        if (empty($user)) {
            Flash::error('Usuario no encontrado.');

            return redirect()->back();
        }

        $user->delete();

        Flash::success('Persona borrada con exito.');

        return redirect(route('personas.userindex'));
    }

    public function destroy($id)
    {
        $persona = $this->personaRepository->findWithoutFail($id);

        if (empty($persona)) {
            Flash::error('Beneficiario no encontrado.');

            return redirect()->back();
        }

        $this->personaRepository->delete($id);

        Flash::success('Persona borrada con exito.');

        return redirect(route('contratos.individuales'));
    }
}
