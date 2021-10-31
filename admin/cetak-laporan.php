<?php   
session_start();
if ( !isset($_SESSION["admin"]) ) {
    header("Location: ../login.php");
    exit;
}

include('../functions.php');
$db = new Controller();
$dt_masyarakat = $db->tampil_tanggapan();
?>
<div class="table-responsive">
<title>Cetak Laporan</title>
<center>
    <h4>CETAK LAPORAN TANGGAPAN</h4>
    <table border="1" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Tanggapan</th>
                                            <th>Isi Pengaduan</th>
                                            <th>Tanggapan Petugas</th>
                                            <th>Nama Petugas</th>
                                            <th>Status</th>  
                                        </tr>
                                    </thead>
                                    <?php 
                                        $no=1;
                                        foreach ((array) $dt_masyarakat as $row){
                                        // foreach ($dt_masyarakat as $row){ 
                                     ?>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td><?= $no++?></td>
                                            <td><?= $row['tgl_pengaduan'];?></td>
                                            <td><?= $row['isi_laporan'];?></td>
                                            <td class="center"><?= $row['tanggapan'];?></td>
                                            <td class="center"><?= $row['nama_petugas'];?></td>
                                            <td class="center"><?= $row['status'];?></td>
                                        </tr>
                                    </tbody>
                                    <?php } ?>
    </table>
<style>

</style>
<h4 style="text-align:right">Sangatta, <?php echo date('d-m-Y');?></h4>
<br>

<h4 style="text-align:right">Pimpinan</h4>
    <script>
        window.print();
    </script>
</center>