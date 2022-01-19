<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
   $id = $_POST['kd_petugas'];
  $nama = $_POST['nm_petugas'];
  $tlp= $_POST['nomor_tlpn'];

  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  petugas  SET NM_PETUGAS='".$nama."',NOMOR_TLPN='".$tlp."' WHERE  KD_PETUGAS= '".$id."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Petugas berhasil diubah'); window.location.href='petugas.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Petugas gagal diubah'); window.location.href='petugas.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: petugas.php'); 
}