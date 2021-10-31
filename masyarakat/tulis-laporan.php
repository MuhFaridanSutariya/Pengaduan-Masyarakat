<?php 
    include ('../functions.php');
    $db = new Controller();

?>

<!DOCTYPE html>
<!-- 
Template Name: BRILLIANT Bootstrap Admin Template
Version: 4.5.6
Author: WebThemez
Website: http://www.webthemez.com/ 
-->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>Halaman Admin</title>
    <!-- Bootstrap Styles-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="../assets/js/Lightweight-Chart/cssCharts.css"> 
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="beranda-admin.php"><strong>USER MASYARAKAT</strong></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                    <li>
                        <a class="active-menu" href="beranda-masyarakat.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="tulis-laporan.php"><i class="fa fa-edit"></i> Tulis Laporan</a>
                    </li>
                    <li>
                        <a href="laporan-masyarakat.php"><i class="fa fa-desktop"></i>Lihat Laporan</a>
                    </li> 
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
        <div class="header"> 
                        <h1 class="page-header">
                            Tulis Laporan 
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="beranda-masyarakat.php">Dashboard</a></li>
					  <li><a href="tulis-laporan.php">Tulis Laporan</a></li>
					  <li><a href="laporan-masyarakat.php">Lihat Laporan</a></li>
					</ol> 
									
		</div>
            <div id="page-inner">
            <div class="row">
                        <div class="col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="card-title">
                                        <div class="title">Form</div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form action="proses-tulis-laporan.php?aksi=tambah" method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Pengaduan</label>
                                            <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Petugas" name="tgl_pengaduan">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NIK</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan NIK" name="nik">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Isi Laporan</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password" name="isi_laporan">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Foto</label>
                                            <input type="file" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Telp" name="foto">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

				<footer><p>UKK WEB 2021</a></p>
				
        
				</footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="../assets/js/bootstrap.min.js"></script>
	 
    <!-- Metis Menu Js -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../assets/js/morris/morris.js"></script>
	
	
	<script src="../assets/js/easypiechart.js"></script>
	<script src="../assets/js/easypiechart-data.js"></script>
	
	 <script src="../assets/js/Lightweight-Chart/jquery.chart.js"></script>
	
    <!-- Custom Js -->
    <script src="../assets/js/custom-scripts.js"></script>

      
    <!-- Chart Js -->
    <script type="text/javascript" src="../assets/js/Chart.min.js"></script>  
    <script type="text/javascript" src="../assets/js/chartjs.js"></script> 

</body>

</html>