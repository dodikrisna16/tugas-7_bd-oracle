<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['no_peminjam'];
  $petugas = $_POST['kd_petugas'];
  $nama= $_POST['nama_peminjam'];
  $alamat = $_POST['alamat_peminjam'];

  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  peminjam  SET KD_PETUGAS='".$petugas."',NAMA_PEMINJAM='".$nama."',ALAMAT_PEMINJAM='".$alamat."' WHERE  NO_PEMINJAM= '".$id."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Jenis Peminjam berhasil diubah'); window.location.href='peminjam.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Jenis Peminjam gagal diubah'); window.location.href='peminjam.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: peminjam.php'); 
}