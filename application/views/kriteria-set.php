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
			   <li class="active"><a href="<?php echo base_url('kriteria/') ?>">Kriteria</a></li>
			   <li><a href="<?php echo base_url('alternatif/'); ?>">Alternatif</a></li>
			   <li><a href="<?php echo base_url('rangking/'); ?>">Rangking</a></li>
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
  <div class="container-fluid">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation"><a href="<?php echo base_url('kriteria/'); ?>" role="tab">Data Kriteria</a></li>
      <li role="presentation" class="active"><a href="<?php echo base_url('kriteria/set'); ?>" role="tab">Isi Nilai Kriteria</a></li>
      <li role="presentation"><a href="<?php echo base_url('kriteria/preferensi'); ?>" role="tab">Nilai Perbandingan Berpasangan</a></li>
      <li role="presentation"><a href="<?php echo base_url('kriteria/bobot'); ?>" role="tab">Bobot Kriteria dan Kosistensi</a></li>
  	</ul>
  </div>
  <div class="container-fluid">
    <div class="row">
        <div class="col-xs-2 col-md-2">
        <div class="form-group">
          <h5><strong>Kriteria Pertama</strong></h5>
        </div>
        </div>
        <div class="col-xs-8 col-md-8">
        <div class="form-group">
          <h5><strong>Penilaian</strong></h5>
        </div>
        </div>
        <div class="col-xs-2 col-md-2">
        <div class="form-group">
          <h5><strong>Kriteria Kedua</strong></h5>
        </div>
        </div>
      </div>
      <form class="container-fluid" action="<?php echo base_url('Kriteria/input'); ?>" method="post">
        <?php for ($i=1; $i<=5 ; $i++) { ?>
          <?php for ($j=$i+1; $j<=5 ; $j++) { ?>
            <div class="row">
              <div class="col-xs-2 col-md-2">
                <?php echo $data[$i-1]['nama_kriteria']; ?>
                <input type="hidden" name="k1_<?=$i.$j;?>" value="<?php echo $i; ?>">
              </div>
              <div class="coll-xs-8 col-md-8">
                <select class="form-control" name="i<?=$i.$j;?>">
                  <option checked >--</option>
                  <option value="9">9 - Mutlak sangat lebih penting</option>
                  <option value="8">8 - Mendekati mutlak dari</option>
                  <option value="7">7 - Sangat penting dari</option>
                  <option value="6">6 - Mendekati sangat penting dari</option>
                  <option value="5">5 - Lebih penting dari</option>
                  <option value="4">4 - Mendekati lebih penting dari</option>
                  <option value="3">3 - Sedikit lebih penting dari</option>
                  <option value="2">2 - Mendekati sedikit lebih penting dari</option>
                  <option value="1">1 - Sama penting dengan</option>
                  <option value="0.5">0.5 - 1 bagi mendekati sedikit lebih penting dari </option>
                  <option value="0.333">0.333 - 1 bagi sedikit lebih penting dari </option>
                  <option value="0.25">0.25 - 1 bagi mendekati lebih penting dari </option>
                  <option value="0.2">0.2 - 1 bagi lebih penting dari </option>
                  <option value="0.167">0.167 - 1 bagi mendekati sangat penting dari  </option>
                  <option value="0.143">0.143 - 1 bagi sangat penting dari </option>
                  <option value="0.125">0.125 - 1 bagi mendekati mutlak dari </option>
                  <option value="0.1">0.1 - 1 bagi mutlak sangat penting dari </option>
                </select>
              </div>
              <div class="col-xs-2 col-md-2">
                <?php echo $data[$j-1]['nama_kriteria']; ?>
                <input type="hidden" name="k2_<?=$i.$j;?>" value="<?php echo $j; ?>">
              </div>
            </div>
          <?php } ?>
        <?php } ?>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>

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
