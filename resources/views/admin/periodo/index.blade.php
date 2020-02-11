@extends('layouts.admin')

@section('title', 'Periodo')
@section('page_title', 'Periodo de votación')
@section('page_subtitle', 'Listado')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('periodo') }}">periodo</a></li>
    <li class="active">Listado</li>
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="btn-group">

          
          <a href="{{ url('periodo/create') }}" class="btn btn-danger"><i class="fa fa-plus-square"></i> Ingresar</a>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="row">
            <div class="col-md-12">
            <div class="card card-danger card-outline">
                <div class="card-header">
                <h3 class="card-title">Listado de postulados</h3>
                <div class="card-tools">
                    <form>
                    <input type="hidden" id="_url" value="{{ url('') }}">
                    <input type="hidden" id="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
                </div>
                <div class="card-body table-responsive table-striped">
               <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Fecha de inicio</th>
                        <th>Hora de inicio</th>
                        <th>Hora fin</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($periodo as $value)
                    <tr>
                    <td>{{$value->fe_inicio}}</td>
                    <td>{{$value->h_inicio}}</td>
                    <td>{{$value->h_fin}}</td>
                    <td>
                    <div class="dropdown">
                            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cogs"></i> Opciones<span class="caret"></span>
                            </button>
                            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">

                                    <a class="dropdown-item" href="{{ url('periodo', [$value->id, 'edit']) }}"><i class="fa fa-edit"></i> Editar datos</a>
                                </div>
                            </ul>
                        </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>

                <div class="card-footer clearfix">
                    {{ $periodo->links() }}
                </div>
                </div>
            </div>
            </div>
        </div>
    @endsection


@push('scripts')
    <script src="{{ asset('js/DataTables.js') }}"></script>
    <script src="{{ asset('js/DataTablesBootstrap.js') }}"></script>

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

    <script>
   $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf','print' ]
    } );

    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>
@endpush


