
<div class="box">
    <div class="box-header">
    </div>

    <!-- /.box-header -->
    <div class="box-body">
        <table id="table_pacientes" class="hidden animated zoomIn table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if ($persons_list) { ?>
                    <?php foreach ($persons_list as $key => $value) { ?>
                        <tr id="<?php echo $value['id']; ?>">
                            <td><img src="<?php echo base_url().$value['photo']; ?>" class="img-circle" alt="User Image"></td>
                            <td><?php echo $value['name']; ?></td>
                            <td><?php echo $value['birth_date']; ?></td>
                            <td> <?php echo $value['sexo']; ?></td>
                            <td><?php echo $value['phone']; ?></td>
                            <td><div class="buttons">
                                    <a data-toggle="tooltip" title="Agregar consulta" class="btn btn-social-icon btn-file"><i class="fa fa-plus-circle"></i></a>
                                    <a data-toggle="tooltip" title="Editar" class="button_edit btn btn-social-icon btn-file"><i class="fa fa-pencil-square-o"></i></a>
                                    <a data-toggle="tooltip" title="Ver perfil" class="btn btn-social-icon btn-file"><i class="fa fa-folder-open"></i></a>
                                    <a data-toggle="tooltip" title="Eliminar" class="btn btn-social-icon btn-file"><i class="fa fa-trash"></i></a>
                                </div></td>
                        </tr>
                    <?php }
                }
                ?>
                </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>

<div id="nuevopaciente" class="modal modal-primary">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Nuevo Paciente</h4>
            </div>
            <div class=" box box-default">
                <h2></h2>
                <form id="new_paciente_form" action="persons/crear" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <div id="image-preview">
                                <label for="image-upload" id="image-label"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                <input type="file" name="image" id="image-upload" accept="image/*"/>
                            </div>
                        </div>
                        <div class="col-md-9">

                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre(s)</label>
                                <input type="text" name="name" class="form-control input-lg" id="nombre">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="apellido">Apellido(s)</label>
                                <input type="text" name="last_name" class="form-control input-lg" id="apellido">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fecha">Fecha de nacimiento</label>
                                <input type="text" name="birth_date" class="form-control input-lg" id="fechanac">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fecha">Sexo</label>
                                <select class="form-control input-lg" name="sexo">
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fecha">Teléfono</label>
                                <input type="text" name="phone" class="form-control input-lg" id="fecha">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fecha">Movil</label>
                                <input type="text" name="cellphone" class="form-control input-lg" id="fecha">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control input-lg" id="email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dni">DNI</label>
                                <input type="text" name="dni" class="form-control input-lg" id="dni">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="address">Direccion</label>
                                <input type="text" name="address" class="form-control input-lg" id="addres">
                            </div>
                            <div class="form-group input-group-lg col-md-6">

                                <label>Pais</label>
                                   <select name="country" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php foreach ($countries as $key => $value) {?>
                                       <option value="<?php echo $value->id?>" ><?php echo $value->nombre;?></option>
                                     <?php }?>
                                    </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="code">Codigo Postal</label>
                                <input type="text" name="postal_code" class="form-control input-lg" id="postal_code">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">Ciudad</label>
                                <input type="text" name="city" class="form-control input-lg" id="city">
                            </div>
                        </div>
                    </div>
 
                    <!-- /.box-body -->
            </div>

            <div class="modal-footer bg-gray">
                <button type="button" class="btn btn-lg btn-warning pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success btn-lg">Guardar Paciente</button>

            </div>
             </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div id="actualizar_paciente" class="modal modal-primary">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Editar Paciente</h4>
            </div>
            <div class=" box box-default">
                <h2></h2>
                <form id="edit_paciente_form" action="persons/edit" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <div id="image-preview2">
                                <label for="image-upload2" id="image-label2"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                <input type="file" name="image" id="image-upload2" accept="image/*"/>
                            </div>
                        </div>
                        <div class="col-md-9">

                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre(s)</label>
                                <input type="text" name="name" class="name_edit form-control input-lg" id="nombre">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="apellido">Apellido(s)</label>
                                <input type="text" name="last_name" class="last_name_edit form-control input-lg" id="apellido">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fecha">Fecha de nacimiento</label>
                                <input type="text" name="birth_date" class="birth_date_edit form-control input-lg" id="fechanac">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fecha">Sexo</label>
                                <select class="form-control input-lg sexo_edit" name="sexo">
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fecha">Teléfono</label>
                                <input type="text" name="phone" class="phone_edit form-control input-lg" id="fecha">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fecha">Movil</label>
                                <input type="text" name="cellphone" class="cellphone_edit form-control input-lg" id="fecha">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="email_edit form-control input-lg" id="email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dni">DNI</label>
                                <input type="text" name="dni" class="dni_edit form-control input-lg" id="dni">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="address">Direccion</label>
                                <input type="text" name="address" class="address_edit form-control input-lg" id="addres">
                            </div>
                            <div class="form-group input-group-lg col-md-6">
                                <label for="fecha">Pais</label>
                                <select class="form-control input-lg country_edit select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="country">
                                    <?php foreach ($countries as $key => $value) { ?>
                                        <option value="<?php echo $value->id ?>" ><?php echo $value->nombre; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="code">Codigo Postal</label>
                                <input type="text" name="postal_code" class="postal_code_edit form-control input-lg" id="postal_code">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">Ciudad</label>
                                <input type="text" name="city" class="city_edit form-control input-lg" id="city">
                            </div>
                        </div>
                    </div>
 
                    <!-- /.box-body -->
            </div>

            <div class="modal-footer bg-gray">
                <button type="button" class="btn btn-lg btn-warning pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success btn-lg">Actualizar Paciente</button>

            </div>
             </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>