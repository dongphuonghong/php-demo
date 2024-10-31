<?php
$act='product';
if(isset($_GET['act'])){
    $act=$_GET['action'];
}//end if
switch ($act){
    case 'product':
        include_once "./View/sanpham.php";
        break;
        case 'promotionalProducts':
            include_once "./View/sanpham.php";
            break;
                case 'productDetails':
                        include_once "./View/sanphamchitiet.php";
                        break;
case 'search ':
    include_once "./View/sanpham.php";  
    break;
    }//end switch 
?>