<div class="box">
    <div class="box-header">
    <h1> Consultas </h1>
    </div>
    

    <!-- /.box-header -->
    <div class="box-body">
        <table id="table" class=" animated zoomIn table table-hover">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Paciente</th>
                    <th>Motivo</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <?php if ($list) {  ?>
                    <?php foreach ($list as $key => $value) { ?>
                        <tr id="<?php echo $value['id']; ?>">
                            <td><?php echo $value['date']; ?></td>
                            <td><?php echo $value['name']; ?></td>
                            <td><?php echo $value['motivo']; ?></td>
                            <td><div class="buttons">
                                    <a href="<? echo base_url();?>consultation/new_c/<?php echo $value['id']; ?>" data-toggle="tooltip" title="Ver" class="btn btn-social-icon btn-file"><i class="fa fa-eye"></i></a>
                                </div></td>
                        </tr>
                    <?php }
                }else  echo 'Sin consultas';
                ?>
                </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>