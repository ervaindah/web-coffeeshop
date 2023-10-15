<?php 
   session_start();
   include 'koneksi.php'; 
   
  // jika blum login maka harus login dulu
   if (!isset($_SESSION["pelanggan"])) {
      echo "<script>alert('Silahkan Login Terlebih Dahulu!')</script>";
      echo "<script>location='login.php'</script>";
   }
    // mendapatkan id produk dari url
   $id_produk = $_GET["id"];
   // query ambil data 
   $ambil = $conn->query("SELECT * FROM tb_product WHERE product_id='$id_produk'");
   $detail = $ambil->fetch_assoc();
   $queryprodukterkait = mysqli_query($conn, "SELECT * FROM tb_product WHERE category_id='$detail[category_id]' 
      AND product_id!='$detail[product_id]' LIMIT 4");
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

    <title>Coffee Shop | Produk</title>
  </head>
<body>
   <!-- navbar -->
   <?php 
      include 'navbar.php';
   ?>
   <!--    akhir navbar -->

   <!-- detail produk -->
   <div class="container-fluid py-5">
      <div class="container">
         <div class="row">

            <div class="col-lg-5 mb-5">
               <img style="width: 100px;" src="./foto-produk/<?php echo $detail['product_image']?>" class="w-100" alt="kopi">
            </div>

            <div class="col-lg-6 offset-lg-1">
               <h2><?php echo $detail["product_name"] ?></h2>
               <h4 class="mt-4 mb-3">Rp. <?php echo number_format($detail["product_price"]) ?></h4>
               <h5 class="mb-3">Stok : <?php echo $detail['stok_product'] ?></h5>

               <!-- <p class="fs-5">
                  Status Ketersedian : 
                  <strong>
                    <?php// echo ($detail['product_status'] == 0)? 'Tidak Tersedia':'Tersedia'; ?>
                  </strong>
               </p> -->

                <!-- bikin jumlah yang mau dibeli -->
                <form method="post" class="col-6 mb-3">
                  <div class="form-group">
                    <div class="input-group" >
                      <input type="number" min="1" class="from-control col-8" name="jumlah" max="<?php echo $detail['stok_product']?>" >
                      <div class="input-group-btn">
                        <button class="btn btn-primary" name="beli">Beli</button>
                      </div>
                    </div>
                  </div>
               </form>

               <!-- ketika nekan tombol beli maka akn di proses -->
               <?php 
                  // jika ada tombol beli
                  if (isset($_POST["beli"])){
                     // mendapatkan jumlah yng diinputkan
                     $jumlah = $_POST["jumlah"];
                     // masukan di keranjng belanja
                     $_SESSION["keranjang"][$id_produk] = $jumlah;

                     echo "<script>alert('Di tambahkan ke keranjang');</script>";
                     echo "<script>location='keranjang.php';</script>";
                  }
               ?>

               <p class="fs-5"><?php echo $detail["product_description"]?></p>
              
              </div>
         </div>
      </div>
   </div>
   <!-- end detail produk -->

   
    <!-- footer -->
   <?php include 'footer.php' ?>

  </body>
</html>

