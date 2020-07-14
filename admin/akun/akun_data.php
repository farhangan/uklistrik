<?php
$stmt = $akun->tampilAdmin();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt2 = $akun->tampilPetugas();
$codeAdmin = buatKode('admin','ADM');
$codePetugas = buatKode('petugas','PTG');

$petugas = $stmt2->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['petugas'])){
	$id_petugas = $_POST['id_petugas'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama_petugas = $_POST['nama_petugas'];
	$level = $_POST['level'];

	if($akun->inputPetugas($id_petugas,$nama_petugas,$username,$password,$level)){
		?>
		<script>
			alert('Data Berhasil Disimpan');
			document.location = '?page=Akun';
		</script>
		<?php
	}else{
		?>
		<script>
			alert('Data Gagal Disimpan');
			document.location = '?page=Akun';
		</script>
		<?php
	}
}
if(isset($_POST['ubahpetugas'])){
	$id_petugas = $_POST['id_petugas'];
	$username = $_POST['username'];
	$nama_petugas = $_POST['nama_petugas'];

	if($akun->ubahPetugas($id_petugas,$nama_petugas,$username)){
		?>
		<script>
			alert('Data Berhasil Diubah');
			document.location = '?page=Akun';
		</script>
		<?php
	}else{
		?>
		<script>
			alert('Data Gagal Diubah');
			document.location = '?page=Akun';
		</script>
		<?php
	}
}
?>
<div class="card font-weight-bold text-light" style="background-color: rgba(41,48,54,0.9)">
	<div class="card-header">
		Data Akun
	</div>
	<div class="card-body"">
		<!-- Petugas -->
		<div class="card" style="background-color: rgba(41,48,54,0.9)">
			<div class="card-header">
				Akun Petugas
			</div>
			<div class="card-body">
				<table class="table table-borderless text-center" id="akun">
					<thead>
						<tr>
							<th>Id Bank</th>
							<th>Nama Bank</th>
							<th>Username</th>
							<th>Level</th>
							<th>
								<button class="btn btn-outline-success" data-toggle="modal" data-target="#TambahPetugas"><span class="fa fa-plus-circle fa-spin"></span> Tambah Data</button>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($petugas as $row) { ?>
							<tr>
								<td><?= $row['id_petugas']; ?></td>
								<td><?= $row['nama_petugas']; ?></td>
								<td><?= $row['username']; ?></td>
								<td><?= $row['level']; ?></td>
								<td>
									<button class="btn btn-warning font-weight-bold edit-petugas" data-target="#EditPeetugas" data-toggle="modal" id="<?= $row['id_petugas'] ?>">
										<span class="fa fa-edit"></span> Edit
									</button>
									<a class="btn btn-danger text-light font-weight-bold">
										<span class="fa fa-trash-alt"></span> Hapus
									</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="TambahPetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       		<form method="post">
       			<div class="form-group">
       				<label for=""><span class="fa fa-code">	</span> Id Petugas</label>
       				<input type="text" name="id_petugas" value="<?= $codePetugas ?>" class="form-control" readonly>
       			</div>
       			<div class="form-group">
       				<label for=""><span class="fa fa-user"></span> Username</label>
       				<input type="text" name="username" class="form-control" placeholder="Username">
       			</div>
       			<div class="form-group">
       				<label for=""><span class="fa fa-key"></span> Password</label>
       				<input type="password" class="form-control" name="password" placeholder="Password">
       			</div>
       			<div class="form-group">
       				<label for=""><span class="fa fa-id-card"></span>Nama Petugas</label>
       				<input type="text" name="nama_petugas" class="form-control" placeholder="Nama Admin">
       			</div>
       			<div class="form-group">
       				<label for="">Level</label>
       				<select name="level" class="form-control" readonly>
       					<option value="petugas">Petugas</option>
       				</select>
       			</div>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  type="submit" class="btn btn-primary" name="petugas">Save changes</button>
    	</form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Petugas -->
<div class="modal fade" id="EditPeetugas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       		<form method="post">
       			<div id="data">
       				
       			</div>
       		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="ubahpetugas" class="btn btn-primary">Save changes</button>
    </form>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function(){
		$('.edit-petugas').on('click',function(){
			var id = $(this).attr("id");

			$.ajax({
				url:'akun/edit_petugas.php',
				method:'get',
				data:{id : id},
				success:function(data){
					$('#data').html(data);
				}
			});
		});
	});
</script>