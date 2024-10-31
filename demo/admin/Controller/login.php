<?php
$act='login';
if(isset($_GET['act'])){
    $act=$_GET['act'];
}
switch ($act){
    case 'login':
        include_once "./View/login.php";
        break;
        case 'loginAction':
            if($_SERVER['REQUEST_METHOD']=='POST'){               
                $user=$_POST['txtusername'];
                $pass=$_POST['txtpassword'];
                $nv=new userAdmin();
                $result=$nv->getAdmin($user,$pass);
                if($result!=false){
                    $_SESSION['admin']=$result[0];
                    echo '<script>alert("Đăng nhập thành công");</script>';
                   echo '<meta http-equiv=refresh content="0;url=./index.php?action=goods&act=goods"/>';
                }
                else{
                    echo '<script>alert("Đăng nhập không thành công");</script>';
                   echo '<meta http-equiv=refresh content="0;url=../index.php?action=login"/>';
        }
}
        break;
        }
?>