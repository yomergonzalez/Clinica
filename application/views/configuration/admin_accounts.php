<div class="row"> <!-- OBLIGATORIO UN ROW -->
    <div class="col-xs-12 col-md-6">
        <button style="margin: 5px 0 0 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_account"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</button>
    </div>
    <div class="col-xs-12 col-md-6 text-right text-gray hidden-xs">
        <!--        <h3 style="margin-right: 2%">Administrar cuentas y usuarios</h3>-->
        <div style="margin-top: 5px" class="input-group">
            <input type="text" class="form-control" placeholder="Buscar en la tabla" aria-describedby="basic-addon1">
            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
    </div>

    <div class="col-xs-12 text-muted">
        <div class="table-responsived">
            <table id="table_accounts" class="table animated zoomIn  table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Perfil</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>tipo</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!--MOdales-->

<!--Modal de registro de nuesva cuenta-->
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

                         <div class="form-group col-md-6">
                            <label class="">Email</label>
                              <input type="email" name="email" class="form-control input-lg" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="">Nombres</label>
                              <input type="hidden" name="tipo" value="1">
                              <input type="text" name="first_name" class="form-control input-lg" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="">Apellidos</label>
                              <input type="text" name="last_name" class="form-control input-lg" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="">Contraseña</label>
                              <input type="password" id="password1" name="password1" class="form-control input-lg" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="">Repetir Contraseña</label>
                              <input type="password" id="password2" name="password2" class="form-control input-lg" placeholder="">
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
                              <input type="hidden" name="tipo" value="1">
                              <input type="text" name="first_name" class="nombre_edit form-control input-lg" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="">Apellidos</label>
                              <input type="text" name="last_name" class="apellido_edit form-control input-lg" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="">Contraseña </label>
                              <input type="password" id="password1" name="password1" class="form-control input-lg" placeholder="">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="">Repetir Contraseña</label>
                              <input type="password" id="password2" name="password2" class="form-control input-lg" placeholder="">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-resize-small"></span> Close</button>
                <button type="button" id="submit_edit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
            </div>
        </div>
    </div>
</div>
