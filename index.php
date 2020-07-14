<?php 
session_start();
require_once 'class/init.php';
$login = new Login;
if(isset($_POST['masuk'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	if($login->prosesLogin($username,$password)){

	}else{
		?>
		<script>
			alert('Username Atau Password Salah');
			document.location = 'index.php';
		</script>
		<?php
	}
}
if(isset($_SESSION['admin_session'])){
	header('location:admin/admin.php');
}
if(isset($_SESSION['session_bank'])){
	header('location:kasir/kasir.php');
}
if(isset($_SESSION['session_petugas'])){
	header('location:petugas/petugas.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pentavolt</title>
	<!-- Jquery -->
	<script src="asset/jquery/jquery-3.3.1.min.js"></script>
	<!-- Bootstrap Js -->
	<script src="asset/js/bootstrap.js"></script>
	<!-- Jquery Datatable -->
	<script src="asset/datatable/js/jquery.dataTables.js"></script>
	<!-- Datatable Bootstrap4 Js -->
	<script src="asset/datatable/js/dataTables.bootstrap4.js"></script>
	<!-- Boostrap Css -->
	<link rel="stylesheet" href="asset/css/bootstrap.css">
	<!-- Datatable Bootstrap4 Css -->
	<link rel="stylesheet" href="asset/datatable/dataTables.bootstrap4.css">
	<!-- Fontawesome -->
	<link rel="stylesheet" href="asset/font/css/all.css">
	<!-- Style Css -->
	<link rel="stylesheet" href="asset/css/sidebar.css">
</head>
<body style="background-image: url('asset/img/home-banner3.jpg');background-size: cover;">
	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: transparent;box-shadow: none;">
			<span class="navbar-brand" style="font-size: 24px;"><a href="?page">Pentavolt</a> <span class="fa fa-bolt tada"></span></span>
			<ul class="nav navbar-nav ml-auto mr-2 font-weight-bold">
				<li class="nav-item">
					<a href="?page" class="nav-link mr-2 text-light"><span class="fa fa-home"></span> Home</a>
				</li>
				<li class="nav-item">
					<a href="?page=Cek-Tagihan" class="nav-link mr-2 text-light"><span class="fa fa-check"></span> Cek Tagihan</a>
				</li>
				<li class="nav-item active">
					<button class="btn btn-warning font-weight-bold"data-toggle="modal" data-target="#Login"><span class="fa fa-sign-in-alt"></span> Login</button>
				</li>
			</ul>

		</nav>
		<!-- <div class="card float-right font-weight-bold" style="width: 450px;margin-top: 150px;margin-right: 140px;background-color: transparent;border:none;background-color: rgba(255,255,255,0.5);">
			<div class="card-header">
				Please Login
			</div>
			<div class="card-body">
				<form method="post">
					<div class="form-group">
						<label for=""><span class="fa fa-user"></span> Username</label>
						<input type="text" class="form-control" name="username" placeholder="Username"> 
					</div>
					<div class="form-group">
						<label for=""><span class="fa fa-key"></span> Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-info" name="masuk">
						<span class="fa fa-sign-in-alt"></span> Masuk
					</button>
				</form>
			</div>
		</div> -->
	<?php include 'open_file.php'; ?>
	<div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content text-light" style="background-color: rgba(255,255,255,0.2);margin-top: 140px;">
				<div class="modal-header" style="border-bottom: 0px;">
					<h5 class="modal-title" id="exampleModalLabel">Please Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post">
						<div class="form-group">
							<label for=""><span class="fa fa-user"></span> Username</label>
							<input type="text" class="form-control" name="username" placeholder="Username"> 
						</div>
						<div class="form-group">
							<label for=""><span class="fa fa-key"></span> Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
					</div>
					<div class="modal-footer" style="border-top: 0px;">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button class="btn btn-info" name="masuk">
							<span class="fa fa-sign-in-alt"></span> Masuk
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script>
	$(document).ready(function(){
		$('#dataTable').DataTable();
	})
</script>