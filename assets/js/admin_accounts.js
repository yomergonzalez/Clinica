/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Autor: Charles Rodriguez
 */

$(function () {


var user ='';
        // DATA TABLE DE CUENTAS
        var table = $('#table_accounts').DataTable({
            'autoWidth': false,
            'select': true,
            'language': datatables_spanish,
            'bLengthChange': false,
            'sDom': '<"toolbar col-xs-8 col-sm-6 row">rtip',
            'responsive': true,
            'ajax': {
                'url': base_url + 'configuration/get_users',
                'type': 'POST'
            },
            columnDefs: [{targets: [], visible: false}, {'bSortable': true, 'aTargets': '_all'}],
            'columns': [
                {'data': 'id'},
                {'data': 'names', className: 'center-align'},
                {'data': 'email'/*, 'width': '50px'*/},
                {'data': 'clasificacion', 'defaultContent': 'No Aplica'},
                {  data: null,"width": "20%","defaultContent": "<button type='button' title='Editar cuenta' class='edit_user btn btn-primary btn-sm'><i class='fa fa-pencil'></i></button><button type='button' title='Eliminar cuenta' class='delete_user btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>" } 
]        });
         table.on('select', function (e, dt, type, indexes) {
                var rowData = table.rows(indexes).data().toArray();
                user = rowData[0];
            })




$("#submit").on("click", function(e){
            var boton = $(this);
            var pass1=  $('#password1').val();
            var pass2=  $('#password2').val();
            var form = $('#form_add_account');
            var empty = false;
            data = form.serializeArray();

        $.each(form.serializeArray(), function (i, field) {
                if (field.value == '' && field.name=='email'|| field.value == '' && field.name=='first_name'|| field.value == '' && field.name=='last_name'|| field.value == '' && field.name=='password1'|| field.value == '' && field.name=='password2') {
                    $('[name='+field.name+']').parent().addClass('has-error');
                    empty = true;
                    }
          

        });
        if(pass1!=pass2){
            toastr.error('Las contraseñas no coinciden');
            return false;
        }
        if (empty){
            toastr.error('Faltan datos obligatorios')
            return false;
           }
            $.ajax({
                url: base_url + "configuration/add_account",
                type: "post",
                dataType: "json",
                data: data,
                 beforeSend: function() {
                    boton.addClass('disabled');
                      },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  complete: function() {
                    boton.removeClass('disabled');
                    }
                })
                .done(function(data){
                    document.getElementById("form_add_account").reset();
                    $('#modal_add_account').modal('hide')
                    toastr.success('Guardado', 'Listo');
                    table.ajax.reload()
                    $('.form-group').removeClass('has-error');
            
                })
                .fail();
});


  $('#table_accounts').on('click','.edit_user' , function(){
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
                          $('#modal_edit_account').modal('show');
                          $('.email_edit').val(data.email);
                          $('.nombre_edit').val(data.names);
                          $('.apellido_edit').val(data.surnames);
                          }
                      });
           
    });// add user


$("#submit_edit").on("click", function(e){
            var boton = $(this);
            var pass1=  $('#password1').val();
            var pass2=  $('#password2').val();
            var form = $('#form_edit_account');
            var empty = false;
            data = form.serialize();

        $.each(form.serializeArray(), function (i, field) {
                if (field.value == '' && field.name=='email'|| field.value == '' && field.name=='first_name'|| field.value == '' && field.name=='last_name'|| field.value == '' && field.name=='password1'|| field.value == '' && field.name=='password2') {
                    $('[name='+field.name+']').parent().addClass('has-error');
                    empty = true;
                    }
          

        });
        if(pass1!=pass2){
            toastr.error('Las contraseñas no coinciden');
            return false;
        }
        if (empty){
            toastr.error('Faltan datos obligatorios')
            return false;
           }
            $.ajax({
                url: base_url + "configuration/edit_account",
                type: "post",
                dataType: "json",
                data: data+'&id='+user.id,
                 beforeSend: function() {
                    boton.addClass('disabled');
                      },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  complete: function() {
                    boton.removeClass('disabled');
                    }
                })
                .done(function(data){
                    document.getElementById("form_edit_account").reset();
                    $('#modal_edit_account').modal('hide')
                    toastr.success('Guardado', 'Listo');
                    table.ajax.reload()
                    $('.form-group').removeClass('has-error');

            
                })
                .fail();
});


       $('#table_accounts').on('click','.delete_user' , function(){

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
                            table.ajax.reload()
                          }
                      });
                  },
                  cancel: function() {
              // nothing to do
                   }
                  });  
          });// end delete



});
