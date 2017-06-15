<div class="row"> <!-- OBLIGATORIO UN ROW -->
    <div class="col-xs-12 col-md-6">
        <button style="margin: 5px 0 0 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_diagnostico"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</button>
    </div>

    <div class="col-xs-12 text-muted">
        <div class="table-responsived">
            <table id="table_diagnostico" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripcion</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!--MOdales-->

<!--Modal de registro de nuesva cuenta-->
<div id="modal_add_diagnostico" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Agregar diagnostico</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="form_add_diagnostico">
                        <!--<div class="col-xs-12">-->
                             <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-3">
                                <label for="" class="control-label">ID</label>
                                <label for="" class="sr-only">ID</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                    <input type="text" name="id" class="form-control" placeholder="ID">
                                </div>
                            </div>
                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-9">
                                <label for="" class="control-label">Descripcion</label>
                                <label for="" class="sr-only">Descripcion</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                    <input type="text" name="name" class="form-control" placeholder="Descripcion">
                                </div>
                            </div>
                          
                        <!--</div>-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-resize-small"></span> Close</button>
                <button type="button" id="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
            </div>
        </form>
        </div>
    </div>
</div>


<!--Modal de registro de nuesva cuenta-->
<div id="modal_edit_diagnostico" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Editar diagnostico</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="form_edit_diagnostico">
                        <!--<div class="col-xs-12">-->
 
                            <div class="form-group col-xs-12 col-sm-12">
                                <label for="" class="control-label">Descripcion</label>
                                <label for="" class="sr-only">Descripcion</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                    <input type="text" name="name" class="name_edit form-control" placeholder="Descripcion">
                                </div>
                            </div>
                          
                        <!--</div>-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-resize-small"></span> Close</button>
                <button type="button" id="edit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
            </div>
         </form>
        </div>
    </div>
</div>
