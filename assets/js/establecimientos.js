$(function () {

  var item ='';
  var user='';
 // DATA TABLE DE CUENTAS
        var table = $('#table_establecimiento').DataTable({
            'autoWidth': false,
            'select': true,
            'language': datatables_spanish,
            'bLengthChange': false,
            'sDom': '<"toolbar col-xs-8 col-sm-6 row">rftp',
            'responsive': true,
            'ajax': {
                'url': base_url + 'configuration/get_establecimientos',
                'type': 'POST'
            },
            columnDefs: [{targets: [], visible: false}, {'bSortable': true, 'aTargets': '_all'}],
            'columns': [
                {'data': 'id', className: 'center-align'},
                {'data': 'logo',"render": function(data, type, row) {
                                  return '<img  width="80px" height="80px" src="'+base_url + data+'" />';
                              } },
                {'data': 'nombre'/*, 'width': '50px'*/},
                {  data: null,"width": "30%","defaultContent": "<button type='button'  title='Editar' class='edit_item btn btn-primary btn-sm'><i class='fa fa-pencil'></i></button><button type='button' title='Eliminar' class='delete_item btn btn-danger btn-sm'><i class='fa fa-trash'></i></button><button type='button'  title='Agregar Usuario' class='user_item btn btn-success btn-sm'><i class='fa fa-user-plus'></i></button><button type='button' title='Ver Usuarios'  class='user_list_item btn btn-primary btn-sm'><i class='fa fa-users'></i></button>" } 
                ] });

        table.on('select', function (e, dt, type, indexes) {
                var rowData = table.rows(indexes).data().toArray();
                item = rowData[0];
            })


   

$('#table_establecimiento').on('click','.delete_item' , function(){

        $.confirm({
            text: "Borrar Elemento?",
            confirm: function() {
                $.ajax({
                url: base_url + "configuration/delete_establecimiento",
                type: "post",
                dataType: "json",
                data: 'id='+item.id,
                 beforeSend : function() {
                    },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  success: function(data) {
                      toastr.success('Eliminado', '');
                      table.ajax.reload()
                    }
                });
            },
            cancel: function() {
        // nothing to do
             }
            });  
    });// end delete

$('#table_establecimiento').on('click','.edit_item' , function(){
   
            $.ajax({
                url: base_url + "configuration/get_establecimiento",
                type: "post",
                dataType: "json",
                data: 'id='+item.id,
                 beforeSend : function() {
                    },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  success: function(data) {
                    $('#modal_edit_establecimiento').modal('show');
                    $('.name_edit').val(data.nombre);
                    $('.direccion_edit').val(data.direccion);
                    $('.ciudad_edit').val(data.city);
                    $('.country_edit').val(data.country_id);
                    $('.estado_edit').val(data.state);
                    if(data.telefono==0)
                      $('.telefono_edit').val('');
                    else
                      $('.telefono_edit').val(data.telefono);
                    if(data.postal_code==0)
                      $('.postal_code_edit').val('');
                    else
                      $('.postal_code_edit').val(data.postal_code);
                    $('.city_edit').val(data.city);
                    if(data.cp==0)
                      $('.cp_edit').val('');
                    else
                       $('.cp_edit').val(data.cp);
                    if(data.logo!='')
                      $('#image-preview2').css('background', 'url('+base_url+data.logo+') no-repeat');
                      $('#image-preview2').css('background-size', '150px 150px');
                    }
                });
           
    });// end delete




$.fn.select2.defaults.set( "theme", "bootstrap" );
   $("body .select2").select2();

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

  $("#submit").on("click", function(e){
            e.preventDefault();
            var form = $('#form_add_establecimiento');
        var empty = false;

        $.each(form.serializeArray(), function (i, field) {
                    if (field.value == '' && field.name=='name') {
                      $('[name='+field.name+']').parent().addClass('has-error');
                        empty = true;
                        }

        });
        if (empty){
            toastr.error('Faltan datos obligatorios')
            return false;
           }
            var formData = new FormData(document.getElementById("form_add_establecimiento"));
            $.ajax({
                url: base_url + "configuration/add_establecimiento",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                 processData: false,
                 beforeSend: function() {
                      block("#form_add_establecimiento");
                      },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  complete: function() {
                    $('#form_add_establecimiento').unblock();
                    }
                })
                .done(function(data){
                    if(data.success==true && data.image==true){
                      toastr.success('Establecimiento registrado con exito!', 'Completado')
                      document.getElementById("form_add_establecimiento").reset();
                      $('#image-preview').css("background-image", "none");
                      $('#image-label').html("<i class='fa fa-camera' aria-hidden='true'></i>");
                      $('div.has-error').removeClass('has-error');
                      $('#modal_add_establecimiento').modal('hide');

                    }
                    else if(data.success==true && data.image==false){
                      toastr.success('Establecimiento registrado con exito!', 'Completado')
                      document.getElementById("form_add_establecimiento").reset();
                      $('div.has-error').removeClass('has-error');
                      $('#modal_add_establecimiento').modal('hide');

                    }
                    else if(data.success==true && data.image=='ERROR'){
                      toastr.success('Establecimiento registrado con exito!', 'Completado')
                      toastr.warning('Hubo un problema al subir el logo del Establecimiento', '')
                      document.getElementById("form_add_establecimiento").reset();
                      $('#image-preview').css("background-image", "none");
                      $('#image-label').html("<i class='fa fa-camera' aria-hidden='true'></i>");
                      $('div.has-error').removeClass('has-error');
                      $('#modal_add_establecimiento').modal('hide');


                    }
                    else{
                      toastr.warning('No se pudo registrar al Establecimiento', 'Error');
                      $('div.has-error').removeClass('has-error');

                    }
                    table.ajax.reload();
                });
});

  $("#edit").on("click", function(e){
            e.preventDefault();
            var form = $('#form_edit_establecimiento');
            var empty = false;

        $.each(form.serializeArray(), function (i, field) {
                    if (field.value == '' && field.name=='name') {
                      $('[name='+field.name+']').parent().addClass('has-error');
                        empty = true;
                        }

        });
        if (empty){
            toastr.error('Faltan datos obligatorios')
            return false;
           }
            var formData = new FormData(document.getElementById("form_edit_establecimiento"));
            formData.append("id", item.id)
            $.ajax({
                url: base_url + "configuration/edit_establecimiento",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                 processData: false,
                 beforeSend: function() {
                      block('#form_edit_establecimiento');
                      },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  complete: function() {
                    $('#form_edit_establecimiento').unblock();
                    }
                })
                .done(function(data){
                    if(data.success==true && data.image==true){
                      toastr.success('establecimiento actualizado con exito!', 'Completado')
                      document.getElementById("form_edit_establecimiento").reset();
                      $('#modal_edit_establecimiento').modal('hide');
                      $('div.has-error').removeClass('has-error');

                    }
                    else if(data.success==true && data.image==false){
                      toastr.success('establecimiento actualizado con exito!', 'Completado')
                      document.getElementById("form_edit_establecimiento").reset();
                      $('#modal_edit_establecimiento').modal('hide');
                      $('div.has-error').removeClass('has-error');

                    }
                    else if(data.success==true && data.image=='ERROR'){
                      toastr.success('Paciente actualizado con exito!', 'Completado')
                      toastr.warning('Hubo un problema al subir el logo del establecimiento', '')
                      document.getElementById("form_edit_establecimiento").reset();
                      $('#modal_edit_establecimiento').modal('hide');
                      $('div.has-error').removeClass('has-error');
                    }

                    else if(data.success==false && data.image==true){
                      toastr.success('Logo actualizado con exito!', 'Completado')
                      toastr.warning('No hubo cambios en los datos del establecimiento', '')
                      document.getElementById("form_edit_establecimiento").reset();
                      $('#modal_edit_establecimiento').modal('hide');
                      $('div.has-error').removeClass('has-error');
                    }
                    else{
                      toastr.warning('No se pudo actualizar el establecimiento', 'Error');
                      $('div.has-error').removeClass('has-error');

                    }
                   table.ajax.reload();

                })
                .fail();
});



  $('#table_establecimiento').on('click','.user_item' , function(){
    $('#modal_add_account').modal('show');
           
    });// add user

$("#submit_account").on("click", function(e){
            var boton = $(this);
            var select=  $( "#select_type" ).val();
            var form = $('#form_add_account');
            var empty = false;
            data = form.serialize();

        $.each(form.serializeArray(), function (i, field) {
            if(select==2){
               if (field.value == '' && field.name=='email'|| field.value == '' && field.name=='first_name'|| field.value == '' && field.name=='last_name') {
                    $('[name='+field.name+']').parent().addClass('has-error');
                    empty = true;
                    }   
            }
            else if(select==3){
              if (field.value == '' && field.name=='email'|| field.value == '' && field.name=='first_name'|| field.value == '' && field.name=='last_name') {
                    $('[name='+field.name+']').parent().addClass('has-error');
                    empty = true;
                    } 
            }

        });
        if (empty){
            toastr.error('Faltan datos obligatorios')
            return false;
           }
            $.ajax({
                url: base_url + "configuration/add_account",
                type: "post",
                dataType: "json",
                data: data + '&establecimiento_id='+item.id,
                 beforeSend: function() {
                       boton.addClass('disabled');

                      },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  complete: function() {
                    }
                })
                .done(function(data){
                    document.getElementById("form_add_account").reset();
                    $('#modal_add_account').modal('hide')
                    toastr.success('Guardado', 'Listo');
                    $('.form-group').removeClass('has-error');
                    boton.removeClass('disabled');

            
                })
                .fail();
});//guardar user


$("#submit_edit_account").on("click", function(e){

            var boton = $(this);

            var form = $('#form_edit_account');
            var empty = false;
            data = form.serialize();

        $.each(form.serializeArray(), function (i, field) {
          if (field.value == '' && field.name=='email'|| field.value == '' && field.name=='first_name'|| field.value == '' && field.name=='last_name') {
                    $('[name='+field.name+']').parent().addClass('has-error');
                    empty = true;
                }   
          
            
        });
        if (empty){
            toastr.error('Faltan datos obligatorios')
            return false;
           }
            $.ajax({
                url: base_url + "configuration/edit_account",
                type: "post",
                dataType: "json",
                data: data + '&id='+user.id,
                 beforeSend: function() {
                        boton.addClass('disabled');

                      },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  complete: function() {
                    }
                })
                .done(function(data){
                     $('.form-group').removeClass('has-error');
                    document.getElementById("form_edit_account").reset();
                    $('#modal_edit_account').modal('hide')
                    toastr.success('Actualizado', 'Listo');
                    boton.removeClass('disabled');
            
                })
                .fail();
});//editar user


  $('#table_establecimiento').on('click','.user_list_item' , function(){
          
          var table_user = $('#table_list_users').DataTable({
            'autoWidth': false,
            'select': true,
            'destroy': true,
            'language': datatables_spanish,
            'bLengthChange': false,
            'sDom': '<"toolbar col-xs-8 col-sm-6 row">rftp',
            'responsive': true,
            'ajax': {
                'url': base_url + 'configuration/get_users',
                'type': 'POST',
                'data': {"establecimiento_id" : item.id}
            },
            columnDefs: [{targets: [], visible: false}, {'bSortable': true, 'aTargets': '_all'}],
            'columns': [
                {'data': 'id', className: 'center-align'},
                {'data': 'names', className: 'center-align'},
                {'data': 'email', className: 'center-align'},
                {'data': 'clasificacion'/*, 'width': '50px'*/},
                {'data': 'status', className: 'center-align'},
                {  data: null,"width": "30%","defaultContent": "<button type='button' title='Editar cuenta' class='edit_user btn btn-primary btn-sm'><i class='fa fa-pencil'></i></button><button type='button' title='editar cuenta' class='delete_user btn btn-danger btn-sm'><i class='fa fa-trash'></i></button><button type='button' title='cambiar estatus' class='status_user btn btn-primary btn-sm'><i class='fa fa-shield'></i></button><button type='button'  title='Restablecer contraseña' class='reset_user btn btn-warning btn-sm'><i class='fa fa-lock'></i></button>" } 
                ] });

        table_user.on('select', function (e, dt, type, indexes) {
                var rowData = table_user.rows(indexes).data().toArray();
                user = rowData[0];
            })

          $('#modal_list_account').modal('show');
           
        $('#table_list_users').on('click','.delete_user' , function(){

              $.confirm({
                  text: "Borrar Cuenta?",
                  confirm: function() {
                      $.ajax({
                      url: base_url + "configuration/delete_account",
                      type: "post",
                      dataType: "json",
                      data: 'id='+user.id,
                       beforeSend : function() {
                          },
                        error : function(jqXHR, status, error) {
                            toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                          },
                        success: function(data) {
                            toastr.success('Eliminado', '');
                            table_user.ajax.reload()
                          }
                      });
                  },
                  cancel: function() {
              // nothing to do
                   }
                  });  
          });// end delete


        $('#table_list_users').on('click','.status_user' , function(){

              $.confirm({
                  text: "Cambiar status?",
                  confirm: function() {
                      $.ajax({
                      url: base_url + "configuration/status_account",
                      type: "post",
                      dataType: "json",
                      data: 'id='+user.id,
                       beforeSend : function() {
                          },
                        error : function(jqXHR, status, error) {
                            toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                          },
                        success: function(data) {
                            toastr.success('estatus cambiado..', '');
                            table_user.ajax.reload()
                          }
                      });
                  },
                  cancel: function() {
              // nothing to do
                   }
                  });  
          });// end delete

          $('#table_list_users').on('click','.reset_user' , function(){

              $.confirm({
                  text: "Restablecer contraseña?",
                  confirm: function() {
                      $.ajax({
                      url: base_url + "configuration/reset_password",
                      type: "post",
                      dataType: "json",
                      data: 'id='+user.id,
                       beforeSend : function() {
                          },
                        error : function(jqXHR, status, error) {
                            toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                          },
                        success: function(data) {
                            toastr.success('contraseña restablecida ..', 'Email Enviado');
                            table_user.ajax.reload()
                          }
                      });
                  },
                  cancel: function() {
              // nothing to do
                   }
                  });  
          });// end delete

        $('#table_list_users').on('click','.edit_user' , function(){

                      $.ajax({
                      url: base_url + "configuration/get_account",
                      type: "post",
                      dataType: "json",
                      data: 'id='+user.id,
                       beforeSend : function() {
                          },
                        error : function(jqXHR, status, error) {
                            toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                          },
                        success: function(data) {
                          $('#modal_list_account').modal('hide');
                          $('#modal_edit_account').modal('show');
                          $('.email_edit').val(data.email);
                          $('.nombre_edit').val(data.names);
                          $('.apellido_edit').val(data.surnames);
                          $('.especialidad_edit').val(data.especialidad_id);
                          $('.institucion_edit').val(data.institucion);
                          $('.cedula_edit').val(data.cedula_prof);

                          }
                      });
                  
          });// end edit

    });// list user




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