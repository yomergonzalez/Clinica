 
$(function () {


  paciente_id=0;
  var table =   $("#table_pacientes").DataTable({
      "sDom": '<"H" <"toolbar"fr>>tp',
      "destroy": true,
      "columns": [
              { "width": "10%",className: "tr_align" },
              { "width": "10%",className: "tr_align" },
              { "width": "20%",className: "tr_align" },
              { "width": "10%",className: "tr_align" },
              { "width": "20%",className: "tr_align" },
              { "width": "30%",className: "tr_align" }

            ]
    });

    $('#table_pacientes').on( 'click', 'tr', function () {
      paciente_id = this.id ;
    });

$("div.dataTables_filter").append(' <button class="btn btn-lg pull-right btn-flat btn-primary" data-toggle="modal" data-target="#nuevopaciente" type="button" name="button">Nuevo Paciente</button>');

$('#table_pacientes').removeClass('hidden');

$.uploadPreview({
   input_field: "#image-upload",   // Default: .image-upload
   preview_box: "#image-preview",  // Default: .image-preview
   label_field: "#image-label",    // Default: .image-label
   label_default: "<i class='fa fa-camera' aria-hidden='true'></i>",   // Default: Choose File
   label_selected: "Cambiar",  // Default: Change File
   no_label: false                 // Default: false
 });

$.uploadPreview({
   input_field: "#image-upload2",   // Default: .image-upload
   preview_box: "#image-preview2",  // Default: .image-preview
   label_field: "#image-label2",    // Default: .image-label
   label_default: "<i class='fa fa-camera' aria-hidden='true'></i>",   // Default: Choose File
   label_selected: "Cambiar",  // Default: Change File
   no_label: false                 // Default: false
 });

 $( "#fechanac" ).datepicker({yearRange: "-100:+0",minDate: '-100y', maxDate: "+1M +10D"});

 $( "#fechanac" ).datepicker( "option", "changeYear", true );
 $( "#fechanac" ).datepicker( "option", "changeMonth", true );
  


  });// load close

  $("#new_paciente_form").on("submit", function(e){
            e.preventDefault();
            var form = $(this);
        var empty = false;
            console.log(form.serializeArray());

        $.each(form.serializeArray(), function (i, field) {
                    if (field.value == '' && field.name=='name'|| field.value == '' && field.name=='last_name'|| field.value == '' && field.name=='birth_date'||field.value == '' && field.name=='phone') {
                      $('[name='+field.name+']').parent().addClass('has-error');
                        empty = true;
                        }

        });
        if (empty){
            toastr.error('Faltan datos obligatorios')
            return false;
           }
            var formData = new FormData(document.getElementById("new_paciente_form"));
            $.ajax({
                url: base_url + "persons/crear",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
	               processData: false,
                 beforeSend: function() {
                      block("#new_paciente_form");
                      },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  complete: function() {
                    $('#new_paciente_form').unblock();
                    }
                })
                .done(function(data){
                    if(data.success==true && data.image==true){
                      toastr.success('Paciente registrado con exito!', 'Completado')
                      document.getElementById("new_paciente_form").reset();
                      $('#image-preview').css("background-image", "none");
                      $('#image-label').html("<i class='fa fa-camera' aria-hidden='true'></i>");
                      reset_datatable();
                      $('div.has-error').removeClass('has-error');
                      $('#nuevopaciente').modal('hide');

                    }
                    else if(data.success==true && data.image==false){
                      toastr.success('Paciente registrado con exito!', 'Completado')
                      document.getElementById("new_paciente_form").reset();
                      reset_datatable();
                      $('div.has-error').removeClass('has-error');
                      $('#nuevopaciente').modal('hide');

                    }
                    else if(data.success==true && data.image=='ERROR'){
                      toastr.success('Paciente registrado con exito!', 'Completado')
                      toastr.warning('Hubo un problema al subir la foto del paciente', '')
                      document.getElementById("new_paciente_form").reset();
                      $('#image-preview').css("background-image", "none");
                      $('#image-label').html("<i class='fa fa-camera' aria-hidden='true'></i>");
                      reset_datatable();
                      $('div.has-error').removeClass('has-error');
                      $('#nuevopaciente').modal('hide');


                    }
                    else{
                      toastr.warning('No se pudo registrar al paciente', 'Error');
                      $('div.has-error').removeClass('has-error');

                    }
                });
});

function reset_datatable(){

  var table =   $("#table_pacientes").DataTable({
        ajax: base_url +'persons/persons_list',
        "sDom": '<"H" <"toolbar"fr>>tp',
        "destroy": true,
          "columns": [
                { "data": "photo",
                    "render": function ( data, type, full, meta ) {
                     return '<img src="'+base_url+data+'" class="img-circle" alt="User Image">';
                  }, "width": "10%",className: "tr_align"}, 
                {  data: 'name',"width": "10%",className: "tr_align" },
                {  data: 'birth_date',"width": "20%",className: "tr_align" },
                {  data: 'sexo',"width": "10%",className: "tr_align" },
                {  data: 'phone',"width": "20%",className: "tr_align" },
                {  data: null,"width": "30%",className: "tr_align","defaultContent": "<div class='buttons'><a data-toggle='tooltip' title='Agregar consulta' class='btn btn-social-icon btn-file'><i class='fa fa-plus-circle'></i></a><a data-toggle='tooltip' title='Editar' class='button_edit btn btn-social-icon btn-file'><i class='fa fa-pencil-square-o'></i></a><a data-toggle='tooltip' title='Ver perfil' class='btn btn-social-icon btn-file'><i class='fa fa-folder-open'></i></a><a data-toggle='tooltip' title='Eliminar' class='btn btn-social-icon btn-file'><i class='fa fa-trash'></i></a</div>" }


              ]
      });
  $("div.dataTables_filter").append('<button class="btn btn-lg pull-right btn-flat btn-primary" data-toggle="modal" data-target="#nuevopaciente" type="button" name="button">Nuevo Paciente</button>');
}

