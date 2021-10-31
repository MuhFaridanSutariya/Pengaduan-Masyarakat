<?php

@session_start();

class Controller {
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "pengaduan_masyarakat";
    var $conn = "";

    function __construct() {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        while (mysqli_connect_errno()) {
            echo "Koneksi database Gagal : " . mysqli_connect_error();
        } 
    }
    // halaman admin
    // data admin/petugas
    function tampil_petugas() {
        $hasil = [];
        $data = mysqli_query($this->conn, "SELECT * FROM petugas");
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }   

    function inputpetugas($nama_petugas, $username, $password, $telp, $level) {
        mysqli_query($this->conn, "INSERT INTO petugas VALUES('', '$nama_petugas', '$username', '$password', '$telp', '$level')");
    }

    function hapuspetugas($id_petugas) {
        mysqli_query($this->conn, "DELETE FROM petugas WHERE id_petugas='$id_petugas'");
    }

    function editpetugas($id_petugas) {
        $hasil = [];
        $data = mysqli_query($this->conn, "SELECT * FROM petugas WHERE id_petugas='$id_petugas'");
        while ( $row = mysqli_fetch_array($data) ) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    function updatepetugas($id_petugas, $nama_petugas, $username, $password, $telp, $level) {
        mysqli_query($this->conn, "UPDATE petugas SET id_petugas='$id_petugas', nama_petugas='$nama_petugas', username='$username', password='$password', telp='$telp',  level='$level'");
    }

    // data masyarakat 
    function tampil_masyarakat() {
        $hasil = [];
        $data = mysqli_query($this->conn, "SELECT * FROM masyarakat");
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    } 

    function inputmasyarakat($nik, $nama, $username, $password, $telp) {
        mysqli_query($this->conn, "INSERT INTO masyarakat VALUES('$nik', '$nama', '$username', '$password', '$telp')");
    }

    function hapusmasyarakat($nik) {
        mysqli_query($this->conn, "DELETE FROM masyarakat WHERE nik='$nik'");
        mysqli_query($this->conn, "DELETE FROM pengaduan WHERE nik='$nik'");
    }

    function editmasyarakat($nik) {
        $hasil = [];
        $data = mysqli_query($this->conn, "SELECT * FROM masyarakat WHERE nik='$nik'");
        while ( $row = mysqli_fetch_array($data) ) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    function updatemasyarakat($nik, $nama, $username, $password, $telp) {
        mysqli_query($this->conn, "UPDATE masyarakat SET nik='$nik', nama='$nama', username='$username', password='$password', telp='$telp'");
    }

    // halaman masyarakat
    function tampil_laporan_masyarakat() {
        $hasil = [];
        $data = mysqli_query($this->conn, "SELECT * FROM pengaduan");
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    function hapuslaporan($id_pengaduan) {
        mysqli_query($this->conn, "DELETE FROM pengaduan WHERE id_pengaduan='$id_pengaduan'");
        mysqli_query($this->conn, "DELETE FROM masyarakat WHERE id_pengaduan='$id_pengaduan'");
    }

    function tampil_pengaduan()
	{
		if(@$_SESSION['nik']){
			$user_terlogin = @$_SESSION['nik'];
		  }
		$data = mysqli_query($this->conn,"select * from pengaduan WHERE nik='$user_terlogin'");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return @$hasil;
	}

    // halaman petugas

    function tampil_verifikasi() {
        $hasil = [];
        $data = mysqli_query($this->conn, "SELECT * FROM pengaduan");
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    function updateverifikasi($id_pengaduan) {
        $status = 'proses';
        mysqli_query($this->conn, "UPDATE pengaduan SET status='$status' WHERE id_pengaduan='$id_pengaduan'");
    }

    function tampil_tanggapan() {
        $hasil = [];
        $data = mysqli_query($this->conn, "SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan=pengaduan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas");
        while ( $row = mysqli_fetch_array($data) ) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    function tampil_tanggapi($id_pengaduan) {
        $hasil = [];
        $data = mysqli_query($this->conn,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik  WHERE id_pengaduan=$id_pengaduan");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return @$hasil;
    }

    function updatetanggapi($id_pengaduan) {
        $status = 'selesai';
        mysqli_query($this->conn, "UPDATE pengaduan SET status='$status' WHERE id_pengaduan='$id_pengaduan'");
    }

    function tambahtanggapan($tgl_tanggapan, $tanggapan) {
        $status = 'selesai';
        mysqli_query($this->conn, "INSERT INTO tanggapan VALUES('' , '$tgl_tanggapan', '$tanggapan', $status) ");
    }

    function inputtanggapan($id_pengaduan, $tgl_pengaduan, $tanggapan, $id_petugas) {
        mysqli_query($this->conn, "INSERT INTO tanggapan VALUES('', '$id_pengaduan', '$tgl_pengaduan', '$tanggapan', '$id_petugas')");
    }

    // registrasi
    function registrasi($nik, $nama, $username, $password, $telp) {
        mysqli_query($this->conn, "INSERT INTO masyarakat VALUES('$nik', '$nama', '$username', '$password', '$telp')");
    }
}