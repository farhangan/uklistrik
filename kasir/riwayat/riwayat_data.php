<?php 
$pembayaran = new Pembayaran;
$id_bank = $rowAkun['id_bank'];
$data = $pembayaran->riwayatPembayaran($id_bank);
 ?>
 <div class="card text-light" style="background-color: rgba(41,48,54,0.9)">
 	<div class="card-body">
 		<table class="table table-borderless text-center" id="dataTable2">
 			<thead>
 				<tr>
 					<Th>Id Pembayaran</Th>
 					<Th>Id Tagihan</Th>
 					<Th>Id Pelanggan</Th>
 					<Th>Tanggal Bayar</Th>
 					<Th>Bulan Bayar</Th>
 					<th>Biaya Admin</th>
 					<th>Total Bayar</th>
 					<th>Nama Bank</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php foreach ($data as $row): ?>
  				<tr>
 					<td><?= $row['id_pembayaran'] ?></td>
 					<td><?= $row['id_tagihan'] ?></td>
 					<td><?= $row['id_pelanggan'] ?></td>
 					<td><?= $row['tanggal_pembayaran'] ?></td>
 					<td><?= $row['bulan_bayar'] ?></td>
 					<td><?= $row['biaya_admin'] ?></td>
 					<td><?= $row['total_bayar'] ?></td>
 					<td><?= $row['nama_bank'] ?></td>
 				</tr>
 				<?php endforeach ?>

 			</tbody>
 		</table>
 	</div>
 </div>