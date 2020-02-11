@extends('layouts.admin')

@section('title', 'Postulados')
@section('page_title', 'Votación')
@section('page_subtitle', '')


@section('content')

    
<div class="container">   
<input name="users_id" type="hidden" value=" {{ auth()->user()->id}}" id="users_id">
    <div class="row mb-3"> 
            <div class="col-sm-12">
                <div class="card card-danger card-outline card-candidatos">
                    <div class="card-header"><i class="fas fa-user fa-10px"></i>  
                       Estadística actual de los votos</div>
                        <div class="card-body table-responsive p-0 "> 
                        <table class="table table-hover  table-borderless">
                            <thead>
                                <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Cargo postulado</th>
                                <th scope="col">Cantidad de votos obtenidos</th>
                                </tr>
                            </thead>
                            @foreach ($postulados as $presi)
                            <tbody>
                                <tr>
                                <th>{{ $presi->nb_nombres }} {{ $presi->nb_apellidos }}</th>
                                <th>{{ $presi->nb_cargo }}</th>
                                <th>{{ $presi->total_voto}}</th>
                                </tr>
                            </tbody>
                            @endforeach
                            </table>
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
