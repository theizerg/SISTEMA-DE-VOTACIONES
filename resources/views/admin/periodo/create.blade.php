@extends('layouts.admin')
@section('title', 'Periodo')
@section('page_title', 'Periodo de votación')
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
    
            <a href="{{ url('periodo') }}" class="btn btn-danger"><i class="fas fa-sort-alpha-down-alt"></i> Listado</a>
            <a href="{{ url('periodo/create') }}" class="btn btn-danger"><i class="fa fa-plus-square"></i> Ingresar</a>
            
            </div>
        </div>
        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
            <div class="card card-danger card-outline">

            {!!Form::open (['route'=>'periodo.store','id'=>'periodo_form'])!!}

                <div class="col-xs-12">
                    <div class=" card-header">
                    <h2 class="card-title">
                        <i class="fa fa-user"></i> Datos del periodo de votación
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

  $( document ).ready(function() {
    $('input').attr('autocomplete','off');
});

    
</script>



@endpush