<?php
    $act='forget';
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'forget':
            include_once "./View/forgetpassword.php";
            break;
        case 'resetpw':
            include_once "./View/resetpw.php";
            break;
        case 'forget_action':
            if(isset($_POST['submit_email']))
            {
                $email=$_POST['email'];
                $_SESSION['email']=array();
                // kiểm tra email có tồn tại hay không
                $checkkh=new user();
                $result=$checkkh->checkEmail($email)->rowCount();
                if($result>0)
                {
                    $code=random_int(1000,1000000);
                    // tạo đối tượng
                    $item=array(
                        'id'=>$code,
                        'email'=>$email,
                    );
                    $_SESSION['email'][]=$item;
                    // tiến hành gui mail
                    $mail = new PHPMailer();
                    $mail->CharSet = "utf-8";
                    $mail->IsSMTP();
                    // enable SMTP authentication
                    $mail->SMTPAuth = true;
                    // GMAIL username to:
                    // $mail->Username = "php22023@gmail.com";//
                    $mail->Username = "dongphuonghongduc@gmail.com"; //
                    // GMAIL password
                    // $mail->Password = "php22023ngoc";
                    $mail->Password = "dkby cmkz ylzs breq"; //Phplytest20@php
                    $mail->SMTPSecure = "tls";  // ssl
                    // sets GMAIL as the SMTP server
                    $mail->Host = "smtp.gmail.com";
                    // set the SMTP port for the GMAIL server
                    $mail->Port = "587"; // 465
                    $mail->From = 'dongphuonghongduc@gmail.com';
                    $mail->FromName = 'duc';
                    // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
                    $mail->AddAddress($email, 'reciever_name');
                    $mail->Subject = 'Reset Password';
                    $mail->IsHTML(true);
                    $mail->Body = 'Cấp lại mã code ' . $code . '';
                    if ($mail->Send()) {
                        echo '<script> alert("Check Your Email and Click on the 
                            link sent to your email");</script>';
                            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=forget&act=resetpw"/>';
                    } else {
                        echo "Mail Error - >" . $mail->ErrorInfo;
                        include "./View/forgetpassword.php";
                    }
                    // include "./View/resetpw.php";
                } else {
                    echo '<script> alert("Địa chỉ mail ko tồn tại");</script>';
                    include "./View/forgetpassword.php";
                }
    
            }
            break;
        case 'resetpw_action':
            if(isset($_POST['submit_password']))
            {
                $pass=$_POST['password'];
                foreach ($_SESSION['email'] as $key => $item) {
                    if($item['email']==$pass)
                    {
                        $emaiold=$item['email'];
                        $passnew=md5($pass);
                        $usr=new user();
                        $usr->updatePassEmail($emaiold,$passnew);
                    }
                }
            }
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
            break;
    }
?>