
jQuery(document).ready(function() {

	   form = $('#pastor_form');
    
    $('#nb_ins_teologico').unbind('change');//borro evento click
    $('#nb_ins_teologico').on("change", function(e) { //asigno el evento change u otro
    if ( $("#nb_ins_teologico").val() == 'No')
                    {
                        
                        $('#nb_desc_ins_teologico').attr('disabled','disabled');
                        $('#nb_desc_ins_teologico').val('N/A');

                        $('#nu_tiempo_ins').attr('disabled','disabled');
                        $('#nu_tiempo_ins').val('N/A');

                        $('#nb_titulo_obtenido').attr('disabled','disabled');
                        $('#nb_titulo_obtenido').val('N/A');


                    }
                else
                {
                        $('#nb_desc_ins_teologico').removeAttr('disabled','disabled');
                        $('#nb_desc_ins_teologico').val('');

                        $('#nu_tiempo_ins').removeAttr('disabled','disabled');
                        $('#nu_tiempo_ins').val('');

                        $('#nb_titulo_obtenido').removeAttr('disabled','disabled');
                        $('#nb_titulo_obtenido').val('');
                }





    });

    $('#nb_sufre_enfermedad').unbind('change');//borro evento click
    $('#nb_sufre_enfermedad').on("change", function(e) { //asigno el evento change u otro
    if ( $("#nb_sufre_enfermedad").val() == 'No')
                    {
                        
                        $('#nb_descripcion_enfermedad').attr('disabled','disabled');
                        $('#nb_descripcion_enfermedad').val('N/A');


                    }
                    else
                    {
                        $('#nb_descripcion_enfermedad').removeAttr('disabled','disabled');
                        $('#nb_descripcion_enfermedad').val('');

                    }
                    



    });

});

