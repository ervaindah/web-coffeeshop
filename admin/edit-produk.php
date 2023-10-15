<?php  
   include 'index.php';

    //get terlebih dahulu (atau disimpan)
   $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");

      //jika id dihapus secara paksa di broser maka akan kembali ke menu kategori
      if(mysqli_num_rows($produk ) == 0){
         echo '<script>window.location="data-produk.php"</script>';
      }
      // $produk diatas ditampung dalam variabel p
      $p = mysqli_fetch_object($produk);

     //setelah itu data2 produk ditampilkan dalam from
?>

        <div id="layoutSidenav">
           <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h4 class="mt-4">Produk</h4>
                    </div>
                </main>

               <!-- isi inti -->
               <div class="container my-5 col-12 col-md-6">
                  <h4>Edit Data Produk</h4>
                  <form action="" method="post" enctype="multipart/form-data">

                     <!--tempat kolom produk-->
                     <div>
                        <label class="mt-3 mb-2" for="kategori">kategori</label>
                        <!-- menampilkan data kategori di produk -->
                        <select name="kategori" id="kategori" class="form-control">
                           <option value="">Pilih</option> 

                          <!--  php kategori -->
                           <?php 
                          // nyambungin dengan tabel database category, untuk milih category di produk
                           $querykategori = mysqli_query($conn, "SELECT * FROM tb_category");
                           while($data = mysqli_fetch_array($querykategori)){
                           ?>

                          <!--untuk get nama kategori yng di pilih-->
                           <option value="<?php echo $data['category_id'] ?>" <?php echo ($data['category_id'] == $p->category_id)? 'selected':'';  ?> >
                            <?php echo $data['category_name']; ?>
                           </option>
                           <?php } ?>

                        </select>
                     </div>

                      <!--   nama -->
                     <div>
                        <label class="mt-2 mb-2" for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" class="form-control" autocomplete="off" value="<?php echo $p->product_name?>" required>
                     </div>

                      <!--harga-->
                     <div>
                        <label class="mt-2 mb-2" for="harga">Harga</label>
                        <input type="number" class="form-control" name="harga" value="<?php echo $p->product_price?>" required>
                     </div>

                       <!-- foto -->
                     <div >
                        <img src="../foto_produk/<?php echo $p->product_image ?>" width="100"> <!-- tag img ini untuk menampilkan foto untuk diedit -->
                        <label class="mt-5">Foto</label>
                        <input type="hidden" name="gambar" value="<?php echo $p->product_image?> ">
                        <input type="file" class="form-control" name="gambar">
                     </div>

                       <!--  deskripsi -->
                     <div>
                        <label class="mt-2 mb-2" for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"><?php echo $p->product_description ?></textarea>
                     </div>

                      <!-- stok -->
                        <div>
                           <label class="mt-2 mb-2" for="stok">Stok</label>
                           <input type="number" class="form-control" name="stok" value="<?php echo $p->stok_product?>">
                        </div>


                      <!--  end -->

                     <div class="mt-3">
                        <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                     </div>

                  </form>

                     <?php 
                        if(isset($_POST['submit'])){

                          //data inputan dari form
                           $kategori  = $_POST['kategori'];
                           $nama      = $_POST['nama'];
                           $harga     = $_POST['harga'];
                           $deskripsi = $_POST['deskripsi'];
                           $stok      = $_POST['stok'];
                           $foto      = $_POST['gambar'];

                             //data gambar yang baru
                           $filename = $_FILES['gambar']['name'];
                           $tmp_name = $_FILES['gambar']['tmp_name'];

                          
                           //jika admin ganti gambar 
                              if($filename != ''){
                                 $type1 = explode('.', $filename);
                                //type2 berisi format file
                                 $type2 = $type1[1];

                                 $newname = '../foto-produk'.time().'.'.$type2;

                                // menampung data format file yang diizinkan
                                 $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                                    //validasi format
                                    if(!in_array($type2, $tipe_diizinkan)){
                                    //ini format file salah
                                       echo '<script>alert("Format file tidak diizinkan")</script>';

                                    }else{
                                    // foto akan diapus dn juga di folder ikut ke apus
                                    unlink('../foto-produk/'.$p->product_image);
                                    // dan diganti yng baru di upload ke file produk
                                    move_uploaded_file($tmp_name, '../foto-produk/'.$newname); 
                                    // selesai di upload maka ditampung variabel namagambar
                                    $namagambar = $newname;
                                    }

                                    }else{
                                    // jika admin tidak ganti gambar maka nama gambarnya tetap/nama gambar sebelumnya
                                       $namagambar = $foto;
                                    }

                                       // query update data produk
                                       $update = mysqli_query($conn, "UPDATE tb_product SET 
                                                category_id         = '".$kategori."', 
                                                product_name        = '".$nama."',
                                                product_price       = '".$harga."',
                                                product_description = '".$deskripsi."',
                                                product_image       = '".$namagambar."',
                                                stok_product        = '".$stok."'
                                                WHERE product_id    = '".$p->product_id."' ");

                                    if($update){
                                    ?>
                                       <div class="alert alert-primary mt-3" role="alert">
                                          Ubah Data Berhasil di Simpan
                                       </div>
                                       <meta http-equiv="refresh" content="1; url=data-produk.php"/>
                                          <?php
                                       }else{
                                          ?>
                                          <div class="alert alert-warning mt-3" role="alert">
                                             Kategori gagal di Simpan
                                          </div>
                                          <?php
                                           
                                          }
                                      
                                       }
                                    ?>
                 
               </div>

              <script>
                  CKEDITOR.replace( 'deskripsi' );
              </script>

               <!-- end inti -->

                <?php
                    include "footer.php";
                ?>

            </div>
        </div>

       