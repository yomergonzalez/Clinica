$(function () {
    $("#table_pacientes").DataTable({
      "sDom": '<"H" <"toolbar"fr>>tp',
      "columns": [
              { "width": "10%",className: "tr_align" },
              { "width": "10%",className: "tr_align" },
              { "width": "20%",className: "tr_align" },
              { "width": "10%",className: "tr_align" },
              { "width": "20%",className: "tr_align" },
              { "width": "30%",className: "tr_align" }

            ]
    });
$("div.dataTables_filter").append(' <button class="btn btn-lg pull-right btn-flat btn-primary" data-toggle="modal" data-target="#nuevopaciente" type="button" name="button">Nuevo Paciente</button>');

$.uploadPreview({
   input_field: "#image-upload",   // Default: .image-upload
   preview_box: "#image-preview",  // Default: .image-preview
   label_field: "#image-label",    // Default: .image-label
   label_default: "<i class='fa fa-camera' aria-hidden='true'></i>",   // Default: Choose File
   label_selected: "Cambiar",  // Default: Change File
   no_label: false                 // Default: false
 });

 $( "#fechanac" ).datepicker({yearRange: "-100:+0",minDate: '-100y', maxDate: "+1M +10D"});

 $( "#fechanac" ).datepicker( "option", "changeYear", true );
 $( "#fechanac" ).datepicker( "option", "changeMonth", true );
  });

  $("#new_paciente_form").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("new_paciente_form"));
            formData.append("dato", "valor");
            $.ajax({
                url: "persons/crear",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	               processData: false
            })
                .done(function(res){
                    $("#mensaje").html("Respuesta: " + res);
                });
        });
