<?php
	session_start();
	include 'koneksi.php'; 

	// mengambil data dari id 
	$id_pembelian = $_GET["id"];

	$ambil = $conn->query("SELECT * FROM pembayaran 
		LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian 
		WHERE pembelian.id_pembelian='$id_pembelian' ");
	$detailpembayaran = $ambil->fetch_assoc();

	// memasukan id yang tidk ad di db maka akan mengeluarkan peringatan
	// if (empty($detailpem)) {
	// 	echo "<script>alert('EROR')</script>"
	// 	echo "<script>location='riwayat.php' </script>"
	// 	exit();
	// }

	// jika menginputkan id oranglain tidak sesuai dengn yng login
	if ($_SESSION["pelanggan"]['id_pelanggan']!==$detailpembayaran["id_pelanggan"]) {
		echo "<script>alert('EROR')</script>";
		echo "<script>location='riwayat.php' </script>";;
	}
?>

<!-- navbar -->
<?php include 'navbar.php'; ?>
<!--    akhir navbar -->

<!-- isi -->
<div class="container mt-5">
	<h3>Lihat Pembayaran</h3>
	<div class="row">
		<div class="col-md-6">

			<table class="table mt-3">
				<tr>
					<th>Nama</th>
					<td><?php echo $detailpembayaran["nama"]; ?></td>
				</tr>
				<tr>
					<th>Bank</th>
					<td><?php echo $detailpembayaran["bank"] ?></td>
				</tr>
				<tr>
					<th>Tanggal</th>
					<td><?php echo $detailpembayaran["tanggal"] ?></td>
				</tr>
				<tr>
					<th>Jumlah</th>
					<td>Rp. <?php echo number_format($detailpembayaran["jumlah"]) ?></td>
				</tr>
			</table>

		</div>

		<div class="col-md-6">
			<img src="bukti_pembayaran/<?php echo $detailpembayaran["bukti"] ?>" alt="fotobukti" class="w-100">
		</div>
	</div>
</div>
<!-- end isi -->

<!-- footer -->
<?php include 'footer.php' ?>



