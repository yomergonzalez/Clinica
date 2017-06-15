<div class="row">

<div class="col-md-8">
<div class="box">
    <div class="box-header">
    <h1> Consultas </h1>
    </div>
    <div class="text-center">
        <div class="col-md-3">
            <button type="button" class="prev-day btn btn-default btn-sm"><i class="fa fa-backward"></i></button>
            </div>
        <div class="col-md-6">
            <span id="fecha"></span>
        </div>
        <div class="col-md-3">
            <button type="button" class="next-day btn btn-default btn-sm"><i class="fa fa-forward"></i></button>
        </div>     
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="table" class=" animated zoomIn table table-hover">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Paciente</th>
                    <th>tipo</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
</div>
<div class="col-md-4">

<div class="box-header">
    <h1>  </h1>
    </div>
          <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
              <i class="fa fa-user"></i>

              <h3 class="box-title">Agregar Cita</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->

              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!--The calendar -->
              <div>
                  <form id="form_add_cita" class="form-horizontal">
                        <div class="form-group">
                        <label class="col-md-12" for="exampleInputName2">Paciente:</label>
                        <div class="col-md-8">
                          <input type="text"  class="col-md-8 form-control" id="search_pac" placeholder="Buscar..">
                          <input type="hidden"  class="col-md-2 form-control" id="paciente_id">
                        </div>
                        <div class=" col-md-2">
                          <button type="button" class="add_pacient btn btn-default"><i class="fa fa-plus"></i></button>
                        </div>
                        </div>
                        <div class="form-group">
                         <label class="col-md-12" for="exampleInputName2">Fecha:</label>
                        <div class=" col-md-12">
                          <input type="text"  class="form-control" id="fecha">
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-md-1" for="exampleInputName2">De:</label>
                        <div class="col-md-4">
                          <input class="form-control"  type="text"   id="hora2">
                        </div>
                        <div class=" col-md-4">
                          <input class=" form-control"  type="text"   id="hora2">
                        </div>
                        </div>

                        <div class="form-group">
                        <label class="col-md-12" for="exampleInputName2">Motivo:</label>
                        <div class="col-md-12">
                        <textarea  class="form-control " name="motivo"> </textarea>
                        </div>
                        </div>
                        <div class="form-group">
                        <label class="col-md-2" for="exampleInputName2">Tipo:</label>
                        <div class="col-md-10">
                          <label>
                            <input type="checkbox" value="">
                            nueva
                          </label>
                            <label>
                            <input type="checkbox" value="">
                            regular
                          </label>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-default">Agregar cita</button>
                      </form>
              </div>
            </div>
            <!-- /.box-body -->
        
          </div>
    <div class="box-header">
    </div>
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendario</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->

              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
        
          </div>

</div>


</div>