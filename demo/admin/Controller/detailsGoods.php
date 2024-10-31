<?php
$act='detailsGoods';
if(isset($_GET['act'])){
    $act=$_GET['act'];
}
switch($act){
    case 'detailsGoods':
        include_once "./View/cthanghoa.php";

        break;
    case 'detailsGoods_action':
        if(isset($_POST['submit'])){
            $mahh = $_POST['mahh'];
            $mamau = $_POST['mamau'];
            $masize = $_POST['masize'];
            $dongia = $_POST['dongia'];
            $slt = $_POST['slt'];
            $hinh = $_FILES['image']['name'];
            $giamgia = $_POST['giamgia'];
$d=new detailsGoods();
            $result=$d->insert($mahh,$mamau,$masize,$dongia,$slt,$hinh,$giamgia);
            if($result==false){
                uploadImage();
                echo "<script>alert('Thêm thành công');window.location.href='detailsGoods.php';</script>";
                echo '<meta http-equiv=refresh content="0;url=./index.php?action="/detailsGoods>';
            }else{
                echo '<script>alert("Insert ko thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=./index.php?action="/detailsGoods>';
            }
        }
break;
}
?>