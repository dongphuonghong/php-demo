<?php
class hoadon
{
    function insertHoadDon($makh)
    {
        $db = new connect();
        $date = new DateTime('now');
        $ngay = $date->format('Y-m-d'); // trong database định dạng là năm tháng ngày
        $query = "insert into hoadon(masohd,makh,ngaydat,tongtien) values (NULL,$makh,'$ngay',0)";
        $db->exec($query);
        // đã insert vào database rồi,
        // cái cần lấy ra là mã số hd vừa insert vào
        $select = "select masohd from hoadon order by masohd desc limit 1";
        $masohd = $db->getInstance($select);
        return $masohd[0]; // trả về array(14);
    }
    // phương thức insert vào bảng cthoadon
    function insertCTHoaDon($masohd, $mahh, $soluongmua, $mausac, $size, $thanhtien)
    {
        $db = new connect();
        $query = "insert into cthoadon(masohd,mahh,soluongmua,mausac,size,thanhtien,tinhtrang)
         values ($masohd,$mahh,$soluongmua,'$mausac',$size,$thanhtien,0)";
        $db->exec($query);
    }
    //phương thức update 
    function updateHoaDonTongTien($masohd,$makh,$tongtien)
    {
        $db=new connect();
        $query="update hoadon set tongtien=$tongtien WHERE masohd=$masohd and makh=$makh";
        $db->exec($query);
    }
    //phương thức hiển thị thông tin khách hàng theo hóa đơn
    function getThongTinKhHoaDon($masohd)
    {
        $db=new connect();
        $select="select a.masohd,b.tenkh,a.ngaydat,b.diachi,b.sodienthoai from hoadon a,khachhang b 
        WHERE a.makh=b.makh and a.masohd=$masohd";
        $result=$db->getInstance($select);
        return $result;
    }
    // phương thức hiển thị những món hàng trên hóa đơn
    function getThonTinHangHoaDS($masohd)
    {
        $db=new connect();
        $select="select DISTINCT b.tenhh,a.mausac,a.size,a.soluongmua,c.dongia from cthoadon a, hanghoa b, cthanghoa c 
        WHERE a.mahh=b.mahh and b.mahh=c.idhanghoa and a.masohd=$masohd";
        $result=$db->getList($select);
        return $result;
    }
}
?>