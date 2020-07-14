<?php 
class Penggunaan extends Koneksi
{
	public function runQuery($query){
		$stmt = $this->conn->prepare($query);
		return $stmt;
	}

	public function inputPenggunaan($id_guna,$id_plg,$bulan,$tahun,$meter_awal,$meter_akhir){
		try {
			$stmt = $this->conn->prepare("INSERT INTO penggunaan VALUES(:id_penggunaan,:id_pelanggan,:bulan,:tahun,:meter_awal,:meter_akhir)");
			
			$stmt->bindParam(':id_penggunaan',$id_guna);
			$stmt->bindParam(':id_pelanggan',$id_plg);
			$stmt->bindParam(':bulan',$bulan);
			$stmt->bindParam(':tahun',$tahun);
			$stmt->bindParam(':meter_awal',$meter_awal);
			$stmt->bindParam(':meter_akhir',$meter_akhir);

			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	public function showPenggunaan(){
		$stmt = $this->conn->prepare("SELECT * FROM penggunaan");
		$stmt->execute();
		return $stmt;
	}

	public function getPenggunaan($kode){
		$stmt = $this->conn->prepare("SELECT * FROM penggunaan WHERE id_penggunaan = :id_penggunaan");
		$stmt->bindParam(":id_penggunaan",$kode);
		$stmt->execute();
		return $stmt;
	}

	public function ubahDataPenggunaan($id_guna,$meter_awal,$meter_akhir){
		try {
			$stmt = $this->conn->prepare("UPDATE penggunaan SET meter_awal = :meter_awal,meter_akhir = :meter_akhir WHERE id_penggunaan = :id_penggunaan");
			
			$stmt->bindParam(':id_penggunaan',$id_guna);
			$stmt->bindParam(':meter_awal',$meter_awal);
			$stmt->bindParam(':meter_akhir',$meter_akhir);

			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function hapusDataPenggunaan($id_pgn){
		$stmt = $this->conn->prepare("DELETE FROM penggunaan WHERE id_penggunaan = :id_penggunaan");
		$stmt->bindParam(":id_penggunaan",$id_pgn);
		$stmt->execute();
		return $stmt;
	}
}
?>