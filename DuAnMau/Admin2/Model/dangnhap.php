<?php
class dangnhap{
    var   $user=null;
    var   $pass=null;
    public function __construct(){}
        public Function logAdmin($user,$pass){
            $db=new connect();
            $select="select * from admin where user='$user' and password='$pass'";
            $result=$db->getList($select);
            $set=$result->fetch();
            return $sset    ;
        }    
        }
?>