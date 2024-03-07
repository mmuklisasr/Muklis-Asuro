<?php
include "koneksi.php";
$id = $_GET['id_absen'];
$ubah = $konek->query("SELECT * FROM absen WHERE id_absen='$id'");
$a = $ubah->fetch_array();
?>

<?php
include "boot.php";
?>
<div class="container col-5">
    <form class="form form-control" action="" method="POST">
        <div class="mb-3">

        <label for="exampleFormControlSelect1" class="form-label">keterangan :</label>
            <select class="form-select" id="exampleFormControlSelect1" name="keterangan" required>
                <option value="" selected disabled>Pilih jenis keterangan</option>
                <option value="hadir">hadir</option>
                <option value="sakit">sakit</option>
                <option value="ijin">ijin</option>
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
    @$edit = $konek->query("UPDATE absen SET keterangan='$_POST[keterangan]' WHERE id_absen='$id'");
    echo "Data berhasil diubah. Silahkan lihat kembali data yang telah diubah. 
          <button class='btn btn-success' onclick=\"location.href='history.php'\">Kembali</button>";
}
?>
