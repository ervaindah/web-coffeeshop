<?php 
	
	// hapus data kategori
	include 'db.php';

	//jika ad kiriman id maka di delet
	if(isset($_GET['idk'])){
		$delete = mysqli_query($conn, "DELETE FROM tb_category WHERE category_id = '".$_GET['idk']."' ");

		// setelah didelet maka dikembali ke data kategori
		echo '<script>window.location="data-kategori.php"</script>';
	}

	// // hapus data produk
	if(isset($_GET['idp'])){
		
	//sebelum menggunakan unlink untuk hapus foto maka harus diambil dulu data produk yng diapusnya
	$produk = mysqli_query($conn, "SELECT product_image FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
		//lalu disimpan di variabel p dalam bentuk objek
	$p = mysqli_fetch_object($produk);

	//ketika diapus maka foto di galeri ikut terhapus
	unlink('../foto-produk/'.$p->product_image);

	$delete = mysqli_query($conn, "DELETE FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
	echo '<script>window.location="data-produk.php"</script>';
	}
?>