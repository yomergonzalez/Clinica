<?php $this->load->view('common/header'); ?>


<body class="hold-transition full">
  <div class="col-md-6 col-md-offset-3">
        <div class="box box-default box-solid">
            <div class="box-header bg-teal-active with-border">
              <h3 class="box-title">Configuración de Receta Médica</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
              <div class="box-body">

                <form class="form-horizontal">
                  <div class="form-group col-md-12">
                    <label class="col-md-2">Cédula Profesional</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control input-lg" placeholder="">
                    </div>
                  </div>

                  <div class="form-group col-md-12">
                    <label class="col-md-2">Institucion que otorgó la cédula</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control input-lg" placeholder="">
                    </div>
                  </div>
                  <div class="form-group input-group-lg col-md-12">
                      <label class="col-md-2">Especialidad</label>
                      <div class="col-md-10">
                        <select class="form-control  input-lg select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                          <?php foreach ($specialties as $key => $value) {?>
                            <option value="<?php echo $value->id?>" ><?php echo $value->name;?></option>
                          <?php }?>
                        </select>
                      </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label class="col-md-2">Nombre del consultorio</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control input-lg" placeholder="">
                    </div>
                  </div>
                  <div class="form-group  col-md-12">
                    <label class="col-md-2">Dirección</label>
                    <div class="col-md-10">
                      <textarea class="form-control input-lg" rows="2" placeholder=""></textarea>
                    </div>
                  </div>
                  <div class="form-group input-group-lg col-md-6">
                      <label class="col-md-2">Pais</label>
                      <div class="col-md-10">
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                          <?php foreach ($countries as $key => $value) {?>
                            <option value="<?php echo $value->id?>" ><?php echo $value->nombre;?></option>
                          <?php }?>
                        </select>
                      </div>
                  </div>

                <div class="form-group col-md-6">
                  <label class="col-md-2">Estado</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control input-lg " placeholder="">
                  </div>
                </div>


                <div class="form-group col-md-6">
                  <label class="col-md-2">C.P.</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control input-lg " placeholder="">
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-md-2">Ciudad</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control input-lg" placeholder="">
                  </div>
                </div>
                  <!-- /.form-group -->
                  <div class="form-group col-md-12">
                    <label class="col-md-2">Telefono</label>
                    <div class="col-md-10">
                      <input type="text" class="form-control input-lg" placeholder="">
                    </div>
                  </div>

                  <div class="col-md-12 text-center">
                    <button class="btn bg-teal btn-lg" type="submit" name="button">Guardar</button>
                  </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>

            <!-- /.col -->
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
  <?php $this->load->view('common/footer'); ?>
