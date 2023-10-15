<?php
	session_start();
	include 'koneksi.php'; 

	// jika belum login
	if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
		echo "<script>alert('Silahkan Login terlebih Dahulu')</script>";
		echo "<script>location='login.php'</script>";
		exit();
	}
?>
	<!-- navbar -->
   	<?php include 'navbar.php'; ?>
   <!--    akhir navbar -->

  <!--  <pre>
   	<?php // print_r($_SESSION) ?>
   </pre> -->
   <section class="riwayat">
   	<div class="container">
   		<h3 class="my-5">Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3>

   		<div class="table-responsiv">
	    		<table class="table table-bordered table-hover  text-center mb-5">
	    			<thead class="table-dark">
	    				<tr>
	    					<th>No</th>
	    					<th>Tanggal</th>
	    					<th>Status</th>
	    					<th>Total</th>
	    					<th>Opsi</th>
	    				</tr>
	    			</thead>

	    			<!-- bagian php -->
	    			<tbody>
	    				<?php 
	    					$no=1;
	    					// mendapatkan id_pelanggan yng login
	    					$id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];

	    					$ambil = $conn->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan' ");
	    					while ($pecah = $ambil->fetch_assoc()){
	    				?>
	    				<tr class="text-center">
	    					<td><?php echo $no ?></td>
	    					<td><?php echo $pecah["tanggal_pembelian"] ?></td>
	    					<td><?php echo $pecah["status_pembelian"] ?></td>
	    					<td>Rp. <?php echo number_format($pecah["total_pembelian"])?></td>
	    					<td>
	    						
	    						

	    						<?php if ($pecah['status_pembelian']=="pending"): ?>
	    							<a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info d-grid gap-2 col-6 mx-auto">Nota</a>
	    							<a href="pembayaran.php?id=<?php echo ($pecah["id_pembelian"]) ?>" class="btn btn-success d-grid gap-2 col-6 mx-auto mt-3">Lakukan Pembayaran</a>
	    							<?php else: ?>
	    								<a href="notaselesai.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info d-grid gap-2 col-6 mx-auto">Nota</a>	
	    								<a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>"  class="btn btn-warning d-grid gap-2 col-6 mx-auto mt-3">Lihat Pembayaran</a>
	    						<?php endif ?>

	    					</td>
	    				</tr>
	    				<?php $no++; ?>
	    				<?php } ?>
	    			</tbody>
	    		</table>
    		</div>

   	</div>
   </section>

    <!-- footer -->
   <?php include 'footer.php' ?>

</body>
</html>




