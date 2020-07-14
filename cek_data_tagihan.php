<?php 

 ?>
  <div class="card" style="background-color: rgba(255,255,255,0.5);width: 780px;margin-left: 280px;">
 	<div class="card-body">
 		<div class="form-group">
 			<label for="" class="float-left" style="width: 100%;">Masukan Id Pelangan</label>
 			<input type="Search" name="id_pelanggan" id="id_pelanggan"  class="form-control bg-transparent float-left cari-tagihan" placeholder="Masukan Id Pelangan" style="border:2px solid #fff;color: white;width: 600px;">
 			<button id="cari" class="btn btn-warning font-weight-bold float-right" style="width: 120px;"><span class="fa fa-search"></span> Cari</button>
 		</div>
 		<div id="data" style="float: left;width: 100%;" >
 			
 		</div>
 	</div>
 </div>
 <script>
 	$(document).ready(function(){
 		$('#cari').on('click',function(){
 			var id = $('#id_pelanggan').val();

 			$.ajax({
 				url:'cek_tagihan.php',
 				method:'get',
 				data:{id : id},
 				success:function(data){
 					$('#data').html(data);
 				}
 			})
 		})
 	});
 </script>