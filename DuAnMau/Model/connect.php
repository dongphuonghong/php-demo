<?php
class connect{
    // thuoc tinh
    var $db=null;
    // ham tao duoc goi khi chung ta tao 1 doi tuong
    function __construct()// ham tao ko co doi so
    {
        // b1: $dsn
        $dsn='mysql:host=localhost;dbname=softgiay';
        // b2: $username
        $user='root';
        $pass='';// neu la xai mamp thi pass='root'
        try {
            $this->db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
            // echo "ket noi thanh cong";
        } catch (\Throwable $th) {
            //throw $th;
            echo "ket noi khong thanh cong";
            echo $th;           
        }
    }
    // phuong thuc
    function getList($select){
        $result=$this->db->query($select);
        return $result;
    }
    function getInstance($select){
        $result=$this->db->query($select);
        $result=$result->fetch();
        return $result;
    }
    function exec($query)
    {
        $result=$this->db->exec($query);
        return $result;
    }
    function execp($query)
    {
        $statement=$this->db->exec($query);
        return $statement;
    }
}
?>