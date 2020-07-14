<?php
require_once '../../class/init.php';
$akun = new Akun; 
if(isset($_GET['id'])){
$id = $_GET['id'];
$stmt = $akun->tampilEdit($id);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
}
 ?>
<div class="form-group">
	<label for="">Id Petugas</label>
	<input type="text" class="form-control"  name="id_petugas" value="<?= $data['id_petugas'] ?>" readonly	>
</div>
<div class="form-group">
	<label for="">Nama Petugas</label>
	<input type="text" class="form-control"  name="nama_petugas" value="<?= $data['nama_petugas'] ?>">
</div>
<div class="form-group">
	<label for="">Username</label>
	<input type="text" class="form-control" name="username" value="<?= $data['username'] ?>">
</div>
<div class="form-group">
	<label for="">Level</label>
	<input type="text" class="form-control" value="<?= $data['level']?>" readonly>
</div>