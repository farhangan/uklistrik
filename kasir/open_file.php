<?php 
if($_GET){
	switch ($_GET['page']) {
		case '':
		if(!file_exists('main.php')) die ('Page Not Foumd');
		?>
			<script>
			document.getElementById('Home').classList.add('active');
		</script>
		<?php
		include 'main.php';
		break;

		case 'Bayar' :
			if(!file_exists('pembayaran/pembayaran_data.php')) die ('404 Page Not Found');
			?>
			<script>
				document.getElementById('Bayar').classList.add('active');
			</script>
			<?php
			include 'pembayaran/pembayaran_data.php';
			break;

		case 'Riwayat' :
			if(!file_exists('riwayat/riwayat_data.php')) die ('404 Page Not Found');
			?>
			<script>
				document.getElementById('Riwayat').classList.add('active');
			</script>
			<?php
			include 'riwayat/riwayat_data.php';
			break;
		
		default:
		if(!file_exists('main.php')) die ('Page Not Foumd');
		?>

		<?php
		include 'main.php';
		break;
	}
}else{
	if(!file_exists('main.php')) die ('Page Not Foumd');
	?>
		<script>
			document.getElementById('Home').classList.add('active');
		</script>
	<?php
	include 'main.php';
}
