<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Medical</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/loader.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        
        <!--ARCHIVO CON VARIABLES-->
        <?php require_once 'application/views/common/v_datos.php'; ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <?php
        switch ($this->router->method) {
            case 'admin_accounts':
                ?>
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datatables/datatables.min.css">
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toast/toastr.min.css">
                <?php
                break;

            case 'new_c':
                ?>
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toast/toastr.min.css">
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/line/_all.css">

                <?php
                break;
            case 'index':
                ?>
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/toast/toastr.min.css">
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2-bootstrap.min.css">
                <?php
                break;

            default:
                break;
        }
        ?>
    </head>
    <body class="hold-transition fixed skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="../../index2.html" class="logo hidden-xs">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>MEDICAL</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top text-center">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle pull-left" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">10</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 10 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="http://lorempixel.com/200/200/" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $this->session->names . ' ' . $this->session->surnames; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="http://lorempixel.com/200/200/" class="img-circle" alt="User Image">

                                        <p>
                                            <?php echo $this->session->names; ?> - Web Developer
                                        </p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo site_url('seguridad/log_out'); ?>" class="btn btn-default btn-flat">Cerrar Sesion</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>

            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="http://lorempixel.com/200/200/" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $this->session->names; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">PRINCIPAL</li>
                        <!--MENU ADMINISTRACION-->
                        <?php if (key_exists('configuration', $this->session->controller_function)) { ?>
                            <li class="treeview <?php echo ($this->router->class == 'configuration') ? 'active' : ''; ?>">
                                <a href="#">
                                    <i class="fa fa-cogs"></i> <span>Administración</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <?php if (in_array('admin_accounts', $this->session->controller_function['configuration'])) { ?>
                                    <ul class="treeview-menu">
                                        <li><a href="<?php echo site_url('configuration/admin_accounts'); ?>"><i class="fa fa-circle-o"></i>Cuentas y Usuarios</a></li>
                                    </ul>
                                <?php } ?>
                            </li>
                        <?php } ?>

                            <li><a href="<?php echo site_url('persons'); ?>"><i class="fa fa-circle-o"></i> Pacientes</a></li>
                        <li><a href="<?php echo site_url('agenda'); ?>"><i class="fa fa-circle-o"></i> Agenda</a></li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php"><i class="fa fa-circle-o"></i> index</a></li>
                            </ul>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- =============================================== -->

            <!-- Content Wrapper. Contains page content -->
            <main style="background-color: #fff !important;" class="content-wrapper">
