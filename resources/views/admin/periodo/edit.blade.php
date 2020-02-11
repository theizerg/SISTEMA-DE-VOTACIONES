@extends('layouts.admin')

@section('title', 'Periodo')
@section('page_title', 'Periodo')
@section('page_subtitle', 'Editar')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('periodo') }}">periodo</a></li>
    <li class="active">Editar</li>
@endsection

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="btn-group">

          <a href="{{ url('periodo') }}" class="btn btn-danger"><i class="fa fa-sort-alpha-desc"></i> Listado</a>
          <a href="{{ url('periodo/create') }}" class="btn btn-danger"><i class="fa fa-plus-square"></i> Ingresar</a>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-danger card-outline">

         {!! Form::model($periodo, ['route' => ['periodo.update',$periodo->id],'method' => 'PUT']) !!}

        <div class="col-xs-12">
          <div class=" card-header">
            <h2 class="card-title">
              <i class="fa fa-user"></i> Datos de usuario
              <small class="pull-right"></small>
            </h2>
          </div>
        </div>
        @include('admin.periodo.partials.form')
      </div>
    </div>
  </div>

       
       {!! Form::close()!!}
        
  </div>

@endsection
@push('scripts')
    <script>
    $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '< Ant',
    nextText: 'Sig >',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $(function () {
    $("#inicio").datepicker();
    $("#fin").datepicker();
    });

    
</script>


@endpush
