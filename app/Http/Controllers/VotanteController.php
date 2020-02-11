<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulados;
use App\Models\Votante;
use Carbon\Carbon;
use App\Models\Periodo;
use Redirect;
use DB;

class VotanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario= \Auth::user()->id;
        $postulados = DB::table('votantes')
        ->join('postulados', 'votantes.postulados_id', '=', 'postulados.id_postulados')
        ->join('cargos', 'cargos.id_cargos', '=', 'postulados.cargos_id')
        ->select('postulados.nb_nombres','postulados.nb_apellidos','cargos.nb_cargo','postulados.id_postulados')
        ->where('user_id',$usuario)
        ->groupBy('postulados.nb_nombres','postulados.nb_apellidos','cargos.nb_cargo','cargos.id_cargos','postulados.id_postulados')
        ->orderBy('cargos.id_cargos')
        ->get();


        //dd($postulados);

        return view('admin.votantes.index')->with([
            'postulados'=> $postulados
        ]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $presidente= Postulados::select('nb_nombres','nb_apellidos','id_postulados')->where('cargos_id',1)->get();
        $vice= Postulados::select('nb_nombres','nb_apellidos','id_postulados')->where('cargos_id',2)->get();
        $tesorero= Postulados::select('nb_nombres','nb_apellidos','id_postulados')->where('cargos_id',3)->get();
        $subtes= Postulados::select('nb_nombres','nb_apellidos','id_postulados')->where('cargos_id',4)->get();
        $secretario= Postulados::select('nb_nombres','nb_apellidos','id_postulados')->where('cargos_id',5)->get();
        $subsecre= Postulados::select('nb_nombres','nb_apellidos','id_postulados')->where('cargos_id',6)->get();
        $relaciones= Postulados::select('nb_nombres','nb_apellidos','id_postulados')->where('cargos_id',7)->get();
        $obrero= Postulados::select('nb_nombres','nb_apellidos','id_postulados')->where('cargos_id',8)->get();   

        

        return view('admin.votantes.create')->with([
            'presidente' => $presidente,
            'vice' => $vice,
            'tesorero' => $tesorero,
            'subtes' => $subtes,
            'secretario' => $secretario,
            'subsecre' => $subsecre,
            'relaciones'=> $relaciones,
            'obrero' => $obrero
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function hasTimeToVote($date,$ahora)
    {
        //dd($ahora);

        $periodo = Periodo::whereDate('fe_inicio' ,'>=',$date)
        ->whereTime('h_fin','>',$ahora)
        ->get();

        return ( count($periodo) > 0) ? true : false ;
    }


    public function store(Request $request)
    {
     
        $now = Carbon::now();
        
        $ahora= $now->format('G:i:s'); 
    
        $date = Carbon::now();
        
        $date = $date->format('Y-m-d');
        
        
        $periodoInicio = $this->hasTimeToVote($date,$ahora );
        
        if ($periodoInicio) {

            $dataValue = $request['postulados_id'];
       

            if (count($dataValue) > 0) {
                        
                        foreach ($dataValue as $valor) {
    
    
    
                            $postulados = array();
                            
                            $postulados['postulados_id']          = $valor;
                            $postulados['user_id']               = \Auth::user()->id;  
    
                            $guardar_votante = Votante::create($postulados);
                            
                            
                        }
            }
    
            $notification = array(
                'message' => '¡Su votación ha sido creada!',
                'alert-type' => 'success'
            );
            
            return Redirect::to('/votantes')->with($notification);
        }

        $notification = array(
            'message' => '¡Periodo de votación cerrado!',
            'alert-type' => 'error'
        );
        
        return Redirect::to('/votantes')->with($notification);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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


 
}
