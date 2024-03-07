<?php
include "koneksi.php";
$id = $_GET['id'];
$ubah = $konek->query("SELECT * FROM guru WHERE id_guru='$id'");
$a = $ubah->fetch_array();
?>

<?php
include "boot.php";
?>
<div class="container col-5">
    <form class="form form-control" action="" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">username :</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" value="<?=$a['username']?>">
    
            <label for="exampleInputEmail1" class="form-label">password :</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password" value="<?=$a['password']?>">

            <label for="exampleFormControlSelect1" class="form-label">role :</label>
            <select class="form-select" id="exampleFormControlSelect1" name="level" required>
                <option value="" selected disabled>Pilih jenis level</option>
                <option value="admin">admin</option>
                <option value="user">user</option>
            </select>

            <div class="text-end">
                <button type="submit" class="btn btn-primary mt-3" name="ganti">Simpan</button>
            </div>
        </div>
    </form>
</div>

<?php
if (!isset($_POST['ganti'])) {
    echo "Silahkan ubah data.";
} else {
    @$edit = $konek->query("UPDATE guru SET username='$_POST[username]', password='$_POST[password]', level='$_POST[level]' WHERE id_guru='$id'");
    echo "Data berhasil diubah. Silahkan lihat kembali data yang telah diubah. 
          <button class='btn btn-success' onclick=\"location.href='dataakun.php'\">Kembali</button>";
}
?>
