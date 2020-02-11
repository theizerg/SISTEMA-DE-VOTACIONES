    @extends('layouts.admin')

    @section('title', 'Postulados')
    @section('page_title', 'Postulados')
    @section('page_subtitle', 'Listado')

    @section('breadcrumb')
        @parent
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ url('asistencia') }}">asistencia</a></li>
        <li class="active">Listado</li>
    @endsection

    @section('content')
    <div class="container">
            <div class="row">
            <div class="col-md-6">
                <div class="btn-group">
                @can('add_users')
                <a href="{{ url('postulados/create') }}" class="btn btn-danger"><i class="fa fa-plus-square"></i> Ingresar</a>
                @endcan
                
                </div>
            </div>
            </div>
        <br>
        <div class="card card-danger card-outline">
                
                <!-- /.card-header -->
                <div class="card-header">
                <h3 class="card-title">Listado de postulados</h3>
                <div class="card-tools">
                    <form>
                    <input type="hidden" id="_url" value="{{ url('') }}">
                    <input type="hidden" id="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
                </div>
                <div class="card-body table-responsive ">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Cédula</th>
                        <th>Postulado al cargo de:</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($postulado as $value)
                    <tr>
                    <td>{{$value->nb_nombres}}</td>
                    <td>{{$value->nb_apellidos}}</td>
                    <td>{{$value->nu_cedula}}</td>
                    <td>{{$value->cargo->nb_cargo}}</td>
                    <td>
                    <div class="dropdown">
                            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cogs"></i> Opciones<span class="caret"></span>
                            </button>
                            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">

                                    <a class="dropdown-item" href="{{ url('postulados', [$value->id_postulados, 'edit']) }}"><i class="fa fa-edit"></i> Editar datos</a>
                                </div>
                            </ul>
                            </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>

                <div class="card-footer clearfix">
                    {{ $postulado->links() }}
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


