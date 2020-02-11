@extends('layouts.admin')

@section('title', 'Resultado')
@section('page_title', 'Resultado')
@section('page_subtitle', 'de su voto')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li class="active"></li>
@endsection

@section('content')

    <div class="container">
        <div class="row">
        <div class="col-sm-12">
                <div class="card card-danger card-outline card-candidatos">
                    <div class="card-header"><i class="fas fa-user fa-10px"></i>  
                        Las personas que usted seleccionó</div>
                        <div class="card-body mh-100 "> 
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Nombres y apellidos</th>
                                <th scope="col">Cargo postulado</th>
                                </tr>
                            </thead>
                            @foreach ($postulados as $presi)
                            <tbody>
                                <tr>
                                <th>{{ $presi->nb_nombres }} {{ $presi->nb_apellidos }}</th>
                                <th>{{ $presi->nb_cargo }}</th>
                              
                                </tr>
                            </tbody>
                            @endforeach
                            </table>
                        </div>
            </div> 
        </div>
            
            <div class="col-md-12">
            <div class="justify-content-center">
                <div class="card card-danger card-outline">
                    <div class="card-header">Haz click en el botón para salir del sistema</div>
                        <div class="card-body">  

                      <center>
                    <a class="btn btn-danger btn-lg ajax"a href="logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="height:40px; width:200px; color:#ffff;" >
                    <span><i class="fas fa-check-circle"></i> SALIR</span>
                    </a></center>
                    </div>
                </div>
             </div>
             </div>
        </div>
 </div>




@endsection


@push('scripts')
  <script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
  
  </script>


@endpush
