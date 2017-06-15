$(function () {

	var item ='';
 // DATA TABLE DE CUENTAS
        var table = $('#table_diagnostico').DataTable({
            'autoWidth': false,
            'select': true,
            'language': datatables_spanish,
            'bLengthChange': false,
            'sDom': '<"toolbar col-xs-8 col-sm-6 row">rftp',
            'responsive': true,
            'ajax': {
                'url': base_url + 'configuration/get_diagnosticos',
                'type': 'POST'
            },
            columnDefs: [{targets: [], visible: false}, {'bSortable': true, 'aTargets': '_all'}],
            'columns': [
                {'data': 'id', className: 'center-align'},
                {'data': 'desc'/*, 'width': '50px'*/},
                {  data: null,"width": "30%","defaultContent": "<button type='button'  class='edit_item btn btn-primary btn-sm'><i class='fa fa-pencil'></i></button><button type='button' class='delete_item btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>" } 
                ] });

        table.on('select', function (e, dt, type, indexes) {
                var rowData = table.rows(indexes).data().toArray();
                item = rowData[0];
            })


   

$('#table_diagnostico').on('click','.delete_item' , function(){

        $.confirm({
            text: "Borrar Elemento?",
            confirm: function() {
                $.ajax({
                url: base_url + "configuration/delete_diagnostico",
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

$('#table_diagnostico').on('click','.edit_item' , function(){
   
            $.ajax({
                url: base_url + "configuration/get_diagnostico",
                type: "post",
                dataType: "json",
                data: 'id='+item.id,
                 beforeSend : function() {
                    },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  success: function(data) {
                    $('#modal_edit_diagnostico').modal('show');
                    $('.name_edit').val(data.desc);
                    }
                });
           
    });// end delete


$("#submit").on("click", function(e){
            e.preventDefault();
            var form = $('#form_add_diagnostico');
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
                url: base_url + "configuration/add_diagnostico",
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
                    document.getElementById("form_add_diagnostico").reset();
                    $('#modal_add_diagnostico').modal('hide')
                    toastr.success('Guardado', 'Listo');
                    table.ajax.reload()
            
                })
                .fail();
});


$("#edit").on("click", function(e){
            var form = $('#form_edit_diagnostico');
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
                url: base_url + "configuration/edit_diagnostico",
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
                    $('#modal_edit_diagnostico').modal('hide')
                    toastr.success('Editado', 'Listo');
                     table.ajax.reload()
                    document.getElementById("form_edit_diagnostico").reset();
            
                })
                .fail();
});

});