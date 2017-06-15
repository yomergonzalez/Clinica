<div class="container col-md-12" style="background: #fff; position: fixed; z-index: 3;box-shadow: 0px 1px 10px 0px;">
  <div class="col-md-7">
        <div class="pull-left image">
          <img src="http://lorempixel.com/200/200/" class="img-circle" style="margin: 4px;"  width="70px" alt="User Image">
        </div>
     <div class="pull-left info">
        <h4><?php echo $details->name. ' '.$details->last_name; ?> 
        <a data-toggle="tooltip" data-id="<?php echo $details->paciente_id;?>" title="Editar" class="button_edit btn btn-social-icon btn-file"><i class="fa fa-pencil-square-o"></i></a>
        <a data-toggle="tooltip" data-id="<?php echo $details->paciente_id;?>" title="Perfil"  class="button_edit btn btn-social-icon btn-file"><i class="fa fa-user"></i></a>
<?php echo $edad;?> 
<?php echo $details->birth_date;?>
        </h4>

        <ul id="menu" class="nav nav-pills">
          <li role="presentation" data-toggle="modal" data-target="#history" class="active"><a href="#">Historial</a></li>
          <li data-menuanchor="notas" role="presentation"><a href="#notas">Notas de Padecimiento</a></li>
          <li data-menuanchor="examen" role="presentation"><a href="#examen">Examen Fisico</a></li>
          <li data-menuanchor="diagnostico" role="presentation"><a href="#diagnostico">Diagnostico y Tratamiento</a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-4">

<p>Motivo: <?php echo $details->motivo;?></p>
             <a class="btn btn-app btn-info">
                <i class="fa fa-paperclip"></i> Adjuntar
              </a> 
             <a class="btn save_consultation btn-app btn-info">
                <i class="fa fa-save"></i> Guardar
              </a>       
    </div>
</div>
<div class="row bg-gray" style="margin-top: 100px;">
<div id="fullpage" class="container">


<div class="section " id="section0">
<p class=" page-header"> Notas de padecimiento </p>

<form id="form_consult">
<div class="col-md-5">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-warning"></i>

              <h3 class="box-title">Signos vitales</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
               <ul class="list-group ">
                <li class="list-group-item">
                  <b>Altura</b>
                  <div class="pull-right col-md-4">
                   <input type="text" name="altura" class="form-control "></div>
                </li>
                <li class="list-group-item">
                  <b>Peso</b> <div class="pull-right col-md-4">
                   <input type="text" name="peso" class="form-control "></div>
                </li>
                <li class="list-group-item">
                  <b>Masa Corporal</b> <div class="pull-right col-md-4">
                   <input type="text" name="masa_c" class="form-control"></div>
                </li>
                <li class="list-group-item">
                  <b>Temperatura</b> <div class="pull-right col-md-4">
                   <input type="text" name="temp" class="form-control "></div>
                </li>
                <li class="list-group-item">
                  <b>Frecuencia Respiratoria</b><div class="pull-right col-md-4">
                   <input type="text" name="frecuencia_r" class="form-control "></div>
                </li>
                <li class="list-group-item">
                  <b>Tension Arterial</b> <div class="pull-right col-md-4">
                   <input type="text" name="tension_a" class="form-control "></div>
                </li>
                <li class="list-group-item">
                  <b>Frecuencia Cardiaca</b> <div class="pull-right col-md-4">
                   <input type="text" name="frecuencia_c" class="form-control "></div>
                </li>                
              </ul>
              
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-7">
          <div class="box box-primary">
            <div class="box-header with-border">

              <h3 class="box-title">Razon de la visita</h3>
              <div class="pull-right box-tools"> <button type="button" class="btn btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
               <textarea rows="3" name="razon" class="form-control"> <?php echo $details->razon;?> </textarea>
                
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


           <div class="col-md-7">
          <div class="box box-primary">
            <div class="box-header with-border">

              <h3 class="box-title">Sintomas Subjetivos</h3>
              <div class="pull-right box-tools"> <button type="button" class="btn btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
               <textarea rows="3" name="sintomas_sub" class="form-control"><?php echo $details->sintomas_sub;?> </textarea>
              
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

           <div class="col-md-7">
          <div class="box box-primary">
            <div class="box-header with-border">

              <h3 class="box-title">Exploracion Fisica</h3>
              <div class="pull-right box-tools"> <button type="button" class="btn btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
               <textarea rows="3" name="exploracion_fisic" class="form-control"><?php echo $details->exploracion_fisic;?> </textarea>
              
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        </form>

</div>

<div class="section " id="section1">
        <p  class=" page-header"> Examen Fisico </p>


