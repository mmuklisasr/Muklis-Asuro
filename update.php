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
            <label for="exampleInputEmail1" class="form-label">Nama :</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" value="<?=$a['nama']?>">

            <label for="exampleFormControlSelect1" class="form-label">Jenis kelamin :</label>
            <select class="form-select" id="exampleFormControlSelect1" name="jk" required>
                <option value="" selected disabled>Pilih jenis kelamin</option>
                <option value="laki-laki" <?php if($a['jk'] == 'laki-laki') echo 'selected'?>>Laki-laki</option>
                <option value="perempuan" <?php if($a['jk'] == 'perempuan') echo 'selected'?>>Perempuan</option>
            </select>

            <label for="exampleInputEmail1" class="form-label">mapel :</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mapel" value="<?=$a['mapel']?>">

            <label for="exampleInputEmail1" class="form-label">alamat :</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="alamat" value="<?=$a['alamat']?>">

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
    @$edit = $konek->query("UPDATE guru SET nama='$_POST[nama]', jk='$_POST[jk]', mapel='$_POST[mapel]',  alamat='$_POST[alamat]' WHERE id_guru='$id'");
    echo "Data berhasil diubah. Silahkan lihat kembali data yang telah diubah. 
          <button class='btn btn-success' onclick=\"location.href='data.php'\">Kembali</button>";
}
?>
