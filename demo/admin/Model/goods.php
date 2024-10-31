<?php
class goods{
    function getgoods(){
        $db=new connect();
        $select="select * from hanghoa";
$result=$db->getList($select);
        return $result;
    }
    function getInsertGoods($tenhh,$maloai,$dacbiet,$sls,$ngaylap,$mota){
        $db=new connect();
        $query="insert into hanghoa (mahh,tenhh,maloai,dacbiet,soluotxem,ngaylap,mota) values (NULL,'$tenhh',$maloai,$dacbiet,$slx,'$ngaylap','$mota')";
        $db->exec($query);
}
    function getGoodsId($id){
        $db=new connect();
                $select="select * form hanghoa where mahh=$id";
        $result=$db->getInstand($select);
        return $result;
    }
    function getUpdateGoods($id,$tenhh,$maloai,$dacbiet,$sls,$ngaylap,$mota){
        $db=new connect();
        $query="update hanghoa set tenhh='$tenhh',maloai=$maloai,dacbiet=$dacbiet,soluotxem=$sls,ngaylap='$ngaylap',mota='$mota' where mahh=$id";
        $db->exec($query);
    }
    function getDeleteGoods($id){
        $db=new connect();
        $query="delete from hanghoa where mahh=$id";
        $db->exec($query);
    }
    function getGoodsIdmau($id){
        $db=new connect();
                            $select="select * form mausac where Idmau=$id";
        $result=$db->getInstand($select);
        return $result; 
    }
    function getStatistical(){
        $db=new connect();
        $select="select a.mahh,b.tenhh, sum(a.soluongmua) as soluong from cthoadon a,hanghoa b where a.mahh=b.mahh GROUP by a.mahh,b.tenhh";
$result=$db->getInstand($select);
        return $result;
    }
}
?>