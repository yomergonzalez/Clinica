$('#fullpage').fullpage({
    anchors: ['notas', 'examen', 'diagnostico'],
    menu: '#menu',
    recordHistory: false,
    autoScrolling: false,
    fitToSection:false,
    scrollOverflow: true,
});

$(document).ready(function(){

  $('input').each(function(){
    var self = $(this),
      label = self.next(),
      label_text = label.text();

    label.remove();
    self.iCheck({
      checkboxClass: 'icheckbox_line-blue',
      radioClass: 'iradio_line',
      insert: '<div class="icheck_line-icon"></div>' + label_text
    });
  });


  $('input').on('ifChecked', function(event){
  	 var name = $(this).parent().text();
  	 var valor = $(this).val();

  	      $.ajax({
                url: base_url + "consultation/add_test",
                type: "post",
                dataType: "json",
                data: "id="+ valor,
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  success: function(data) {
                    $('#section1 .fp-tableCell').append(create_form(data,name,valor));
                    }
                })
});

  $('input').on('ifUnchecked', function(event){
  	 var valor = $(this).val();

  	      $.ajax({
                url: base_url + "consultation/delete_test",
                type: "post",
                dataType: "json",
                data: "id="+ valor,
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  success: function(data) {
                    $('#section1 .fp-tableCell').find("div[data-check='" +valor+"']").fadeOut();
                    }
                })
	});


	  var timer;

	$("#section1").on('keyup','.data-store', function() {
		var valor = $(this).val();
	   	var id = $(this).data('id');
	   	var text = $(this).parent().parent().find('.text-small');
	    var self = this;
    	if (self.timer)
        	clearTimeout(self.timer);

    	self.timer = setTimeout(function ()
    	{
        self.timer = null;
         $.ajax({
                url: base_url + "consultation/edit_test",
                type: "post",
                dataType: "json",
                data: "data="+ valor +'&id='+id,
                 beforeSend : function() {
                      text.text('Guardando..');
                    },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  success: function(data) {
                      text.text('Guardado.');
                    }
                });
    	}, 2000);
	});



$('#diag').autocomplete({
    serviceUrl: base_url + 'consultation/search_diag',
    dataType: 'json',
    minChars: 3,
    onSelect: function (suggestion) {
              $.ajax({
                url: base_url + "consultation/add_diag",
                type: "post",
                dataType: "json",
                data: 'id='+suggestion.data,
                 beforeSend : function() {
                    },
                  error : function(jqXHR, status, error) {
                    },
                  success: function(data) {
                  	$('ul.diag-list').append(create_diag(data,suggestion.value));
                  	 $('#diag').val('');

                    }
                });
    }
});



	$("ul.diag-list").on('click','.add_desc_diag', function() {
	   	var id = $(this).parent().parent().data('id');
	    var li = $(this).parent().parent();
	    html=''
	    html+='<textarea  data-id="'+ id +'" rows="2" class="diag-diag form-control"> </textarea>'              
	    li.append(html);

	});


	$("ul.diag-list").on('keyup','.diag-diag', function() {
		var valor = $(this).val();
	   	var id = $(this).data('id');
	    var self = this;
    	if (self.timer)
        	clearTimeout(self.timer);

    	self.timer = setTimeout(function ()
    	{
        self.timer = null;
         $.ajax({
                url: base_url + "consultation/edit_diag",
                type: "post",
                dataType: "json",
                data: "data="+ valor +'&id='+id,
                 beforeSend : function() {
                    },
                  error : function(jqXHR, status, error) {
                    },
                  success: function(data) {
                    }
                });
    	}, 2000);
	});


		$("ul.diag-list").on('click','.delete_diag', function() {
	   	var id = $(this).parent().parent().data('id');
	    var li = $(this).parent().parent();

	    $.confirm({
    		text: "Borrar diagnostico?",
    		confirm: function() {
        		 $.ajax({
                url: base_url + "consultation/delete_diag",
                type: "post",
                dataType: "json",
                data: 'id='+id,
                 beforeSend : function() {
                    },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  success: function(data) {
                  	li.fadeOut();
                    }
                });
    		},
    		cancel: function() {
        // nothing to do
   			 }
			});

	});



$('#stud').autocomplete({
    serviceUrl: base_url + 'consultation/search_stud',
    dataType: 'json',
    minChars: 3,
    onSelect: function (suggestion) {
              $.ajax({
                url: base_url + "consultation/add_stud",
                type: "post",
                dataType: "json",
                data: 'id='+suggestion.data,
                 beforeSend : function() {
                    },
                  error : function(jqXHR, status, error) {
                    },
                  success: function(data) {
                  	$('ul.stud-list').append(create_stud(data,suggestion.value));
                  	 $('#stud').val('');

                    }
                });
    }
});



	$("ul.stud-list").on('click','.add_desc_stud', function() {
	   	var id = $(this).parent().parent().data('id');
	    var li = $(this).parent().parent();
	    html=''
	    html+='<textarea  data-id="'+ id +'" rows="2" class="stud-stud form-control"> </textarea>'              
	    li.append(html);

	});


	$("ul.stud-list").on('keyup','.stud-stud', function() {
		var valor = $(this).val();
	   	var id = $(this).data('id');
	    var self = this;
    	if (self.timer)
        	clearTimeout(self.timer);

    	self.timer = setTimeout(function ()
    	{
        self.timer = null;
         $.ajax({
                url: base_url + "consultation/edit_stud",
                type: "post",
                dataType: "json",
                data: "data="+ valor +'&id='+id,
                 beforeSend : function() {
                    },
                  error : function(jqXHR, status, error) {
                    },
                  success: function(data) {
                    }
                });
    	}, 2000);
	});


	$("ul.stud-list").on('click','.delete_stud', function() {
	   	var id = $(this).parent().parent().data('id');
	    var li = $(this).parent().parent();

	    $.confirm({
    		text: "Borrar estudio?",
    		confirm: function() {
        		 $.ajax({
                url: base_url + "consultation/delete_stud",
                type: "post",
                dataType: "json",
                data: 'id='+id,
                 beforeSend : function() {
                    },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  success: function(data) {
                  	li.fadeOut();
                    }
                });
    		},
    		cancel: function() {
        // nothing to do
   			 }
			});

	});


$("ul.medic-list").on('keyup','.medicament_dosis', function(e) {
	var input= $(this);
	var val = input.val();
	var id = input.data('id');
	var text = $('.box_medicaments').find('.text-small');

    if(e.keyCode == 13)
    {
        input.attr("disabled", "disabled");

        $.ajax({
                url: base_url + "consultation/edit_medic",
                type: "post",
                dataType: "json",
                data: "data="+ val + '&id='+ id,
                 beforeSend : function() {
                 	text.text('Guardando..')
                    },
                  error : function(jqXHR, status, error) {
                    },
                  success: function(data) {
                  	  $('.add_medicamento').focus()
                  	  text.text('Guardado.');

                    }

                });

    }
});


$('.add_medicamento').keyup(function(e){
	var textarea= $(this);
	var val = textarea.val();
    if(e.keyCode == 13)
    {
        textarea.attr("disabled", "disabled");

        $.ajax({
                url: base_url + "consultation/add_medic",
                type: "post",
                dataType: "json",
                data: "data="+ textarea.val(),
                 beforeSend : function() {
                    },
                  error : function(jqXHR, status, error) {
                    },
                  success: function(data) {
                  	  textarea.removeAttr( "disabled" )
                  	  $('ul.medic-list').append(create_medic(val,data))
                  	  $('ul.medic-list li').last().find('.medicament_dosis').focus()

                    }

                });

    }
});


	$("ul.medic-list").on('click','.delete_medic', function() {
	   	var id = $(this).parent().parent().data('id');
	    var li = $(this).parent().parent();

	    $.confirm({
    		text: "Borrar medicamento?",
    		confirm: function() {
        		 $.ajax({
                url: base_url + "consultation/delete_medic",
                type: "post",
                dataType: "json",
                data: 'id='+id,
                 beforeSend : function() {
                    },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  success: function(data) {
                  	li.fadeOut();
                    }
                });
    		},
    		cancel: function() {
        // nothing to do
   			 }
			});

	});

$("ul.medic-list").on('click','.add_desc_medic', function() {
	    var input = $(this).parent().parent().find('.medicament_dosis');
	    input.removeAttr( "disabled" )
	    input.focus()

	});


	$("#section2").on('keyup','.medic_instructions', function() {
		var valor = $(this).val();
	   	var id = $(this).data('id');
	   	var textarea= $(this);
	   	var text = $(this).parent().parent().find('.text-small');

		datos = 'data='+valor;
		if(id){
			datos+= '&id='+id;
		}

	    var self = this;
    	if (self.timer)
        	clearTimeout(self.timer);

    	self.timer = setTimeout(function ()
    	{
        self.timer = null;
         $.ajax({
                url: base_url + "consultation/add_instruction",
                type: "post",
                dataType: "json",
                data: datos,
                 beforeSend : function() {
                 	text.text('Guardando...')
                    },
                  error : function(jqXHR, status, error) {
                    },
                  success: function(data) {
	                  	if(!id){
						  textarea.attr("data-id", data);
						}
						text.text('Guardado.')
                    }
                });
    	}, 2000);
	});


$(".save_consultation").on('click', function() {
	   	var boton = $(this);
	   	boton.addClass('disabled');
	   	var form = $('#form_consult').serialize();

       $.ajax({
                url: base_url + "consultation/save_consultation",
                type: "post",
                dataType: "json",
                data: form,
                 beforeSend : function() {
                    },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  success: function(data) {
                  	 boton.removeClass('disabled');
                  	 $(location).attr('href', base_url + 'agenda/')

                    }
              });
    		
	});


	$('#history').on('show.bs.modal', function (e) {
		var id = $(this).data('id');
		var body = $(this).find('.modal-body');
	  $.ajax({
                url: base_url + "expedient/history/" + id,
                type: "post",
                dataType: "html",
                 beforeSend : function() {
                 	body.html('<div class="text-center"><h1><i class="fa fa-refresh fa-spin"></i> </h1></div>')
                    },
                  error : function(jqXHR, status, error) {
                      toastr.warning('Ocurrió un problema, intente nuevamente', 'Error');
                    },
                  success: function(data) {
                  	body.html(data);
                    }
              });
	}) // end history




});