<div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <?php 
                    $datos= array();
                    if($examenes_fisicos){
                      foreach ($examenes_fisicos as $key => $valor){ 
                        $datos[] = $valor['tipo_examen_id'];
                       } 
                       } ?>


            <?php foreach ($fisic_test as $key => $value){ ?>

                <div class="col-md-4">
                  <input class="check" value="<?php echo $value['id']; ?>" type="checkbox" <?php echo (in_array($value['id'], $datos, true))? 'checked' : ''; ?>>
                <label><?php echo $value['name'] ?></label>   
                </div>
            <?php } ?>
              
            
                                          
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    <?php if($examenes_fisicos){ ?>
      <?php foreach ($examenes_fisicos as $key => $valor){ ?>
        <div data-check="<?php echo $valor['tipo_examen_id']; ?>" class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $valor['name']; ?></h3>
          <div class="box-tools pull-right"><small class="text-small"> </small> </div>
          </div>
          <div class="box-body">
            <textarea data-id="<?php echo $valor['id']; ?>" rows="3" class="data-store form-control"> <?php echo $valor['desc']; ?></textarea>
          </div>
        </div>
        </div>
        <?php } ?>

<?php }?>
        </div>
<div class="section " id="section2">
<p class="page-header"> Diagnostico y Tratamiento </p>


  <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-warning"></i>

              <h3 class="box-title">Diagnosticos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                <input id="diag" type="text" class="form-control" name="diag" placeholder="CIE10 nombre o codigo" aria-describedby="diag">
              </div>
              <ul class="todo-list diag-list">

      <?php if($diagnostic){ ?>
      <?php foreach ($diagnostic as $key => $valor){ ?>     
                <li data-id="<?php echo $valor['id']; ?>"><span class="handle">
                 <i class="fa fa-bars" aria-hidden="true"></i>
                 </span>
                 <span class="text"><?php echo $valor['name']; ?></span> 
                 <div class="tools"> 
                 <i class="add_desc_diag fa fa-edit"></i> <i class="delete_diag fa fa-trash-o"></i>
                  </div>
                  <?php if(isset($valor['desc'])){?>
                  <textarea data-id="<?php echo $valor['id']; ?>" rows="2" class="diag-diag form-control"> <?php echo $valor['desc']; ?></textarea>
                  <?php } ?>
                  </li>
              <?php }?>
        <?php }?>
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-warning"></i>

              <h3 class="box-title">Estudios de Gabinete</h3>
              <div class="pull-right box-tools"> <button type="button" class="btn btn-sm"><i class="fa fa-print" aria-hidden="true"></i> Imprimir
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
                <input id="stud" type="text" class="form-control" name="stud" placeholder="Nombre de estudio" aria-describedby="diag">
              </div>
              <ul class="todo-list stud-list">

      <?php if($estudios){ ?>
      <?php foreach ($estudios as $key => $valor){ ?>   
               <li data-id="<?php echo $valor['id']; ?>">
               <span class="handle"> 
               <i class="fa fa-bars" aria-hidden="true"></i>
               </span>
               <span class="text"><?php echo $valor['name']; ?></span>
                <div class="tools"> 
                <i class="add_desc_stud fa fa-edit"></i> <i class="delete_stud fa fa-trash-o"></i> 
                </div>
              <?php if(isset($valor['desc'])){?>
                <textarea data-id="<?php echo $valor['id']; ?>" rows="2" class="stud-stud form-control"> <?php echo $valor['desc']; ?></textarea>
              <?php }?>
                </li> 

          <?php }?>
        <?php }?>

              </ul>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


        <div class="col-md-12">
          <div class="box_medicaments box box-primary">
            <div class="box-header with-border">

              <h3 class="box-title">Medicamentos</h3>
              <div class="pull-right box-tools"><small class="text-small"> </small> <button type="button" class="btn btn-sm"><i class="fa fa-print" aria-hidden="true"></i> Imprimir
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="input-group col-md-5">
               <input name="medicamento" placeholder="Nombre del Medicamento" id="medicament" class="add_medicamento form-control">
                </div>

              <ul class="todo-list medic-list">

      <?php if($medicamentos){ ?>
      <?php foreach ($medicamentos as $key => $valor){ ?>   
                <li class="col-md-12" data-id="<?php echo $valor['id']; ?>">
                <div class="col-md-4">
                <span class="handle"> 
                <i class="fa fa-bars" aria-hidden="true"></i></span>
                <span class="text"><?php echo $valor['medicamento']; ?></span></div><div class="col-md-7">
                <div class="form-group">
                <label class="col-md-2" for="">DOSIS: </label>
                <div class="col-md-10">
                <input type="text" data-id="<?php echo $valor['id']; ?>" class="medicament_dosis form-control" placeholder="Instrucciones" value="<?php echo $valor['dosis']; ?>" disabled="disabled">
                </div>
                </div>
                </div> 
                <div class="tools col-md-1">
                 <i class="add_desc_medic fa fa-edit"></i> 
                 <i class="delete_medic fa fa-trash-o"></i>
                 </div>
                </li> 

          <?php }?>
        <?php }?>


              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

           <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">

              <h3 class="box-title">Instrucciones Medicas</h3>
              <div class="pull-right box-tools"> <small class="text-small"></small>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
               <textarea rows="3" <?php echo ($instrucciones)? 'data-id="'.$instrucciones->id.'"' : '';?>  class="medic_instructions form-control"><?php echo ($instrucciones)? $instrucciones->desc : '';?>  </textarea>
              
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>


</div>

</div>


<div id="history" data-id="<?php echo $details->paciente_id?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Expediente</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>