<!DOCTYPE html>
<html lang="en">
<head>
	
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Coopvendas</title>
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
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.html">
			  		Coopvendas
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li><a href="#">
							Registar-se
						</a></li>

						

						<li><a href="#">
							Esqueceu password?
						</a></li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form action="<?php echo base_url('index.php/usuarios/login'); ?>" method="post" class="form-vertical">
						<div class="module-head">
							<h3>Login</h3>
						</div>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" name="email" id="inputEmail" placeholder="Nome de usuário ou email">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password" name="password" id="inputPassword" placeholder="Password">
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-right">Entrar</button>
									<label class="checkbox">
										<input type="checkbox"> Lembrar-me
									</label>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; 2021 Gigabit Service - gigabit.com </b> Todo direitos reservados.
		</div>
	</div>
	<script src="<?php echo base_url('assets/scripts/jquery-1.9.1.min.js" type="text/javascript');?>"></script>
	<script src="<?php echo base_url('assets/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript');?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js" type="text/javascript');?>"></script>
</body>