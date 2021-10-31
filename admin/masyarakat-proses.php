<?php
include ('../functions.php');
$db = new Controller();

$aksi = $_GET['aksi'];
if ( $aksi == 'tambah' ) {
    $db->inputmasyarakat($_POST['nik'], $_POST['nama'], $_POST['username'], $_POST['password'], $_POST['telp']);
    header("location:data-masyarakat.php");
}
elseif ($aksi == 'hapus') {
    $db->hapusmasyarakat($_GET['nik']);
    header("location:data-masyarakat.php");
}
elseif ( $aksi == 'update' ) {
    $db->updatemasyarakat($_POST['nik'], $_POST['nama'], $_POST['username'], $_POST['password'], $_POST['telp']);
    header("location:data-masyarakat.php");
}



?>