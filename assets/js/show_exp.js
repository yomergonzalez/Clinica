$(function () {

	var paciente_id='';

	$('#open_input').click(function(){ $('#file_input').trigger('click'); });

	$('#upload_file').on('change','#file_input' , function(){
	  $('#open_input').text('Cargando...').addClass('disabled')
	  var formData = new FormData(document.getElementById("upload_file"));
            $.ajax({
                url: base_url + "expedient/upload_file",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
	               processData: false,
                 beforeSend: function() {
                      },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  complete: function() {
                  	$('#open_input').text('Subir Archivo').removeClass('disabled')
                    }
                })
                .done(function(data){
                	if(data.archivo==true){

                		$('ul.files-list').append(create_archivo(data));

                	}
               
                });
	});


$('ul.files-list').on('click','.delete_file' , function(){
	var id= $(this).data('id');
	var li = $(this).parent().parent();

	    $.confirm({
    		text: "Borrar Archivo?",
    		confirm: function() {
        		$.ajax({
                url: base_url + "expedient/delete_file",
                type: "post",
                dataType: "json",
                data: 'id='+id,
                 beforeSend : function() {
                    },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  success: function(data) {
                  	li.remove();
                    }
                });
    		},
    		cancel: function() {
        // nothing to do
   			 }
			});	 
	});// end ul.files-list

	$('ul.files-list').on('click','.edit_file' , function(){
		var id= $(this).data('id');
		var li = $(this).parent().parent();
		var name = li.find('.product-title').text();
		var newname = name.split(".");
		li.find('.product-title').hide()
		li.find('.div_edit').removeClass('hidden');
		li.find('.input_edit_file').val(newname[0]);
	 });// end ul.files-list


	$("ul.files-list").on('keyup','.input_edit_file', function(e) {
		var input= $(this);
		var val = input.val();
		var id = input.parent().parent().data('id');
		var li = $(this).parent().parent();

	    if(e.keyCode == 13)
	    {
	        input.attr("disabled", "disabled");

	        $.ajax({
	                url: base_url + "expedient/rename_file",
	                type: "post",
	                dataType: "json",
	                data: "data="+ val + '&id='+ id,
	                 beforeSend : function() {
	                    },
	                  error : function(jqXHR, status, error) {
	                   input.removeAttr("disabled");
	                    },
	                  success: function(data) {
						li.find('.div_edit').addClass('hidden');
						li.find('.product-title').text(data.name).attr('href', base_url + data.url);
						li.find('.product-title').show()
	       				 input.removeAttr("disabled");

	                    }

	                });

	    }
	});



	$("div.box-body").on('keyup','.add_active_medicament', function(e) {
		var input= $(this);
		var val = input.val();

	    if(e.keyCode == 13)
	    {
	        input.attr("disabled", "disabled");

	        $.ajax({
	                url: base_url + "expedient/add_active_medic",
	                type: "post",
	                dataType: "json",
	                data: "data="+ val,
	                 beforeSend : function() {
	                    },
	                  error : function(jqXHR, status, error) {
	                    },
	                  success: function(data) {
	                  	 $('.add_active_medicament').focus().val('');
	       				 input.removeAttr("disabled");
	       				 $('.medicament-active-list').append(create_medicament(data));
	                    }

	                });

	    }
	}); // add  medic


	$('ul.medicament-active-list').on('click','.delete_medicament' , function(){
	var id= $(this).data('id');
	var li = $(this).parent();

	    $.confirm({
    		text: "Borrar Medicamento?",
    		confirm: function() {
        		$.ajax({
                url: base_url + "expedient/delete_active_medic",
                type: "post",
                dataType: "json",
                data: 'id='+id,
                 beforeSend : function() {
                    },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  success: function(data) {
	                  	if(data==true){
	                  		li.remove();
	                  }
                    }
                });
    		},
    		cancel: function() {
        // nothing to do
   			 }
			});	 
	});// end ul.files-list



	$("div.box-body").on('keyup','.add_alergy', function(e) {
		var input= $(this);
		var val = input.val();

	    if(e.keyCode == 13)
	    {
	        input.attr("disabled", "disabled");

	        $.ajax({
	                url: base_url + "expedient/add_alergy",
	                type: "post",
	                dataType: "json",
	                data: "data="+ val,
	                 beforeSend : function() {
	                    },
	                  error : function(jqXHR, status, error) {
	                    },
	                  success: function(data) {
	                  	 input.focus().val('');
	       				 input.removeAttr("disabled");
	       				 $('.alergy-list').append(create_alergy(data));
	                    }

	                });

	    }
	}); // add  alergy


	$('ul.alergy-list').on('click','.delete_alergy' , function(){
	var id= $(this).data('id');
	var li = $(this).parent();

	    $.confirm({
    		text: "Borrar Alergia?",
    		confirm: function() {
        		$.ajax({
                url: base_url + "expedient/delete_alergy",
                type: "post",
                dataType: "json",
                data: 'id='+id,
                 beforeSend : function() {
                    },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  success: function(data) {
	                  	if(data==true){
	                  		li.remove();
	                  }
                    }
                });
    		},
    		cancel: function() {
        // nothing to do
   			 }
			});	 
	});// end ul.alergy-list



$( ".antecedents_btn" ).click(function() {
	$(this).parent().find('.form').toggle();
	$(this).parent().find('.log').toggle();
});



	$('#antecedentes_div').on('click','input.checked_si' , function(){
		var li = $(this).parent().parent().parent();
		li.find('.info').show('slow');  
	});//

	$('#antecedentes_div').on('click','input.checked_no' , function(){
		var li = $(this).parent().parent().parent();
		li.find('.info').hide('slow');  
	});//


	$('#antecedentes_div').on('click','.all_no' , function(){
		var div = $(this).parent().parent();
		div.find('.checked_no').prop("checked", true);
		div.find('.info').hide();  
	});



  $("#patologicos-form").on("submit", function(e){
            e.preventDefault();
            var form = $(this);
             data = form.serialize();

             var arrayselect = [];
             var arraynegado = [];
             $.each(form.serializeArray(), function (i, field) {
                    if (field.value === '1') {
                    	var div = $('[name='+field.name+']').parent().parent()
                    	var name = div.find('.title').text()
                    	var info = div.parent().find('.info').val();
                      arrayselect.push({name: name, value: info});
                        }else if(field.value === '0'){
                          var div = $('[name='+field.name+']').parent().parent()
                          var name = div.find('.title').text()
                      	  arraynegado.push({name: name});
                        }

        });

            $.ajax({
                url: base_url + "expedient/save_patologicos",
                type: "post",
                dataType: "json",
                data: data,
	               processData: false,
                 beforeSend: function() {
                      },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  complete: function() {
                  	console.log(arrayselect);
                  	$('#patologicos-form').hide()
                  	$('.div_patologicos_log').html(create_list(arrayselect,arraynegado));
                  	$('.div_patologicos_log').show()
                  
                    }
                })
                .done(function(data){
                });
		});

   $("#no_patologicos-form").on("submit", function(e){
            e.preventDefault();
            var form = $(this);
             data = form.serialize();

             var arrayselect = [];
             var arraynegado = [];
             $.each(form.serializeArray(), function (i, field) {
                    if (field.value === '1') {
                    	var div = $('[name='+field.name+']').parent().parent()
                    	var name = div.find('.title').text()
                    	var info = div.parent().find('.info').val();
                      arrayselect.push({name: name, value: info});
                        }else if(field.value === '0'){
                          var div = $('[name='+field.name+']').parent().parent()
                          var name = div.find('.title').text()
                      	  arraynegado.push({name: name});
                        }

        });

            $.ajax({
                url: base_url + "expedient/save_no_patologicos",
                type: "post",
                dataType: "json",
                data: data,
	               processData: false,
                 beforeSend: function() {
                      },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  complete: function() {
                  	console.log(arrayselect);
                  	$('#no_patologicos-form').hide()
                  	$('.div_no_patologicos_log').html(create_list(arrayselect,arraynegado));
                  	$('.div_no_patologicos_log').show()
                  
                    }
                })
                .done(function(data){
                });
		});

   $("#heredofamiliares-form").on("submit", function(e){
            e.preventDefault();
            var form = $(this);
             data = form.serialize();

             var arrayselect = [];
             var arraynegado = [];
             $.each(form.serializeArray(), function (i, field) {
                    if (field.value === '1') {
                    	var div = $('[name='+field.name+']').parent().parent()
                    	var name = div.find('.title').text()
                    	var info = div.parent().find('.info').val();
                      arrayselect.push({name: name, value: info});
                        }else if(field.value === '0'){
                          var div = $('[name='+field.name+']').parent().parent()
                          var name = div.find('.title').text()
                      	  arraynegado.push({name: name});
                        }

        });

            $.ajax({
                url: base_url + "expedient/save_heredofamiliares",
                type: "post",
                dataType: "json",
                data: data,
	               processData: false,
                 beforeSend: function() {
                      },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  complete: function() {
                  	console.log(arrayselect);
                  	$('#heredofamiliares-form').hide()
                  	$('.div_heredofamiliares_log').html(create_list(arrayselect,arraynegado));
                  	$('.div_heredofamiliares_log').show()
                  
                    }
                })
                .done(function(data){
                });
		});

   $("#gineco-form").on("submit", function(e){
            e.preventDefault();
            var form = $(this);
             data = form.serialize();

             var arrayselect = [];
             var arraynegado = [];
             $.each(form.serializeArray(), function (i, field) {
                    if (field.value === '1') {
                    	var div = $('[name='+field.name+']').parent().parent()
                    	var name = div.find('.title').text()
                    	var info = div.parent().find('.info').val();
                      arrayselect.push({name: name, value: info});
                        }else if(field.value === '0'){
                          var div = $('[name='+field.name+']').parent().parent()
                          var name = div.find('.title').text()
                      	  arraynegado.push({name: name});
                        }

        });

            $.ajax({
                url: base_url + "expedient/save_gineco",
                type: "post",
                dataType: "json",
                data: data,
	               processData: false,
                 beforeSend: function() {
                      },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  complete: function() {
                  	console.log(arrayselect);
                  	$('#gineco-form').hide()
                  	$('.div_gineco_log').html(create_list(arrayselect,arraynegado));
                  	$('.div_gineco_log').show()
                  
                    }
                })
                .done(function(data){
                });
		});


   $(".btn_add_consult").on("click", function(e){
    paciente_id = $(this).data('id');  
    $('#nueva_consulta').modal('show');
  });


 $("#motivo_consult").on("submit", function(e){
      e.preventDefault();
      input = $(this).find('.motivo_input').val();
      boton= $('#submit_motivo');

        $.ajax({
                url: base_url + "consultation/create_consultation",
                type: "post",
                dataType: "json",
                data: 'paciente_id='+paciente_id + '&motivo='+input,
                 beforeSend : function() {
                  boton.addClass('disabled');

                    },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  success: function(data) {
                    boton.removeClass('disabled');
                    if(data){
                     $(location).attr('href', base_url +'consultation/new_c/'+data)
                    }
                    }
                });
});



});//end on ready

