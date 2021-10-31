<?php 
    session_start();
    if ( !isset($_SESSION["petugas"]) ) {
        header("Location: ../login.php");
        exit;
    }

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
    <title>Halaman Petugas</title>
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
                <a class="navbar-brand" href="beranda-admin.php"><strong>USER ADMIN</strong></a>
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
                        <a class="active-menu" href="beranda-petugas.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="verifikasi-pengaduan.php"><i class="fa fa-check-square-o"></i> Verifikasi Pengaduan</a>
                    </li>
                    <li>
                        <a href="tanggapi-pengaduan.php"><i class="fa fa-edit"></i>Tanggapi Pengaduan</a>
                    </li> 
                    <li>
                        <a href="data-tanggapan.php"><i class="fa fa-desktop"></i>Data Tanggapan</a>
                    </li> 
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            Data Masyarakat
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="tanggapi-pengaduan.php">Tanggapi Pengaduan</a></li>
					</ol> 
									
		</div>
            <div id="page-inner">
            <div class="row">
                        <div class="col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="card-title">
                                        <div class="title">Tanggapi Laporan</div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form action="proses-tanggapi.php?aksi=update" method="POST">
                                        <?php foreach($db->tampil_tanggapi($_GET['id_pengaduan']) as $d) : ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Id Pengaduan</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Petugas" name="id_pengaduan" value="<?php echo $d["id_pengaduan"] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Pengaduan</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Petugas" name="tgl_pengaduan" value="<?php echo $d["tgl_pengaduan"] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Pelapor</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Petugas" name="nama" value="<?php echo $d["nama"] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Isi Laporan</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password" name="isi_laporan" value="<?php echo $d["isi_laporan"] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Foto</label><br>
                                            <img src="../uploads/<?php echo $row['foto'] ?>" width="100" height="100">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tanggal Tanggapan</label>
                                            <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password" name="tgl_tanggapan">
                                        </div>
                                        <div class="form-group">
                                            <?php if(@$_SESSION['petugas']){
                                                $user_terlogin = @$_SESSION['petugas'];
                                                // var_dump($user_terlogin);
                                            }?>
                                                <input type="text" name="id_petugas" id="id_petugas" value="<?php echo @$user_terlogin ?>" class="form-control" readonly>
                                            </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tulis Tanggapan </label><br>
                                            <textarea name="tanggapan" cols="30" rows="7" class="form-control"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    <?php endforeach; ?>
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