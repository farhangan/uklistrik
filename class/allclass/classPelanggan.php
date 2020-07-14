<?php
class Pelanggan extends Koneksi{

	public function runQuery($sql){
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	public function inputPelanggan($id_pelanggan,$nomor_kwh,$nama_pelanggan,$alamat,$id_tarif){
		try{
			$query = $this->conn->prepare("INSERT INTO pelanggan VALUES (:id_pelanggan,:nomor_kwh,:nama_pelanggan,:alamat,:id_tarif)");
			$query->bindParam(":id_pelanggan",$id_pelanggan);
			$query->bindParam(":nomor_kwh",$nomor_kwh);
			$query->bindParam(":nama_pelanggan",$nama_pelanggan);
			$query->bindParam(":alamat",$alamat);
			$query->bindParam(":id_tarif",$id_tarif);

			$query->execute();

			return $query;
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function ubahPelanggan($id_pelanggan,$nomor_kwh,$nama_pelanggan,$alamat,$id_tarif){

		try{
			$stmt = $this->conn->prepare("UPDATE pelanggan SET nomor_kwh = :nomor_kwh,nama_pelanggan = :nama_pelanggan,alamat = :alamat,id_tarif = :id_tarif
				WHERE
				pelanggan.id_pelanggan = :id_pelanggan
			");

			$stmt->bindParam(":id_pelanggan",$id_pelanggan);
			$stmt->bindParam(":nomor_kwh",$nomor_kwh);
			$stmt->bindParam(":nama_pelanggan",$nama_pelanggan);
			$stmt->bindParam(":alamat",$alamat);
			$stmt->bindParam(":id_tarif",$id_tarif);
			$stmt->execute();
			
			return $stmt;
		}catch(PDOException $e){
			echo $e->getMessage();
		}

	}
	public function showPelanggan(){
		$stmt = $this->conn->prepare("SELECT * FROM pelanggan");
		$stmt->execute();
		return $stmt;
	}

	public function hapusPelanggan($kode){
		$stmt = $this->conn->prepare("DELETE FROM pelanggan WHERE id_pelanggan = :id_pelanggan ");
		$stmt->bindParam(':id_pelanggan',$kode);
		$stmt->execute();
		return $stmt;
	}

	public function showEdit($kode){
		$stmt = $this->conn->prepare("SELECT * FROM pelanggan WHERE id_pelanggan = :id_pelanggan");
		$stmt->bindParam(':id_pelanggan',$kode);
		$stmt->execute();
		return $stmt;
	}
}
?>