<?php
include "koneksi.php";
include "boot.php";

$cari = $_POST['search'];

$tampil = $konek->query("SELECT * FROM guru WHERE nama like '$cari' ");
?>
<table class="table table-hover text-center">
    <thead class="table-warning">  
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">JK</th>
            <th scope="col">mapel</th>
            <th scope="col">email</th>
            <th scope="col">password</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <?php
    while ($s = $tampil->fetch_array()) {
        @$no++;
        echo "<tr>";
        echo "<td>$no</td>";
        echo "<td>$s[nama]</td>";
        echo "<td>$s[jk]</td>";
        echo "<td>$s[mapel]</td>";
        echo "<td>$s[email]</td>";
        echo "<td>$s[password]</td>";
        echo "<td>
        <a class='btn btn-danger' href='delete.php?id=$s[no]'><i class='bi bi-trash'></i></a>
        |
        <a class='btn btn-success' href='update.php?id=$s[no]'><i class='bi bi-pencil'></i></a>
      </td>";  
        echo "</tr>";
    }
    ?>
</table>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
