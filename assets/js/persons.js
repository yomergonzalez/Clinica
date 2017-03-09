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
  


  });// load close

  $("#new_paciente_form").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("new_paciente_form"));
            $.ajax({
                url: "persons/crear",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
	               processData: false
            })
                .done(function(data){
                    if(data.success==true && data.image==true){
                      alert('registrado')
                      document.getElementById("new_paciente_form").reset();
                      $('#image-preview').css("background-image", "none");
                      $('#image-label').html("<i class='fa fa-camera' aria-hidden='true'></i>");
                      reset_datatable();
                    }
                    else if(data.success==true && data.image==false){
                      alert('registrado')
                      document.getElementById("new_paciente_form").reset();
                      reset_datatable();
                    }
                    else if(data.success==true && data.image=='ERROR'){
                      alert('registrado, problemas al subir la imagen')
                      document.getElementById("new_paciente_form").reset();
                      $('#image-preview').css("background-image", "none");
                      $('#image-label').html("<i class='fa fa-camera' aria-hidden='true'></i>");

                    }
                    else{
                      alert('No se pudo registrar')
                    }
                });
        });

function reset_datatable(){

var table =   $("#table_pacientes").DataTable({
      ajax: 'persons/persons_list',
      "sDom": '<"H" <"toolbar"fr>>tp',
      "destroy": true,
      DT_RowId: 'id',
      "columns": [
              {  data: 'photo', "width": "10%",className: "tr_align" },
              {  data: 'name',"width": "10%",className: "tr_align" },
              {  data: 'birth_date',"width": "20%",className: "tr_align" },
              {  data: 'sexo',"width": "10%",className: "tr_align" },
              { "width": "20%",className: "tr_align" },
              { "width": "30%",className: "tr_align" }

            ]
    });


}

