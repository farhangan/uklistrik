<?php 
class Koneksi{

	protected $conn;
	public function __construct(){
		try{
			$this->conn = new PDO('mysql:host=localhost;dbname=uklistrik','root','');
			$this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}catch(PDOExeption $e){
			echo "Koneksi gagal :".$e->getMessage();
		}
		return $this->conn;
	}
}

 ?>