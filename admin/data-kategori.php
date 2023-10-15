
<!--nav-->
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
                <div class="card mt-3 mb-4">
                    <div class="card-body">
                        <table id="datatablesSimple"> <!-- table bawaan jvscript "datatableSimple" -->
                            <thead>
                                <tr class="table-secondary" >
                                    <th align="center">No</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                                <tbody>
                                    <?php

                                        //menampilkan kategori 
                                        $no = 1;
                                        $kategori = mysqli_query($conn, "SELECT * FROM tb_category" );

                                         //mengambil data dlm bntuk array
                                        while($row = mysqli_fetch_array($kategori)){
                                        ?>
                                          <!-- tr akan dilooping -->
                      
                                        <tr class="table-secondary">
                                            <td><?php echo $no++ ?></td>
                                        <!-- menampilkan nama data -->
                                            <td><?php echo $row['category_name'] ?></td>
                                        <!--end-->
                                            <td>
                                            <!--    ketika msuk halaman edit/hpus maka id akan terbawa -->
                                                <a href="edit-kategori.php? id=<?php echo $row['category_id'] ?>" class="btn btn-warning">Edit</a>
                                                <a href="proses-hapus.php? idk=<?php echo $row['category_id'] ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin dihapus?')">Hapus</a>
                                            </td>
                                        </tr>
                       
                                    <?php } ?>
                                </tbody>
                        </table>
                    </div>
                </div>

                        <div class="container">
                            <a href="tambah-kategori.php" class="btn btn-primary">Tambah Data</a>
                        </div>



                <?php
                    include "footer.php";
                ?>

        </div>
    </div>

       
