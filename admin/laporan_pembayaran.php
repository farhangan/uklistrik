<?php 
$pembayaran = new Pembayaran;

$tampil = $pembayaran->laporanPembayaran(PDO::FETCH_ASSOC);
 ?>
 <div class="card text-light" style="background-color: rgba(41,48,54,0.9);">
 	<div class="card-header font-weight-bold">
 		Laporan Pembayaran Tagihan
 	</div>
 	<div class="card-body">
 		<table class="table table-borderless text-center" id="dataTable">
 			<thead>
 				<tr>
 					<th>ID PEMBAYARAN</th>
 					<th>ID TAGIHAN</th>
 					<th>ID PELANGGAN</th>
 					<th>TANGGAL BAYAR</th>
 					<th>BULAN BAYAR</th>
 					<th>BIAYA ADMIN</th>
 					<th>TOTAL BAYAR</th>
 					<th>ID BANK</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php foreach ($tampil as $row): ?>
  				<tr>
 					<td><?= $row['id_pembayaran']; ?></td>
 					<td><?= $row['id_tagihan']; ?></td>
 					<td><?= $row['id_pelanggan']; ?></td>
 					<td><?= $row['tanggal_pembayaran']; ?></td>
 					<td><?= $row['bulan_bayar']; ?></td>
 					<td><?= $row['biaya_admin']; ?></td>
 					<td><?= $row['total_bayar']; ?></td>
 					<td><?= $row['id_bank']; ?></td>
 				</tr>
 				<?php endforeach ?>

 			</tbody>
 		</table>
 	</div>
 </div>