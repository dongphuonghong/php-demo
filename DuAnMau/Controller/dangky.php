<?php
$act="dangky";
if(isset($_GET['act']))
{
    $act=$_GET['act'];
}
switch ($act) {
    case 'dangky':
        include_once "./View/registration.php";
        break;
    
    case 'dangky_action':
       // view truyền thông tin người dùng nhập vào qua đây
       // nhận, và kiểm tra
       $tenkh='';
       $dc='';
       $sodt='';
       $user='';
       $email='';
       $pass='';
       if(isset($_POST['submit']))
       {
        $tenkh=$_POST['txttenkh'];//Đức
        $dc=$_POST['txtdiachi'];
        $sodt=$_POST['txtsodt'];
        $user=$_POST['txtusername'];
        $email=$_POST['txtemail'];
        $pass=$_POST['txtpass'];
        // mã hóa
        $saltF="G45#!";
        $saltL="Te34%@";
        $pasnew=md5($saltF.$pass.$saltL);
        // controller đòi phải đưa thông tin vào database
        // trước khi insert cần kiểm tra user và email có tồn tại hay không
        $kh=new user();
        // kiểm tra
        $check=$kh->checkUser($user,$email)->rowCount();
        if($check>0)
        {
            echo "<script>alert('Tên đăng nhập hoặc email đã tồn tại');</script>";
            echo '<meta http-equiv="refresh" content="0;url=../index.php?action=dangky"/>';
        }
        else
        {
            $inskh=$kh->insertKH($tenkh,$user,$pasnew,$email,$diachi,$sodt);
            if($inskh!==false)
            {
                echo "<script>alert('Đăng ký thành công');</script>";
                echo '<meta http-equiv="refresh" content="0;url=./index.php"/>';
            }
            else
            {
                echo "<script>alert('Đăng ký thất bại');</script>";
                echo '<meta http-equiv="refresh" content="0;url=../index.php?action=dangky"/>';
            }
        }

       }
        break;
}
?>