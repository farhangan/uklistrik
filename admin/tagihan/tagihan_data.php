<?php 
$tagihan = new Tagihan;

$data = $tagihan->showTagihan();
$row = $data->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="card text-light" style="background-color: rgba(41,48,54,0.9)">
	<div class="card-header">
		Data Tagihan
	</div>
	<div class="card-body">
		<table class="table table-borderless text-center" id="dataTable">
			<thead>
				<tr>
					<th>Id Tagihan</th>
					<th>Id Penggunaan</th>
					<th>Id Pelanggan</th>
					<th>Jumlah Meter</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($row as $rows) { ?>
				<tr>
					<td><?= $rows['id_tagihan']; ?></td>
					<td><?= $rows['id_penggunaan']; ?></td>
					<td><?= $rows['id_pelanggan']; ?></td>
					<td><?= $rows['jumlah_meter']; ?></td>
					<td><?php 
					if($rows['status'] == 'sudah bayar'){?>
						<button class="btn btn-success font-weight-bold" type="button">Sudah Bayar</button>	
				<?php }else{ ?>
						<button class="btn btn-danger font-weight-bold" type="button">Belum Bayar</button>	

				<?php }
					 ?></td>
					
				</tr>
			<?php	} ?>
			</tbody>
		</table>
	</div>
</div>