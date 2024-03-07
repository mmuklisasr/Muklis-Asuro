<?php
include "koneksi.php";
include "boot.php";


if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM guru WHERE nama LIKE '%$search%' ORDER BY id_guru DESC";
} else {
    $query = "SELECT * FROM guru ORDER BY id_guru DESC";
}

$tampil = $konek->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: #F8F8FF;">
    <h2 class="mb-4">DATA AKUN</h2>


<form action="" method="GET" class="mb-3 row">
    <div class="col-auto">
        <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan username">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Cari</button>
    </div>
</form>

<table class="table table -striped-columns">
    <thead class="table-secondary">  
        <tr>
            <th scope="col">No</th>
            <th scope="col">username</th>
            <th scope="col">password</th>
            <th scope="col">level</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <?php
    $id_guru = 0; 
    while ($s = $tampil->fetch_array()) {
        $id_guru++;
        echo "<tr>";
        echo "<td>$id_guru</td>";
        echo "<td>$s[username]</td>";
        echo "<td>$s[password]</td>";
        echo "<td>$s[level]</td>";
        echo "<td>
        <a class='btn btn-danger' href='delete_akun.php?id=$s[id_guru]'><i class='bi bi-trash'></i></a>
        |
        <a class='btn btn-success' href='update_akun.php?id=$s[id_guru]'><i class='bi bi-pencil'></i></a>
      </td>";  
        echo "</tr>";
    }
    ?>
</table>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</body>
</html>

