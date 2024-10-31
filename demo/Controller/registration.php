<?php
$act='registration';
if(isset($_Get['act'])){
$act=$_GET['act'];
}//end if
switch ($act){
    case 'registration':
        include_once "./View/registration.php";
        break;
        case 'registration_action':
$tenkh='';
$dc='';
$sodt='';
        $user='';
        $email='';
        $pass='';
        if(isset($_POST['submit'])){
            $tenkh=$_POST['txttenkh'];//Đức
            $dc=$_POST['txtdiachi'];
            $sodt=$_POST['txtsodt'];
            $user=$_POST['txtusername'];
            $email=$_POST['txtemail'];    
            $pass=$_POST['txtpass'];
            $saltF="G45#!";
            $saltL="Te34%@";
            $pasnew=md5($saltF.$pass.$saltL);    
            $kh=new user();
            $check=$kh->checkUser($user,$email)->rowCount();
            if($check>0){
            echo "<script>alert('Tên đăng nhập hoặc email đã tồn tại');</script>";
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=registration"/>';
            }//end if
            else{
                $inskh=$kh->insertKH($tenkh,$user,$pasnew,$email,$diachi,$sodt);
                if($inskh!==false){
                    echo '<script> alert("Đăng ký thành công");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php"/>';
                }//end if
                else{
                    echo '<script> alert("Đăng ký không thành công");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=registration"/>';
                }//end else
}
            }//end if
        break;
}//end switch case
?>