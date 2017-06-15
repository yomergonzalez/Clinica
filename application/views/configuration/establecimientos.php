<div class="row"> <!-- OBLIGATORIO UN ROW -->
    <div class="col-xs-12 col-md-6">
        <button style="margin: 5px 0 0 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_establecimiento"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</button>
    </div>


    <div class="col-xs-12 text-muted">
        <div class="table-responsived">
            <table id="table_establecimiento" class="table animated zoomIn  table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Logo</th>
                        <th>Nombre</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!--MOdales-->

<!--Modal de registro de nuesva cuenta-->
<div id="modal_add_establecimiento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Agregar establecimiento</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="form_add_establecimiento">
                <div class="form-group col-md-12">
                    <label class="col-md-2">Nombre del consultorio</label>
                    <div class="col-md-10">
                      <input type="text" name="name" class="form-control input-lg" placeholder="">
                    </div>
                  </div>
                  <div class="form-group  col-md-12">
                    <label class="col-md-2">Dirección</label>
                    <div class="col-md-10">
                      <textarea class="form-control input-lg" name="direccion" rows="2" placeholder=""></textarea>
                    </div>
                  </div>
                  <div class="form-group input-group-lg col-md-6">
                      <label class="col-md-2">Pais: </label>
                      <div class="col-md-10">
                        <select name="country" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                          <?php foreach ($countries as $value) {?>
                            <option value="<?php echo $value['id']?>" ><?php echo $value['nombre'];?></option>
                          <?php }?>
                        </select>
                      </div>
                  </div>

                <div class="form-group col-md-6">
                  <label class="col-md-2">Estado</label>
                  <div class="col-md-10">
                    <input type="text" name="estado" class="form-control input-lg " placeholder="">
                  </div>
                </div>


                <div class="form-group col-md-6">
                  <label class="col-md-2">C.P.</label>
                  <div class="col-md-10">
                    <input type="text" name="cp" class="form-control input-lg " placeholder="">
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-md-2">Ciudad</label>
                  <div class="col-md-10">
                    <input type="text" name="ciudad" class="form-control input-lg" placeholder="">
                  </div>
                </div>
                  <!-- /.form-group -->
                  <div class="form-group col-md-6">
                    <label class="col-md-2">Telefono</label>
                    <div class="col-md-10">
                      <input type="text" name="telefono" class="form-control input-lg" placeholder="">
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label class="col-md-2">Logo</label>
                   <div class="col-md-3">
                            <div id="image-preview">
                                <label for="image-upload" id="image-label"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                <input type="file" name="image" id="image-upload" accept="image/*"/>
                            </div>
                        </div>
                  </div>
              </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-resize-small"></span> Close</button>
                <button type="button" id="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
            </div>
        </div>
    </div>
</div>


<!--Modal de registro de nuesva cuenta-->
<div id="modal_edit_establecimiento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Editar Establecimiento</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="form_edit_establecimiento">
                         <div class="form-group col-md-12">
                    <label class="col-md-2">Nombre del consultorio</label>
                    <div class="col-md-10">
                      <input type="text" name="name" class="name_edit form-control input-lg" placeholder="">
                    </div>
                  </div>
                  <div class="form-group  col-md-12">
                    <label class="col-md-2">Dirección</label>
                    <div class="col-md-10">
                      <textarea name="direccion" class="direccion_edit form-control input-lg" rows="2" placeholder=""></textarea>
                    </div>
                  </div>
                  <div class="form-group input-group-lg col-md-6">
                      <label class="col-md-2">Pais</label>
                      <div class="col-md-10">
                        <select name="country" class=" country_edit form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                          <?php foreach ($countries as $key => $value) {?>
                            <option value="<?php echo $value['id']?>" ><?php echo $value['nombre'];?></option>
                          <?php }?>
                        </select>
                      </div>
                  </div>

                <div class="form-group col-md-6">
                  <label class="col-md-2">Estado</label>
                  <div class="col-md-10">
                    <input type="text" name="estado" class="estado_edit form-control input-lg " placeholder="">
                  </div>
                </div>


                <div class="form-group col-md-6">
                  <label class="col-md-2">C.P.</label>
                  <div class="col-md-10">
                    <input type="text" name="cp" class="cp_edit form-control input-lg " placeholder="">
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-md-2">Ciudad</label>
                  <div class="col-md-10">
                    <input name="ciudad" type="text" class="ciudad_edit form-control input-lg" placeholder="">
                  </div>
                </div>
                  <!-- /.form-group -->
                  <div class="form-group col-md-12">
                    <label class="col-md-2">Telefono</label>
                    <div class="col-md-10">
                      <input name="telefono" type="text" class="telefono_edit form-control input-lg" placeholder="">
                    </div>
                  </div>
                <div class="form-group col-md-12">
                    <label class="col-md-2">Logo</label>
                   <div class="col-md-3">
                            <div id="image-preview2">
                                <label for="image-upload2" id="image-label2"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                <input type="file" name="image" id="image-upload2" accept="image/*"/>
                            </div>
                        </div>
                  </div>


              </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-resize-small"></span> Close</button>
                <button type="button" id="edit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
            </div>
        </div>
    </div>
