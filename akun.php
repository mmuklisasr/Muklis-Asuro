<?php
include "boot.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            background-color: #33757e;
            margin:  auto; 
            width: 50%; 
            padding: 20px; 
            border-radius: 10px; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
        }
        .mb-3 {
            background-color: #33757e;
        }
        .form {
            background-color: #33757e;
        }
        body {
            background-color: #94b4b9;
        }
    </style>
</head>

<div class="container col-5">
    <form class="form form-control" action="" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama :</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" required>


            <label for="exampleInputEmail1" class="form-label">password :</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password" required>

            <label for="exampleFormControlSelect1" class="form-label">role :</label>
            <select class="form-select" id="exampleFormControlSelect1" name="level" required>
                <option value="" selected disabled>Pilih jenis level</option>
                <option value="admin">admin</option>
                <option value="user">user</option>
            </select>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </div>
        </div>
    </form>
</div>

<?php
include "koneksi.php";

@$username = $_POST['username'];
@$password = $_POST['password'];
@$level = $_POST['level'];

if ($username == "") {
    $pesan = "Maaf, data wajib diisi.";
} else {
    $simpan = $konek->query("INSERT INTO guru (username, password, level) VALUES ('$username', '$password', '$level')");
    if ($simpan) {
        $pesan = "Data berhasil disimpan.";
    } else {
        $pesan = "Gagal menyimpan data.";
    }
}

if (isset($pesan)) {
    echo "<p>$pesan</p>";
}
?>