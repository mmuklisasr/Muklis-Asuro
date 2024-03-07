<?php
include "koneksi.php";
include "boot.php";
session_start();

$username = $_SESSION['username'];

$tampil = $konek->query("SELECT foto FROM guru WHERE username = '$username'");
$poto = $tampil->fetch_array();

if (!isset($_SESSION['username'])) {
    header('location:index.php');
    exit();
}

include "../app/boot.php";
$tampil = $konek->query("SELECT * FROM guru where username like '%$username%'");
if ($tampil->num_rows > 0) {
    $level = $tampil->fetch_array();
} else {
    
    echo "Data guru tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absen</title>
   
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
    </style>
</head>

<body style="background-color: #94b4b9;">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../images/<?=$poto['foto']?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $username; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">SILAHKAN ABSEN </h6>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <select class="form-select" aria-label="Default select example" name="alasan_absen">
                                    <option value="hadir">Hadir</option>
                                    <option value="sakit">Sakit</option>
                                    <option value="ijin">Ijin</option>
                                </select>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary" name="absen">Absen</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['absen'])) {
                            
                            $tanggal_sekarang = date("Y-m-d");

                           
                            $cek_absen = $konek->query("SELECT * FROM absen WHERE nama = '$username' AND DATE(waktu_kehadiran) = '$tanggal_sekarang'");
                            
                            
                            if ($cek_absen->num_rows > 0) {
                                $pesan = "Maaf, Anda sudah melakukan absen hari ini.";
                            } else {
                                $alasan_absen = $_POST['alasan_absen'];
                                if ($alasan_absen == "") {
                                    $pesan = "Maaf, data wajib diisi.";
                                } else {
                                    $simpan = $konek->query("INSERT INTO absen (id_absen, nama, id_guru, keterangan, waktu_kehadiran) VALUES (NULL, '$username', '$level[id_guru]', '$alasan_absen', '$tanggal_sekarang');");
                                    if ($simpan) {
                                        $pesan = "Absen berhasil disimpan.";
                                    } else {
                                        $pesan = "Gagal menyimpan absen.";
                                    }
                                }
                            }

                            
                            if (isset($pesan)) {
                                echo "<p>$pesan</p>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
