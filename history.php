<?php
include "koneksi.php";
include "boot.php";


if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT guru.*, 
              SUM(CASE WHEN absen.keterangan = 'hadir' THEN 1 ELSE 0 END) AS total_hadir,
              SUM(CASE WHEN absen.keterangan = 'sakit' THEN 1 ELSE 0 END) AS total_sakit,
              SUM(CASE WHEN absen.keterangan = 'ijin' THEN 1 ELSE 0 END) AS total_ijin
              FROM guru LEFT JOIN absen ON guru.nama = absen.nama 
              WHERE guru.nama LIKE '%$search%' 
              GROUP BY guru.id_guru
              ORDER BY guru.id_guru DESC"; 
} else {
    $query = "SELECT guru.*, 
              SUM(CASE WHEN absen.keterangan = 'hadir' THEN 1 ELSE 0 END) AS total_hadir,
              SUM(CASE WHEN absen.keterangan = 'sakit' THEN 1 ELSE 0 END) AS total_sakit,
              SUM(CASE WHEN absen.keterangan = 'ijin' THEN 1 ELSE 0 END) AS total_ijin
              FROM guru LEFT JOIN absen ON guru.nama = absen.nama 
              GROUP BY guru.id_guru
              ORDER BY guru.id_guru DESC";
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

<body  style="background-color: #F8F8FF;">
    <h2 class="mb-4">REKAP ABSEN</h2>

    
    <form action="" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama guru">
            <button type="submit" class="btn btn-primary btn-sm">Cari</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table -striped-columns">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Foto</th> 
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Mata Pelajaran</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Total Hadir</th>
                    <th scope="col">Total Sakit</th>
                    <th scope="col">Total Ijin</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id_guru = 0;
                while ($s = $tampil->fetch_array()) {
                    $id_guru++;
                ?>
                <tr>
                    <td><?php echo $id_guru; ?></td>
                    <td><img src="../images/<?php echo $s['foto']; ?>" alt="<?php echo $s['nama']; ?>" class="img-thumbnail" width="100"></td> <!-- Menampilkan foto -->
                    <td><?php echo $s['nama']; ?></td>
                    <td><?php echo $s['jk']; ?></td>
                    <td><?php echo $s['mapel']; ?></td>
                    <td><?php echo $s['alamat']; ?></td>
                    <td><?php echo $s['total_hadir']; ?></td>
                    <td><?php echo $s['total_sakit']; ?></td> 
                    <td><?php echo $s['total_ijin']; ?></td>
                    <td>
                        <a class='btn btn-danger btn-sm' href='rekap.php?id=<?php echo $s['id_guru']; ?>'><i class='bi bi-eye'></i></a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</body>
</html>
