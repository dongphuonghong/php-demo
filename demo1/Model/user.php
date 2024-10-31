<?php
class user{
function checkUser($user,$email){
    $db = new connect();
    $select="SELECT a.username,a.email from khachhang a WHERE a.username='$user' or a.email='$email'";
        $result=$db->getList($select);
    return $result;
}//end checkUser
function insertKH($tenkh,$user,$matkhau,$email,$diachi,$sodt){
    $db = new connect();
    $query="INSERT INTO khachhang (makh, tenkh,username,matkhau,email,diachi, sodienthoai)        VALUES (NULL, '$tenkh', '$user', '$matkhau', '$email', '$diachi', '$sodt')"; 
    $result=$db->exec($query);
    return $result;
}//end insertKH
function loginKH($user,$pass){
    $db = new connect();
    $select="SELECT * FROM khachhang a WHERE a.username='$user' and a.matkhau='$pass'";
    echo $select;
    $result=$db->getInstanc($query);
    return $result;
}//end loginKH
function checkEmail($email){
    $db = new connect();
        $select="SELECT a.email from khachhang a WHERE a.email='$email'";
    $result=$db->getList($select);
    return $result;
}//end checkEmail
function updatePassEmail($$emaiold,$passnew){
    $db = new connect();
        $query="UPDATE khachhang SET matkhau='$passnew' WHERE email='$emaiold'";
    $result=$db->exec($query);
    return $result;
}
}//end class
?>