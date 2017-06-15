$(function () {

	var item ='';
 // DATA TABLE DE CUENTAS
        var table = $('#table_specialty').DataTable({
            'autoWidth': false,
            'select': true,
            'language': datatables_spanish,
            'bLengthChange': false,
            'sDom': '<"toolbar col-xs-8 col-sm-6 row">rftp',
            'responsive': true,
            'ajax': {
                'url': base_url + 'configuration/get_especialidades',
                'type': 'POST'
            },
            columnDefs: [{targets: [], visible: false}, {'bSortable': true, 'aTargets': '_all'}],
            'columns': [
                {'data': 'id', className: 'center-align'},
                {'data': 'name'/*, 'width': '50px'*/},
                {  data: null,"width": "30%","defaultContent": "<button type='button'  class='edit_item btn btn-primary btn-sm'><i class='fa fa-pencil'></i></button><button type='button' class='delete_item btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>" } 
                ] });

        table.on('select', function (e, dt, type, indexes) {
                var rowData = table.rows(indexes).data().toArray();
                item = rowData[0];
            })


   

$('#table_specialty').on('click','.delete_item' , function(){

        $.confirm({
            text: "Borrar Elemento?",
            confirm: function() {
                $.ajax({
                url: base_url + "configuration/delete_specialty",
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

$('#table_specialty').on('click','.edit_item' , function(){
   
            $.ajax({
                url: base_url + "configuration/get_specialty",
                type: "post",
                dataType: "json",
                data: 'id='+item.id,
                 beforeSend : function() {
                    },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  success: function(data) {
                    $('#modal_edit_specialty').modal('show');
                    $('.name_edit').val(data.name);
                    }
                });
           
    });// end delete


$("#submit").on("click", function(e){
            e.preventDefault();
            var form = $('#form_add_specialty');
            var empty = false;
            data = form.serializeArray();

        $.each(form.serializeArray(), function (i, field) {
            if (field.value == '') {
                empty = true;
                }

        });
        if (empty){
            toastr.error('Faltan datos obligatorios')
            return false;
           }
            $.ajax({
                url: base_url + "configuration/add_specialty",
                type: "post",
                dataType: "json",
                data: data,
                 beforeSend: function() {
                      },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  complete: function() {
                    }
                })
                .done(function(data){
                    document.getElementById("form_add_specialty").reset();
                    $('#modal_add_specialty').modal('hide')
                    toastr.success('Guardado', 'Listo');
                    table.ajax.reload()
            
                })
                .fail();
});


$("#edit").on("click", function(e){
            var form = $('#form_edit_specialty');
            var empty = false;
            data = form.serialize();

        $.each(form.serializeArray(), function (i, field) {
            if (field.value == '') {
                empty = true;
                }

        });
        if (empty){
            toastr.error('Faltan datos obligatorios')
            return false;
           }
            $.ajax({
                url: base_url + "configuration/edit_specialty",
                type: "post",
                dataType: "json",
                data: data +'&id='+item.id,
                 beforeSend: function() {
                      },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  complete: function() {
                    }
                })
                .done(function(data){
                    $('#modal_edit_specialty').modal('hide')
                    toastr.success('Editado', 'Listo');
                     table.ajax.reload()
                    document.getElementById("form_edit_specialty").reset();
            
                })
                .fail();
});

});