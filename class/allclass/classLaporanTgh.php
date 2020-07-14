<?php 

/**
 * 
 */
class LapTgh extends Koneksi
{
	
	public function runQuery($sql){
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	public function inputLaporanTgh($id_lap,$id_plg,$bulan,$tahun,$jumlah_meter,$status,$totalbayar,$tanggalbayar,$biaya_admin){
		try{
			$stmt = $this->conn->prepare("INSERT INTO lap_tagihan VALUES(:id_laporan,:id_pelanggan,:bulan,:tahun,:jumlah_meter,:status,:total_bayar,:tanggal_bayar,:biaya_admin)");
			$stmt->bindParam(':id_laporan',$id_lap);
			$stmt->bindParam(':id_pelanggan',$id_plg);
			$stmt->bindParam(':bulan',$bulan);
			$stmt->bindParam(':tahun',$tahun);
			$stmt->bindParam(':jumlah_meter',$jumlah_meter);
			$stmt->bindParam(':status',$status);
			$stmt->bindParam(':total_bayar',$totalbayar);
			$stmt->bindParam(':tanggal_bayar',$tanggalbayar);
			$stmt->bindParam(':biaya_admin',$biaya_admin);
			$stmt->execute();
			return $stmt;
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function hapusLaporan($id_lap){
		$stmt = $this->conn->prepare("DELETE FROM lap_tagihan WHERE id_laporan = :id_laporan");
		$stmt->bindParam(':id_laporan',$id_lap);
		$stmt->execute();
		return $stmt;
	}
}
 ?>