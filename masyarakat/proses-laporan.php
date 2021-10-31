<?php 
@session_start();
include('../functions.php');
$db = new Controller();


if(@$_SESSION['nik']){
        $user_terlogin = @$_SESSION['nik'];
  }
 $koneksi = mysqli_connect("localhost","root","","pengaduan_masyarakat");

$aksi = $_GET['aksi'];
if($aksi == "tambah"){    
        $tgl_pengaduan = $_POST['tgl_pengaduan'];
        $nik = $user_terlogin;
        $status ="0";
        $isi_laporan = $_POST['isi_laporan'];
        $gambar = $_FILES['foto']['name'];
        $file_tmp = $_FILES['foto']['tmp_name']; 
        $gambar_baru =$gambar;
                move_uploaded_file($file_tmp, '../uploads/'.$gambar_baru);
                mysqli_query($koneksi,"INSERT INTO pengaduan VALUES('','$tgl_pengaduan','$nik','$isi_laporan','$gambar_baru','$status')");
                header("location:data-pengaduan.php");     
}elseif ( $aksi == 'hapus' ) {
    $db->hapuslaporan($_GET['id_pengaduan']);
    header("location:data-pengaduan.php");
}