function create_archivo(data){
	var html=''

 	html +='	<li data-id="'+data.id+'" class="item">'
 	html +='	<div class="col-md-7 div_edit hidden"><input class="input_edit_file form-control input-sm"></div>'
    html +='      <a href="'+base_url + data.url+'" target="_blank" class="product-title">'+data.name+'</a>'
    html +='    <div class="pull-right">'
    html +='      <a data-id="'+data.id+'" class="edit_file"> <i class="fa fa-edit"></i></a>'
    html +='      <a data-id="'+data.id+'" class="delete_file"> <i class="fa fa-trash-o"></i></a>'
    html +='    </div>     '   
    html +=' <div><small> '+data.date+'</small></div>'      
	html +='</li>'
	return html;
}


function create_medicament(data){
	var html=''
     html+= '<li class="list-group-item">'
     html+= '    <a href="" class="product-title">'+data.name+' </a>'
     html+= '       <a data-id="'+data.id+'" class="delete_medicament pull-right"><i class="fa fa-trash-o"></i> </a>'
     html+= ' </li>'
    return html;
 }

 function create_alergy(data){
	var html=''
     html+= '<li class="list-group-item">'
     html+= '    <a href="" class="product-title">'+data.name+' </a>'
     html+= '       <a data-id="'+data.id+'" class="delete_alergy pull-right"><i class="fa fa-trash-o"></i> </a>'
     html+= ' </li>'
    return html;
 }


 function create_list(select,negado){
	var html=''
     html+= '<ul class="list-group list-group-unbordered">'
    if (negado.length != 0) {
     html+= ' <li class="list-group-item">'
     html+='<div class="row">'
     html+= '<div class="col-md-3"><span class="label label-danger"> <i class="fa fa-times" aria-hidden="true"></i></span> Negados </div>'
     html+='<div class="col-md-9">'
          $.each(negado, function (i, field) {
          	html+= field.name + ' / '

        });
     html+='</div>'
     html+='</div>'
     html+= ' </li>'
 	}
 	if (select.length != 0) {
     $.each(select, function (i, field) {
     	 html+= ' <li class="list-group-item">'
     	 html+='<div class="row">'
	     html+= '<div class="col-md-5"><span class="label label-success"> <i class="fa fa-check" aria-hidden="true"></i></span> '+field.name+' </div>'
	     html+='<div class="col-md-7">' + field.value+' </div>'
	     html+='</div>'
     	html+= ' </li>'
        });
 	}
 	html+='</ul>'
    return html;
 }