<?php
    $act='forgetPassword';
    if(isset($_GET['act']))
    {
        $act=$_GET['action'];
    }
    switch ($act) {
        case 'forgetPassword':
            include_once "./View/forgetpassword.php";
            break;
        case 'resetpw':
            include_once "./View/resetPassword.php";
            break;
        case 'forget_action':
            if(isset($_POST['submit_email']))            {
                $email=$_POST['email'];
                $_SESSION['email']=array();
                $checkkh=new user();
                $result=$checkkh->checkEmail($email)->rowCount();
                if($result>0)                {
                    $code=random_int(1000,1000000);
                    $item=array(
                        'id'=>$code,
                        'email'=>$email,
                    );
                    $_SESSION['email'][]=$item;
                    $mail = new PHPMailer();
                    $mail->CharSet = "utf-8";
                    $mail->IsSMTP();
                    $mail->SMTPAuth = true;
                    // $mail->Username = "php22023@gmail.com";//
                    $mail->Username = "dongphuonghongduc@gmail.com"; //
                    $mail->Password = "dkby cmkz ylzs breq"; //Phplytest20@php
                    $mail->SMTPSecure = "tls";
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port = "587"; // 465
                    $mail->From = 'dongphuonghongduc@gmail.com';
                    $mail->FromName = 'duc';
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
                } else {
                    echo '<script> alert("Địa chỉ mail ko tồn tại");</script>';
                    include "./View/forgetPassword.php";
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
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login"/>';
            break;
    }
?>