<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['kd_buku'];
  $nama = $_POST['nm_buku'];
  $peng= $_POST['pengarang'];
  $terbit = $_POST['penerbit'];
  $tarif = $_POST['tarif'];
  $durasi = $_POST['durasi'];

  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  buku_123  SET NM_BUKU='".$nama."',PENGARANG='".$peng."',PENERBIT='".$terbit."',TARIF='".$tarif."',DURASI='".$durasi."' WHERE  KD_BUKU= '".$id."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Jenis Buku berhasil diubah'); window.location.href='buku.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Jenis Buku gagal diubah'); window.location.href='buku.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: buku.php'); 
}