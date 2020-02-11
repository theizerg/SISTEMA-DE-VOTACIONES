<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use Carbon\Carbon;
use DB;
 



class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
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
    
    
    public function index()
    {
        
        $now = Carbon::now();
        
        $ahora= $now->format('G:i:s'); 

        $date = Carbon::now();
        
        $date = $date->format('Y-m-d');

        $time= Carbon::now();

        $time=$time->toTimeString();
        
        
        $periodoInicio = $this->hasTimeToVote($date,$ahora );
            

         
        
        
        $periodo = Periodo::Paginate(4);
        return view('admin.periodo.index')->with('periodo',$periodo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.periodo.create');
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
        'fe_inicio' => 'required',
        'h_inicio' => 'required',
        'h_fin' => 'required',

         ]);


        $periodo = Periodo::create($request->all());

        $notification = array(
            'message' => '¡Periodo Creado!',
            'alert-type' => 'success'
        );
        
        return \Redirect::to('/periodo')->with($notification);
        

 
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
        $periodo=Periodo::find($id);
        return view('admin.periodo.edit')->with('periodo',$periodo);


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
        $periodo=Periodo::find($id);
        
        $this->setPeriodo($periodo,$request);

        $notification = array(
            'message' => '¡El periodo de votación ha sido Modificado!',
            'alert-type' => 'success'
        );
        
        return \Redirect::to('/periodo')->with($notification);
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

    private function setPeriodo(Periodo $periodo,Request $request){
       

        $periodo->fe_inicio   = $request->input('fe_inicio');
        $periodo->h_inicio    = $request->input('h_inicio');
        $periodo->h_fin        = $request->input('h_fin');


        $periodo->save();
    }
}

