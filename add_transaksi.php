<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id_transaksi'];
  $buku = $_POST['kd_buku'];
  $nama= $_POST['nm_buku'];
   $pinjam = $_POST['nama_peminjam'];
  $tarif = $_POST['tarif'];
	$query = "INSERT INTO transaksi (ID_TRANSAKSI,KD_BUKU,NM_BUKU,NAMA_PEMINJAM,TARIF) VALUES ('".$id."','".$buku."','".$nama."','".$pinjam."','".$tarif."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Transaksi berhasil ditambahkan'); 
	window.location.href='transaksi.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Transaksi gagal ditambahkan');
	window.location.href='transaksi.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: transaksi.php'); 
}