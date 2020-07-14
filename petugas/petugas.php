<?php 
session_start();
require_once '../class/init.php';
if(!isset($_SESSION['session_petugas'])){
header('location:../index.php');
 }
$akun = new Akun;
 $id = $_SESSION['session_petugas'];
 $dataAkun = $akun->runQuery("SELECT * FROM petugas WHERE username = :username");
 $dataAkun->bindParam(':username',$id);
 $dataAkun->execute();
 $rowAkun = $dataAkun->fetch(PDO::FETCH_ASSOC);
 //memunculkan banyak data di table penggunaan
$data2 = $akun->runQuery("SELECT * FROM penggunaan");
$data2->execute();
$penggunaanbaris = $data2->rowCount();
//memunculkan banyak data di table tagihan
$data3 = $akun->runQuery("SELECT * FROM tagihan WHERE status = 'belum bayar'");
$data3->execute();
$tagihanbaris = $data3->rowCount();
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
 		<nav id="sidebar">
 			<div class="sidebar-header text-center">
 				<h3>Pentavolt <span class="fa fa-bolt animate tada" style="color: yellow;"></span></h3>
 			</div>

 			<ul class="list-unstyled components font-weight-bold">
 				<p class="text-center"><img src="../asset/img/man.png" width="120px" height="120px"> <br>
 					Welcome Back <?= $rowAkun['nama_petugas']; ?></p>
 				<li id="Home">
 					<a href="?page"><span class="fa fa-home"></span> Home</a>
 				</li>
 				<li id="Penggunaan">
 					<a href="?page=Penggunaan"><span class="fa fa-fax"></span> Penggunaan</a>
 				</li>
 				<li id="Tarif">
 					<a href="?page=Tarif"><span class="fa fa-bars"></span> Tarif</a>
 				</li>
 			</ul>
 		</nav>

 		<!-- Page Content  -->
 		<div id="content">

 			<nav class="navbar navbar-expand-lg text-light" style=" background: linear-gradient(to right,#1b2024 0%, #293036 100%);">
 				<div class="container-fluid">

 					<button type="button" id="sidebarCollapse2" class="btn btn-info sidebarCollapse">
 						<i class="fa fa-align-left"></i>
 					</button>
 					<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
 						<i class="fas fa-align-justify"></i>
 					</button>

 					<div class="collapse navbar-collapse" id="navbarSupportedContent">
 						<ul class="nav navbar-nav ml-auto font-weight-bold">
 							<li class="nav-item active">
 								<div class="dropdown">
 									<button class="btn btn-primary font-weight-bold" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span> <?= $rowAkun['nama_petugas']; ?></button>
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
 	$(document).ready(function() {
 		$('.sidebarCollapse').on('click', function () {
 			$('#sidebar, #content').toggleClass('active');
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
 		$('#cari').change(function(){
 			var id = $(this).val();

 			$.ajax({
 				url:'pembayaran/getData.php',
 				method:'get',
 				data:{id_pelanggan : id},
 				success:function(data){
 					$('#data').html(data);
 				}
 			});
 		});
 	});
 </script>

