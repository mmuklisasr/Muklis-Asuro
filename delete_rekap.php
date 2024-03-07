<?php
$id=$_GET['id'];

include "koneksi.php";
$delete=$konek->query("DELETE FROM absen WHERE  id_absen='$id'");
?>

<script>
    alert("apakah anda yakin ingin keluar?")
    document.location = 'rekap.php';
</script>
