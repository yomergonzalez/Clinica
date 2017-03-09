/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Autor: Charles Rodriguez
 */


$(window).load(function () {
    if (welcome)
        msg(6, 5000);
    if (denied)
        msg(53);
//    toastr["success"]("Operación Realizada con exito", "Success");
});

function Admin_accounts() {
    var self = this;

    this.constructor = function () {
        this.componentes_init();
    }

    this.componentes_init = function () {

        // DATA TABLE DE CUENTAS
        var table_accounts = $('#table_accounts').DataTable({
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
                {'data': 'photo', 'defaultContent': 'No Aplica'},
                {'data': 'names', className: 'center-align'},
                {'data': 'email'/*, 'width': '50px'*/},
                {'data': 'clasificacion', 'defaultContent': 'No Aplica'},
                {'data': 'status', 'defaultContent': 'No Aplica'}]
        });

    }
}

$(function () {
    var admin_accounts = new Admin_accounts();
    admin_accounts.constructor();
});