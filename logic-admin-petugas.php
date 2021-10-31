<?php 
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "pengaduan_masyarakat");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysqli_query($conn, "SELECT * FROM petugas WHERE username='$username' AND password='$password'");

    $data = mysqli_fetch_array($sql);

    $cek = mysqli_num_rows($sql);

    if ( $cek > 0 ) {
        if ( $data['level'] == "admin" ) {
            @$_SESSION['admin'] = $data['id_petugas'];
            header("location: admin/beranda-admin.php");
        } elseif ( $data['level'] == "petugas" ) {
            @$_SESSION['petugas'] = $data['id_petugas'];
            header("location: petugas/beranda-petugas.php");
        }
    } else {
        header("location:login.php");
    }










?>