<?php 
session_start();
require_once '../class/init.php';
if(!isset($_SESSION['admin_session'])){
	header('location:../index.php');
}
//inisialiasis semua class
$akun = new Akun;
$login = new Login;
$pelanggan = new Pelanggan;
$penggunaan = new Penggunaan;
$tarif = new Tarif;
//==========================
$jml = $akun->tampilAdmin();
// $jml2 = $akun->tampilBank();
$jml3 = $akun->tampilPetugas();
$akun_admin = $jml->rowCount();
// $akun_kasir = $jml2->rowCount();
$akun_petugas = $jml3->rowCount();
//memuncul kan tabel admin
$id = $_SESSION['admin_session'];
$stmt = $akun->runQuery("SELECT * FROM admin WHERE username = :username");
$stmt->bindParam(':username',$id);
$stmt->execute();
$adminRow = $stmt->fetch(PDO::FETCH_ASSOC);
//memunuculkan banyak data di table pelanggan
$data = $akun->runQuery("SELECT * FROM pelanggan");
$data->execute();
$pelangganbaris = $data->rowCount();
//memunculkan banyak data di table penggunaan
$data2 = $akun->runQuery("SELECT * FROM penggunaan");
$data2->execute();
$penggunaanbaris = $data2->rowCount();
//memunculkan banyak data di table tagihan
$data3 = $akun->runQuery("SELECT * FROM tagihan WHERE status = 'belum bayar'");
$data3->execute();
$tagihanbaris = $data3->rowCount();
//memunculkan banyak data pembayaran
$data4 = $akun->runQuery("SELECT * FROM pembayaran");
$data4->execute();
$pembayaranbaris = $data4->rowCount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pentavolt</title>
	<!-- Jquery -->
	<script src="../asset/jquery/jquery-3.3.1.min.js"></script>
	<!-- Bootstrap Js -->
	<script src="../asset/js/bootstrap.js"></script>
	<!-- Jquery Datatable -->
	<script src="../asset/datatable/js/jquery.dataTables.js"></script>
	<!-- Datatable Bootstrap4 Js -->
	<script src="../asset/datatable/js/dataTables.bootstrap4.js"></script>
	<!-- Boostrap Css -->
	<link rel="stylesheet" href="../asset/css/bootstrap.css">
	<!-- Datatable Bootstrap4 Css -->
	<link rel="stylesheet" href="../asset/datatable/css/dataTables.bootstrap4.css">
	<!-- Fontawesome -->
	<link rel="stylesheet" href="../asset/font/css/all.css">
	<!-- Style Css -->
	<link rel="stylesheet" href="../asset/css/sidebar.css">
	<link rel="stylesheet" href="../asset/css/animate.css">

</head>
<body style="background-image: url('../asset/img/home-banner3.jpg');background-size: cover;">
	<div class="wrapper">
		<!-- Sidebar  -->
		<nav id="sidebar" style="background-color: rgba(255,255,255,0.1);">
			<div class="sidebar-header text-center">
				<h3>Pentavolt <span class="fa fa-bolt tada" style="color: yellow;"></span></h3>
			</div>

			<ul class="list-unstyled components font-weight-bold" style="font-size: 16px;">
				<p class="text-center">
					<img src="../asset/img/man.png" width="100px" height="100px"><br>
					Welcome Back <?= $adminRow['level']; ?></p>
				<li id="Home">
					<a href="?page"><span class="fa fa-home"></span> Home</a>
				</li>
				<li id="Akun">
					<a href="?page=Akun"><span class="fa fa-users"></span> Akun</a>
				</li>
				<li id="Pelanggan">
					<a href="?page=Pelanggan"><span class="fa fa-user"></span> Pelanggan</a>
				</li>
				<li id="Penggunaan">
					<a href="?page=Penggunaan"><span class="fa fa-fax"></span> Penggunaan</a>
				</li>
				<li id="Tarif">
					<a href="?page=Tarif"><span class="fa fa-bars"></span> Tarif</a>
				</li>
				<li id="Tagihan">
					<a href="?page=Tagihan"><span class="fa fa-file-invoice-dollar"></span> Tagihan</a>
				</li>
				<li id="Laporan">
					<a href="?page=LapPembayaran">
						<span class="fa fa-file"></span> Laporan Pembayaran
					</a>
				</li>
			</ul>
		</nav>

		<!-- Page Content  -->
		<div id="content">

			<nav class="navbar navbar-expand-lg navbar-light bg-warning" style=" background: linear-gradient(to right,#1b2024 0%, #293036 100%);">
				<div class="container-fluid">

					<button type="button" id="sidebarCollapse2" class="btn btn-info sidebarCollapse">
						<i class="fa fa-align-left"></i><b class="huruf"> Minimize Sidebar</b>
					</button>
					<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fas fa-align-justify"></i>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="nav navbar-nav ml-auto font-weight-bold">
							<li class="nav-item active">
								<div class="dropdown">
									<button class="btn btn-primary font-weight-bold" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span> <?= $adminRow['nama_admin']; ?></button>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
										<a href="../logout.php" class="dropdown-item font-weight-bold"><span class="fa fa-sign-out-alt"></span> Logout</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<?php include 'open_file.php'; ?>
			
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function () {
		$('.sidebarCollapse').on('click', function () {
			$('#sidebar, #content, .quickinfo').toggleClass('active');
			$('.collapse.in').toggleClass('in');
			$('.fa').removeClass('fa-align-left');
			$('.fa').toggleClass('fa-arrow-right');
			$('.sidebarCollapse').toggleClass('tutup');
			$('a[aria-expanded=true]').attr('aria-expanded', 'false');

		});
		$('#sidebarCollapse2').on('click',function(){
			$('.fa').addClass('fa-align-left');
		});
		$('#akun').DataTable({
			lengthChange:false,
			"lengthMenu": [4,10,25, "All"]
		});
		$('#akun2').DataTable({
			lengthChange:false,
			"lengthMenu": [4,10,25, "All"]
		});

		$('#dataTable').DataTable({
			lengthChange:  false,
			"lengthMenu": [4,10,25, "All"]
		});
	});
</script>
