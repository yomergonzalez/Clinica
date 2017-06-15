$(function () {

 var fechahoy = new Date();
 var today = new Date(fechahoy.getFullYear(), fechahoy.getMonth(), fechahoy.getDate());
 var user='';

function  tabla_data(fecha){

    var table = $('#table').DataTable({
            'autoWidth': false,
            'select': true,
            'language': datatables_spanish,
            'bLengthChange': false,
            'sDom': '',
            'responsive': true,
            'destroy':true,
            "pageLength": 50,
            'ajax': {
                'url': base_url + 'agenda/get_consultas',
                'type': 'POST',
                'data': {'fecha': fecha }
            },
            columnDefs: [{targets: [], visible: false}, {'bSortable': true, 'aTargets': '_all'}],
            'columns': [
                {'data': 'date',"width": "20%"},
                {'data': 'name', className: 'center-align'},
                {'data': 'tipo',"width": "20%"/*, 'width': '50px'*/},
                {'data': 'boton',"width": "20%"/*, 'width': '50px'*/},
]      });
         table.on('select', function (e, dt, type, indexes) {
                var rowData = table.rows(indexes).data().toArray();
                user = rowData[0];
                console.log(user)
            })
     }


		$('#calendar').datepicker({
		    language: "es",
		    defaultDate: new Date(),
		    daysOfWeekDisabled: "2",
		    todayHighlight: true
		}).on('changeDate', function(e) {
		        $('#fecha').text(diaespañol(e.date))
		       tabla_data(fecha(e.date));

		    });

		  $('#calendar').datepicker('setDate', today);

		$('.next-day').on("click", function () {
		    var date = $('#calendar').datepicker('getDate');
		    date.setTime(date.getTime() + (1000*60*60*24))
		    $('#calendar').datepicker("setDate", date);
		});

		$('.prev-day').on("click", function () {
		    var date = $('#calendar').datepicker('getDate');
		    date.setTime(date.getTime() - (1000*60*60*24))
		    $('#calendar').datepicker("setDate", date);
		});




$('#search_pac').devbridgeAutocomplete({
    serviceUrl: base_url + 'agenda/buscar_paciente',
    dataType: 'json',
    type: 'post',
    minChars: 3,
    onSelect: function (suggestion) {
             $('#paciente_id').val(suggestion.id);
    }
});





});


function fecha(date){
	return  date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate();

}

function diaespañol(fecha){
	var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
	return diasSemana[fecha.getDay()] + ", " + fecha.getDate() + " de " + meses[fecha.getMonth()];
}