<div class="car-body">
	<div class="row card-body">
		<div class="col-sm-3">
      <strong>Cédula</strong><br>
         <div class="input-group mb-6">
                  <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  
                  {!! Form::select('cargos_id', $cargos, null,array('class' => 'form-control input-sm','placeholder'=>'Cargo a ser postulado','id'=>'cargos_id')) !!}
                </div>
                 <span class="text-danger">{{ $errors->first('nu_cedula') }}</span>
      </div>
			<div class="col-sm-3">
      <strong>Nombres</strong><br>
         <div class="input-group mb-6">
                  <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  {{ Form:: text('nb_nombres',null,['class'=>'form-control','placeholder' => 'Nombres','id'=>'nb_nombres']) }}
                </div>
                 <span class="text-danger">{{ $errors->first('nb_nombres') }}</span>
      </div>
	<div class="col-sm-3">
      <strong>Apellidos</strong><br>
         <div class="input-group mb-6">
                  <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  {{ Form:: text('nb_apellidos',null,['class'=>'form-control','placeholder' => 'Apellidos','id'=>'nb_apellidos']) }}
                </div>
                 <span class="text-danger">{{ $errors->first('nb_apellidos') }}</span>
      </div>
			<div class="col-sm-3">
			<strong>Cédula</strong><br>
			 	 <div class="input-group mb-6">
                  <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  {{ Form:: text('nu_cedula',null,['class'=>'form-control','placeholder' => 'Cédula','id'=>'nu_cedula']) }}
                </div>
                 <span class="text-danger">{{ $errors->first('nu_cedula') }}</span>
			</div>
            </div>
  
			
			  <div class="card-footer">
			  	 <button type="submit" class="btn btn-danger ajax" id="submit">
                <i id="ajax-icon" class="fa fa-save"></i> Guardar
              </button>
							
			</div>
		</div>
	</div>








