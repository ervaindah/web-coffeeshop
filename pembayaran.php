<?php
	session_start();
	include 'koneksi.php'; 

	// jika belum login
	if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
		echo "<script>alert('Silahkan Login terlebih Dahulu')</script>";
		echo "<script>location='login.php'</script>";
		exit();
	}

	// mendapatkan id pembelian
	$idpem = $_GET["id"];
	$ambil = $conn->query("SELECT * FROM pembelian WHERE id_pembelian = '$idpem' ");
	$detpem = $ambil->fetch_assoc(); 

	// mendapatkan id pelanggan yng beli 
	$id_pelanggan_beli = $detpem["id_pelanggan"];
	// mendapatkan id_pelanggan yng login 
	$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

	if ($id_pelanggan_login !== $id_pelanggan_beli) {
		echo "<script>alert('EROR')</script>";
		echo "<script>location='riwayat.php'</script>";
		exit();
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

	<title>pembayaran</title>
</head>

<body>

	<!-- navbar -->
   	<?php include 'navbar.php'; ?>
   <!--    akhir navbar -->

   <div>
   	<main class="d-flex w-300">
			<div class="container d-flex flex-column">
				<div class="row vh-300">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
								<!-- <h1 class="h2">Welcome back, Charles</h1> -->
							<p class="lead"><h2>Konfirmasi Pembayaran</h2></p>
							<p class="lead">Kirim Bukti Pembayaran Anda di Sini</p>
						</div>

							<div class="card mt-4">
								<div class="card-body">
									<div class="m-sm-4">
										<form method="post" enctype="multipart/form-data">
											<div class="alert alert-info">Total Tagihan Anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong></div>
											<div class="mb-3">
												<label class="form-label">Nama Pelanggan</label>
												<input class="form-control form-control-lg" type="text" name="nama"  />
											</div>
											<div class="mb-3">
												<label class="form-label">Bank</label>
												<input class="form-control form-control-lg" type="text" name="bank"/>
											</div>
											<div class="mb-3">
												<label class="form-label">Total</label>
												<input class="form-control form-control-lg" type="number" name="jumlah" min="1"/>
											</div>
											<div class="mb-3">
												<label class="form-label">Foto Bukti</label>
												<input class="form-control form-control-lg" type="file" name="bukti"/>
												<p class="text-danger">Foto bukti harus berformat JPG Maksimak 2mb</p>
											</div>

									      <div class="text-center mt-4">
									      	<button class="btn btn-dark" name="kirim">Kirim</button>
									      	<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
									      </div>
								   	</form>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</main>
	</div>


								   	<?php
								   		// jika ada tombol kirim  
								   		if (isset($_POST["kirim"])) {
								   			// upload dulu foto bukti
								   			$namabukti = $_FILES["bukti"]["name"];
								   			$lokasibukti = $_FILES["bukti"]["tmp_name"];
								   			$namafiks = date("YmdHis").$namabukti;
								   			move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

								   			$nama = $_POST["nama"];
								   			$bank = $_POST["bank"];
								   			$jumlah = $_POST["jumlah"];
								   			$tanggal = date("Y-m-d");

								   			// simpan pembayaran
								   			$conn->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
								   			 VALUES ('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafiks') ");

								   			// update data pembelian
								   			$conn->query("UPDATE pembelian SET status_pembelian = 'Pembayaran Selesai' 
								   				WHERE id_pembelian='$idpem' ");
								   			echo "<script>alert('Terimakasih')</script>";
												echo "<script>location='riwayat.php'</script>";
											}
								   	?>



	 <!-- footer -->
   <?php include 'footer.php' ?>
   								   	
</body>
</html>


