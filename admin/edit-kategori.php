<?php
    session_start();
    include 'db.php';

    //ketika di input akn menampilkan nma kategori sesuai id
    $kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '" .$_GET['id']. "' ");

        //jika id dihapus secara paksa di broser maka akan kembali ke menu kategori
        if(mysqli_num_rows($kategori) == 0){
            echo '<script>window.location="data-kategori.php"</script>';
        }
    //mengambil data dlm bentuk objek
    $k = mysqli_fetch_object($kategori);
    //end
?>


    
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
                    <h4>Edit kategori</h4>
                    <form action="" method="post">
                        <div>
                            <label class="mb-2" for="kategori">kategori</label>
                            <input type="text" name="nama" placeholder="input nama kategori" class="form-control" value="<?php echo $k->category_name ?>" required>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                        </div>
                    </form>

                    <?php 
                        if(isset($_POST['submit'])){

                            $nama = ucwords($_POST['nama']);
                            
                            //agar file mengetahui nama yng di pilih
                            $update = mysqli_query($conn, "UPDATE tb_category SET 
                                category_name = '" .$nama. "'
                                WHERE category_id = '" .$k->category_id. "' ");

                            //ketika berhasil kembali ke menu kategori
                            if($update){
                                echo '<script>alert("edit data berhasil")</script>';
                                echo '<script>window.location="data-kategori.php"</script>';
                            }else{
                                echo 'gagal' .mysqli_error($conn);
                            }
                        }
                    ?>
                </div>                   


                <?php
                    include "footer.php";
                ?>

            </div>
        </div>

       