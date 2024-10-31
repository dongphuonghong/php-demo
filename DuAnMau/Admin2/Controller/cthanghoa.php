<?php
$act='cthanghoa';
if(isset($_GET['act'])){
    $act=$_GET['act'];
}
switch ($act) {
    case 'cthanghoa':
        include_once "./View/cthanghoa.php";
        break;
    case 'cthanghoa_action':
if(isset($_POST['submit'])){
        $mamau = $_POST['mamau'];
        $masize = $_POST['masize'];
        $dongia = $_POST['dongia'];
        $slt = $_POST['slt'];
        $hinh = $_FILES['image']['name'];
        $giamgia = $_POST['giamgia'];
$ct = new cthanghoa();
        $checkct= $ct->insertcthanghoa($mahh, $mamau, $masize, $dongia, $slt);
        if ($checkct !== false) {
            uploadImage();
            echo "<script>alert('Thêm thành công');</script>";
            echo '<meta http-equiv=refresh content="0;url=../index.php?action=cthanghoa"/>';
}
        else {
            echo "<script>alert('Thêm thất bại');</script>";
            echo '<meta http-equiv=refresh content="0;url=../index.php?action=cthanghoa"/>';
        }
        }
        break;
}
?>