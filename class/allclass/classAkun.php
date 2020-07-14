<?php 
class Akun extends Koneksi
{
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	public function tampilAdmin(){
		$stmt = $this->conn->prepare("SELECT * FROM admin");
		$stmt->execute();
		return $stmt;

	}
	public function tampilPetugas(){
		$stmt = $this->conn->prepare("SELECT * FROM petugas");
		$stmt->execute();
		return $stmt;
	}
	public function inputAdmin($id_admin,$username,$password,$nama_admin,$level){
		try {
		$stmt = $this->conn->prepare("INSERT INTO admin VALUES (:id_admin,:username,:password,:nama_admin,:level)");
		$stmt->bindParam(':id_admin',$id_admin);
		$stmt->bindParam(':username',$username);
		$stmt->bindParam(':password',$password);
		$stmt->bindParam(':nama_admin',$nama_admin);
		$stmt->bindParam(':level',$level);
		$stmt->execute();
		return $stmt;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function hapusAdmin($kode){
		$stmt = $this->conn->prepare("DELETE FROM admin WHERE id_admin = :id_admin");
		$stmt->bindParam(':id_admin',$kode);
		$stmt->execute();
		return $stmt;
	}

	//Akun Untuk petugas
	public function inputPetugas($id_petugas,$nama_petugas,$username,$password,$level){
		try {
			$stmt = $this->conn->prepare("INSERT INTO petugas VALUES (:id_petugas,:nama_petugas,:username,:password,:level)");
			$stmt->bindParam(':id_petugas',$id_petugas);
			$stmt->bindParam(':nama_petugas',$nama_petugas);
			$stmt->bindParam(':username',$username);
			$stmt->bindParam(':password',$password);
			$stmt->bindParam(':level',$level);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	//Akun Untuk petugas
	public function ubahPetugas($id_petugas,$nama_petugas,$username){
		try {
			$stmt = $this->conn->prepare("UPDATE petugas SET nama_petugas = :nama_petugas,username = :username WHERE id_petugas = :id_petugas");
			$stmt->bindParam(':id_petugas',$id_petugas);
			$stmt->bindParam(':nama_petugas',$nama_petugas);
			$stmt->bindParam(':username',$username);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function hapuspetugas($kode)
	{
		$stmt = $this->conn->prepare("DELETE FROM petugas WHERE id_petugas = :id_petugas");
		$stmt->bindParam(':id_petugas',$kode);
		$stmt->execute();
		return $stmt;
	}

	public function tambah_admin($id_admin,$nama_admin,$username,$password,$level){
		try {
			$stmt = $this->conn->prepare("INSERT INTO admin VALUES(:id_admin,:nama_admin,:username,:password,:level)");
			$stmt->bindParam(':id_admin',$id_admin);
			$stmt->bindParam(':nama_admin',$nama_admin);
			$stmt->bindParam(':username',$username);
			$stmt->bindParam(':password',$password);
			$stmt->bindParam(':level',$level);

			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo $e->getMessage;
		}
	}

	public function tampilEdit($id){
		$stmt = $this->conn->prepare("SELECT * FROM petugas WHERE id_petugas = :id");
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		return $stmt;
	}


}

 ?>