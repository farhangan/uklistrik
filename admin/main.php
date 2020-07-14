<div class="card float-left" style="width: 100%;background-color: rgba(255,255,255,0.1);">
	<div class="card-body">
		<div class="card mr-1" style="width: 300px;border:none;float: left;">
			<div class="card-body bg-info text-light">
				<span class="fa fa-user ml-3" style="font-size: 48px;"></span>
				<div class="float-right mr-3 text-center font-weight-bold" style="font-size: 20px;">
					<?= $akun_admin ?><br>
					Admin
				</div>
			</div>
			<div class="card-footer bg-info text-light">
				<a href="?page=Akun" class="">Detail</a>
			</div>
		</div>
		<div class="card float-left quikinfo mr-1" style="width: 300px;border:none" >
			<div class="card-body bg-warning text-light">
				<span class="fa fa-user ml-3" style="font-size: 48px;"></span>
				<div class="float-right mr-3 text-center font-weight-bold" style="font-size: 20px;">
					<?= $akun_petugas ?><br>
					Petugas
				</div>
			</div>
			<div class="card-footer bg-warning text-light">
				<a href="?page=Akun">Detail</a>
			</div>
		</div>
		<div class="card float-left quikinfo mr-1" style="width: 300px;border:none" >
			<div class="card-body bg-success text-light">
				<span class="fa fa-credit-card ml-3" style="font-size: 48px;"></span>
				<div class="float-right mr-3 text-center font-weight-bold" style="font-size: 20px;">
					<?= $pembayaranbaris ?><br>
					Pembayaran
				</div>
			</div>
			<div class="card-footer bg-success text-light">
				<a href="?page=Pembayaran">Detail</a>
			</div>
		</div>
		<!-- Baris Kedua -->
		<div class="card float-left quikinfo mr-1 mt-2" style="width: 300px;border:none; " >
			<div class="card-body bg-primary text-light">
				<span class="fa fa-users ml-3" style="font-size: 48px;"></span>
				<div class="float-right mr-3 text-center font-weight-bold" style="font-size: 20px;">
					<?= $pelangganbaris ?><br>
					Pelanggan
				</div>
			</div>
			<div class="card-footer bg-primary text-light">
				<a href="?page=Pelanggan">Detail</a>
			</div>
		</div>
		<div class="card float-left quikinfo mr-1 mt-2" style="width: 300px;border:none" >
			<div class="card-body bg-dark text-light">
				<span class="fa fa-fax ml-3" style="font-size: 48px;"></span>
				<div class="float-right mr-3 text-center font-weight-bold" style="font-size: 20px;">
					<?= $penggunaanbaris ?><br>
					Penggunaan
				</div>
			</div>
			<div class="card-footer bg-dark text-light">
				<a href="?page=Penggunaan">Detail</a>
			</div>
		</div>
		<div class="card float-left quikinfo mr-1 mt-2" style="width: 300px;border:none" >
			<div class="card-body bg-danger text-light">
				<span class="fa fa-file-invoice-dollar ml-3" style="font-size: 48px;"></span>
				<div class="float-right mr-3 text-center font-weight-bold" style="font-size: 20px;">
					<?= $tagihanbaris ?><br>
					Tagihan
				</div>
			</div>
			<div class="card-footer bg-danger text-light">
				<a href="?page=Tagihan">Detail</a>
			</div>
		</div>
	</div>