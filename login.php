<?php 
session_start();
include 'koneksi.php';
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

	<title>login</title>
	</head>

<body>

	<!-- navbar -->
   	<?php include 'navbar.php'; ?>
   <!--    akhir navbar -->

		<!-- isi -->
		<main class="d-flex w-100">
			<div class="container d-flex flex-column">
				<div class="row vh-100">
					<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
						<div class="d-table-cell align-middle">

							<div class="text-center mt-4">
								<!-- <h1 class="h2">Welcome back, Charles</h1> -->
								<p class="lead">
									Masukan Akun anda Untuk Berbelanja
								</p>
							</div>

							<div class="card">
								<div class="card-body">
									<div class="m-sm-4">
										<div class="text-center">
											<img src="cssuser/logocoffee.png" alt="Logo" class="img-fluid rounded-circle" width="152" height="152" />
										</div>
										<form method="post">
											<div class="mb-3">
												<label class="form-label">Username</label>
												<input class="form-control form-control-lg" type="text" name="username" placeholder="Enter your username" />
											</div>
											<div class="mb-3">
												<label class="form-label">Password</label>
												<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
											</div>

										<!-- <div>
											<label class="form-check">
								            <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
								            <span class="form-check-label">
								              Remember me next time
								            </span>
								         </label>
								      </div> -->
								      <div class="text-center mt-4">
								      	<button type="submit" class="btn warna2" name="submit">Login</button>
								      	<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
								      </div>	
								      <div class="mt-3 text-center">
								      	<small class="">
								      		Anda Belum Memiliki akun?
								      		<a href="daftar.php">Daftar</a>
								      	</small>
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


	<?php 
 	// jika ada menekan login/simpan ada pengkodisian
	if (isset($_POST["submit"])){

		$username = $_POST["username"];
		$password = $_POST["password"];

		// lakukan query/ngecek akun user apakah dalam db, yang dimana ada username dn password
		$ambil = $conn->query("SELECT * FROM pelanggan WHERE nama_pelanggan='$username' AND password_pelanggan='$password'");

		// ngitung akun yang keambil
		$akuncocok = $ambil->num_rows;

		// jika ada satu akun yng cocok maka boleh login
		if ($akuncocok==1) {
			// mendapatkan akun dlm bentuk array
			$akun = $ambil->fetch_assoc();
			// lalu simpan akun yng login di session pelanggan
			$_SESSION["pelanggan"] = $akun;
			// echo"<script>alert('Wellcome');</script>";

			// jika sudah belanja
			if (isset ($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) {
				echo"<script>location='checkout.php'</script>";
			}else{
				echo "<script>location='riwayat.php'</script>";
			}
			

		}else{
			// jika tidak cocok maka akan tetap di halaman login
			echo"<script>alert('Username atau Passsword Anda Salah');</script>";
			echo"<script>location='login.php'</script>";
		}
	}
	?>

</body>
</html>