<?php  
   include 'index.php'
?>

         <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                  <main>
                     <div class="container-fluid px-4">
                        <h3 class="mt-4">Produk</h3>
                      </div>
                  </main>

                 <!-- isi inti -->
                  <div class="container my-5 col-12 col-md-6">
                     <h4>Tambah Data Produk</h4>

                     <form action="" method="post" enctype="multipart/form-data">

                        <!--tempat kolom produk-->
                        <div>
                           <label class="mb-2" for="kategori">kategori</label>
                           <!-- menampilkan data kategori di produk -->
                           <select name="kategori" class="form-control" required>
                              <option value="">Pilih</option> 

                                <!--  php kategori -->
                                <?php 
                                // nyambungin dengan tabel database category, untuk milih category di produk
                                  $querykategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                                  while($data = mysqli_fetch_array($querykategori)){
                                ?>

                              <option value="<?php echo $data['category_id']; ?>">
                                  <?php echo $data['category_name']; ?>
                              </option>
                                 <?php } ?>
                            </select>
                        </div>

                       <!--   nama -->
                        <div>
                           <label class="mt-2 mb-2" for="nama">Nama</label>
                           <input type="text" id="nama" name="nama" class="form-control" autocomplete="off" required>
                        </div>

                         <!--harga-->
                        <div>
                           <label class="mt-2 mb-2" for="harga">Harga</label>
                           <input type="number" class="form-control" name="harga" required>
                        </div>

                          <!-- foto -->
                        <div>
                            <label class="mt-2 mb-2" >gambar</label>
                           <input type="file" class="form-control" name="gambar" required>
                        </div>

                          <!--  deskripsi -->
                        <div>
                           <label class="mt-2 mb-2" for="deskripsi">Deskripsi</label>
                           <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <!-- stok -->
                        <div>
                           <label class="mt-2 mb-2" for="stok">Stok</label>
                           <input type="number" class="form-control" name="stok" required>
                        </div>

                        <div class="mt-3">
                           <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                        </div>

                     </form>
                  

                    <!--  end -->

                  <?php 
                     if(isset($_POST['submit'])){
                       // print_r mengecek ada data apa aja yng akan diupload nanti
                       // print_r($_FILES['foto']);

                             //menampung inputan dari form
                        $kategori  = $_POST['kategori'];
                        $nama      = $_POST['nama'];
                        $harga     = $_POST['harga'];
                        $deskripsi = $_POST['deskripsi'];
                        $stok      = $_POST['stok'];

                             // menampung data file yang di upload
                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                             //mengambil type file
                        $type1 = explode('.', $filename);
                             //type2 berisi format file
                        $type2 = $type1[1];

                        $newname = '../foto-produk/'.time().'.'.$type2;

                             // menampung data format file yang diizinkan
                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                             // validasi format file
                             //mengecek apakah format file nya sudah benar
                           if(!in_array($type2, $tipe_diizinkan)){
                               //ini format file salah
                               echo '<script>alert("Format file tidak diizinkan")</script>';

                              }else{
                                  // jika format file diizinkan
                                  // proses upload file sekaligus insert ke database
                                 move_uploaded_file($tmp_name, '../foto-produk/'.$newname);

                                 $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
                                            null,
                                            '".$kategori."',
                                            '".$nama."',
                                            '".$harga."',
                                            '".$deskripsi."',
                                            '".$newname."',
                                            '".$stok."',
                                           
                                            null ) "); 

                                 if($insert){
                                    ?>
                                      <div class="alert alert-primary mt-3" role="alert">
                                        Kategori Berhasil di Simpan
                                      </div>
                                      <meta http-equiv="refresh" content="1; url=data-produk.php"/>
                                    <?php
                                  }else{
                                    ?>
                                      <div class="alert alert-warning mt-3" role="alert">
                                        Kategori gagal di Simpan
                                      </div>
                                    <?php
                                    // echo 'gagal'.mysqli_error($conn);
                                  }

                                } } ?>
              
                  </div>

           <script>
               CKEDITOR.replace( 'deskripsi' );
           </script>
                  <!-- end isi -->

                  <?php
                     include "footer.php";
                  ?>

            </div>
         </div>

        









