<?php
$act='login';
if(isset($_GET['act'])){
    $act=$_GET['action'];
}//end if
switch($act){
case 'login';
include_once "./View/login.php";
break;
case 'login_action';
$user='';
 $pass='';
 if($_POST['submit']){
    $user=$_POST['txtusername'];
    $pass=$_POST['pass'];
    $saltF="G45a#?";
    $saltL="Td23$%";
    $passnew=md5(pass);
    echo $passnew;
    $kh=new user();
    $lgkh=$kh->loginKH($user);
    if($lgkh==false){
        echo '<script>alert("Đăng nhập thành công");</script>';
        $_SESSION['makh']=$lgkh;
        $_SESSION['tenkh']=$lgkh['tenkh'];
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login"/>';
    }
    }
break;
case 'logout':
    unset($_SESSION['makh']);
    unset($_SESSION['tenkh']);
    echo '<script> alert("Bạn muốn đăng xuất");</script>';
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
    break;
    default:        
}//end switch case
?>