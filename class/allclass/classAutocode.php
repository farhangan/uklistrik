<?php
    
    function buatKode($tabel, $inisial){
        $sql = mysqli_connect('localhost','root','','uklistrik') or die (mysqli_connect_error());
        $struktur   = mysqli_query($sql,"SELECT * FROM {$tabel}");
        $fetch = mysqli_fetch_assoc($struktur);

        $qry    = mysqli_query($sql,"SELECT MAX(". array_keys($fetch)[0] .") FROM ".$tabel);
        $row    = mysqli_fetch_array($qry); 
        if ($row[0]=="") {
            $angka=0;
        }
        else {
            $angka      = substr($row[0], strlen($inisial));
        }
        
        $angka++;
        $angka  =strval($angka); 
        $tmp    ="";
        for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
            $tmp=$tmp."0";  
        }
        return $inisial.$tmp.$angka;
    }

?>