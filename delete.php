<?php
$id=$_GET['id'];

include "koneksi.php";
$delete=$konek->query("DELETE FROM guru WHERE id_guru='$id'");
?>

<script>
    alert("apakah anda yakin ingin menghapus data ini")
    document.location = 'data.php';
</script>
