<?php
class giohang{
    function addGioHang($id,$idmau,$size,$soluong)
    {
        $hh=new hanghoa();
        $sp=$hh->getHangHoaId($id);
        $tenhh=$sp['tenhh'];
        $dongia=$sp['dongia'];
        // thieu ten mau
        $mau=$hh->getHangHoaIdMauSac($idmau);
        $tenmau=$mau['mausac'];
        //thieu hinh, hinh dua vao id,idmau,size
        $hinh=$hh->getHangHoaIDMauSizeHinh($id,$idmau,$size);
        $img=$hinh['hinh'];
        $total=$soluong*$dongia;
        $flag=false;
        // kiem tra gio hang truoc khi them
        foreach($_SESSION['cart'] as $key=>$item)
        {
            if($item['mahh']==$id && $item['mau']==$tenmau && $item['size']==$size)
            {
                $flag=true;
                $soluong+=$item['soluong'];
                $this->updateGioHang($key,$soluong);
            }
        }
       if($flag==false)
       {
         // tao doi tuong
         $item=array(
            'mahh'=>$id,// thuoctinh=>giatri
            'tenhh'=>$tenhh,
            'hinh'=>$img,
            'dongia'=>$dongia,
            'mau'=>$tenmau,
            'size'=>$size,
          'soluong'=>$soluong,
          'thanhtien'=>$total
        );
        $_SESSION['cart'][]=$item;
       }
        /*
            $_SESSION['cart][1]['soluong']=1;
             $_SESSION['cart][1]// lay ra doi tuong
            $_SESSION['cart']=array(
                {mahh:12,tenhh:giày cao got,hinh:12.jpg,dongia:500,mau:Màu trắng,size:35,soluong:1,thanhtien:500},
                {mahh:24,tenhh:giày cao got ab,hinh:24.jpg,dongia:500,mau:Màu trắng,size:35,soluong:1,thanhtien:500},
                {mahh:24,tenhh:giày cao gotab,hinh:24b.jpg,dongia:500,mau:Màu trắng,size:36,soluong:1,thanhtien:500},
            )
         */
    }
    // phương thức update
    function updateGioHang($index,$soluong)
    {
        if($soluong<0)
        {
            unset($_SESSION['cart'][$index]);
        }
        else
        {
            // cap nhat la phép gan
            $_SESSION['cart'][$index]['soluong']=$soluong;  
            $tiennew=$_SESSION['cart'][$index]['soluong']*($_SESSION['cart'][$index]['dongia']);
            $_SESSION['cart'][$index]['thanhtien']=$tiennew;
        }
    }
    // phương thuc tinh tong tien tren gio hang
    function getTotal()
    {
        $subtotal=0;
        foreach($_SESSION['cart'] as $item)
        {
            $subtotal+=$item['thanhtien'];
        }
        return number_format($subtotal,2);
    }
}
?>