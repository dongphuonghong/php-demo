<?php
class type{
    function getType(){
        $db=new connect();
        $select="select maloai,tenloai from loai";
        $result=$db->getList($select);
        return $result;
    }
}
?>