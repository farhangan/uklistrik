<?php 
/**
 * 
 */
class Tarif extends Koneksi
{
	
	public function runQuery($sql){
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	public function showTarif(){
		$stmt = $this->conn->prepare("SELECT * FROM tarif");
		$stmt->execute();
		return $stmt;
	}

	public function getTarif($kode){
		$stmt = $this->conn->prepare("SELECT * FROM tarif WHERE id_tarif = :id_tarif");
		$stmt->bindParam(':id_tarif',$kode);
		$stmt->execute();
		return $stmt;
	}

	public function inputTarif($id_tarif,$golongan,$daya,$tarif_perkwh){
		try {
			$stmt= $this->conn->prepare("INSERT INTO tarif VALUES(:id_tarif,:golongan,:daya,:tarifperkwh) ");
			$stmt->bindParam(':id_tarif',$id_tarif);
			$stmt->bindParam(':golongan',$golongan);
			$stmt->bindParam(':daya',$daya);
			$stmt->bindParam(':tarifperkwh',$tarif_perkwh);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function ubahTarif($id_tarif,$tarif_perkwh){
		try {
			$stmt= $this->conn->prepare("UPDATE tarif SET tarifperkwh = :tarifperkwh WHERE id_tarif = :id_tarif ");
			$stmt->bindParam(':id_tarif',$id_tarif);	
			$stmt->bindParam(':tarifperkwh',$tarif_perkwh);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function hapusTarif($kode){
		$stmt = $this->conn->prepare("DELETE FROM tarif WHERE id_tarif = :id_tarif");
		$stmt->bindParam(":id_tarif",$kode);
		$stmt->execute();
		return $stmt;
	}
}
 ?>