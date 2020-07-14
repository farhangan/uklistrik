<?php 
require_once '../../class/init.php';
$penggunaan = new Penggunaan;
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$stmt = $penggunaan->runQuery("SELECT * FROM penggunaan WHERE id_pelanggan = :id_pelanggan ORDER BY CONCAT(tahun, bulan) DESC");
	$stmt->bindParam(':id_pelanggan',$id);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
}

$banding1 = date("Yn");
$bulan = date('n');
$tahun = date('Y');
$banding2 = $row['tahun'].$row['bulan'];

if($row['id_penggunaan']){ 
	if($banding1 > $banding2){?>
		<div class="form-group">
			<label for="">Bulan</label>
			<input type="text" class="form-control" name="bulan" value="<?= $bulan; ?>" readonly>
		</div>
		<div class="form-group">
			<label for="">Tahun</label>
			<input type="text" class="form-control" name="tahun" value="<?= $tahun ?>" readonly>
		</div>	
		<div class="form-group">
			<label for="">Meter Awal</label>
			<input type="text" class="form-control" name="meter_awal" value="<?= $row['meter_akhir']; ?>" readonly>
		</div>	
		<div class="form-group">
			<label for="">Meter Akhir</label>
			<input type="text" class="form-control" name="meter_akhir">
		</div>
		<button class="btn btn-success" name="masuk" type="submit">
			<span class="fa fa-plus-circle fa-spin"></span> Tambah Data
		</button>
	<?php 
	 }else{ 
	 	?>
	<span style="color: red">* Penggunaan bulan ini sudah dimasukkan</span>	

		<div class="form-group">
			<label for="">Bulan</label>
			<input type="text" class="form-control" name="bulan" value="<?= $bulan;
			 ?>" readonly>
		</div>
		<div class="form-group">
			<label for="">Tahun</label>
			<input type="text" class="form-control" name="meter_akhir" value="<?= $tahun; ?>" readonly>
		</div>		
		<div class="form-group">
			<label for="">Meter Awal</label>	
			<input type="text" class="form-control" name="meter_awal" value="<?= $row['meter_awal']; ?>" readonly>
		</div>
		<div class="form-group">
			<label for="">Meter Akhir</label>
			<input type="text" class="form-control" name="meter_awal" value="<?= $row['meter_akhir']; ?>" readonly>
		</div>
	 <?php 
	}
}else{ ?>
	<div class="form-group">
		<div class="form-group">
			<label for="">Bulan</label>
			<input type="text" class="form-control" name="bulan" value="<?= $bulan; ?>" readonly>
		</div>
		<div class="form-group">
			<label for="">Tahun</label>
			<input type="text" class="form-control" name="tahun" value="<?= $tahun ?>" readonly>
		</div>	
		<div class="form-group">
			<label for="">Meter Awal</label>
			<input type="text" class="form-control" name="meter_awal" value="0" readonly="" placeholder="Meter Awal">
		</div>	
		<div class="form-group">
			<label for="">Meter Akhir</label>
			<input type="text" class="form-control" name="meter_akhir" placeholder="Meter Akhir">
		</div>
		<button class="btn btn-success" name="masuk" type="submit">
			<span class="fa fa-plus-circle fa-spin"></span> Tambah Data
		</button>
<?php } ?>