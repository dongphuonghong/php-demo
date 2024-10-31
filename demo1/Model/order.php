<?php
class order{
function insertHoadDon($makh){
    $db = new connect();
    $date = new DateTime('now');
    $ngay = $date->format('Y-m-d');
    $query = "insert into hoadon(masohd,makh,ngaydat,tongtien) values (NULL,$makh,'$ngay',0)";
    $db->exec($query);
    $masohd = $db->getInstance($select);
    return $masohd[0]; 
    }//end insertChemistry
    function insertCTHoaDon($masohd, $mahh, $soluongmua, $mausac, $size, $thanhtien){
        $db = new connect();
        $query = "insert into cthoadon(masohd,mahh,soluongmua,mausac,size,thanhtien,tinhtrang)values ($masohd,$mahh,$soluongmua,'$mausac',$size,$thanhtien,0)";
    $db->exec($query);
    }//end insertCTHoaDon
    function updateHoaDonTongTien($masohd,$makh,$tongtien){
        $db = new connect();
        $query = "update hoadon set tongtien = $tongtien where masohd = $masohd and makh = $makh";
        $db->exec($query);
    }//end updateHoaDonTongTien
}//end class
?>