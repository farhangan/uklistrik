<?php 
/**
 * 
 */
class Tagihan extends Koneksi
{
	public function runQuery($sql){
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	public function inputTagihan($id_tgh,$id_guna,$id_plg,$bulan,$tahun,$jumlah_meter,$status){
			try {
			$stmt = $this->conn->prepare("INSERT INTO tagihan VALUES(:id_tagihan,:id_penggunaan,:id_pelanggan,:bulan,:tahun,:jumlah_meter,:status)");

			$stmt->bindParam(':id_tagihan',$id_tgh);
			$stmt->bindParam(':id_penggunaan',$id_guna);
			$stmt->bindParam(':id_pelanggan',$id_plg);
			$stmt->bindParam(':bulan',$bulan);
			$stmt->bindParam(':tahun',$tahun);
			$stmt->bindParam(':jumlah_meter',$jumlah_meter);
			$stmt->bindParam(':status',$status);

			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function showTagihan(){
		$stmt = $this->conn->prepare("SELECT * FROM tagihan WHERE jumlah_meter > 0");
		$stmt->execute();
		return $stmt;
	}

	public function getTagihan($kode){
		$stmt = $this->conn->prepare("SELECT * FROM tagihan WHERE id_penggunaan = :id_penggunaan");
		$stmt->bindParam(":id_penggunaan",$kode);
		$stmt->execute();
		return $stmt;
	}

	public function updateJikaBayar($id_tagihan,$status){
		try {
			$stmt = $this->conn->prepare("UPDATE tagihan SET status = :status WHERE id_tagihan = :id_tagihan");
			$stmt->bindParam(':id_tagihan',$id_tagihan);
			$stmt->bindParam(':status',$status);

			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function hapusTagihan($kode){
		$stmt = $this->conn->prepare("DELETE FROM tagihan WHERE id_pelanggan = :id_pelanggan");
		$stmt->bindParam(":id_pelanggan",$kode);
		$stmt->execute();
		return $stmt;
	}

}

 ?>