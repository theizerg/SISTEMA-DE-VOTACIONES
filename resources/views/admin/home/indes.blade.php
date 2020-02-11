@extends('layouts.admin')

@section('title', 'Postulados')
@section('page_title', 'Votación')
@section('page_subtitle', ' Para que su voto sea válido, debe elegir a los siguientes postulantes:')


@section('content')
@can('add_votar')

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
            <div class="card-header"><i class="fas fa-user fa-10px"></i>  Postulados a presidente</div>
                 <div class="card-body">
                   <center><i class="fas fa-user fa-10x"></i><br>
                   Nombre del postulado</center>
                </div>
                <div class="card-footer">
                <input type="radio" name="" id="">
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
            <div class="card-header"><i class="fas fa-user fa-10px"></i>  Postulados a presidente</div>
                 <div class="card-body">
                   <center><i class="fas fa-user fa-10x"></i><br>
                   Nombre del postulado</center>
                </div>
                <div class="card-footer">
                <input type="radio" name="" id="">
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
            <div class="card-header"><i class="fas fa-user fa-10px"></i>  Postulados a presidente</div>
                 <div class="card-body">
                   <center><i class="fas fa-user fa-10x"></i><br>
                   Nombre del postulado</center>
                </div>
                <div class="card-footer">
                <input type="radio" name="" id="">
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
            <div class="card-header"><i class="fas fa-user fa-10px"></i>  Postulados a presidente</div>
                 <div class="card-body">
                   <center><i class="fas fa-user fa-10x"></i><br>
                   Nombre del postulado</center>
                </div>
                <div class="card-footer">
                <input type="radio" name="" id="">
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
            <div class="card-header"><i class="fas fa-user fa-10px"></i>  Postulados a presidente</div>
                 <div class="card-body">
                   <center><i class="fas fa-user fa-10x"></i><br>
                   Nombre del postulado</center>
                </div>
                <div class="card-footer">
                <input type="radio" name="" id="">
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
            <div class="card-header"><i class="fas fa-user fa-10px"></i>  Postulados a presidente</div>
                 <div class="card-body">
                   <center><i class="fas fa-user fa-10x"></i><br>
                   Nombre del postulado</center>
                </div>
                <div class="card-footer">
                <input type="radio" name="" id="">
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
            <div class="card-header"><i class="fas fa-user fa-10px"></i>  Postulados a presidente</div>
                 <div class="card-body">
                   <center><i class="fas fa-user fa-10x"></i><br>
                   Nombre del postulado</center>
                </div>
                <div class="card-footer">
                <input type="radio" name="" id="">
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
            <div class="card-header"><i class="fas fa-user fa-10px"></i>  Postulados a presidente</div>
                 <div class="card-body">
                   <center><i class="fas fa-user fa-10x"></i><br>
                   Nombre del postulado</center>
                </div>
                <div class="card-footer">
                <input type="radio" name="" id="">
                </div>
            </div>
        </div>
        
        
    </div>
</div>




@endcan
    


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

  <script> 
  
  $(function () {
    $("#example1").DataTable();
  
  });
  
  </script>
@endpush
