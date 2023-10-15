
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
   
/*bg-hero{
  background-image: url(cssuser/banner.jpeg);
  background-repeat: no-repeat;
  
  height: 700px;
  background-size: 1350px;

  margin-top: -126px; 
}*/

/*#hero h3{
  text-align: center;
  margin-top: 230px;
}*/
/*.nav-link{
  text-transform: uppercase; biar tulisan nav jadi besar semua
  margin-right: 10px;
}*/
/*.start{
   margin-left: 27px;
}*/
.logohuruf{
   margin-left: 100px;
}


</style>
<body>
<!-- navbar -->
   <nav class="navbar navbar-expand-lg warna2">
      <div class="container text-black ">
         <img src="cssuser/logocoffee.png" alt="kopi" width="110" height="110" class="me-10  logohuruf">  
         <a class="navbar-brand" style="margin-right: 540px;">Coffee Shop</a>
         

         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
          <div class="collapse navbar-collapse text-right" id="navbarText" >
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="margin-left: -500px;">
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="keranjang.php">Keranjang</a>
               </li>
               <!-- <li class="nav-item">
                  <a class="nav-link" href="checkout.php">Checkout</a>
               </li> -->
               <!-- <li class="nav-item">
                  <a class="nav-link" href="about.php">Galery</a>
               </li> -->
               <!-- jika sudah login-->
               <?php if (isset($_SESSION["pelanggan"])): ?>
                  <li class="nav-item">
                     <a class="nav-link" href="riwayat.php">Riwayat Belanja</a>
                  </li> 
               

                  <li class="nav-item">
                     <a class="btn btn-dark " href="logout.php">logout</a>
                  </li>
                  
                  <!-- jika blum login maka -->
                  <?php else: ?>
                     <li class="nav-item"><a class="btn btn-dark " href="login.php">login</a></li>
                     <!-- <li class="nav-item">
                        <a class="nav-link" href="daftar.php">Daftar</a>
                     </li> -->
                  <?php endif ?>
            </ul>
          </div>
      </div>
   </nav>
      <!--    akhir navbar -->