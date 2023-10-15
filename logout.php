<?php  
	session_start();

	//menghancurkan session pelanggan
	session_destroy();
	echo "<script>location='index.php'</script>";
?>