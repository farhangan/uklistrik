<?php 
$pembayaran  = new Pembayaran;
$tagihan = new Tagihan;
$codeBayar = buatKode('pembayaran','PBY');
if(isset($_POST['bayartagihan'])){
	$id_bayar = $codeBayar;
	$id_tagihan = $_POST['id_tagihan'];
	$id_pelanggan = $_POST['id_pelanggan'];
	$tanggal = $_POST['tanggal_bayar'];
	$bulan = $_POST['bulan_bayar'];
	$biaya_admin = $_POST['biaya_admin'];
	$total_bayar = $_POST['total_bayar'];
	$id_bank = $_POST['id_bank'];
	$status = 'sudah bayar';

	if($pembayaran->melakukanPembayaran($id_bayar,$id_tagihan,$id_pelanggan,$tanggal,$bulan,$biaya_admin,$total_bayar,$id_bank) ){
		?>
		<script>
			alert('Berhasil Membayar Tagihan Listrik');
			window.open('pembayaran/printPembayaran.php?Kode=<?= $id_bayar ?>','_blank');
			document.location = '?page=Bayar';
		</script>
		<?php
		$tagihan->updateJikaBayar($id_tagihan,$status);
	}else{
		?>
		<script>
			alert('Gagal Membayar Tagihan Listrik');
			document.location = '?page=Bayar';
		</script>
		<?php
	}
}
 ?>
 <div class="card text-light font-weight-bold" style="background-color: rgba(41,48,54,0.9);">
 	<div class="card-body">
 		<div class="form-group">
 			<label for="">Masukan Id Pelangan</label>
 			<input type="Search" name="id_pelanggan" id="id_pelanggan"  class="form-control" placeholder="Masukan Id Pelangan">
 			<button id="cari" class="btn btn-success mt-2" style="width: 150px;"><span class="fa fa-search"></span> Cari</button>
 		</div>
 		<div id="data" >
 			
 		</div>
 	</div>
 </div>
 <form method="post">
 <div class="modal fade" id="BayarTagihan" tabindex="-1" role="dialog" aria-labelledby="Tambah Penggunaan" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="TambahPenggunan">Bayar</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="fa fa-window-close"></span>
				</button>
			</div>
			<div class="modal-body">
				<div id="muncul">
					
				</div>
				<input type="hidden" name="id_bank" value="<?= $rowAkun['id_bank'] ?>">
			</div>
			<div class="modal-footer">
				<button type="submit" name="bayartagihan" onclick="return confirm('Ingin Membayar Tagihan ?')" class="btn btn-success font-weight-bold"><span class="fa fa-shopping-cart"></span> Bayar</button>
			</div>
		</div>
	</div>
</div>
</form>