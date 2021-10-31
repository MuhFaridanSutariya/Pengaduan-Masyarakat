<?php
include ('functions.php');
$db = new Controller();

$aksi = $_GET['aksi'];
if ( $aksi == 'tambah' ) {
    $db->registrasi($_POST['nik'], $_POST['nama'], $_POST['username'], $_POST['password'], $_POST['telp']);
    header("location:index.php");
}