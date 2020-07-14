<?php 
require_once '../../class/init.php';
$penggunaan = new Penggunaan;
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$stmt = $penggunaan->runQuery("SELECT penggunaan.*,tagihan.* FROM penggunaan,tagihan WHERE tagihan.id_penggunaan = penggunaan.id_penggunaan AND penggunaan.id_penggunaan = :id_penggunaan");
	$stmt->bindParam(':id_penggunaan',$id);
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_ASSOC);

}
?>
<?php if($data['status'] == 'belum bayar'){ ?> 
	<div class="form-group">
		<label for="">Id Penggunaan</label>
		<input type="text" class="form-control" name="id_penggunaan"  value="<?= $data['id_penggunaan']; ?>" readonly>
	</div>
	<div class="form-group">
		<label for="">Id Pelanggan</label>
		<input type="text" class="form-control"  value="<?= $data['id_pelanggan'] ?>" readonly>
	</div>
	<div class="form-group">
		<label for="">Bulan Penggunaan</label>
		<input type="text" class="form-control"  value="<?= $data['bulan']; ?>" readonly>
	</div>
	<div class="form-group">
		<label for="">Tahun Penggunaan</label>
		<input type="text" class="form-control"  value="<?= $data['tahun']; ?>" readonly>
	</div>
	<div class="form-group">
		<label for="">Meter Awal</label>
		<input type="text" class="form-control" name="meter_awal" value="<?= $data['meter_awal']; ?>">
	</div>
	<div class="form-group">
		<label for="">Meter Akhir</label>
		<input type="text" class="form-control" name="meter_akhir" value="<?= $data['meter_akhir'] ?>">
	</div>
	<div class="form-group ml-auto">
		<button class="btn btn-success" name="Upenggunaan"><span class="fa fa-sync-alt fa-spin"></span> Ubah</button>
	</div>
<?php }else {?>
	<div class="form-group">
		<label for="">Id Penggunaan</label>
		<input type="text" class="form-control"  value="<?= $data['id_penggunaan']; ?>" readonly>
	</div>
	<div class="form-group">
		<label for="">Id Pelanggan</label>
		<input type="text" class="form-control"  value="<?= $data['id_pelanggan'] ?>" readonly>
	</div>
	<div class="form-group">
		<label for="">Bulan Penggunaan</label>
		<input type="text" class="form-control"  value="<?= $data['bulan']; ?>" readonly>
	</div>
	<div class="form-group">
		<label for="">Tahun Penggunaan</label>
		<input type="text" class="form-control"  value="<?= $data['tahun']; ?>" readonly>
	</div>
	<div class="form-group">
		<label for="">Meter Awal</label>
		<input type="text" class="form-control" name="meter_awal" value="<?= $data['meter_awal']; ?>" readonly>
	</div>
	<div class="form-group">
		<label for="">Meter Akhir</label>
		<input type="text" class="form-control" name="meter_akhir" value="<?= $data['meter_akhir'] ?>" readonly>
	</div>
	<?php } ?>