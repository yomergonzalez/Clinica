<div class="row"> <!-- OBLIGATORIO UN ROW -->
    <div class="col-xs-12 col-md-6">
        <button style="margin: 5px 0 0 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_account"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</button>
    </div>
    <div class="col-xs-12 col-md-6 text-right text-gray hidden-xs">
        <!--        <h3 style="margin-right: 2%">Administrar cuentas y usuarios</h3>-->
        <div style="margin-top: 5px" class="input-group">
            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
        </div>
    </div>

    <div class="col-xs-12 text-muted">
        <div class="table-responsived">
            <table id="table_accounts" class="table table-condensed">
                <thead>
                    <tr>
                        <th>Perfil</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>tipo</th>
                        <th>clasificacion</th>
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
                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                <label for="cliente" class="control-label">Consultorio o Clinica</label>
                                <label for="cliente" class="sr-only">Consultorio o Clinica</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                    <input type="text" class="form-control" placeholder="Nombre o Raz&oacute;n Social">
                                </div>
                            </div>
                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                <label for="tipo" class="control-label">Tipo de Cuenta</label>
                                <label for="tipo" class="sr-only">Tipo de Cuenta</label>
                                <select class="form-control" id="select_type"><option class="text-muted" value="0">Seleccione</option></select>
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="PorcentContra." class="control-label">Porcent. Contra.</label>
                                <label for="PorcentContra." class="sr-only">Porcent. Contra.</label>
                                <select class="form-control" id="select_porcent_contra"><option class="text-muted" value="0">Seleccione</option></select>
                            </div>
                            <div class="form-group col-xs-2">
                                <label for="TipoServicio" class="control-label">Tipo Servicio</label>
                                <label for="TipoServicio" class="sr-only">Tipo Servicio</label>
                                <select class="form-control" name="select_tipo_servicio" id="select_tipo_servicio"><option class="text-muted" value="0">Seleccione</option></select>
                            </div>
                        <!--</div>-->
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-resize-small"></span> Close</button>
                <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
            </div>
        </div>
    </div>
</div>
