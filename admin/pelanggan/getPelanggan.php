<?php 
require_once '../../class/init.php';
$pelanggan = new Pelanggan;
$tarif = new Tarif;
$dataTarif = $tarif->showTarif();

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $pelanggan->runQuery("SELECT pelanggan.*,tarif.* FROM pelanggan,tarif WHERE pelanggan.id_tarif = tarif.id_tarif AND id_pelanggan = :id_pelanggan");
	$data->bindParam(':id_pelanggan',$id);
	$data->execute();
	$row = $data->fetch(PDO::FETCH_ASSOC);
}
?>
<div class="form-group">
	<label for="">Id Pelanggan</label>
	<input type="text" class="form-control" name="id_pelanggan" value="<?= $row['id_pelanggan'] ?>" readonly>
</div>
<div class="form-group">
	<label for=""></label>
	<input type="text" class="form-control" name="nama_pelanggan" value="<?= $row['nama_pelanggan'] ?>">
</div>
<div class="form-group">
	<label for=""></label>
	<input type="text" class="form-control" name="nomor_kwh" value="<?= $row['nomor_kwh']; ?>">
</div>
<div class="form-group">
	<label for=""></label>
	<input type="text" class="form-control" name="alamat" value="<?= $row['alamat']; ?>">
</div>
<div class="form-group">
	<label for=""></label>
	<select name="id_tarif" class="form-control">
		<option value="<?= $row['id_tarif'] ?>"><?= $row['golongan'] ?></option>
		<?php foreach ($dataTarif as $rows): ?>
		<option value="<?= $rows['id_tarif'] ?>"><?= $rows['golongan'] ?></option>			
		<?php endforeach ?>
	</select>
</div>
