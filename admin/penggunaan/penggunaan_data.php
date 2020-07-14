<?php 
$penggunaan = new Penggunaan;
$penggunaanKode = buatKode('penggunaan','PGN');
$data = $penggunaan->showPenggunaan();
$row = $data->fetchAll(PDO::FETCH_ASSOC);
$pelanggan = new Pelanggan;
$tagihan = new Tagihan;
$tagihankode = buatKode('tagihan','TGH');
$data2 = $pelanggan->showPelanggan();
$pelangganid = $data2->fetchAll(PDO::FETCH_ASSOC);
//tambah penggunaan
if(isset($_POST['masuk'])){
	$id_penggunaan = $_POST['id_penggunaan'];
	$id_pelanggan = $_POST['id_pelanggan'];
	$id_tagihan = $tagihankode;
	$bulan = $_POST['bulan'];
	$tahun  = $_POST['tahun'];
	$meter_awal = $_POST['meter_awal'];
	$meter_akhir = $_POST['meter_akhir'];
	$jumlah_meter = $meter_akhir-$meter_awal;
	$status = 'belum bayar';
	if($meter_akhir < $meter_awal){
		?>
		<script>
			alert('Meter Akhir Harus Lebih Besar Dari Meter Awal');
		</script>
		<?php
	}else{
		if($penggunaan->inputPenggunaan($id_penggunaan,$id_pelanggan,$bulan,$tahun,$meter_awal,$meter_akhir)){
		?>
		<script>
			alert('Berhasil Menyimpan Data Penggunaan');
			document.location = '?page=Penggunaan';
		</script>
		<?php
		$tagihan->inputTagihan($id_tagihan,$id_penggunaan,$id_pelanggan,$bulan,$tahun,$jumlah_meter,$status);
	}else{
		?>
		<script>
			alert('Gagal Menyimpan Data Penggunaan');
			document.location = '?page=Penggunaan';
		</script>
		<?php	
	}
	}
	
}
//ubah penggunaan
if(isset($_POST['Upenggunaan'])){
	$id_penggunaan = $_POST['id_penggunaan'];
	$meter_awal = $_POST['meter_awal'];
	$meter_akhir = $_POST['meter_akhir'];
	$jumlah_meter = $meter_akhir-$meter_awal;

	if($penggunaan->ubahDataPenggunaan($id_penggunaan,$meter_awal,$meter_akhir)){
		?>
		<script>
			alert('Berhasil Mengubah Data Penggunaan');
			document.location = '?page=Penggunaan';
		</script>

		<?php
		$tagihan->editTagihan($id_penggunaan,$jumlah_meter);

	}else{
		?>
		<script>
			alert('Gagal Mengubah Data Penggunaan');
			document.location = '?page=Penggunaan';
		</script>
		<?php
	}

}

//delete penggunaan
if(isset($_GET['Kode'])){
	$id = $_GET['Kode'];
	if($penggunaan->hapusDataPenggunaan($id)){
		?>
		<script>
			alert('Penggunaan Berhasil Dihapus');
			document.location = '?page=Penggunaan';
		</script>
		<?php
	}else{
		?>
		<script>
			alert('Penggunaan Gagal Dihapus');
			document.location = '?page=Penggunaan';
		</script>
		<?php
	}
}
?>
<div class="card font-weight-bold text-light" style="background-color: rgba(41,48,54,0.9)">
	<div class="card-header">
		Data Penggunaan
	</div>
	<div class="card-body">
		<table class="table table-borderless text-center" id="dataTable">
			<thead>
				<tr>
					<th>Id Penggunaan</th>
					<th>Id Pelanggan</th>
					<th>Bulan</th>
					<th>Tahun</th>
					<th>Meter Awal</th>
					<th>Meter Akhir</th>
					<th>
						<button class="btn btn-outline-success font-weight-bold" data-toggle = "modal" data-target="#TambahPenggunaan">
							<span class="fa fa-plus-circle fa-spin"></span> Tambah Data
						</button>
					</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($row as $rows){ ?>
				<tr>
					<td><?= $rows['id_penggunaan'] ?></td>
					<td><?= $rows['id_pelanggan'] ?></td>
					<td><?= $rows['bulan'] ?></td>
					<td><?= $rows['tahun'] ?></td>
					<td><?= $rows['meter_awal']; ?></td>
					<td><?= $rows['meter_akhir']; ?></td>
					<td>
						<button class="btn btn-warning font-weight-bold id_penggunaan" id="<?= $rows['id_penggunaan'] ?>" data-target="#EditPenggunaan" data-toggle="modal">
							<span class="fa fa-edit"></span> Edit
						</button>
						<a href="?page=Penggunaan&Kode=<?= $rows['id_penggunaan']; ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger font-weight-bold">
							<span class="fa fa-trash-alt"></span> Hapus
						</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="TambahPenggunaan" tabindex="-1" role="dialog" aria-labelledby="Tambah Penggunaan" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="TambahPenggunan">Tambah Penggunaan</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="fa fa-window-close"></span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="form-group">
						<label for="">Id Penggunaan</label>
						<input type="text" class="form-control" name="id_penggunaan" value="<?= $penggunaanKode ?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Id Pelanggan</label>
						<select name="id_pelanggan" id="id_pelanggan" class="form-control">
							<option>Pilih Pelanggan</option>
							<?php foreach($pelangganid as $row){ ?>
							<option value="<?= $row['id_pelanggan'] ?>"><?= $row['id_pelanggan'].'-'.$row['nama_pelanggan'] ?></option>
						<?php } ?>
						</select>
					</div>
					<div id="data">
					<div class="form-group">
						<label for="">Bulan</label>
						<input type="text" class="form-control" name="bulan"  placeholder="Bulan">
					</div>
					<div class="form-group">
						<label for="">Meter Awal</label>
						<input type="text" class="form-control" name="meter_awal" placeholder="Meter Awal">
					</div>
				
					<div class="form-group">
						<label for="">Tahun</label>
						<input type="text" class="form-control" name="tahun" placeholder="Tahun">
					</div>
					
					<div class="form-group">
						<label for="">Meter Akhir</label>
						<input type="text" class="form-control" name="meter_akhir" placeholder="Meter Akhir">
					</div>

					<button class="btn btn-success" name="masuk" type="submit">
					<span class="fa fa-plus-circle fa-spin"></span> Tambah Data
				</button>
					</div>
			</div>
			<div class="modal-footer">
				
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="EditPenggunaan" tabindex="-1" role="dialog" aria-labelledby="Tambah Penggunaan" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="TambahPenggunan">Edit Penggunaan</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="fa fa-window-close"></span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post">
					<div id="data2">
						
					</div>	
				</div>
			<div class="modal-footer">
				</form>
			
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#id_pelanggan').change(function(){
			var id = $(this).val();

			$.ajax({
				url:'penggunaan/getData.php',
				method:'get',
				data:{id : id},
				success:function(data){
					$('#data').html(data);
				}
			});
		});

		$('.id_penggunaan').on('click',function(){
			var id = $(this).attr("id");

			$.ajax({
				url:'penggunaan/getPenggunaan.php',
				method:'get',
				data:{id : id},
				success:function(data){
					$('#data2').html(data);
				}
			});
		});
	});
</script>