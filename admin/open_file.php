<?php 
if($_GET){
	switch ($_GET['page']) {
		case '':
		if(!file_exists('main.php')) die ('Page Not Found');
		?>
		<script>
			document.getElementById('Home').classList.add('active')
		</script>
		<?php
		include 'main.php';
		break;
		
		//Akun
		case 'Akun':
			if(!file_exists('akun/akun_data.php')) die ('Page Not Found');
			?>
			<script>
				document.getElementById('Akun').classList.add('active');
			</script>
			<?php
			include 'akun/akun_data.php';
			break;

		//Pelanggan
		case 'Pelanggan':
			if(!file_exists('pelanggan/pelanggan_data.php')) die ('404 Page Not Found');
			?>
			<script>
				document.getElementById('Pelanggan').classList.add('active');
			</script>
			<?php
			include 'pelanggan/pelanggan_data.php';
			break;

		//Penggunaan
		case 'Penggunaan':
			if(!file_exists('penggunaan/penggunaan_data.php')) die ('404 Page Not Found');
			?>
			<script>
				document.getElementById('Penggunaan').classList.add('active');
			</script>
			<?php
			include 'penggunaan/penggunaan_data.php';
			break;

		//Tarif
		case 'Tarif':
			if(!file_exists('tarif/tarif_data.php')) die ('404 Page Not Found');
			?>
			<script>
				document.getElementById('Tarif').classList.add('active');
			</script>
			<?php
			include 'tarif/tarif_data.php';
			break;

		//Akun
		case 'Tagihan':
			if(!file_exists('tagihan/tagihan_data.php')) die ('404 Page Not Found');
			?>
			<script>
				document.getElementById('Tagihan').classList.add('active');
			</script>
			<?php
			include 'tagihan/tagihan_data.php';
			break;

		case 'LapPembayaran':
			if(!file_exists('laporan_pembayaran.php')) die ('404 Page Not Found');
			?>
			<script>
				document.getElementById('Laporan').classList.add('active');
			</script>
			<?php
			include 'laporan_pembayaran.php';
			break;

		default:
		if(!file_exists('main.php')) die ('Page Not Found');
		?>
		<script>
			document.getElementById('Home').classList.add('active')
		</script>
		<?php
		include 'main.php';
		break;
	}

}else{
	if(!file_exists('main.php')) die ('Page Not Found');
	?>
	<script>
		document.getElementById('Home').classList.add('active')
	</script>
	<?php
	include 'main.php';
}
