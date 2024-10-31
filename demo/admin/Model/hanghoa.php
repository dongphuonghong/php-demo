<?php
    class hanghoa{
        function getHangHoa()
        {
            $db=new connect();
            $select="select * from hanghoa";
            $result=$db->getList($select);
            return $result;
        }
function getInsertHangHoa($tenhh,$maloai,$dacbiet,$slx,$ngaylap,$mota)
        {
            $db=new connect();
            $query="insert into hanghoa (mahh,tenhh,maloai,dacbiet,soluotxem,ngaylap,mota) 
            values (NULL,'$tenhh',$maloai,$dacbiet,$slx,'$ngaylap','$mota')";
            $db->exec($query);
        }
        function getHangHoaID($id)
        {
            $db=new connect();
            $select="select * from hanghoa where mahh=$id";
            $result=$db->getInstance($select);
            return $result;
        }
        // phương thức update
        function getUpdateHH($mahh,$tenhh,$maloai,$dacbiet,$slx,$ngaylap,$mota)
        {
            $db=new connect();
            $query="update hanghoa 
            set tenhh='$tenhh',maloai=$maloai,dacbiet=$dacbiet,soluotxem=$slx,ngaylap='$ngaylap',mota='$mota' 
            WHERE mahh=$mahh";
            $db->exec($query);

        }
        // phương thức xóa
        function getDeleteHH($id)
        {
            $db=new connect();
            $query="delete from hanghoa where mahh=$id";
            $db->exec($query);
        }
    }
    function getThongke(){
        $db=new connect();
        $select="select a.mahh,b.tenhh, sum(a.soluongmua) as soluong from cthoadon a,hanghoa b where a.mahh=b.mahh GROUP by a.mahh,b.tenhh";
        $result=$db->getInstance($select);
        return $result;
    }
?>