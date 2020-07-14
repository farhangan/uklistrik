<?php 
if($_GET){

	switch ($_GET['page']) {
		case '':
			if(!file_exists('main.php')) die ('Page Not Found');
			include 'main.php';
			break;

		case 'Cek-Tagihan':
			if(!file_exists('cek_data_tagihan.php')) die ('Page Not Found');
			include 'cek_data_tagihan.php';
			break;
		
		default:
			if(!file_exists('index.php')) die ('Page Not Found');
			include 'index.php';
			break;
	}

 }else{
 	if(!file_exists('main.php')) die ('Page Not Found');
 	?>
	<script>
		document.location
	</script>
 	<?php
			include 'main.php';
 }
