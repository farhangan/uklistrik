<?php 
$tarif = new Tarif;

$data = $tarif->showTarif();
$row = $data->fetchAll(PDO::FETCH_ASSOC);
 ?>
 <div class="card font-weight-bold text-light" style="background-color: rgba(41,48,54,0.9)">
 	<div class="card-header">
 		Data Tarif
 	</div>
 	<div class="card-body ">
 		<table class="table table-borderless text-center" id="dataTable">
 			<thead>
 				<tr>
 					<th>Id Tarif</th>
 					<th>Daya</th>
 					<th>Tarif/Kwh</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php foreach ($row as $rows) { ?>
 				<tr>
 					<td><?= $rows['id_tarif'] ?></td>
 					<td><?= $rows['daya'] ?></td>
 					<td><?= $rows['tarifperkwh'] ?></td>
 				</tr>
 				<?php } ?>
 			</tbody>
 		</table>
 	</div>
 </div>