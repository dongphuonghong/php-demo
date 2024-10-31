<?php
    class hanghoa
    {
        function getHanghoanew(){
            $db=new connect();
            $select="select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac from hanghoa a,cthanghoa b, mausac c WhERE a.mahh=b.idhanghoa and b.idmau=c.Idmau Order by a.mahh DESC limit 8";
            $result=$db->getList($select);
            return $result;
        }
        // lay 4 san pham sale
        function getHanghoaSale(){
            $db=new connect();
            $select="select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac,b.giamgia from hanghoa a,cthanghoa b, mausac c WhERE a.mahh=b.idhanghoa and b.idmau=c.Idmau and b.giamgia!=0 Order by a.mahh DESC limit 4";
            $result=$db->getList($select);
            return $result;
        }
        // hien thi tat ca san pham len nhung ko la san pham sale
        function getHanghoaNewAll(){
            $db=new connect();
            $select="select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac,b.giamgia
             from hanghoa a,cthanghoa b, mausac c 
             WhERE a.mahh=b.idhanghoa and b.idmau=c.Idmau and b.giamgia=0 order by a.mahh desc";
            $result=$db->getList($select);
            return $result;
        }
        function getHanghoaSaleAll(){
            $db=new connect();
            $select="select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac,b.giamgia
             from hanghoa a,cthanghoa b, mausac c 
             WhERE a.mahh=b.idhanghoa and b.idmau=c.Idmau and b.giamgia!=0 order by a.mahh desc";
            $result=$db->getList($select);
            return $result;
        }
         // hien thi san pham phan trang
         function getHanghoaNewAllPage($start,$limit){
            $db=new connect();
            $select="select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac,b.giamgia
             from hanghoa a,cthanghoa b, mausac c 
             WhERE a.mahh=b.idhanghoa and b.idmau=c.Idmau and b.giamgia=0 order by a.mahh desc limit ".$start.",".$limit;
            $result=$db->getList($select);
            return $result;
        }
        function getHangHoaId($id)
        {
            $db=new connect();
            $select="select DISTINCT a.mahh,a.tenhh,b.dongia,a.mota from hanghoa a, cthanghoa b
             WHERE a.mahh=b.idhanghoa and a.mahh=$id";
            $result=$db->getInstance($select);
            return $result;// array chỉ chứa 1 sản phẩm
        }
        function getHangHoaIdMau($id)
        {
            $db=new connect();
            //b2: cần lấy cái gì thì viết câu lệnh select cái đó
            $select="select DISTINCT a.Idmau,a.mausac from mausac a, cthanghoa b WHERE a.Idmau=b.idmau and b.idhanghoa=24";
            //b3: ai thực hiện câu select? query, mà query nằm trong getList và getInstance?
            // câu này trả về nhiều dòng nên dùng getList
            $result=$db->getList($select);
            return $result;// lấy về đc 4 sản phẩm sale
        }
        // phương thức lấy size dựa vào id
        function getHangHoaIdSize($id)
        {
            $db=new connect();
            //b2: cần lấy cái gì thì viết câu lệnh select cái đó
            $select="select DISTINCT a.idsize,a.size from sizegiay a,cthanghoa b WHERE a.idsize=b.idsize and b.idhanghoa=$id";            
            $result=$db->getList($select);
            return $result;// lấy về đc 4 sản phẩm sale
        }
        // lấy ra hình ảnh dựa vào id
        function getHangHoaIdHinh($id)
        {
            $db=new connect();
            //b2: cần lấy cái gì thì viết câu lệnh select cái đó
            $select="select DISTINCT a.hinh from cthanghoa a WHERE a.idhanghoa=$id";
            
            $result=$db->getList($select);
            return $result;// lấy về đc 4 sản phẩm sale
        }
        function getHangHoaIdMauSac($idmau)
        {
            $db=new connect();
            //b2: cần lấy cái gì thì viết câu lệnh select cái đó
            $select="select DISTINCT a.mausac from mausac a WHERE a.Idmau=$idmau";
            echo $select;
            $result=$db->getInstance($select);
            return $result;// lấy về đc 4 sản phẩm sale
        }
        // lay ra hinh dua vao id hang, idmau,size
        function getHangHoaIDMauSizeHinh($id,$idmau,$size)
        {
            $db=new connect();
            //b2: cần lấy cái gì thì viết câu lệnh select cái đó
            $select="select DISTINCT a.hinh from cthanghoa a, sizegiay b
            WHERE a.idhanghoa=$id and idmau=$idmau and b.size=$size";  
            $result=$db->getInstance($select);
            return $result;
        }
        function timKiemSanPham($tenhh)
        {
            $db=new connect();
            //b2: cần lấy cái gì thì viết câu lệnh select cái đó
            $select="select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac,b.giamgia from hanghoa a, cthanghoa b,mausac c 
            WHERE a.mahh=b.idhanghoa and b.idmau=c.Idmau and a.tenhh like '%$tenhh%' order by a.mahh desc";  
            // echo $select;
            $result=$db->getList($select);
            return $result;
        }
    }
?>