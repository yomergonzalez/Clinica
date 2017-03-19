<div class="content bg-gray">

<section class="">

    </section>


<div class="row">


    <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <div class="widget-user-image">
                <img class="img-circle" src="http://lorempixel.com/200/200/" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php echo $paciente->name.' '.$paciente->last_name;?></h3>
              <h5 class="widget-user-desc"><?php echo $edad;?> <?php echo $paciente->birth_date;?></h5>
            </div>
          </div>
            <div class="box-body box-profile">

              <h4 class="text-muted text-center"><b> Ultimos signos vitales</b></h4>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Altura</b> <a class="pull-right"><?php echo (isset($signos_vit->altura))? $signos_vit->altura : '' ;?>  </a>
                </li>
                <li class="list-group-item">
                  <b>Peso</b> <a class="pull-right"><?php echo (isset($signos_vit->peso))? $signos_vit->peso : '' ;?></a>
                </li>
                <li class="list-group-item">
                  <b>Masa Corporal</b> <a class="pull-right"><?php echo (isset($signos_vit->masa_corporal))? $signos_vit->masa_corporal : '' ;?></a>
                </li>
                <li class="list-group-item">
                  <b>Temperatura</b> <a class="pull-right"><?php echo (isset($signos_vit->temperatura))? $signos_vit->temperatura : '' ;?></a>
                </li>
                <li class="list-group-item">
                  <b>Frecuencia Respiratoria</b> <a class="pull-right"><?php echo (isset($signos_vit->frecuencia_resp))? $signos_vit->frecuencia_resp : '' ;?></a>
                </li>
                <li class="list-group-item">
                  <b>Presion Arterial</b> <a class="pull-right"><?php echo (isset($signos_vit->presion_art))? $signos_vit->presion_art : '' ;?></a>
                </li>
                <li class="list-group-item">
                  <b>Frecuencia Cardiaca</b> <a class="pull-right"><?php echo (isset($signos_vit->frecuencia_card))? $signos_vit->frecuencia_card : '' ;?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Archivos</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="files-list products-list product-list-in-box">
                <!-- /.item -->
                <?php if($archivos_list){
                  foreach ($archivos_list as $key => $value) { ?>
                   <li data-id="<?php echo $value['id'];?>" class="item">
                    <div class="col-md-7 div_edit hidden">
                      <input class="input_edit_file form-control input-sm">
                    </div>     
                     <a href="<?php echo base_url(). $value['url'];?>" target="_blank" class="product-title"><?php echo $value['name'];?></a>    
                     <div class="pull-right">  
                         <a data-id="<?php echo $value['id'];?>" class="edit_file"> <i class="fa fa-edit"></i></a>  
                        <a data-id="<?php echo $value['id'];?>" class="delete_file"> <i class="fa fa-trash-o"></i></a>   
                     </div>      
                     <div><small> 2017-03-19 16:17:34</small></div>

                     </li>                <!-- /.item -->
                 <?php  }
                }?>
              </ul>
  
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <form id="upload_file">
               <input type="file" class="hidden" name="archivo" id="file_input" />
              <button type="button" id="open_input" class="btn btn-primary btn-sm btn-block bg-aqua-active btn-block">Subir Archivo</button>
              </form>
            </div>
            <!-- /.box-footer -->
          </div>

          <!-- /.box -->
        </div>

        <div class="col-md-5">
          
            <div  id="antecedentes_div" class="box box-primary">
              <div class="box-header with-border">
                <h3 class=" box-title">Antecedentes</h3>

              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <ul class="products-list product-list-in-box">
                  <!-- /.item -->
                  <li class="item">
                      <a class="antecedents_btn product-title">                      <button type="button" id="btn_alergy" class="btn bg-teal-gradient btn-outline"><i class="fa fa-plus"></i></button> Alergias
                    </a>
                    <div class="form" style="display: none">
                    <div class="panel panel-info">
                      <div class="panel-heading"></div>
                      <div class="panel-body">
                        <div class="checkbox pull-right">
                          <label>
                            <input type="checkbox"> No posee Alergias conocidas
                          </label>
                        </div>
                        <div class="form-group col-md-12">
                        <label>Agregar Alergia</label>
                        <input type="text" class="form-control add_alergy" name="alergy" placeholder="Nombre de la alergia">
                        </div>

                      </div>
                        <ul class="list-group alergy-list">
                        
                       <?php if($alergias_list){
                        foreach ($alergias_list as $key => $value) {?>

                        <li class="list-group-item">    
                        <a  class="product-title"><?php echo $value['alergia'];?> </a>       
                        <a data-id="<?php echo $value['id'];?>" class="delete_alergy pull-right"><i class="fa fa-trash-o"></i> </a> 
                        </li>
                       <?php }
                       } ?>

                        </ul>
                    </div>
                      
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">

                      <a  class="antecedents_btn product-title"> <button type="button" class="btn bg-teal-gradient"><i class="fa fa-plus"></i></button> ANTECEDENTES PATOLÓGICOS
                    </a> 
                    <div class="div_patologicos_log log">
                  <?php if($patologicos_list){ ?>

                      <ul class="list-group list-group-unbordered">
                      <?php if(count($patologicos_list['negativos'])>0){?>
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-md-3">
                              <span class="label label-danger"> <i class="fa fa-times" aria-hidden="true"></i></span> Negados
                            </div>
                            <div class="col-md-9"><?php foreach ($patologicos_list['negativos'] as $key => $value) {
                              echo $value['name'].' / ';
                            } ?>
                            </div>
                          </div> 
                        </li> 
                        <?php } ?>

                       <?php if(count($patologicos_list['positivos'])>0){?>
                       <?php foreach ($patologicos_list['positivos'] as $key => $value) {?>

                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-md-5">
                              <span class="label label-success"> <i class="fa fa-check" aria-hidden="true"></i></span> <?php echo $value['name'] ;?>
                            </div>
                            <div class="col-md-7"> <?php echo $value['desc'] ;?> </div>
                          </div> 
                          </li>
                          <?php }?>
                      <?php }?>
                      </ul>
                   <?php } ?>
                      


                    </div> 
                    <form id="patologicos-form" class="form" style="display: none">
                    <div class="panel panel-info">
                      <div id="div_patologicos" class="panel-body">
                      <div class="row">
                      <a class="all_no pull-right"> Todos No </a> 
                      </div>
                       <ul class="list-group list-group-unbordered">
                      <?php foreach ($patologicos as $key => $value) { ?>
                         <li class="list-group-item">
                          <div class="padre">
                          <label class="title"><?php echo $value['name'];?></label>
                          <div class="pull-right">
                            <input class="checked_si"   type="radio" value="1" name="<?php echo $value['id'];?>"><label>SI</label> 
                            <input  class="checked_no" type="radio" value="0" name="<?php echo $value['id'];?>" checked> <label> No</label>
                          </div>
                          </div>
                          <div class="">
                            <textarea name="info_<?php echo $value['id'];?>" style="display:none;" class="info form-control"> </textarea>
                          </div>
                      <?php } ?>
                          <div class="text-center">
                               <button type="submit" class="btn save_all"> Guardar Cambios </button>

                          </div>
                         </li>
                      
                       </ul>
                      </form>


                    </li>



                  <!-- /.item -->
                  <li class="item">
                      <a  class="antecedents_btn product-title">                      <button type="button" class="btn bg-teal-gradient"><i class="fa fa-plus"></i></button> ANTECEDENTES NO PATOLÓGICOS
                    </a>
                    <div class="div_no_patologicos_log log">
                      

                  <?php if($no_patologicos_list){ ?>

                      <ul class="list-group list-group-unbordered">
                      <?php if(count($no_patologicos_list['negativos'])>0){?>
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-md-3">
                              <span class="label label-danger"> <i class="fa fa-times" aria-hidden="true"></i></span> Negados
                            </div>
                            <div class="col-md-9"><?php foreach ($no_patologicos_list['negativos'] as $key => $value) {
                              echo $value['name'].' / ';
                            } ?>
                            </div>
                          </div> 
                        </li> 
                        <?php } ?>

                       <?php if(count($no_patologicos_list['positivos'])>0){?>
                       <?php foreach ($no_patologicos_list['positivos'] as $key => $value) {?>

                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-md-5">
                              <span class="label label-success"> <i class="fa fa-check" aria-hidden="true"></i></span> <?php echo $value['name'] ;?>
                            </div>
                            <div class="col-md-7"> <?php echo $value['desc'] ;?> </div>
                          </div> 
                          </li>
                          <?php }?>
                      <?php }?>
                      </ul>
                   <?php } ?>



                    </div> 
                    <form id="no_patologicos-form" class="form" style="display: none">
                    <div class="panel panel-info">
                      <div id="div_no_patologicos" class="panel-body">
                      <div class="row">
                      <a class="all_no pull-right"> Todos No </a> 
                      </div>
                       <ul class="list-group list-group-unbordered">
                      <?php foreach ($no_patologicos as $key => $value) { ?>
                         <li class="list-group-item">
                          <div class="padre">
                          <label class="title"><?php echo $value['name'];?></label>
                          <div class="pull-right">
                            <input class="checked_si"   type="radio" value="1" name="<?php echo $value['id'];?>"><label>SI</label> 
                            <input  class="checked_no" type="radio" value="0" name="<?php echo $value['id'];?>" checked> <label> No</label>
                          </div>
                          </div>
                          <div class="">
                            <textarea name="info_<?php echo $value['id'];?>" style="display:none;" class="info form-control"> </textarea>
                          </div>
                      <?php } ?>
                          <div class="text-center">
                               <button type="submit" class="btn save_all"> Guardar Cambios </button>

                          </div>
                         </li>
                      
                       </ul>
                      </form>

                  </li>

                    <li class="item">
                      <a  class="antecedents_btn product-title">                      <button type="button" class="btn bg-teal-gradient"><i class="fa fa-plus"></i></button> ANTECEDENTES HEREDOFAMILIARES
                    </a>
                    <div class="div_heredofamiliares_log log">
                      
                      <?php if($heredofamiliares_list){ ?>

                          <ul class="list-group list-group-unbordered">
                          <?php if(count($heredofamiliares_list['negativos'])>0){?>
                            <li class="list-group-item">
                              <div class="row">
                                <div class="col-md-3">
                                  <span class="label label-danger"> <i class="fa fa-times" aria-hidden="true"></i></span> Negados
                                </div>
                                <div class="col-md-9"><?php foreach ($heredofamiliares_list['negativos'] as $key => $value) {
                                  echo $value['name'].' / ';
                                } ?>
                                </div>
                              </div> 
                            </li> 
                            <?php } ?>

                           <?php if(count($heredofamiliares_list['positivos'])>0){?>
                           <?php foreach ($heredofamiliares_list['positivos'] as $key => $value) {?>

                            <li class="list-group-item">
                              <div class="row">
                                <div class="col-md-5">
                                  <span class="label label-success"> <i class="fa fa-check" aria-hidden="true"></i></span> <?php echo $value['name'] ;?>
                                </div>
                                <div class="col-md-7"> <?php echo $value['desc'] ;?> </div>
                              </div> 
                              </li>
                              <?php }?>
                          <?php }?>
                          </ul>
                       <?php } ?>





                    </div> 
                    <form id="heredofamiliares-form" class="form" style="display: none">
                    <div class="panel panel-info">
                      <div id="div_heredofamiliares" class="panel-body">
                      <div class="row">
                      <a class="all_no pull-right"> Todos No </a> 
                      </div>
                       <ul class="list-group list-group-unbordered">
                      <?php foreach ($heredofamiliares as $key => $value) { ?>
                         <li class="list-group-item">
                          <div class="padre">
                          <label class="title"><?php echo $value['name'];?></label>
                          <div class="pull-right">
                            <input class="checked_si"   type="radio" value="1" name="<?php echo $value['id'];?>"><label>SI</label> 
                            <input  class="checked_no" type="radio" value="0" name="<?php echo $value['id'];?>" checked> <label> No</label>
                          </div>
                          </div>
                          <div class="">
                            <textarea name="info_<?php echo $value['id'];?>" style="display:none;" class="info form-control"> </textarea>
                          </div>
                      <?php } ?>
                          <div class="text-center">
                               <button type="submit" class="btn save_all"> Guardar Cambios </button>

                          </div>
                         </li>
                         </ul>
                      </form>

                  </li>


                <li class="item">
                      <a  class="antecedents_btn product-title">                      <button type="button" class="btn bg-teal-gradient"><i class="fa fa-plus"></i></button> ANTECEDENTES GINECO
                    </a>
                    <div class="div_gineco_log log">
                      
      
                      <?php if($gineco_list){ ?>

                          <ul class="list-group list-group-unbordered">
                          <?php if(count($gineco_list['negativos'])>0){?>
                            <li class="list-group-item">
                              <div class="row">
                                <div class="col-md-3">
                                  <span class="label label-danger"> <i class="fa fa-times" aria-hidden="true"></i></span> Negados
                                </div>
                                <div class="col-md-9"><?php foreach ($gineco_list['negativos'] as $key => $value) {
                                  echo $value['name'].' / ';
                                } ?>
                                </div>
                              </div> 
                            </li> 
                            <?php } ?>

                           <?php if(count($gineco_list['positivos'])>0){?>
                           <?php foreach ($gineco_list['positivos'] as $key => $value) {?>

                            <li class="list-group-item">
                              <div class="row">
                                <div class="col-md-5">
                                  <span class="label label-success"> <i class="fa fa-check" aria-hidden="true"></i></span> <?php echo $value['name'] ;?>
                                </div>
                                <div class="col-md-7"> <?php echo $value['desc'] ;?> </div>
                              </div> 
                              </li>
                              <?php }?>
                          <?php }?>
                          </ul>
                       <?php } ?>



                    </div> 
                    <form id="gineco-form" class="form" style="display: none">
                    <div class="panel panel-info">
                      <div id="div_gineco" class="panel-body">
                      <div class="row">
                      <a class="all_no pull-right"> Todos No </a> 
                      </div>
                       <ul class="list-group list-group-unbordered">
                      <?php foreach ($gineco as $key => $value) { ?>
                         <li class="list-group-item">
                          <div class="padre">
                          <label class="title"><?php echo $value['name'];?></label>
                          <div class="pull-right">
                            <input class="checked_si"   type="radio" value="1" name="<?php echo $value['id'];?>"><label>SI</label> 
                            <input  class="checked_no" type="radio" value="0" name="<?php echo $value['id'];?>" checked> <label> No</label>
                          </div>
                          </div>
                          <div class="">
                            <textarea name="info_<?php echo $value['id'];?>" style="display:none;" class="info form-control"> </textarea>
                          </div>
                      <?php } ?>
                          <div class="text-center">
                               <button type="submit" class="btn save_all"> Guardar Cambios </button>

                          </div>
                         </li>
                      
                       </ul>
                      </form>

                     

                  </li>
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.box-body -->
             
              <!-- /.box-footer -->
            </div>


           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Medicamentos Activos</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="form-group">
            <input type="text" class="add_active_medicament form-control" placeholder="Nombre del Medicamento" name="medicament">
            </div>
              <ul class="medicament-active-list list-group">
                <!-- /.item -->
                <?php if($medicamentos_list){
                  foreach ($medicamentos_list as $key => $value) { ?>
                <li class="list-group-item">   
                 <a href="" class="product-title"><?php echo $value['medicamento'];?> </a>    
                    <a data-id="<?php echo $value['id'];?>" class="delete_medicament pull-right"><i class="fa fa-trash-o"></i> </a>
                </li>
                 <?php }
                } ?>
                <!-- /.item -->
               
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
           
            <!-- /.box-footer -->
          </div>

          <!-- /.box -->
        </div>


        <div class="col-md-4">

        <div class="box">
         <button type="button" data-id="<?php echo $this->uri->segment(3)?>" class="btn_add_consult btn btn-primary btn-lg bg-aqua-active btn-block">Nueva Consulta</button>

        </div>


           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Consultas Agendadas</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <button type="button" class="btn btn-primary btn-sm btn-block bg-aqua-active btn-block">Agenda</button>
            </div>
            <!-- /.box-footer -->
          </div>
          



           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Consultas Iniciadas</h3>

            </div>
            <!-- /.box-header -->
            <?php if($consultas){
              foreach ($consultas as $key => $value) {?>
              <a href="<?php echo base_url();?>consultation/new_c/<?php echo $value['id'];?>">
            <div class="box-body">
              <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo $value['motivo'];?></span>
              <span class="info-box-number"><?php echo $value['date'];?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
            </div>
              <?php }
            } ?>


            <!-- /.box-body -->
            
            <!-- /.box-footer -->
          </div>
        </div>



      </div>

  </div>


  <div id="nueva_consulta" class="modal modal-primary">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Nueva Consulta</h4>
            </div>
            <div class=" box box-default">
                <h2></h2>
                <form id="motivo_consult" action="persons/edit" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-12">
            
                            <div class="form-group col-md-12">
                                <label for="nombre">Motivo de la Consulta</label>
                                <textarea  name="motivo" class="motivo_input form-control"></textarea> 
                            </div>
                      </div>
                    </div>
 
                    <!-- /.box-body -->
            </div>

            <div class="modal-footer bg-gray">
                <button type="button" class="btn btn-lg btn-warning pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="submit_motivo" class="btn btn-success btn-lg">Aceptar</button>

            </div>
             </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>