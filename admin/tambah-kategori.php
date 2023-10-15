<?php
    session_start();
    include 'db.php';

    $querytb_category = mysqli_query($conn,"SELECT * FROM tb_category");
    $jumlahkategori = mysqli_num_rows($querytb_category);
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
        include 'index.php'
       ?>

        <div id="layoutSidenav">
           <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4">Kategori</h4>
                    </div>
                </main>

                <!-- isi inti -->
                <div class="container my-5 col-12 col-md-6">
                    <h4>Tambah kategori</h4>
                    <form action="" method="post">
                        <div>
                            <label class="mb-2" for="kategori">kategori</label>
                            <input type="text" name="nama" placeholder="input nama kategori" class="form-control" required>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                        </div>
                    </form>

                        <?php 
                            if(isset($_POST['submit'])){
                                $nama = ucwords($_POST['nama']);
                                //apakah nama kategorinya sudah ada?
                                $queryExist = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_name = '$nama' ");
                                    $jumlahdata = mysqli_num_rows($queryExist);

                                //jika jumlah data ada di database
                                if($jumlahdata > 0){
                                    ?>
                                    <div class=" alert alert-warning mt-3" role="alert">
                                        Kategori Sudah Ada
                                    </div>
                                    <?php   
                                }
                                else{
                                      //untuk id_categori 'null' dn category_name '$nama'
                                    $querysimpan = mysqli_query($conn, "INSERT INTO tb_category VALUES ( null,'" .$nama. "') ");
                                    if($querysimpan){
                                        ?>
                                        <div class="alert alert-primary mt-3" role="alert">
                                            Kategori Berhasil di Simpan
                                        </div>
                                        <meta http-equiv="refresh" content="1; url=data-kategori.php"/>
                        <?php } } } ?>
                </div>
                                   


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
