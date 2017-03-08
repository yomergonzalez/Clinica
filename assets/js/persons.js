$(function () {
    $("#table_pacientes").DataTable({
      "sDom": '<"H" <"toolbar"fr>>tp',
      "columns": [
              { "width": "10%",className: "tr_align" },
              { "width": "20%",className: "tr_align" },
              { "width": "20%",className: "tr_align" },
              { "width": "10%",className: "tr_align" },
              { "width": "20%",className: "tr_align" }
            ]
    });
$("div.dataTables_filter").append(' <button class="btn btn-lg pull-right btn-flat btn-primary" type="button" name="button">Nuevo Paciente</button>');
  });
