<?php  
    include 'index.php'
?>

        <div id="layoutSidenav">
           <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Data Pembelian</h3>
                        
                    </div>
                </main>

                 <!-- isi inti -->
                <div class="card mt-3 mb-4">
                    <div class="card-body text-center">
                        <table id="datatablesSimple"> <!-- table bawaan jvscript "datatableSimple" -->
                            <thead>
                                <tr class="table-secondary" >
                                    <th>No</th>
                                    <th>Nama pelanggan</th>
                                    <th>Tanggal</th>
                                    <th>Status Pembelian</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                    
                                </tr>
                            </thead> 
                
                                <tbody>
                                    <?php
                                        //menampilkan kategori 
                                        $no = 1;
                                        $produk = mysqli_query($conn, "SELECT * FROM pembelian LEFT JOIN pelanggan USING (id_pelanggan)"); ?>

                                            
                                            <?php while($row = mysqli_fetch_array($produk)){ ?>
                                            <!-- tr akan dilooping -->
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                          <!-- menampilkan nama data -->
                                                        <td><?php echo $row['nama_pelanggan'] ?></td>
                                                        <td><?php echo $row['tanggal_pembelian'] ?></td>
                                                        <td><?php echo $row['status_pembelian'] ?></td>
                                                        <td>Rp. <?php echo number_format($row['total_pembelian']) ?></td>
                                                        <!--end-->

                                                         <td>
                                                            <!--  ketika msuk halaman edit/hpus maka id akan terbawa -->
                                                            <a href="detail-pembelian.php? id=<?php echo $row['id_pembelian'] ?>" class="btn btn-warning">Detail</a>

                                                            <?php if ($row['status_pembelian']=="Pembayaran Selesai"): ?>
                                                               <a href="pembayaran.php?halaman=pembayaran&id=<?php echo $row['id_pembelian'] ?>" class="btn btn-success mt-3">Pembayaran</a>
                                                            <?php endif ?>

                                                            <!-- <a href="proses-hapus.php? id=<?php echo $row['id_pembelian'] ?>" class="btn btn-danger mt-2" onclick="return confirm('Anda yakin ingin dihapus?')">Hapus</a> -->
                                                          </td>
                                                    </tr>
                                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                </div>

                    <!-- <div class="container">
                        <a href="tambah-produk.php" class="btn btn-primary">Tambah Data</a>
                    </div>
 -->
                    <?php
                        include "footer.php";
                    ?>

            </div>
        </div>

        