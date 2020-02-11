
    <div class="car-body">
        <div class="row card-body">
        <div class="col-sm-4"> 
            <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label>Fecha de inicio:</label>

                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                        {{ Form:: text('fe_inicio',null,['class'=>'form-control','placeholder' => 'Nombres','id'=>'inicio']) }}
                        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-calendar"></i></div>
                        </div>
                        </div>
                       <span class="text-danger">{{ $errors->first('fe_inicio') }}</span>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    </div>
            </div>
            <div class="col-sm-4"> 
            <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label>Hora de inicio:</label>

                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                        {{ Form:: text('h_inicio',null,['class'=>'form-control','placeholder' => 'Hora de inicio','id'=>'h_inicio']) }}
                        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                        </div>
                       <span class="text-danger">{{ $errors->first('h_inicio') }}</span>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    </div>
            </div>

            <div class="col-sm-4"> 
            <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label>Hora fin de la votación:</label>

                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                        {{ Form:: text('h_fin',null,['class'=>'form-control','placeholder' => 'Hora que termina la votacion','id'=>'h_fin']) }}
                            </div>
                        <span class="text-danger">{{ $errors->first('h_fin') }}</span>
                    </div>
                </div> 
            </div>
                <div class="col-sm-12">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-danger ajax" id="submit">
                        <i id="ajax-icon" class="fa fa-save"></i> Guardar
                    </button>
                </div>			
                </div>
        </div>     









