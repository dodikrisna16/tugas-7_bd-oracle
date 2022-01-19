<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['kd_jurusan'];
  $peminjam = $_POST['no_peminjam'];
  $jurusan= $_POST['jurusan'];

  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  jurusan  SET NO_PEMINJAM='".$peminjam."',JURUSAN='".$jurusan."' WHERE  KD_JURUSAN= '".$id."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Jenis Jurusan berhasil diubah'); window.location.href='jurusan.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Jenis Jurusan gagal diubah'); window.location.href='jurusan.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: jurusan.php'); 
}