<?php
if(isset($_GET['cart'])){
$_SESSION['cart']=array();
}//end if
$act='cart';
if(isset($_GET['action'])){
    $act=$_GET['action'];
}//end if
switch ($act){
    case 'cart':
        include_once "./View/cart.php";
        break;
        case 'cart_action':
            $id=0;
            $idmau=0;
            $soluong=0;            
if(isset($_POST['mahh'])){
    $id=$_POST['mahh'];
    $soluong=$_POST['soluong'];
    $idmau=$_POST['idmau'];
    $soluong=$_POST['soluong'];
$c=new cart();
    $c->addCart($id,$idmau,$soluong,$idsize);
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=cart"/>';
}
    break;
    case 'delete_car':
        if(isset($_GET['id'])){
            $vt=$_GET['id'];
            unset($_SESSION['cart'][$vt]);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=cart"/>';
        }//end if
        break;
        case 'update_cart':
            if(isset($_POST['newqty'])){
                $soluong=$_POST['newqty'];
                foreach($soluong as $key=>$value){
                    if($_SESSION['cart'][$key]['soluong']!=$value){
                        $c=new cart();                      
                        $c->updateCart($key,$value);       
                }
            }//end if
        }
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=cart"/>';
            break;
            break;
}//end switch
?>