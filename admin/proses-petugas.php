<?php

include ('../functions.php');
$db = new Controller();

$aksi = $_GET['aksi'];
if ( $aksi == 'tambah' ) {
    $db->inputpetugas($_POST['nama_petugas'], $_POST['username'], $_POST['password'], $_POST['telp'], $_POST['level']);
    header("location:data-petugas.php");
}
elseif ($aksi == 'hapus') {
    $db->hapuspetugas($_GET['id_petugas']);
    header("location:data-petugas.php");
}
elseif ( $aksi == 'update' ) {
    $db->updatepetugas($_POST['id_petugas'], $_POST['nama_petugas'], $_POST['username'], $_POST['password'], $_POST['telp'], $_POST['level'] );
    header("location:data-petugas.php");
}