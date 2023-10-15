<?php
   // untuk login
   session_start();
   // koneksi database
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
   
     <!--   my css -->
     <link rel="stylesheet" href="cssuser/user.css">

    <!--  fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&family=Josefin+Sans&family=Noto+Sans+TC:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&family=Josefin+Sans&family=Lexend+Deca:wght@300&family=Noto+Sans+TC:wght@300&display=swap" rel="stylesheet">

    <title>Coffee Shop</title>
  </head>
<style>
   /*halaman user*/
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
   
  /* #home{
      margin-top: -126px;
   }*/
/*#home .carousel-caption{
   top: 25rem;
}*/
   
.text-content h2{
   font-family: 'Lexend Deca', sans-serif;
}

.text-content p{
   font-family: 'Noto Sans TC', sans-serif;
   font-size: 20px;
}

/*nav*/
#home .carousel-caption{
   top:25rem;
}

/*#hero h3{
  text-align: center;
  margin-top: 230px;
}*/
.nav-link{
  text-transform: uppercase; /*biar tulisan nav jadi besar semua*/
  margin-right: 10px;
}
/*.start{
   margin-left: 27px;
}*/
.logohuruf{
   margin-left: 100px;
}
.no-decoration{
  text-decoration: none;
  color: black;

</style>
<body>
   <!-- navbar -->
   <?php include 'navbar.php'; ?>
   <!--    akhir navbar -->

<!-- section 1 banner -->

<section id="home">
  <div id="carouselExampleControls " class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div  class="carousel-item active">
        <img src="cssuser/asli3.jpeg" class="d-block w-100" alt="img1">
         <div class="carousel-caption text-center">
            <div class="col-md-8 offset-md-2">
               <form method="get" action="produk.php">
                  <div class="input-group input-group-lg my-4">
                             <input type="text" class="form-control" placeholder="coffe" aria-label="Recipient's  username" aria-describedby="basic-addon2" name="keyword"><br>
                  </div>
                  <button type="submit" class="btn btn-dark d-grid gap-2 col-6 mx-auto">Telusuri</button>
               </form>
            </div>
        </div>
      </div>

      <div class="carousel-item">
        <img src="cssuser/asli2.jpeg" class="d-block w-100" alt="...">
         <div class="carousel-caption text-center">
            <div class="col-md-8 offset-md-2">
               <form method="get" action="produk.php">
                  <div class="input-group input-group-lg my-4">
                             <input type="text" class="form-control" placeholder="coffe" aria-label="Recipient's  username" aria-describedby="basic-addon2" name="keyword">
                  </div>
                  <button type="submit" class="btn btn-dark d-grid gap-2 col-6 mx-auto">Telusuri</button>
               </form>
            </div>
        </div>
      </div>

      <div class="carousel-item">
        <img src="cssuser/asli1.jpeg" class="d-block w-100" alt="...">
         <div class="carousel-caption text-center">
            <div class="col-md-8 offset-md-2">
               <form method="get" action="produk.php">
                  <div class="input-group input-group-lg my-4">
                     <input type="text" class="form-control" placeholder="coffe" aria-label="Recipient's  username" aria-describedby="basic-addon2" name="keyword">
                  </div>
                  <button type="submit" class="btn btn-dark d-grid gap-2 col-6 mx-auto">Telusuri</button>
               </form>
            </div>
         </div>
      </div>
    </div>
   <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
</section>

<!--  End banner -->

<!--  section 2  arivals -->
<section id="new-arrivals">
   <div class="new-arrivals wrapper">
      <div class="container">
         <div class="row">
            <div class="text-content text-center mt-5"> <!-- col-12 -->
               <h2>Favorite Category</h2>
            </div>
         </div>

        <!-- buat gambar -->
         <div class="row align-items-center mt-4" style="margin-left: 30vh;">
            <div class="col-sm-5 p-sm-0 card-banner">
               <div class="zoom-effect-container card-banner position-relative text-center">
                  <div class="image-card">
                     <a href="produk.php?kategori=coffee series" class="card-thumb">
                        <img src="cssuser/coffee2.jpg" alt="" class="img-fluid">
                     </a>
                     <div class="text-center mt-4" >
                        <h4 class="text-white"><a class="no-decoration main-btn" href="produk.php?kategori=coffee series" >Ice Coffee</a></h4>
                     </div>
                  </div>
               </div>
            </div>
            <!-- <div class="col-sm-4 p-sm-0 card-banner">
               <div class="zoom-effect-container card-banner position-relative text-center">
                  <div class="image-card">
                     <a href="produk.php?kategori=hot series" class="card-thumb">
                        <img src="cssuser/hotkopi6.jpg" alt="" class="img-fluid">
                     </a>
                     <div class="text-center mt-4" >
                        <h4 class="text-white"><a class="no-decoration main-btn" href="produk.php?kategori=hot series" >Hot Coffee</a></h4>
                     </div>
                  </div>
               </div>
            </div> -->
            <div class="col-sm-6 p-sm-0 card-banner">
               <div class="zoom-effect-container card-banner position-relative text-center">
                  <div class="image-card">
                     <a href="produk.php?kategori=blend series" class="card-thumb">
                        <img src="cssuser/iceblend5.jpg" alt="" class="img-fluid">
                     </a>
                     <div class="text-center mt-4" >
                        <h4 class="text-white"><a class="no-decoration main-btn" href="produk.php?kategori=blend series" >Ice Blend</a></h4>
                     </div>
                  </div>
               </div>
            </div>
         <div>


      </div>
   </div>
</section>
<!-- end product new     -->

<!-- about us -->
   <div class="container-fluid warna2 py-5"> <!-- py adalah padding -->
      <div class="container text-center">
         <h3 id="about">Tentang Kami</h3>
         <p class="fs-5 mt-3"> <!-- fs untuk ukuran huruf -->
            Berawal dari offline shop, kini kami membuka online shop berbasis website dan memiliki pelayanan customer yang lebih canggih. Coffeshop kami dapat melayani Anda yang ingin membeli produk kami tanpa harus datang ke offline shop kami. Tenang saja, produk kami tidak ada perbedaan harga maupun rasa jika membeli di online shop.
            Bagi anda yang ingin datang langsung ke offline shop, anda dapat mencari lokasi kami yang sudah tercantum di bagian bawah website.
         </p>
      </div>
   </div>

  <!--  produk -->
  <div class="container-fluid py-5">
     <div class="container text-center">
        <h3>New Menu</h3>

        <div class="row mt-5">

         <!-- mengambil data produk -->
            <?php  
               $produk = mysqli_query($conn, "SELECT * FROM tb_product ORDER BY product_id DESC LIMIT 6");

               // kondisi
               if (mysqli_num_rows($produk) > 0) {

                  //looping
                  while($p = mysqli_fetch_array($produk)){
            ?>
               <div class="col-sm-6 col-md-4 mb-3">
                  <div class="card h-100">

                    <div class="image-box">
                        <!-- menampilkan foto -->
                        <img src="foto-produk/<?php echo $p['product_image']; ?>" class="card-img-top" alt="...">
                    </div>

                    <div class="card-body">
                     <!-- menampilkan nama produk -->
                        <h5 class="card-title"><?php echo $p ['product_name']; ?></h5>

                        <!--  menampilkan deskripsi -->
                        <p class="card-text text-truncate"><?php echo $p['product_description']; ?></p>

                       <!--  untuk harga -->
                        <p class="card-text text-harga">Rp. <?php echo number_format($p['product_price']); ?></p>
                        <a href="produk-detail.php?id=<?php echo $p['product_id']; ?>" class="btn btn-dark text-white d-grid gap-2 col-6 mx-auto mb-3">Lihat Detail</a>
                        <a href="beli.php?id=<?php echo $p['product_id']; ?>" class="btn btn-dark text-white d-grid gap-2 col-6 mx-auto">Beli</a>
                    </div>

                  </div>
               </div>
            <?php } }else{?>
            <p>Tidak ada produk</p>
            <?php } ?>
         </div>

         <!--see more-->
         <a class="btn btn-outline-dark  d-grid gap-2 col-6 mx-auto mt-5" href="produk.php">See More</a>

     </div>
   </div>

 

   <!-- footer -->
   <?php include 'footer.php' ?>

   <script 
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
   </script>
   <script src="js/main.js"></script>
  </body>
</html>

