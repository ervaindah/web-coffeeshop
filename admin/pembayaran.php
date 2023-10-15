<?php
    session_start();
    include 'db.php';
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
   </head>

   <body class="sb-nav-fixed">

      <?php 
      include 'index.php'; 
      ?>

        <div id="layoutSidenav">
           <div id="layoutSidenav_content">
               <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4">Detail Pembayaran</h4>
                    </div>
               </main>

               <!-- isi inti -->
               <?php
                  // mendapatkan id pembelian
                  $id_pembelian = $_GET['id'];

                  // mengambil data pembayaran berdasarkan id pembeli
                  $ambil = $conn->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian' ");
                  $detail = $ambil->fetch_assoc();
               ?>

               <div class="row">
                  <div class="col-md-6">
                     <table class="table">     
                        <tr>
                           <th>Nama</th>
                           <td><?php echo $detail['nama'] ?></td>
                        </tr>
                        <tr>
                           <th>Bank</th>
                           <td><?php echo $detail['bank'] ?></td>
                        </tr>
                        <tr>
                           <th>Jumlah</th>
                           <td><?php echo $detail['jumlah'] ?></td>
                        </tr>
                        <tr>
                           <th>Tanggal</th>
                           <td><?php echo $detail['tanggal'] ?></td>
                        </tr>>
                     </table>  
                  </div>
                  <div class="col-md-6">
                     <img src="../bukti_pembayaran/<?php echo $detail['bukti'] ?>" alt="" class="w-100">
                  </div>
               </div>
               <!-- end isi -->

              <!--  <form method="post">
                  <div class="from-group">
                     <label for="">Status</label>
                     <select class="from-control" name="status" id="">
                        <option value="">Pilih Status</option>
                        <option value="lunas">Lunas</option>
                        <option value="">Barang Dikirim</option>
                        <option value="">Batal</option>
                     </select>
                  </div>
                  <button class="btn btn-primary" name="proses">Proses</button>
                  
               </form> -->

               <?php
                    include "footer.php";
                ?>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
