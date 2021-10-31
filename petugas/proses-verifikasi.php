<?php 
include ('../functions.php');
$db = new Controller();

$aksi = $_GET['aksi'];
if ( $aksi == 'update' ) {
    $db->updateverifikasi($_GET['id_pengaduan']);
    header("location:tanggapi-pengaduan.php");
}








?>