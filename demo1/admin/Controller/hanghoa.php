<?php
    $act="hanghoa";
    if(isset($_GET['act']))    {
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'hanghoa':
            include_once "./View/hanghoa.php";
            break;        
        case 'add_hanghoa':
           include_once "./View/edithanghoa.php";
            break;
        case 'insert_action':
            // nhận thông tin về là tênhh,maloai,dacbiet,soluotxe,mota
            if($_SERVER['REQUEST_METHOD']=='POST')            {
                $mahh=$_POST['mahh'];
                $tenhh=$_POST['tenhh'];
                $maloai=$_POST['maloai'];
                $dacbiet=$_POST['dacbiet'];
                $slx=$_POST['slx'];
                $ngaylap=$_POST['ngaylap'];
                $mota=$_POST['mota'];
                // dem thông tin này insert vào bảng hàng hóa
                $hh=new hanghoa();
                $hh->getInsertHangHoa($tenhh,$maloai,$dacbiet,$slx,$ngaylap,$mota);
                echo '<script>alert("Thêm sản phẩm thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=../index.php?action=hanghoa"/>';
            }
            break;
        case 'update_hanghoa':
            include_once "./View/edithanghoa.php";
            break;
        case 'update_action':
            // nhận thông tin 
            if(isset($_POST['mahh']))
            {
                $mahh=$_POST['mahh'];
                $tenhh=$_POST['tenhh'];
                $maloai=$_POST['maloai'];
                $dacbiet=$_POST['dacbiet'];
                $slx=$_POST['slx'];
                $ngaylap=$_POST['ngaylap'];
                $mota=$_POST['mota'];
                // tiến hành update
                $hh=new hanghoa();
                $hh->getUpdateHH($mahh,$tenhh,$maloai,$dacbiet,$slx,$ngaylap,$mota);
                echo '<script>alert("Update thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=../index.php?action=hanghoa"/>';
            }
            break;
        case 'delete_hanghoa':
            if(isset($_GET['id']))            {
                $mahh=$_GET['id'];
                $hh=new hanghoa();
                $hh->getDeleteHH($mahh);
                echo '<script>alert("Delete thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=../index.php?action=hanghoa"/>';
            }
    }
?>