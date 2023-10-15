<?php
	session_start();
	include 'koneksi.php';

	$ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan
		ON pembelian.id_pelanggan = pelanggan.id_pelanggan
		WHERE pembelian.id_pembelian = '$_GET[id]'");
	$detail = $ambil->fetch_assoc();
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
	@media print {
		.noPrint {display:none;}
	}
</style>
<body>

	<!-- navbar -->
	<?php include 'navbar.php'; ?>
	<!--    akhir navbar -->

	<!-- isi -->
	<div class="container px-4"  id="print-area-1" class="print-area">
		<h3 class="mt-5">Detail Pembelian</h3>
		<?php 
		$ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan 
			ON pembelian.id_pelanggan = pelanggan.id_pelanggan
			WHERE pembelian.id_pembelian = '$_GET[id]' ");
		$detail = $ambil->fetch_assoc();
		?>

		<!-- jika pelanggan yng beli tidk sama dengn pelanggn yng login maka masuk ke riwayat php, karna tidk bisa melihat nota orang lainn -->

		<!-- pelanggn yng beli harus pelanggn yng login -->
		<?php  
			// mendapat id pelanggn yng beli
			$idpelangganyangbeli = $detail["id_pelanggan"];
			// mendapat id pelanggn yng login
			$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

			if ($idpelangganyangbeli!==$idpelangganyanglogin) {
				echo "<script>alert('EROR')</script>";
				echo "<script>location='riwayat.php'</script>";
				exit();
			}
		?>

		
<!-- isi inti -->
<section class="konten">
	<div class="container mt-3">
		<!-- 	<h3>Keranjang Belanja</h3> -->
		<br>
		<table class="table table-bordered warna2">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subtotal</th>
				</tr>
			</thead> 
			<tbody>
				<?php $no = 1; ?>
				<?php $ambil = $conn->query("SELECT * FROM pembelian_produk WHERE id_pembelian = '$_GET[id]'"); ?>

				<?php while($pecah = $ambil->fetch_assoc()){ ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<!-- menampilkan nama data -->
						<td><?php echo $pecah['nama']; ?></td>
						<td>Rp. <?php echo number_format($pecah['harga'])?></td>
						<td><?php echo $pecah['jumlah'] ?></td>
						<td>Rp. <?php echo number_format($pecah['subharga']) ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

		<div class="row mt-5">
			<div class="col-md-4 ">
				<h3>Pembelian</h3>
				<strong>No. Pembelian: <?php echo $detail['id_pembelian'] ?></strong><br>
				Tanggal: <?php echo $detail['tanggal_pembelian']; ?><br>
				Total: Rp. <?php echo number_format($detail['total_pembelian']) ?>
			</div>
			<div class="col-md-4">
				<h3>Pelanggan</h3>
				<strong><?php echo $detail['nama_pelanggan']; ?></strong>
				<p>
					<?php echo $detail['telepon_pelanggan']; ?> <br>
				</p>
			</div>
			<div class="col-md-4">
				<h3>Pengiriman</h3>
				<strong><?php echo $detail['nama_lokasi'] ?></strong><br>
				Ongkos Kirim: Rp. <?php echo number_format($detail['tarif']); ?><br>
				Alamat: <?php echo $detail['alamat_pengiriman'] ?>
			</div>
		</div>

		
		<div class="col-md-7 mt-5">
			<div class="alert alert-info">
				<p>
					Pembayaran telah Selesai, <strong>Senilai</strong> Rp. <?php echo number_format($detail['total_pembelian']); ?>
				</p>
			</div>
			
		</div>
		
    	<!-- <button onclick="window.print()" class="btn btn-outline-dark d-grid gap-2 col-3 mx-auto mt-5" >Cetak Nota</button> -->
   </div>
</section>
</div>
</div>

	<a href="" onclick="window.print()" class="btn btn-outline-dark d-grid gap-1 col-2 mx-auto mt-5"><i class="mdi mdi-printer"></i> CETAK </a>
   <!-- <script>window.print()</script> -->
   
	 <!-- footer -->
	<div class="noPrint">
		<?php include 'footer.php' ?>
	</div>
   
</body>
</html>





