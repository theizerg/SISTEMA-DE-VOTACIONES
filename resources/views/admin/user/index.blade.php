    @extends('layouts.admin')

    @section('title', 'Usuarios')
    @section('page_title', 'Usuarios')
    @section('page_subtitle', 'Listado')

    @section('breadcrumb')
        @parent
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ url('user') }}">usuarios</a></li>
        <li class="active">Listado</li>
    @endsection

    @section('content')

        <div class="container">
            <div class="row">
            <div class="col-md-6">
                <div class="btn-group">
                @can('add_users')
                <a href="{{ url('user/create') }}" class="btn btn-danger"><i class="fa fa-plus-square"></i> Ingresar</a>
                @endcan
                
                </div>
            </div>
            </div>
        <br>
        <div class="card card-danger card-outline">
                <div class=" card-header">
                <h3 class="card-title">Listado de usuario</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                    <th>Cédula</th>
                    <th>Usuario</th>
                    <th>Tipo</th>
                    <th>Correo electrónico</th>
                    <th>Acceso</th>
                    <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    <tr class="row{{ $user->id }}">
                    <td>{{ $user->nu_cedula }}</td>
                    <td>{{ $user->name }} {{ $user->last_name }}</td>
                    <td>{!! $user->hasRole('administrador') ? '<b>Administrador</b>' : 'votante' !!}</td>
                    <td>{{ $user->email  }}</td>
                    <td><span class="badge {{ $user->status ? 'bg-green' : 'bg-red' }}">{{ $user->display_status }}</span></td>
                    <td>
                        <div class="dropdown">
                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cogs"></i> Opciones<span class="caret"></span>
                        </button>
                        <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{  url('user', [$user->id]) }}"><i class="fas fa-eye">Ver datos</i></a>
                                <a class="dropdown-item" href="{{ url('user', [$user->id, 'edit']) }}"><i class="fa fa-edit"></i> Editar datos</a>
                            </div>
                        </ul>
                        </div>
                    </td>
                    </tr>
                    @endforeach
                    </tr>
                    </tbody>                
                </table>
                </div>
                <!-- /.card-body -->
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
