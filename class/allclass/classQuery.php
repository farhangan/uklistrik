<?php 

class Query extends Koneksi{
	public function runQuery($sql){
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
}

 ?>