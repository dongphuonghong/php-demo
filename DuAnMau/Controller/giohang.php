<?php
// unset($_SESSION['cart']);
// truoc khi them hang can kiem tra nguoi dung co gio hang hay chua
if(!isset($_SESSION['cart']))
{
    $_SESSION['cart'] = array();
}
$act="giohang";
if(isset($_GET['act']))
{
    $act=$_GET['act'];
}
switch ($act) {
    case 'giohang':
        include_once "./View/cart.php";
        break;
    case 'giohang_action':
        // nhan id,nhan idmau,size,soluong
            $id=0;
            $idmau=0;
            $idsize=0;
            $soluong=0;
            if(isset($_POST['mahh']))
            {
                $id=$_POST['mahh'];
                $idmau=$_POST['mymausac'];
                $idsize=$_POST['size'];
                $soluong=$_POST['soluong'];
                // controller yeu cau add thoong tin vao trong gio hang
                $gh=new giohang();
                $gh->addGioHang($id,$idmau,$idsize,$soluong);
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
            }
            break;
    case 'delete_giohang':
        if(isset($_GET['id']))
        {
            $vt=$_GET['id'];
            unset($_SESSION['cart'][$vt]);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
        }
        break;
    case 'update_giohang':
     
            if(isset($_POST['newqty']))
            {
                $soluong=$_POST['newqty'];
                foreach ($soluong as $key => $value) {
                   if($_SESSION['cart'][$key]['soluong']!=$value)
                   {
                    $gh=new giohang();
                    $gh->updateGioHang($key,$value);
                   }
                }
               
               echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
            }
            break;
        
        break;
    
}
?>