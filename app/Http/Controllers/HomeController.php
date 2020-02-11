<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Models\Postulados;
use App\Models\Votante;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    
    public function hasVote($user_id)
    {
         $hasVote = Votante::where('user_id', $user_id)->get();

        return (count($hasVote) > 0) ? true : false ;
    }


    public function index()
    {
        $user_id =\Auth::user()->id;
      

        if( $user_id <> 1 ) {
           
            $hasVote = $this->hasVote($user_id );
            
            if($hasVote)
            {
                $notification = array(
                    'message' => 'Ya realizo el proceso de votación!',
                    'alert-type' => 'info'
                );
                
                return Redirect::to('/votantes')->with($notification);

            }
            
            $notification = array(
                'message' => 'Inicie el proceso de votación!',
                'alert-type' => 'success'
            );
            
            return Redirect::to('/votantes/create')->with($notification);
            
        }
        
        $postulados = DB::table('votantes')
        ->join('postulados', 'votantes.postulados_id', '=', 'postulados.id_postulados')
        ->join('cargos', 'cargos.id_cargos', '=', 'postulados.cargos_id')
        ->select('postulados.nb_nombres','postulados.nb_apellidos','cargos.nb_cargo',DB::raw('COUNT(user_id) as total_voto'))
        ->groupBy('postulados.nb_nombres','postulados.nb_apellidos','cargos.nb_cargo','cargos.id_cargos')
        ->orderBy('cargos.id_cargos')
        ->get();

        //dd($postulados);
        
        return view('admin.home.index')->with([

            'postulados' => $postulados
        ]);

       
    }
}
