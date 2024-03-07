<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    header('location:index.php');
    exit();
}

$id_guru = $_GET['id'];

$tampil_guru = $konek->query("SELECT * FROM guru WHERE id_guru = '$id_guru'");
$data_guru = $tampil_guru->fetch_array();

if ($data_guru) {
    $nama_guru = $data_guru['nama'];
    $level_guru = $data_guru['level'];

    if ($level_guru != 'admin') {
      
        $total_bulanan_query = "SELECT MONTH(waktu_kehadiran) AS bulan, 
                                      YEAR(waktu_kehadiran) AS tahun,
                                      SUM(CASE WHEN keterangan = 'hadir' THEN 1 ELSE 0 END) AS total_hadir,
                                      SUM(CASE WHEN keterangan = 'sakit' THEN 1 ELSE 0 END) AS total_sakit,
                                      SUM(CASE WHEN keterangan = 'ijin' THEN 1 ELSE 0 END) AS total_ijin
                               FROM absen
                               WHERE nama LIKE '%$nama_guru%'
                               GROUP BY YEAR(waktu_kehadiran), MONTH(waktu_kehadiran)
                               ORDER BY YEAR(waktu_kehadiran) DESC, MONTH(waktu_kehadiran) DESC";
        $result_total_bulanan = $konek->query($total_bulanan_query);

       
        echo "<h2>Rekap Absen - $nama_guru</h2>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Bulan</th>";
        echo "<th>Total Hadir</th>";
        echo "<th>Total Sakit</th>";
        echo "<th>Total Ijin</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result_total_bulanan->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . date("F Y", mktime(0, 0, 0, $row['bulan'], 1, $row['tahun'])) . "</td>";
            echo "<td>" . $row['total_hadir'] . "</td>";
            echo "<td>" . $row['total_sakit'] . "</td>";
            echo "<td>" . $row['total_ijin'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";

       
        $tampil_absen = $konek->query("SELECT * FROM absen WHERE nama LIKE '%$nama_guru%' ORDER BY waktu_kehadiran DESC");

        
        echo "<div class='table-responsive'>";
        echo "<table class='table table-hover text-center table-bordered'>";
        echo "<thead class='table-warning'>";
        echo "<tr>";
        echo "<th scope='col'>No</th>";
        echo "<th scope='col'>Nama</th>";
        echo "<th scope='col'>Keterangan</th>";
        echo "<th scope='col'>Waktu Kehadiran</th>";
        echo "<th scope='col'>Aksi</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        $id_absen = 0;
        while ($s = $tampil_absen->fetch_array()) {
            $id_absen++;
            echo "<tr>";
            echo "<td>$id_absen</td>";
            echo "<td>$s[nama]</td>";
            echo "<td>$s[keterangan]</td>";
            echo "<td>$s[waktu_kehadiran]</td>";
            echo "<td><a href='update_rekap.php?id_absen=$s[id_absen]' class='btn btn-primary'><i class='bi bi-pencil'></i> Update</a></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<h2>Data guru level admin tidak ditampilkan</h2>";
    }
} else {
    echo "<h2>Data guru tidak ditemukan</h2>";
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap
