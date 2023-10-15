<?php 
	session_start();
	include 'koneksi.php';

	// jika blum login maka harus login dulu
	if (!isset($_SESSION["pelanggan"])) {
		echo "<script>alert('Silahkan Login Terlebih Dahulu!')</script>";
		echo "<script>location='login.php'</script>";
	}
?>

<!DOCTYPE html>
<html lang="en">  
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
      <!--bootsrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script 
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

     <!--   my css -->
     <link rel="stylesheet" href="cssuser/user.css">

    <!--  fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&family=Josefin+Sans&display=swap" rel="stylesheet">

    <title>Checkout</title>
</head>
<style>
	.warna1{
  background-color: #8E806A;
}
.warna2{
  background-color: #C3B091;
}
.warna3{
  background-color: #CEBEA5; 
}
.warna4{
  background-color: #EEEDDE;
}
</style>
<body>

	<!-- navbar -->
   <?php include 'navbar.php' ?>
   <!--    akhir navbar -->

    <!-- isi -->
    <section class="konten">
    	<div class="container mt-5">
    		<h3>Keranjang Belanja</h3>
    		<br>
    		<table class="table table-bordered warna4">
    			<thead>
    				<tr>
    					<th>No</th>
    					<th>Produk</th>
    					<th>Harga</th>
    					<th>Jumlah</th>
    					<th>Subharga</th>
    				</tr>
    			</thead>

    			<tbody>
    				<!-- perulangn -->
    				<?php $nomor=1; ?>
    				<?php $totalbelanja = 0 ?>
    				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
    				
    				<!--menampilkan perulangan dari produk yang dipilih-->
    				<?php  
    					$ambil = $conn->query("SELECT * FROM tb_product
    						WHERE product_id='$id_produk'");

    					$pecah = $ambil->fetch_assoc();

    					// perkalian sub harga
    					$subharga = $pecah["product_price"]*$jumlah;		
    					// echo "<pre>";
    					// print_r($pecah);
    					// echo "</pre>";

    				?>
    				
    				<tr>
    				    <td><?php echo $nomor; ?></td>
    				 	<td><?php echo $pecah["product_name"]; ?></td>
    				 	<td>Rp. <?php echo number_format($pecah["product_price"]); ?></td>
    				 	<td><?php echo $jumlah; ?></td>
    				 	<td>Rp. <?php echo number_format($subharga); ?></td>	
    			   </tr>
    			   <?php $nomor++; ?>
    			   <?php $totalbelanja+=$subharga; ?>
    				<?php endforeach ?>
    			</tbody>

    			<!-- menghitung jumlah pembelian -->
    			<tfoot>
    				<tr>
    					<th colspan="4">Total Belanja</th>
    					<th>Rp. <?php echo number_format($totalbelanja) ?></th>
    				</tr>
    			</tfoot>

    		</table>
    		
    		<!--kolom informasi pelanggan-->
    		<form method="post">
    			<div class="row mt-5">
				  	<div class="col-md">
				    	<div class="form-floating">
					      <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?>" class="form-control">
					      <label for="floatingInputGrid">Nama</label>
				    	</div>
				   </div>
				   <div class="col-md">
					   <div class="form-floating">
					     	<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["telepon_pelanggan"] ?>" class="form-control">
					      <label for="floatingInputGrid">No Telepon</label>
				    	</div>
				   </div>
				   <div class="col-md">
					   <div class="form-floating">
					      <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name="id_ongkir">
						      <option selected>Pilih</option>
						      <?php 
						      	$ambil = $conn->query("SELECT * FROM ongkir");

						      	//perulangan
						      	while($perongkir = $ambil->fetch_assoc()){
						       ?>
						      <option value="<?php echo $perongkir["id_ongkir"] ?>">
						      	<?php echo $perongkir['nama_lokasi'] ?>
						      	Rp. <?php echo number_format($perongkir['tarif']) ?>
						      </option>
					    		<?php } ?>
					      </select>
					      <label for="floatingSelectGrid">Ongkos Kirim</label>
					   </div>
					</div>
				</div>
				
				<!-- buat alamat -->
				<div class="form-floating mt-4">
				  	<textarea class="form-control" name="alamat_pengiriman" placeholder="masukan alamat pengiriman" id="floatingTextarea2" style="height: 80px;"></textarea>
				  	<label for="floatingTextarea2">Alamat Lengkap</label>
				</div>

				<button class="btn btn-dark mt-4 mb-5" name="checkout">Checkout</button>
    		</form>

			<!-- db ketika ingin checkout -->
    		<?php  
    		if (isset($_POST["checkout"])){

    			// pertama akan mendapatkan id pelanggan
    			$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
    			// lalu ambil id ongkir
    			$id_ongkir = $_POST["id_ongkir"];
    			//mengambil tanggal pembelian
    			$tanggal_pembelian = date("y-m-d");
    			// mengambil alamat_pengiriman
    			$alamat_pengiriman = $_POST['alamat_pengiriman'];

    			// mengambil angka dari ongkir
    			$ambil = $conn->query("SELECT * FROM ongkir Where id_ongkir='$id_ongkir'");
    			// pecahkan ke array 
    			$arrayongkir = $ambil->fetch_assoc();
    			// dapetin nama lokasi
    			$nama_lokasi = $arrayongkir['nama_lokasi'];
				// yang akan di ambil dari db yaitu tarif   
				$tarif = $arrayongkir['tarif'];			

    			//mendapatkan total belanja 
    			$total_pembelian = $totalbelanja + $tarif;
 
    			// 1. menyimpan data checkout ke  tabel pembelian
    			$conn->query("INSERT INTO pembelian (id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian, nama_lokasi, tarif, alamat_pengiriman)
    				VALUES ('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian', '$nama_lokasi', '$tarif', '$alamat_pengiriman') ");

    			// mendapatkan id pembelian yang masuk
    			$id_pembelian_barusan = $conn->insert_id;
                // prulangan saat produk keranjang belnja di simpan
    			foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {

    				// mendapatkan data produk berdasarkan id_produk
    				$ambil = $conn->query("SELECT * FROM tb_product WHERE product_id = '$id_produk' ");
    				$perproduk = $ambil->fetch_assoc();

    				$nama = $perproduk['product_name'];
    				$harga = $perproduk['product_price'];

    				$subharga = $perproduk['product_price'] * $jumlah;
    				$conn->query("INSERT INTO pembelian_produk (id_pembelian, product_id, nama, harga, subharga, jumlah)
    						VALUES ('$id_pembelian_barusan', '$id_produk','$nama','$harga','$subharga', '$jumlah') ");

                    // skrip update stok 
                    $conn->query("UPDATE tb_product SET stok_product=stok_product -$jumlah 
                        WHERE product_id='$id_produk' ");
				}

					// keranjang harus kosong ketika menekan tombol checkout
					unset($_SESSION["keranjang"]);

					//setelah perulangan maka akan masuk ke halaman nota
					// echo "<script>alert('Keranjang Kosong!')</script>";
					echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";

			}?>
    	</div>
    </section>

     <!-- footer -->
   <?php include 'footer.php' ?>

</body>
</html>