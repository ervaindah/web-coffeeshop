<?php  
    include 'index.php'
?>
<?php 
$semuadata=array();
// $tgl_mulai="-";
// $tgl_selesai="-";

   if (isset($_POST["kirim"])) {
      $tgl_mulai = $_POST["tglm"];
      $tgl_selesai = $_POST['tgls'];
      $ambil = $conn->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON 
         pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' ");
      while ($pecah = $ambil->fetch_assoc()){
         $semuadata[]=$pecah;
      }
    } 
?>


<div id="layoutSidenav">
   <div id="layoutSidenav_content">
      <main>
         <div class="container-fluid px-4">
            <h3 class="mt-4">Laporan Pembelian</h3>
                        
         </div>
      </main>

      <!-- isi inti -->
      
      <form action="" method="post">
         <div class="container">
            <div class="row mt-4">
               <div class="col-md-5">
                  <div class="from-group">
                     <label for="">Tanggal Mulai</label>
                     <input type="date" class="from-control" name="tglm" value="<?php echo $tgl_mulai ?>">
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="from-group">
                     <label for="">Tangaal Selesai</label>
                     <input type="date" class="from-control" name="tgls" value="<?php echo $tgl_selesai ?>">
                  </div>
               </div>
               <div class="col-md-2">
                  <button class="btn btn-primary" name="kirim">Lihat</button>
               </div>
            </div>
         </div>
      </form>

      <div class="card mt-3 mb-4">
         <div class="card-body text-center">
            <table id="datatablesSimple"> <!-- table bawaan jvscript "datatableSimple" -->
               <thead>
                  <tr class="table-secondary" >
                     <th>No</th>
                     <th>Nama pelanggan</th>
                     <th>Tanggal</th>
                     <th>Jumlah</th>
                     <th>Status</th>
                  </tr>                        
               </thead> 
                
               <tbody> 
                  <?php $total=0; ?>
                  <?php foreach ($semuadata as $key => $value): ?>
                  <?php $total+=$value['total_pembelian'] ?>
                  <tr>
                     <td><?php echo $key+1; ?></td>
                     <td><?php echo $value["nama_pelanggan"] ?></td>
                     <td><?php echo $value["tanggal_pembelian"] ?></td>
                     <td>Rp. <?php echo number_format($value["total_pembelian"]) ?></td>
                     <td><?php echo $value["status_pembelian"]?></td>
                  </tr>  
                  <?php endforeach ?> 
                  <tr>
                     <th colspan="3">Total</th>
                     <th>Rp. <?php echo number_format($total) ?></th>
                  </tr>              
               </tbody>
            </table>
         </div>
      </div>
      <a href="" onclick="window.print()" class="btn btn-outline-dark d-grid gap-1 col-2 mx-auto mt-3"><i class="mdi mdi-printer"></i> CETAK </a>
      <!-- end isi inti -->

<!-- footer -->
<?php include "footer.php"; ?>

   </div>
</div>

        