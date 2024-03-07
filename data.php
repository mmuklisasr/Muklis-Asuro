<?php
include "koneksi.php";
session_start();

$username = $_SESSION['username'];

$tampil = $konek->query("SELECT * FROM guru WHERE username = '$username'");
$level = $tampil->fetch_array();

if (!isset($_SESSION['username'])) {
    header('location:index.php');
    exit();
} 
?>

<?php
include "koneksi.php";
include "boot.php";

if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $tampil = $konek->query("SELECT * FROM absen WHERE keterangan LIKE '%$search%' ORDER BY id_guru DESC");
} else {
    $tampil = $konek->query("SELECT * FROM absen WHERE nama = '$username' ORDER BY id_guru DESC");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: #94b4b9;">
    <h2 class="mb-4">riwayat absen</h2>
<style>
    .table{
        background-color: #94b4b9;
    }
</style>

<!-- Hapus Form pencarian -->
<!-- <form action="" method="GET" class="mb-3 row">
    <div class="col-auto">
        <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan keterangan">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Cari</button>
    </div>
</form> -->

<table class="table table-hover table-bordered text-center">
    <thead class="table-secondary">  
        <tr>
            <th scope="col">No</th>
            <th scope="col">nama</th>
            <th scope="col">keterangan</th>
            <th scope="col">waktu_kehadiran</th>
        </tr>
    </thead>
    <?php
    while ($s = $tampil->fetch_array()) {
        @$id_absen++;
        echo "<tr>";
        echo "<td>$id_absen</td>";
        echo "<td>$s[nama]</td>";
        echo "<td>$s[keterangan]</td>";
        echo "<td>$s[waktu_kehadiran]</td>";
        
        echo "</tr>";
    }
    ?>
</table>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</body>
</html>
