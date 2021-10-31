<?php 
include ('../functions.php');
$db = new Controller();

$aksi = $_GET['aksi'];
if ( $aksi == 'update' ) {
    $db->updatetanggapi($_POST['id_pengaduan']);
    $db->inputtanggapan($_POST['id_pengaduan'], $_POST['tgl_pengaduan'], $_POST['tanggapan'], $_POST['id_petugas']);
    header("location:data-tanggapan.php");
} 



?>