<?php 

	class Pembayaran extends Koneksi
	{
		public function runQuery($sql){
			$stmt = $this->conn->prepare($sql);
			return $stmt;
		}
		public function laporanPembayaran(){
			$stmt = $this->conn->prepare("SELECT * FROM pembayaran");
			$stmt->execute();
			return $stmt;
		}

		public function melakukanPembayaran($idbayar,$idtagihan,$idpelanggan,$tanggal,$bulanbayar,$biayaadmin,$total_bayar,$idbank){
			try{
				$stmt = $this->conn->prepare("INSERT INTO pembayaran VALUES(:idbayar,:idtagihan,:idpelanggan,:tanggal,:bulanbayar,:biayaadmin,:total_bayar,:id_bank)");
				$stmt->bindParam(':idbayar',$idbayar);
				$stmt->bindParam(':idtagihan',$idtagihan);
				$stmt->bindParam(':idpelanggan',$idpelanggan);
				$stmt->bindParam(':tanggal',$tanggal);
				$stmt->bindParam(':bulanbayar',$bulanbayar);
				$stmt->bindParam(':biayaadmin',$biayaadmin);
				$stmt->bindParam(':total_bayar',$total_bayar);
				$stmt->bindParam(':id_bank',$idbank);
				$stmt->execute();
				return $stmt;
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		public function riwayatPembayaran($id_bank){
			$stmt = $this->conn->prepare("SELECT pembayaran.*,bank.* FROM pembayaran,bank WHERE pembayaran.id_bank = bank.id_bank AND pembayaran.id_bank = :id_bank");
			$stmt->bindParam(':id_bank',$id_bank);
			$stmt->execute();
			return $stmt;
		}
	}
 ?>