<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Administrasi</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<nav class="navbar navbar-inverse navbar-static-top">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="<?php echo base_url('home/') ?>">AHP</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			   <li><a href="<?php echo base_url('kriteria/'); ?>">Kriteria</a></li>
			   <li><a href="<?php echo base_url('alternatif/'); ?>">Alternatif</a></li>
			   <li><a href="<?php echo base_url('rangking/') ?>">Rangking</a></li>
		  </ul>
      <div class="navbar-collapse" id="bs-example-navbar-collapse-1">
  		  <ul class="nav navbar-nav navbar-right">
  			  <li><a href="profil.php"><?php echo $this->session->userdata('nama'); ?></a></li>
  			  <li class="dropdown">
  			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
    				<li><a href="<?php echo base_url('user/') ?>"><span class="fa fa-users"></span> Manejer Pengguna</a></li>
    				<li role="separator" class="divider"></li>
    				<li><a href="<?php echo base_url('login/logout') ?>"><span class="fa fa-sign-out"></span> Logout</a></li>
  		    </ul>
          </li>
  		  </ul>
      </div>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
  <style type="text/css">
  body {
        background: url(<?= base_url() ?>assets/img/4.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
</style>
<br><br><br><br><br><br>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2 text" align="center">>
        <h1><strong>SISTEM  PENDUKUNG KEPUTUSAN</strong></h1>
        <h3>PENERIMA BANTUAN BEDAH RUMAH</h3>
        <h5>Selamat Datang, <?php echo $this->session->userdata('nama'); ?>!</h5>
    </div>
</div>
  <footer class="text-center">Putra Asmara (1408605041)</footer>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js') ?>"></script>
    <script>
    	$(document).ready(function() {

    		$('#tabeldata').DataTable();

		});
    </script>
  </body>
</html>
