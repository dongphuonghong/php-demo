<?php
$act='dangnhap';
if(isset($_GET['act'])){
    $act=$_GET['act'];
}
switch ($act) {
    case 'dangnhap':
        include_once "./View/login.php";
        break;
        case 'dangnhap_action':
        if($_SERVER['REQUEST_METHOD']=='POST'){
                $user=$_POST['txtusername'];
                $pass=$_POST['txtpassword'];
                $nv=new nhanvien();
                $result=$nv->getAdmin($user,$pass);
                if($result=!false){
                    $_SESSION['admin']=$result[0];
                    echo '<script>alert("Đăng nhập thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=../index.php?action=hanghoa&act=hanghoa"/>';
                }
                }
                else{
                    echo '<script>alert("Đăng nhập thất bại");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=../index.php?action=dangnhap"/>';
                }
                break;
            }
    ?>