@extends('layouts.admin')

@section('title', 'Postulados')
@section('page_title', 'Votación')
@section('page_subtitle', ' Para que su voto sea válido, debe elegir a los siguientes postulantes:')


@section('content')

<div class="container">   
{!!Form::open (['route'=>'votantes.store','id'=>'votantes_form'])!!}
<input name="users_id" type="hidden" value=" {{ auth()->user()->id}}" id="users_id">
    <div class="row mb-3"> 
            <div class="col-sm-6">
                <div class="card card-danger card-outline card-candidatos">
                    <div class="card-header"><i class="fas fa-user fa-10px"></i>  
                        Postulados a <br> PRESIDENTE</div>
                        <div class="card-body mh-100 "> 
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                </tr>
                            </thead>
                            @foreach ($presidente as $presi)
                            <tbody>
                                <tr>
                                <th><input type="checkbox" name="postulados_id[]" id="id_postulados{{ $presi->id_postulados }}" value="{{ $presi->id_postulados }}"
                                {{ old('nb_nombres') == $presi->nb_nombres ? 'checked' : ''}} >
                                    {{ $presi->nb_nombres }}</th>
                                <th>{{ $presi->nb_apellidos }}</th>
                                </tr>
                            </tbody>
                            @endforeach
                            </table>
                        </div>
            </div> 
        </div>  
        <div class="col-sm-6">
                <div class="card card-danger card-outline card-candidatos">
                    <div class="card-header"><i class="fas fa-user fa-10px"></i>  
                        Postulados a <br> VICE-PRESIDENTE</div>
                        <div class="card-body mh-100 "> 
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                </tr>
                            </thead>
                            @foreach ($vice as $presi)
                            <tbody>
                                <tr>
                                <th><input type="checkbox" name="postulados_id[]" id="id_postulados{{ $presi->id_postulados }}" value="{{ $presi->id_postulados }}"
                                {{ old('nb_nombres') == $presi->nb_nombres ? 'checked' : ''}} >
                                    {{ $presi->nb_nombres }}</th>
                                <th>{{ $presi->nb_apellidos }}</th>
                                </tr>
                            </tbody>
                            @endforeach
                            </table>
                        </div>
            </div> 
        </div> 
        <div class="col-sm-6">
                <div class="card card-danger card-outline card-candidatos">
                    <div class="card-header"><i class="fas fa-user fa-10px"></i>  
                        Postulados a <br>  TESORERO (A)</div>
                        <div class="card-body mh-100 "> 
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                </tr>
                            </thead>
                            @foreach ($tesorero as $presi)
                            <tbody>
                                <tr>
                                <th><input type="checkbox" name="postulados_id[]" id="id_postulados{{ $presi->id_postulados }}" value="{{ $presi->id_postulados }}"
                                {{ old('nb_nombres') == $presi->nb_nombres ? 'checked' : ''}} >
                                    {{ $presi->nb_nombres }}</th>
                                <th>{{ $presi->nb_apellidos }}</th>
                                </tr>
                            </tbody>
                            @endforeach
                            </table>
                        </div>
            </div> 
        </div> 
        <div class="col-sm-6">
                <div class="card card-danger card-outline card-candidatos">
                    <div class="card-header"><i class="fas fa-user fa-10px"></i>  
                        Postulados a  <br> SUB-TESORERO (A)</div>
                        <div class="card-body mh-100 "> 
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                </tr>
                            </thead>
                            @foreach ($subtes as $presi)
                            <tbody>
                                <tr>
                                <th><input type="checkbox" name="postulados_id[]" id="id_postulados{{ $presi->id_postulados }}" value="{{ $presi->id_postulados }}"
                                {{ old('nb_nombres') == $presi->nb_nombres ? 'checked' : ''}} >
                                    {{ $presi->nb_nombres }}</th>
                                <th>{{ $presi->nb_apellidos }}</th>
                                </tr>
                            </tbody>
                            @endforeach
                            </table>
                        </div>
            </div> 
        </div> 
        <div class="col-sm-6">
                <div class="card card-danger card-outline card-candidatos">
                    <div class="card-header"><i class="fas fa-user fa-10px"></i>  
                        Postulados a <br> SECRETARIO (A)</div>
                        <div class="card-body mh-100 "> 
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                </tr>
                            </thead>
                            @foreach ($secretario as $presi)
                            <tbody>
                                <tr>
                                <th><input type="checkbox" name="postulados_id[]" id="id_postulados{{ $presi->id_postulados }}" value="{{ $presi->id_postulados }}"
                                {{ old('nb_nombres') == $presi->nb_nombres ? 'checked' : ''}} >
                                    {{ $presi->nb_nombres }}</th>
                                <th>{{ $presi->nb_apellidos }}</th>
                                </tr>
                            </tbody>
                            @endforeach
                            </table>
                        </div>
            </div> 
        </div> 
        <div class="col-sm-6">
                <div class="card card-danger card-outline card-candidatos">
                    <div class="card-header"><i class="fas fa-user fa-10px"></i>  
                        Postulados a <br>  SUB-SECRETARIO</div>
                        <div class="card-body mh-100 "> 
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                </tr>
                            </thead>
                            @foreach ($subsecre as $presi)
                            <tbody>
                                <tr>
                                <th><input type="checkbox" name="postulados_id[]" id="id_postulados{{ $presi->id_postulados }}" value="{{ $presi->id_postulados }}"
                                {{ old('nb_nombres') == $presi->nb_nombres ? 'checked' : ''}} >
                                    {{ $presi->nb_nombres }}</th>
                                <th>{{ $presi->nb_apellidos }}</th>
                                </tr>
                            </tbody>
                            @endforeach
                            </table>
                        </div>
            </div> 
        </div> 
        <div class="col-sm-6">
                <div class="card card-danger card-outline card-candidatos">
                    <div class="card-header"><i class="fas fa-user fa-10px"></i>  
                        Postulados a <br> RELACIONES INSTITUCIONALES</div>
                        <div class="card-body mh-100 "> 
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                </tr>
                            </thead>
                            @foreach ($relaciones as $presi)
                            <tbody>
                                <tr>
                                <th><input type="checkbox" name="postulados_id[]" id="id_postulados{{ $presi->id_postulados }}" value="{{ $presi->id_postulados }}"
                                {{ old('nb_nombres') == $presi->nb_nombres ? 'checked' : ''}} >
                                    {{ $presi->nb_nombres }}</th>
                                <th>{{ $presi->nb_apellidos }}</th>
                                </tr>
                            </tbody>
                            @endforeach
                            </table>
                        </div>
            </div> 
        </div> 
        <div class="col-sm-6">
                <div class="card card-danger card-outline card-candidatos">
                    <div class="card-header"><i class="fas fa-user fa-10px"></i>  
                        Postulados a <br> R. PERSONAL OBRERO</div>
                        <div class="card-body mh-100 "> 
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                </tr>
                            </thead>
                            @foreach ($obrero as $presi)
                            <tbody>
                                <tr>
                                <th><input type="checkbox" name="postulados_id[]" id="id_postulados{{ $presi->id_postulados }}" value="{{ $presi->id_postulados }}"
                                {{ old('nb_nombres') == $presi->nb_nombres ? 'checked' : ''}} >
                                    {{ $presi->nb_nombres }}</th>
                                <th>{{ $presi->nb_apellidos }}</th>
                                </tr>
                            </tbody>
                            @endforeach
                            </table>
                        </div>
                    </div> 
                </div>    
            </div>
            <div class="btn-holder row align-center align-items-center  card-solid">
                <div class="col-sm-12">
                    <div class="justify-content-center">
                        <div class="card card-danger card-outline">
                        <div class="card-header">Realice su votación</div>
                        <div class="card-body"><center>
                                    <a class="btn btn-danger btn-lg ajax" id="submit" onclick="votar()" style="height:40px; width:200px; color:#ffff;" >
                                    <span><i class="fas fa-check-circle"></i> Votar</span>
                                    </a></center>
                                </div>
                        </div>
                    </div>
                </div>
    </div>
    
{!! Form::close()!!}



    


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
  
  $("#votantes_form").submit(function(event){
  //event.preventDefault();
    });


  function votar() {

    if (confirm('¿Estás deacuerdo con la votación?')) {
        
        $('#votantes_form').submit();
    }
  
  };
  
  </script>

<script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          checkboxClass: 'icheckbox_square-blue',
          increaseArea: '20%' // optional
        });
      });
</script>

<style>
.card-candidatos{

    min-height: 15rem;
}


</style>
@endpush
