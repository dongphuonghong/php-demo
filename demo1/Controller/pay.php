<?php
if(isset($_SESSION['makh'])){
    $makh=$_SESSION['makh'];
    $c=new cart();
    $sohd=$hd->insertHoadDon($makh);//14
    $_SESSION['masohd']=$sohd;
    $total=0;
    foreach($_SESSION['cart']as $item){
        $hd->insertCTHoaDon($sohd,$item['mahh'],$item['soluong'],$item['mau'],$item['size'],$item['thanhtien']);
        $total+=$item['thanhtien'];
    }
    $hd->updateHoaDonTongTien($sohd,$makh,$total);
    }
include_once "./View/order.php";
    unset($_SESSION['cart']);
?>