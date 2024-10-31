<?php
$act='goods';
if(isset($_GET['act'])){
    $act=$_GET['action'];
}
switch ($act){
    case 'goods':
        include_once "./View/goods.php";
        break;
        case 'add_goods':
            include_once "./View/editgoods.php";
            break;
            case 'insert_action':
                if($_SERVER['REQUEST_METHOD']==""){
                    $mahh=$_POST['mahh'];
                $ten=$_POST['ten'];
                    $maloai=$_POST['maloai'];
                    $dacbiet=$_POST['dacbiet'];
                    $slx=$_POST['slx'];
                    $ngaylap=$_POST['ngaylap'];
                    $mota=$_POST['mota'];
$g=new goods();    
                    $g->getInsertGoods($mahh,$maloai,$dacbiet,$slx,$ngaylap,$mota);
                    echo '<script>alert("Thêm sản phẩm thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=./index.php?action=goods>';
                }
                    break;
                case 'update_goods':
                    include_once "./View/editgoods.php";
                    break;
                    case 'update_action':
                        if(isset($_POST['mahh'])){
                            $mahh=$_POST['mahh'];
                            $ten=$_POST['ten'];
                            $maloai=$_POST['maloai'];
                            $dacbiet=$_POST['dacbiet'];
                            $slx=$_POST['slx'];
                            $ngaylap=$_POST['ngaylap'];
                            $mota=$_POST['mota'];
                            $g=new goods();    
                            $g->getUpdateGoods($mahh,$ten,$maloai,$dacbiet,$slx,$ngaylap,$mota);
                            echo '<script>alert("Update thành công");</script>';
                            echo '<meta http-equiv=refresh content="0;url=./index.php?action=goods>';
                    }
                    break;
                    case 'delete_goods':
                        if(isset($_GET['ma'])){
                            $ma=$_GET['id'];
                            $g=new goods();
                            $g->getDeleteGoods($id);
                            echo '<script>alert("Delete thành công");</script>';
                            echo '<meta http-equiv=refresh content="0;url=./index.php?action=goods>';
                            break;
                        }
                }
?>