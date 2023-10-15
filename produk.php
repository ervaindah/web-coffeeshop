<?php 
   include 'koneksi.php';

   session_start();
   // // jika blum login maka harus login dulu
   // if (!isset($_SESSION["pelanggan"])) {
   //    echo "<script>alert('Silahkan Login Terlebih Dahulu!')</script>";
   //    echo "<script>location='login.php'</script>";
   // }

   $querykategori = mysqli_query($conn, "SELECT * FROM tb_category");

   // get produk dengan nama produk/keyword 
   if (isset($_GET['keyword'])){
      $queryproduk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_name LIKE '%$_GET[keyword]%' ");
   }

   // get produk dengan cara menekan kategori
   else if(isset($_GET['kategori'])) {

      // mengambil id kategori yng dimasukan
      $querygetkategoriid = mysqli_query($conn, "SELECT category_id FROM tb_category WHERE category_name='$_GET[kategori]' ");
      $kategoriid = mysqli_fetch_array($querygetkategoriid);

      $queryproduk = mysqli_query($conn, "SELECT * FROM tb_product WHERE category_id='$kategoriid[category_id]' ");
    }

   // get produk secara default 
   else{
      $queryproduk = mysqli_query($conn, "SELECT * FROM tb_product");
   } 

   // ketika tidak menemukan barang yang dicari maka memakai cara ini
   $countdata = mysqli_num_rows($queryproduk);
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

    <title>Produk</title>
  </head>
<style>
   .no-decoration{
      text-decoration: none;
      color: black;
</style>
<body>
   <!-- navbar -->
   <?php 
      include 'navbar.php';
   ?>
   <!--    akhir navbar -->

   <!--   banner -->  
   <div class="container-fluid banner-produk d-flex align-items-center">
      <div class="container">
         <h1 class="text-white text-center">Menu</h1> 
      </div>
   </div>
   <!--  akhir banner -->

    <!-- body -->
   <div class="container py-5">
      <div class="row">
         <!-- bagian kategori -->
         <div class="col-lg-3 mb-5">
            <h4>Kategori</h4>
            <ul class="list-group">
               <!-- melakukan perulangan untuk kategori -->
               <?php 
                  while($kategori = mysqli_fetch_array($querykategori)){
                ?>
               <a class="no-decoration mt-3" href="produk.php?kategori=<?php echo $kategori['category_name']; ?>">
                  <li class="list-group-item"><?php echo $kategori['category_name']; ?></li>
               </a>
               <?php } ?>
            </ul>
         </div>

         <!-- bagian tampilan produk -->
         <div class="col-lg-9">
            <h3 class="text-center mb-3">Produk</h3>
            <div class="row">

               <!-- kondisi ketika mencari barang di tombol search -->
               <?php 
                  if ($countdata<1) {
               ?>
                  <h4 class="text-center my-5">Maaf Saat Ini Produk Yang Anda Cari Kosong</h4>
               <?php } ?>

               <!-- perulangan untuk produk -->
               <?php 
                  while ($produk = mysqli_fetch_array($queryproduk)) {
               ?>
               <div class="col-md-4 mb-4 text-center">
                  <div class="card h-100">
                     <div class="image-box">
                        <!-- menampilkan foto -->
                        <img src="foto-produk/<?php echo $produk['product_image']; ?>" class="card-img-top" alt="">
                     </div>

                     <div class="card-body">
                     <!-- menampilkan nama produk -->
                        <h5 class="card-title"><?php echo $produk['product_name']; ?></h5>

                        <!--  menampilkan deskripsi -->
                        <p class="card-text text-truncate"><?php echo $produk['product_description']; ?></p>

                       <!--  untuk harga -->
                        <p class="card-text text-harga">Rp. <?php echo number_format($produk['product_price']); ?></p>

                         <!-- tombol -->
                        <a href="produk-detail.php?id=<?php echo $produk['product_id']; ?>" class="btn btn-dark text-white my-3">Lihat Detail</a>
                        <a href="beli.php?id=<?php echo $produk['product_id']; ?>" class="btn btn-dark text-white">Beli</a>
                     </div>
                  </div>
               </div>
               <?php } ?>

            </div>
         </div>
      </div>      
   </div>
    <!-- end body -->

  

    <!-- footer -->
   <?php include 'footer.php' ?>
   
  </body>
</html>

