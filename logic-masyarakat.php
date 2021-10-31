<?php 
@session_start();

$conn = mysqli_connect("localhost", "root", "", "pengaduan_masyarakat");

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($conn, "SELECT * FROM masyarakat WHERE username='$username' AND password='$password'");

if ( mysqli_num_rows($data) >= 1 ) {
    $query = mysqli_fetch_array($data);
    $_SESSION['nik'] = $query['nik'];
    header("location:masyarakat/beranda-masyarakat.php");
} else {
    echo "
    
    ";
    header("location:index.php");
}











?>