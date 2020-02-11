<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Postulados;
use App\Models\Cargos;
use Redirect;

class PostuladosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postulado = Postulados::Paginate(4);
        return view('admin.postulados.index')->with('postulado',$postulado);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargos::get()->pluck('nb_cargo','id_cargos');
        return view('admin.postulados.create')->with([
            'cargos'     => $cargos
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
        'cargos_id' => 'required',
        'nb_nombres' => 'required|regex:/^[\pL\s\-]+$/u',
        'nb_apellidos' => 'required|regex:/^[\pL\s\-]+$/u',
        'nu_cedula' => 'numeric|required|unique:postulados|min:100000|max:99999999',

         ]);


        $postulados = new Postulados();
        
        $this->setPostulados($postulados,$request);

        $notification = array(
            'message' => '¡Su postulación ha sido Creada!',
            'alert-type' => 'success'
        );
        
        return Redirect::to('/postulados')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postulado = Postulados::find($id);
        $cargos = Cargos::get()->pluck('nb_cargo','id_cargos');
        return view('admin.postulados.edit')->with([
            'cargos'     => $cargos,
            'postulado'=> $postulado
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $postulados = Postulados::find($id);
        
        $this->setPostulados($postulados,$request);

        $notification = array(
            'message' => '¡Su postulación ha sido Modificada!',
            'alert-type' => 'success'
        );
        
        return Redirect::to('/postulados')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    private function setPostulados(Postulados $postulados,Request $request){
       

        $postulados->cargos_id   = $request->input('cargos_id');
        $postulados->nb_nombres    = $request->input('nb_nombres');
        $postulados->nb_apellidos        = $request->input('nb_apellidos');
        $postulados->nu_cedula          = $request->input('nu_cedula');


        $postulados->save();
    }
}
