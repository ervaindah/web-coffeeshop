<?php 
	session_start();

	include 'koneksi.php';
?>

<!DOCTYPE HTML>
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

    <title>Keranjang</title>
</head>

<body>

   <!-- navbar -->
	<?php 
      include 'navbar.php'; 
   ?>
	<!--    akhir navbar -->

    <section class="konten">
    	<div class="container mt-5">
    		<h3>Keranjang Belanja</h3>
    		<br>
         <div class="table-responsiv">
       		<table class="table table-bordered warna4 table-hover  text-center mb-5">
       			<thead>
       				<tr>
       					<th>No</th>
       					<th>Produk</th>
       					<th>Harga</th>
       					<th>Jumlah</th>
       					<th>Subharga</th>
       					<th>Aksi</th>
       				</tr>
       			</thead>

       			 <tbody>
                  <!-- perulangn -->
                  <?php if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])): ?>
                        <div class="alert alert-danger mt-3" role="alert">
                        Produk kosong, Silahkan Belanja Terlebih Dahulu!
                     </div>

                     <?php else: ?> 
                         <?php $nomor=1; ?>
                  <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
                  
                  
                  <!--menampilkan perulangan dari produk yang dipilih-->
                  <?php  
                     $ambil = $conn->query("SELECT * FROM tb_product WHERE product_id='$id_produk'");
                     $pecah = $ambil->fetch_assoc();
                     $subharga = $pecah["product_price"]*$jumlah;
                     ?>
                     
                        <tr>
                            <td><?php echo $nomor; ?></td>
                          <td><?php echo $pecah["product_name"]; ?></td>
                          <td>Rp. <?php echo number_format($pecah["product_price"]); ?></td>
                          <td><?php echo $jumlah; ?></td>
                          <td>Rp. <?php echo number_format($subharga); ?></td>
                          <td>
                            <a href="hapuskeranjang.php?id=<?php echo $id_produk?>" class="btn btn-danger d-grid gap-2 col-8 mx-auto">Hapus</a>
                            
                          </td> 
                          </tr>
                          <?php $nomor++; ?>
                          <?php endforeach ?>
                      
                     <?php endif ?>
                  

                 
               </tbody>
            </table>
         </div>
    		<a href="index.php" class="btn btn-dark d-grid gap-2 col-3 mx-auto mt-5 mb-4">Lanjut Belanja</a>
    		<a href="checkout.php" class="btn btn-primary d-grid gap-2 col-3 mx-auto mb-4">Checkout</a>
    	</div>
    </section>

    <!-- footer -->
   <?php include 'footer.php' ?>


  </body>
</html>