function create_form(data,name,value){
	html= '';
	html+=' <div data-check="'+ value +'" class="col-md-6">'
    html+='<div class="box box-primary">'
    html+='<div class="box-header with-border">'
    html+='<h3 class="box-title">' + name +'</h3>'
    html+='<div class="box-tools pull-right"><small class="text-small"> </small> </div>'
    html+='</div>'
    html+='<div class="box-body">'
    html+='<textarea  data-id="'+ data +'" rows="3" class="data-store form-control"> </textarea>'              
    html+='</div>'
    html+='</div>'
    html+='</div>'

    return html;
}


function create_diag(id,name){
	html='';
   	 html+='<li data-id="'+id+'">'
     html+='<span class="handle">'
     html+=' <i class="fa fa-bars" aria-hidden="true"></i>'
     html+='</span>'
         
     html+='<span class="text">'+name+'</span>'
   	 html+=' <div class="tools">'
     html+=' <i class="add_desc_diag fa fa-edit"></i>'
     html+=' <i class="delete_diag fa fa-trash-o"></i>'
     html+=' </div>'
     html+='</li>'
     return html;
                
}


function create_stud(id,name){
	html='';
   	 html+='<li data-id="'+id+'">'
     html+='<span class="handle">'
     html+=' <i class="fa fa-bars" aria-hidden="true"></i>'
     html+='</span>'
         
     html+='<span class="text">'+name+'</span>'
   	 html+=' <div class="tools">'
     html+=' <i class="add_desc_stud fa fa-edit"></i>'
     html+=' <i class="delete_stud fa fa-trash-o"></i>'
     html+=' </div>'
     html+='</li>'
     return html;
                
}


function create_medic(name,id=1){
	html='';
   	 html+='<li class="col-md-12" data-id="'+id+'">'
   	 html+= '<div class="col-md-4">'
     html+='<span class="handle">'
     html+=' <i class="fa fa-bars" aria-hidden="true"></i>'
     html+='</span>'
         
     html+='<span class="text">'+name+'</span>'
     html +='</div>'
     html+= '<div class="col-md-7">'
     html+='<div class="form-group">'
     html+='<label class="col-md-2" for="">DOSIS: </label>'
     html+='<div class="col-md-10">'
     html+='<input type="text" data-id='+id+' class="medicament_dosis form-control" placeholder="Jane Doe">'
  	 html+='</div>'
  	 html+='</div>'
     html+='</div>'
   	 html+=' <div class="tools col-md-1">'
     html+=' <i class="add_desc_medic fa fa-edit"></i>'
     html+=' <i class="delete_medic fa fa-trash-o"></i>'
     html+=' </div>'
     html+='</li>'
     return html;
                
}