<?php 
$tarif = new Tarif;
$codeTarif = buatKode('tarif','TRF');
$data = $tarif->showTarif();
$row = $data->fetchAll(PDO::FETCH_ASSOC);
if(isset($_POST['Ttarif'])){
	$id_tarif = $_POST['id_tarif'];
	$golongan = $_POST['golongan'];
	$daya     = $_POST['daya'];
	$tarifperkwh = $_POST['tarifperkwh'];

	if($tarif->inputTarif($id_tarif,$golongan,$daya,$tarifperkwh)){
		?>
		<script>
			alert('Berhasil Menambahkan Data Tarif');
			document.location = '?page=Tarif';
		</script>
		<?php
	}else{
		?>
		<script>
			alert('Gagal Menambahkan Data Tarif');
			document.location = '?page=Tarif';
		</script>
		<?php
	}
}
if(isset($_POST['UTarif'])){
	$id_tarif = $_POST['id_tarif'];
	$tarifperkwh = $_POST['tarifperkwh'];

	if($tarif->ubahTarif($id_tarif,$tarifperkwh)){
		?>
		<script>
			alert('Tarif Berhasil Diubah');
			document.location = '?page=Tarif';
		</script>
		<?php
	}else{
		?>
		<script>
			alert('Tarif Gagal Diubah');
			document.location = '?page=Tarif';
		</script>
		<?php
	}
}
if(isset($_GET['Kode'])){
	$id = $_GET['Kode'];
	if($tarif->hapusTarif($id)){
		?>
		<script>
			alert('Tarif Berhasil Dihapus');
			document.location = '?page=Tarif';
		</script>
		<?php
	}else{
		?>
		<script>
			alert('Tarif Gagal Dihapus');
			document.location = '?page=Tarif';
		</script>
		<?php
	}

}
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
 					<th>Golongan</th>
 					<th>Daya</th>
 					<th>Tarif/Kwh</th>
 					<th>
 						<button class="btn btn-outline-success font-weight-bold" data-toggle="modal" data-target="#TambahTarif">
 							<span class="fa fa-plus-circle fa-spin"></span> Tambah Data
 						</button>
 					</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php foreach ($row as $rows) { ?>
 				<tr>
 					<td><?= $rows['id_tarif'] ?></td>
 					<td><?= $rows['golongan'] ?></td>
 					<td><?= $rows['daya'] ?></td>
 					<td><?= $rows['tarifperkwh'] ?></td>
 					<td>
 						<button type="button" class="btn btn-warning font-weight-bold btn-tarif" data-toggle="modal" data-target="#TarifEdit" id="<?= $rows['id_tarif']; ?>">
 							<span class="fa fa-edit"></span> Edit
 						</button>
 						<a href="?page=Tarif&Kode=<?= $rows['id_tarif']; ?>" class="btn btn-danger font-weight-bold">
 							<span class="fa fa-trash-alt"></span> Hapus
 						</a>
 					</td>
 				</tr>
 				<?php } ?>
 			</tbody>
 		</table>
 	</div>
 </div>

<div class="modal fade" id="TambahTarif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Petugas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body font-weight-bold">
				<form method="post">
					<div class="form-group">
						<label for="">Id Tarif</label>
						<input type="text" class="form-control" name="id_tarif" value="<?= $codeTarif ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Daya</label>
						<input type="text" class="form-control" name="daya" placeholder="Daya">
					</div>

					<div class="form-group">
						<label for="">Golongan</label>
						<input type="text" class="form-control" name="golongan" placeholder="Golongan">
					</div>
					<div class="form-group">
						<label for="">Tarif/Kwh</label>
						<input type="text" class="form-control" name="tarifperkwh" placeholder="Tarif/Kwh" maxlength="10">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="Ttarif" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="TarifEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Petugas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body font-weight-bold">
				<form method="post">
					<div id="data2">
						
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="UTarif" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$(".btn-tarif").on('click',function(){
			var id = $(this).attr("id");

			$.ajax({
				url:'tarif/getTarif.php',
				method:'get',
				data:{id : id},
				success:function(data){
					$('#data2').html(data);
				}
			})
		})
	});
</script>