$("#table_pacientes").on("click",'.button_edit', function(e){
    paciente_id = $(this).parents('tr').attr('id');
   $.ajax({
          url:base_url+ 'persons/get_person',
          type:"POST",
          data: 'id='+ paciente_id,
          dataType: 'json',
          beforeSend: function() {
                block();
            },
           error : function(jqXHR, status, error) {
            toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
          },
          complete: function() {
              $.unblockUI();
              }
          })
    .done(function (data) {
      $('#actualizar_paciente').modal('show');
      console.log(data)
        $('#edit_paciente_form .name_edit').val(data.name);
        $('#edit_paciente_form .last_name_edit').val(data.last_name);
        $('#edit_paciente_form .birth_date_edit').val(data.birth_date);
        $('#edit_paciente_form .sexo_edit').val(data.sexo);
        $('#edit_paciente_form .phone_edit').val(data.phone);
        $('#edit_paciente_form .address_edit').val(data.address);
        $('#edit_paciente_form .email_edit').val(data.email);
        if(data.cellphone==0)
          $('#edit_paciente_form .cellphone_edit').val('');
        else
          $('#edit_paciente_form .cellphone_edit').val(data.cellphone);
        if(data.postal_code==0)
          $('#edit_paciente_form .postal_code_edit').val('');
        else
          $('#edit_paciente_form .postal_code_edit').val(data.postal_code);
        if(data.city_id==0)
           $('#edit_paciente_form .city_edit').val('');
         else
            $('#edit_paciente_form .city_edit').val(data.city_id);
        if(data.country_id==0)
          $('#edit_paciente_form .country_edit').val('');
        else
           $('#edit_paciente_form .country_edit').val(data.country_id);
       })


  });



 $("#edit_paciente_form").on("submit", function(e){
            e.preventDefault();
            var form = $(this);
        var empty = false;
            console.log(form.serializeArray());

        $.each(form.serializeArray(), function (i, field) {
                    if (field.value == '' && field.name=='name'|| field.value == '' && field.name=='last_name'|| field.value == '' && field.name=='birth_date'||field.value == '' && field.name=='phone') {
                      $('[name='+field.name+']').parent().addClass('has-error');
                        empty = true;
                        }

        });
        if (empty){
            toastr.error('Faltan datos obligatorios')
            return false;
           }
            var formData = new FormData(document.getElementById("edit_paciente_form"));
            formData.append("id", paciente_id)
            $.ajax({
                url: base_url + "persons/editar",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                 processData: false,
                 beforeSend: function() {
                      block('#edit_paciente_form');
                      },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  complete: function() {
                    $('#edit_paciente_form').unblock();
                    }
                })
                .done(function(data){
                    if(data.success==true && data.image==true){
                      toastr.success('Paciente actualizado con exito!', 'Completado')
                      document.getElementById("edit_paciente_form").reset();
                      $('#image-preview').css("background-image", "none");
                      $('#image-label').html("<i class='fa fa-camera' aria-hidden='true'></i>");
                      reset_datatable();
                      $('#actualizar_paciente').modal('hide');
                      $('div.has-error').removeClass('has-error');

                    }
                    else if(data.success==true && data.image==false){
                      toastr.success('Paciente actualizado con exito!', 'Completado')
                      document.getElementById("edit_paciente_form").reset();
                      reset_datatable();
                      $('#actualizar_paciente').modal('hide');
                      $('div.has-error').removeClass('has-error');

                    }
                    else if(data.success==true && data.image=='ERROR'){
                      toastr.success('Paciente actualizado con exito!', 'Completado')
                      toastr.warning('Hubo un problema al subir la foto del paciente', '')
                      document.getElementById("edit_paciente_form").reset();
                      $('#image-preview').css("background-image", "none");
                      $('#image-label').html("<i class='fa fa-camera' aria-hidden='true'></i>");
                      reset_datatable();
                      $('#actualizar_paciente').modal('hide');
                      $('div.has-error').removeClass('has-error');


                    }
                    else{
                      toastr.warning('No se pudo actualizar al paciente', 'Error');
                      $('div.has-error').removeClass('has-error');

                    }
                })
                .fail();
});


function block(element=false){
  if(element){
   $(element).block({ message: '<div class="cssload-loader"></div>', css: { border: 'none' } ,
 overlayCSS: { backgroundColor: '#fff',   opacity: 9,  }  });
 }else{    
   $.blockUI({ message: '<div class="cssload-loader"></div>', css: { border: 'none' } ,
 overlayCSS: { backgroundColor: '#fff',   opacity: 9,  }  });
 }
}