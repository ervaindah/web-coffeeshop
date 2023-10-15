<?php
session_start();
//mendapatkan id produk
$id_produk  = $_GET['id'];

//jika sudah ad produk di keranjang maka jumlhny 1
if(isset($_SESSION['keranjang'][$id_produk])){
	$_SESSION['keranjang'][$id_produk]+=1;
}
//jika blum ada di keranjang maka produk dianggap baru dibeli 1
else{
	$_SESSION['keranjang'][$id_produk] = 1;
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
// lalu masuk ke halaman keranjang

// echo "<script>alert('produk telah ditambahkan');</script>";
echo "<script>location='keranjang.php';</script>";

?>