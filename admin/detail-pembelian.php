<?php  
    include 'index.php';
    $ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]' ");
    $detail = $ambil->fetch_assoc();
?>

        <div id="layoutSidenav">
           <div id="layoutSidenav_content">
                  <main>
                     <div class="container-fluid px-4">
                        <h3 class="mt-4">Detail Pembelian</h3>
                     </div>
                  </main>
                     <div class="container row mt-3">
                        <div class="col-md-4">
                           <h4>Pelanggan</h4>
                           <strong><?php echo $detail['nama_pelanggan']; ?></strong>
                           <p>
                              <?php echo $detail['telepon_pelanggan']; ?> <br>
                           </p>
                        </div>
                     
                        <div class="col-md-4">
                           <h4> Status Pembelian</h4>
                           <p>
                              <?php echo $detail['status_pembelian']; ?> <br>
                           </p>
                        </div>
                     </div>
         
         
               
                 <!-- isi inti -->
                <div class="card mt-3 mb-4">
                    <div class="card-body">
                        <table id="datatablesSimple"> <!-- table bawaan jvscript "datatableSimple" -->
                            <thead>
                                <tr class="table-secondary" >
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                    
                                </tr>
                            </thead> 
                
                                <tbody>
                                    <?php
                                        //menampilkan kategori 
                                        $no = 1;
                                        $produk = mysqli_query($conn, "SELECT * FROM pembelian_produk LEFT JOIN tb_product USING (product_id)"); ?>

                                            
                                            <?php while($row = mysqli_fetch_array($produk)){ ?>
                                            <!-- tr akan dilooping -->
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                          <!-- menampilkan nama data -->
                                                        <td><?php echo $row['product_name'] ?></td>
                                                        <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                                                        <td><?php echo $row['jumlah'] ?></td>
                                                        <td>Rp. <?php echo number_format($row['product_price']*$row['jumlah']) ?></td>
                                                        
                                                        
                                                          <!--end-->
                                                         
                                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                </div>

                   <?php
                        include "footer.php";
                    ?>

            </div>
        </div>

        