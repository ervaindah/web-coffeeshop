<?php 	
session_start();

// yng di apus hanya id yang diinput
$id_produk=$_GET["id"];
unset($_SESSION["keranjang"][$id_produk]);

// echo "<script>alert('Produk Berhasil di Hapus');</script>";
echo "<script>location='keranjang.php';</script>";

?>