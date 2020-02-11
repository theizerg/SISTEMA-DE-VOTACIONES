@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')
@section('page_subtitle', 'Datos')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li class="active">datos</li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="btn-group">
            @can('add_users')
            <a href="{{ url('user') }}" class="btn btn-danger"><i class="fas fa-sort-alpha-down-alt"></i> Listado</a>
            @endcan
            @can('add_users')
            <a href="{{ url('user/create') }}" class="btn btn-danger"><i class="fa fa-plus-square"></i> Ingresar</a>
            @endcan
            </div>
        </div>
        </div>
    <br>

    <div class="card card-danger card-outline">
    <div class="col-xs-12">
        <div class=" card-header">
        <h2 class="card-title">
            <i class="fa fa-user"></i> Datos de usuario
            <small class="pull-right">{{ $user->name }} {{ $user->last_name }}</small>
        </h2>
        </div>
    </div>
    <div class="car-body">
        <div class="row card-body  ">
        <div class="col-sm-3">
            <strong>Nombre</strong><br>
            {{ $user->name }} {{ $user->last_name }}
        </div>
        <div class="col-sm-3">
            <strong>Correo electrónico</strong>
            <br>
            {{ $user->email }}
            </div>
            <div class="col-sm-3">
                <strong>Estatus</strong><br>
                <span class="badge {{ $user->status ? 'bg-green' : 'bg-red' }}">{{ $user->display_status }}</span>
            </div>
            <div class="col-sm-3">
                <strong>Tipo de usuario</strong><br>
                {{ Auth::user()->hasrole('administrador') ? 'Administrador' : 'Votante' }}
            </div>
        </div>
        <div class="row card-body  ">
            <div class="col-sm-3">
            <strong>Contraseña</strong><br>
                ********
                </div>
                <div class="col-sm-3">
                <strong>Creado</strong>
                <br>
                    {{ $user->created_at }}
                </div>
                <div class="col-sm-3">
                    <strong>Actualizado</strong><br>
                    {{ $user->updated_at }}
                </div>
                
                </div>
                <div class="row card-body  ">
            
                </div>
                <br>
                <br>
                <div class="card-footer">
                <div class="col-md-6">
                    <div class="btn-group">
                    @can('edit_users')
                    <a href="{{ url('user', [$user->id, 'edit']) }}" class="btn btn-danger"><i class="fa fa-edit"></i> Editar</a>
                    @endcan
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
