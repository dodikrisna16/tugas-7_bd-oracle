<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id_transaksi'];
  $buku = $_POST['kd_buku'];
  $nama= $_POST['nm_buku'];
   $pinjam = $_POST['nama_peminjam'];
  $tarif = $_POST['tarif'];

  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  transaksi  SET KD_BUKU='".$buku."',NM_BUKU='".$nama."',NAMA_PEMINJAM='".$nama."',TARIF='".$tarif."' WHERE ID_TRANSAKSI= '".$id."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Jenis Jurusan berhasil diubah'); window.location.href='transaksi.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Jenis Jurusan gagal diubah'); window.location.href='transaksi.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: transaksi.php'); 
}