<?php 
require_once '../../class/init.php';
$tarif = new Tarif;

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$stmt = $tarif->runQuery("SELECT * FROM tarif WHERE id_tarif = :id");
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<div class="form-group">
	<label for="">Id Tarif</label>
	<input type="text" class="form-control" name="id_tarif" value="<?= $data['id_tarif']; ?>"  readonly>
</div>
<div class="form-group">
	<label for="">Golongan</label>
	<input type="text" class="form-control" value="<?= $data['golongan']; ?>" readonly>
</div>
<div class="form-group">
	<label for="">Daya</label>
	<input type="text" class="form-control" value="<?= $data['daya']; ?>" readonly>
</div>
<div class="form-group">
	<label for="">Tarif/Kwh</label>
	<input type="text" class="form-control" name="tarifperkwh" value="<?= $data['tarifperkwh']; ?>">
</div>