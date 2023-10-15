<?php
    session_start();
    include 'db.php';

    $query = mysqli_query($conn,"SELECT * FROM tb_product");
    $jumlahproduk = mysqli_num_rows($query);
?>

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
                <div class="card mt-3 mb-4">
                    <div class="card-body">
                        <table id="datatablesSimple"> <!-- table bawaan jvscript "datatableSimple" -->
                            <thead>
                                <tr class="table-secondary" >
                                    <th align="center">No</th>
                                    <th>Kategori</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <!-- <th>Deskripsi</th> -->
                                    <th>Gambar</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead> 
                
                                <tbody>
                                    <?php
                                        //menampilkan kategori 
                                        $no = 1;
                                        $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id)");

                                            if($jumlahproduk==0){
                                    ?>
                                                <tr>
                                                    <td colspan=8 class="text-center p-5">Data Produk Tidak Ada</td>
                                                </tr>
                                                <?php
                                                }else{
                                                    //mengambil data dlm bntuk array
                                                    while($row = mysqli_fetch_array($produk)){
                                                ?>
                                            <!-- tr akan dilooping -->
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                          <!-- menampilkan nama data -->
                                                        <td><?php echo $row['category_name'] ?></td>
                                                        <td><?php echo $row['product_name'] ?></td>
                                                        <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                                                       
                                                        <td>
                                                            <a href="../foto-produk/<?php echo $row['product_image'] ?>" target="_blank"> <img src="../foto-produk/<?php echo $row['product_image'] ?>" width="100"></a>
                                                        </td>
                                                        <td><?php echo $row ['stok_product'] ?></td>
                                                          <!--end-->

                                                        <td>
                                                            <!--  ketika msuk halaman edit/hpus maka id akan terbawa -->
                                                            <a href="edit-produk.php? id=<?php echo $row['product_id'] ?>" class="btn btn-warning">Edit</a>
                                                            <a href="proses-hapus.php? idp=<?php echo $row['product_id'] ?>" class="btn-danger btn" onclick="return confirm('Anda yakin ingin dihapus?')">Hapus</a>
                                                        </td>
                                                    </tr>
                                            <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                </div>

                    <div class="container">
                        <a href="tambah-produk.php" class="btn btn-primary">Tambah Data</a>
                    </div>

                    <?php
                        include "footer.php";
                    ?>

            </div>
        </div>

        