</div>

<div id="modal_add_account" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Agregar Una Cuenta</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="form_add_account">
                        <!--<div class="col-xs-12">-->
                            <div class="form-group col-xs-12 col-sm-6">
                                <label for="tipo" class="control-label">Tipo de Cuenta</label>
                                <label for="tipo" class="sr-only">Tipo de Cuenta</label>
                                <select class="input-lg form-control" name="tipo" id="select_type">
                                    <?php foreach ($cla as $key => $v) {
                                        echo '<option class="text-muted" value="'.$v['id'].'">'.$v['name'].'</option>';
                                    } ?>
                                </select>
                            </div>
                         <div class="form-group col-md-6">
                            <label class="">Email</label>
                              <input type="email" name="email" class="form-control input-lg" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="">Nombres</label>
                              <input type="text" name="first_name" class="form-control input-lg" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="">Apellidos</label>
                              <input type="text" name="last_name" class="form-control input-lg" placeholder="">
                        </div>
                        <div id="doctor_div">
                        <div class="form-group col-md-7">
                            <label class="">Cédula Profesional</label>
                              <input name="cedula" type="text" class="form-control input-lg" placeholder="">
                          </div>

                          <div class="form-group col-md-5">
                            <label class="">Institucion que otorgó la cédula</label>
                              <input name="institucion" type="text" class="form-control input-lg" placeholder="">
                          </div>
                          <div class="form-group input-group-lg col-md-6">
                              <label class="">Especialidad</label>
                                <select name="especialidad" class="form-control  input-lg select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php foreach ($specialties as $key => $value) {?>
                                    <option value="<?php echo $value->id?>" ><?php echo $value->name;?></option>
                                  <?php }?>
                                </select>
                          </div>
                        </div>

                        <!--</div>-->
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-resize-small"></span> Close</button>
                <button type="button" id="submit_account" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
            </div>
        </div>
    </div>
</div>


<div id="modal_edit_account" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Editar Cuenta</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="form_edit_account">
                        <!--<div class="col-xs-12">-->
                         <div class="form-group col-md-6">
                            <label class="">Email</label>
                              <input type="email" name="email" class="email_edit form-control input-lg" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="">Nombres</label>
                              <input type="text" name="first_name" class="nombre_edit form-control input-lg" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="">Apellidos</label>
                              <input type="text" name="last_name" class="apellido_edit form-control input-lg" placeholder="">
                        </div>
                        <div id="doctor_div">
                        <div class="form-group col-md-7">
                            <label class="">Cédula Profesional</label>
                              <input name="cedula" type="text" class="cedula_edit form-control input-lg" placeholder="">
                          </div>

                          <div class="form-group col-md-5">
                            <label class="">Institucion que otorgó la cédula</label>
                              <input name="institucion" type="text" class="institucion_edit form-control input-lg" placeholder="">
                          </div>
                          <div class="form-group input-group-lg col-md-6">
                              <label class="">Especialidad</label>
                                <select name="especialidad" class="especialidad_edit form-control  input-lg select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php foreach ($specialties as $key => $value) {?>
                                    <option value="<?php echo $value->id?>" ><?php echo $value->name;?></option>
                                  <?php }?>
                                </select>
                          </div>
                        </div>

                        <!--</div>-->
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-resize-small"></span> Close</button>
                <button type="button" id="submit_edit_account" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Actualizar</button>
            </div>
        </div>
    </div>
</div>

<div id="modal_list_account" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Listado de Cuentas</h4>
            </div>
            <div class="modal-body">
                  <table id="table_list_users" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Tipo</th>
                            <th>Estatus</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                   </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-resize-small"></span> Close</button>
            </div>
        </div>
    </div>
</div>