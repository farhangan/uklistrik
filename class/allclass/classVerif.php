<?php 
/**
 * 
 */
class Verifikasi extends Koneksi
{
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	public function hapusTagihan($kode)
	{
		$stmt = $this->conn->prepare("DELETE FROM tagihan WHERE id_pelanggan = :id_pelanggan");
		$stmt->bindParam(':id_pelanggan',$kode);
		$stmt->execute();
		return $stmt;
	}
}
 ?>