<?php 
require_once '../../class/init.php';

$pembayaran = new Pembayaran;

if(isset($_GET['id_pelanggan'])){
$id = $_GET['id_pelanggan'];
$stmt = $pembayaran->runQuery("SELECT tagihan.*,penggunaan.*,pelanggan.*,tarif.* FROM penggunaan,pelanggan,tagihan,tarif WHERE tagihan.id_pelanggan = pelanggan.id_pelanggan AND tagihan.id_penggunaan = penggunaan.id_penggunaan AND penggunaan.id_pelanggan = pelanggan.id_pelanggan AND CONCAT(YEAR(CURRENT_TIMESTAMP), MONTH(CURRENT_TIMESTAMP)) > CONCAT(tagihan.tahun, tagihan.bulan) AND tarif.id_tarif = pelanggan.id_tarif AND pelanggan.id_pelanggan = :id_pelanggan");
$stmt->bindParam('id_pelanggan',$id);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

 }
 $banding1 = date('Yn');
 $bulan = date('m');
 $tahun = date('Y');
 ?>

	<table class="table table-borderless text-center mt-2" id="dataTable">
 	<thead>
		<tr>
			<th>Id Pelanggan</th>
			<th>Nama Pelanggan</th>
			<th>Jumlah Penggunaan</th>
			<th>Tahun Tagih</th>
			<th>Bulan Tagih</th>
			<th>Total Bayar</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>

		<?php
		 	foreach ($row as $rows) {
			if($rows['status'] == 'sudah bayar'){ ?>
				<div class="alert alert-success">
					Tagihan Sudah Dibayar
				</div>
	<?php }else{ ?>
		<tr>
			<td><?= $rows['id_pelanggan']; ?></td>
			<td><?= $rows['nama_pelanggan'] ?></td>
			<td><?= $rows['jumlah_meter']; ?></td>
			<td><?= $rows['tahun']; ?></td>
			<td><?= $rows['bulan']; ?></td>
			<td><?= $rows['jumlah_meter']*$rows['tarifperkwh']; ?></td>
			<td>
				<button type="button" data-toggle="modal" id="<?= $rows['id_tagihan'] ?>" data-target="#BayarTagihan" class="btn btn-success font-weight-bold btn-bayar">
					<span class="fa fa-shopping-cart"></span> Bayar Tagihan
				</button>
			</td>
		</tr>
	<?php } } ?>
	</tbody>
 </table>

 <script>
 	$(document).ready(function(){
 		$('#dataTable').DataTable({
 			lengthChange:  false,
 			ordering:false,
 			"lengthMenu": [4,10,25, "All"]
 		});
 		$('.btn-bayar').on('click',function(){
 			var id = $(this).attr("id");

 			$.ajax({
 				url:'pembayaran/getPembayaran.php',
 				method:'get',
 				data: {id : id},
 				success:function(data){
 					$('#muncul').html(data);
 				}
 			})
 		});
 	})
 </script>