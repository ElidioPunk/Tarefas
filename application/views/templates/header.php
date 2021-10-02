<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tarefas</title>
        <link type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap-responsive.min.css');?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url('assets/css/theme.css" rel="stylesheet');?>">
        <link type="text/css" href="<?php echo base_url('assets/images/icons/css/font-awesome.css');?>" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="#">Tarefas </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav nav-icons">
                            <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                            <li><a href="#"><i class="icon-eye-open"></i></a></li>
                            <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                        </ul>
                        <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form>
                        <ul class="nav pull-right">
                           
                            <?php $ci = & get_instance();
		                            $nome = $ci->session->userdata('nome');?>
                            <li><a href="#"><?php echo $nome ?> </a></li>
                            <li class="nav-user dropdown"><a href="<?php echo base_url('index.php/usuarios/logout') ?>" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url('uploads/'.$ci->session->userdata('foto')) ?>" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Meu Perfl</a></li>
                                    <li><a href="#">Editar Perfil</a></li>
                                
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url('index.php/usuarios/logout') ?>">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">

                            
                                <li><a href="<?php echo base_url('index.php/usuarios'); ?>"><i class="menu-icon icon-inbox"></i>Usuários <b class="label green pull-right">
                                    11</b> </a></li>
                                <?php   $ci = & get_instance();
		                           // if( !$ci->session->userdata('agente')): ?>								
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Definições </a>
                                   
                                </li>
                                <li><a href="<?php echo base_url('index.php/usuarios/logout') ?>"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
