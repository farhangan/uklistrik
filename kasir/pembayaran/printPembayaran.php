<?php 
require_once '../../class/init.php';
$pembayaran = new Pembayaran;
$pdf = new FPDF('L','mm','A5');
if(isset($_GET['Kode'])){
	$id = $_GET['Kode'];
	$data = $pembayaran->runQuery("SELECT penggunaan.*, tagihan.*,pembayaran.*, pelanggan.*, tarif.*,bank.* FROM penggunaan, tagihan, pelanggan,pembayaran,tarif,bank WHERE pembayaran.id_tagihan = tagihan.id_tagihan AND tagihan.id_penggunaan = penggunaan.id_penggunaan AND penggunaan.id_pelanggan = pelanggan.id_pelanggan AND pelanggan.id_tarif = tarif.id_tarif AND pembayaran.id_bank = bank.id_bank AND pembayaran.id_pembayaran  = :id");
	$data->bindParam(':id',$id);
	$data->execute();
	$row = $data->fetch(PDO::FETCH_ASSOC);
}
$pdf->AddPage();
//===============================================================
$pdf->SetFont('Courier','B',14);
$pdf->cell(190,10,$row['nama_bank'],0,0,'R');
$pdf->cell(0,10,'',0,1);
//===============================================================
$pdf->cell(190,10,'Struk Pembayaran Listrik Pascabayar',0,0,'C');
$pdf->cell(0,15,'',0,1);
//===============================================================
$pdf->SetFont('Courier','',12);
$pdf->cell(30,10,'IDPEL',0,0);
$pdf->cell(5,10,':',0,0);
$pdf->cell(80,10,$row['id_pelanggan'],0,0);
$pdf->cell(30,10,'BL/TH',0,0);
$pdf->cell(5,10,':',0,0);
$pdf->cell(40,10,$row['bulan'].'/'.$row['tahun'],0,1);
//===============================================================
$pdf->SetFont('Courier','',12);
$pdf->cell(30,10,'Nama',0,0);
$pdf->cell(5,10,':',0,0);
$pdf->cell(80,10,$row['nama_pelanggan'],0,0);
$pdf->cell(30,10,'STAND METER',0,0);
$pdf->cell(5,10,':',0,0);
$pdf->cell(40,10,$row['meter_awal'].'-'.$row['meter_akhir'],0,1);
//===============================================================
$pdf->SetFont('Courier','',12);
$pdf->cell(30,10,'Tarif/Daya',0,0);
$pdf->cell(5,10,':',0,0);
$pdf->cell(40,10,$row['golongan'],0,1);
//===============================================================
$pdf->SetFont('Courier','',12);
$pdf->cell(30,10,'RP TAG PLN',0,0);
$pdf->cell(5,10,':',0,0);
$pdf->cell(40,10,'Rp.'.$row['jumlah_meter']*$row['tarifperkwh'],0,1);
//===============================================================
$pdf->SetFont('Courier','B',12);
$pdf->cell(190,10,'PLN menyatakan ini sebagai bukti pembayaran yang sah. Mohon disimpan ',0,1,'C');
//===============================================================
$pdf->SetFont('Courier','',12);
$pdf->cell(30,10,'ADMIN BANK',0,0);
$pdf->cell(5,10,':',0,0);
$pdf->cell(40,10,'Rp.'.$row['biaya_admin'],0,1);
//===============================================================
$pdf->SetFont('Courier','',12);
$pdf->cell(30,10,'RP TAG PLN',0,0);
$pdf->cell(5,10,':',0,0);
$pdf->cell(40,10,'Rp.'.$row['total_bayar'],0,1);
//===============================================================
$pdf->SetFont('Courier','B',12);
$pdf->cell(190,10,'" Rincian Tagihan Dapat Diakses Di www.pln.co.id atau PLN Terdekat "',0,1,'C');
//===============================================================
$pdf->SetFont('Courier','B',12);
$pdf->cell(190,10,'INFORMASI HUB : 123',0,1,'C');
$pdf->Output();
 ?>