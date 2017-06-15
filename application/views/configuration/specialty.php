<div class="row"> <!-- OBLIGATORIO UN ROW -->
    <div class="col-xs-12 col-md-6">
        <button style="margin: 5px 0 0 5px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_add_specialty"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</button>
    </div>


    <div class="col-xs-12 text-muted">
        <div class="table-responsived">
            <table id="table_specialty" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
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
<div id="modal_add_specialty" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Agregar Una Especialidad</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="form_add_specialty">
                        <!--<div class="col-xs-12">-->
                            <div class="form-group col-xs-12 col-sm-12">
                                <label for="name" class="control-label">Nombre</label>
                                <label for="name" class="sr-only">Nombre</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                    <input type="text" name="name" class="form-control" placeholder="Nombre">
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
<div id="modal_edit_specialty" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Editar Especialidad</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="form_edit_specialty">
                        <!--<div class="col-xs-12">-->
                            <div class="form-group col-xs-12 col-sm-12">
                                <label for="name" class="control-label">Nombre</label>
                                <label for="name" class="sr-only">Nombre</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                    <input type="text" name="name" class="name_edit form-control" placeholder="Nombre">
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
