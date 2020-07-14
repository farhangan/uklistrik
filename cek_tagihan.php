<?php 
require_once 'class/init.php';
$query = new Query;
$id = $_GET['id'];
$data =$query->runQuery("SELECT tagihan.*,penggunaan.*,pelanggan.*,tarif.* FROM penggunaan,pelanggan,tagihan,tarif WHERE tagihan.id_pelanggan = pelanggan.id_pelanggan AND tagihan.id_penggunaan = penggunaan.id_penggunaan AND penggunaan.id_pelanggan = pelanggan.id_pelanggan AND CONCAT(YEAR(CURRENT_TIMESTAMP), MONTH(CURRENT_TIMESTAMP)) > CONCAT(tagihan.tahun, tagihan.bulan) AND tarif.id_tarif = pelanggan.id_tarif AND tagihan.status = 'belum bayar' AND pelanggan.id_pelanggan = :id_pelanggan");
$data->bindParam(':id_pelanggan',$id);
$data->execute();
$row = $data->fetchAll(PDO::FETCH_ASSOC);
 ?>
 <table class="table table-borderless text-center" id="dataTable">
 	<thead>
 	<tr>
 		<th>Nama Pelanggan</th>
 		<th>Daya</th>
 		<th>Jumlah Penggunaan</th>
 		<th>Bulan</th>
 		<th>Tahun</th>
		<th>Total Tag Pln</th>
 	</tr>
 	</thead>
 	<tbody>
 	<?php foreach ($row as $rows) {
 	?>
 	<tr>
 		<td><?= $rows['nama_pelanggan']; ?></td>
 		<td><?= $rows['daya']; ?></td>
 		<td><?= $rows['jumlah_meter']; ?></td>
 		<td><?= $rows['bulan'];?></td>
 		<td><?= $rows['tahun']; ?></td>
 		<td><?= $rows['tarifperkwh']*$rows['jumlah_meter'] ?></td>
 	</tr>
 	<?php } ?>
 	</tbody>
 </table>
 <script>
	$(document).ready(function(){
		$('#dataTable').DataTable({
			lengthChange:false,
			paging:false,
			"searching":false,
			"language": {
				"emptyTable" : "Tagihan anda tidak ada atau sudah bayar"
			}
		});
	})
</script>