@extends('layouts.admin')
@section('title', 'Postulados')
@section('page_title', 'Postulados')
@section('page_subtitle', 'Ingresar')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('postulados') }}">postulados</a></li>
    <li class="active">Ingresar</li>
@endsection

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="btn-group">
         
          <a href="{{ url('postulados') }}" class="btn btn-danger"><i class="fas fa-sort-alpha-down-alt"></i> Listado</a>
         
          
          <a href="{{ url('postulados/create') }}" class="btn btn-danger"><i class="fa fa-plus-square"></i> Ingresar</a>
         
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-danger card-outline">

         {!!Form::open (['route'=>'postulados.store','id'=>'postulados_form'])!!}

			  <div class="col-xs-12">
			    <div class=" card-header">
			      <h2 class="card-title">
			        <i class="fa fa-user"></i> Datos de los postulados
			        <small class="pull-right"></small>
			      </h2>
			    </div>
			  </div>
			  @include('admin.postulados.partials.form')
			</div>
		</div>
	</div>

       
       {!! Form::close()!!}
        
  </div>

@endsection


@push('scripts')

<script type="text/javascript">
  
  $( document ).ready(function() {
    $('input').attr('autocomplete','off');
});

</script>


@endpush