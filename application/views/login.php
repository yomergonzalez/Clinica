<?php $this->load->view('common/header'); ?>

  <body class="hold-transition full">
    <div class="login-box">
    <!-- /.login-logo -->
    <div class="login-box-body">
    <p class="login-box-msg">Inicio de sesion</p>
    <?php echo $this->session->tempdata('error');?>

    <form action="seguridad/login" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="pass" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox">
            <label>
              <input type="checkbox"> Recordar
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="#" class="text-center">Register</a>

    </div>
    <!-- /.login-box-body -->
    </div>

  <?php $this->load->view('common/footer'); ?>
