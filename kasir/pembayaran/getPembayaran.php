<?php 
require_once '../../class/init.php';
date_default_timezone_set("asia/jakarta");
$pembayaran = new Pembayaran;
if(isset($_GET['id'])){
	$id_tagihan = $_GET['id'];
	$data = $pembayaran->runQuery("SELECT tagihan.*,penggunaan.*,pelanggan.*,tarif.* FROM tagihan,penggunaan,pelanggan,tarif WHERE tagihan.id_penggunaan = penggunaan.id_penggunaan AND penggunaan.id_pelanggan = pelanggan.id_pelanggan AND pelanggan.id_tarif = tarif.id_tarif AND id_tagihan = :id_tagihan");
	$data->bindParam(':id_tagihan',$id_tagihan);
	$data->execute();
	$row = $data->fetch(PDO::FETCH_ASSOC);

}

?>

<table class="table table-bordered">
		<tr>
			<td>Id Pelanggan</td>
			<td><input type="text" class="form-control" name="id_pelanggan" value="<?= $row['id_pelanggan']; ?>" readonly></td>
		</tr>
		<tr>
			<td>Nama Pelanggan</td>
			<td><input type="text" class="form-control" value="<?= $row['nama_pelanggan']; ?>" readonly></td>
		</tr>
		<tr>
			<td>Daya</td>
			<td><input type="text" class="form-control" value="<?= $row['daya']; ?>" readonly></td>
		</tr>
		<tr>
			<td>Stand Meter</td>
			<td><input type="text" class="form-control" value="<?= $row['meter_awal'].'-'.$row['meter_akhir']; ?>" readonly></td>
		</tr>
		<tr>
			<td>Bulan/Tahun Tagih</td>
			<td><input type="text" class="form-control" value="<?= $row['bulan'].'/'.$row['tahun']; ?>" readonly></td>
		</tr>
		<tr>
			<td>Total Tagihan</td>
			<td><input type="text" class="form-control" value="<?= $row['jumlah_meter']*$row['tarifperkwh']; ?>" readonly></td>
		</tr>
		<tr>
			<td>Biaya Admin Bank</td>
			<td><input type="text" class="form-control" name="biaya_admin" value="2500" readonly></td>
		</tr>
		<tr>
			<td>Total Bayar</td>
			<td><input type="text" class="form-control" name="total_bayar" value="<?= $row['jumlah_meter']*$row['tarifperkwh']+2500; ?>" readonly></td>
		</tr>
		<input type="hidden" name="tanggal_bayar" value="<?= date('Y-m-d h:i:s'); ?>">
		<input type="hidden" name="bulan_bayar" value="<?= date('m'); ?>">
		<input type="hidden" name="id_tagihan" value="<?= $row['id_tagihan']; ?>">
</table>


