<?php
class cart{    
    /**
     * This is the add to cart function
     */
    function addCart($id,$idmau,$size,$soluong){
$g=new goods();
$products=$g->getGoodsId($id);
$name=$products['name'];
$uniPprice=$products['uniPprice'];
$color=$g->getGoodsIdMausac($idmau);
$NameColor=$color['maubac'];
$image=$g->getGoodsIdMauSizeHinh($id,$idmau,$size);
$img=$image['image'];
$total=$soluong*$uniPprice;
$flag=false;
foreach($_SESSION['Cart'] as $eyk=>$item){
if($item['mahh']==$id&&$item['mau']==$NameColor&&$item['size']==$sy){
    $flag=true;
    $soluong+=$item['soluong'];
    $this->updateCart();
}//end if
}//end for
if($flag==false){
    $item=array(
        'mahh'=>$id,
        'name'=>$name,
        'uniPprice'=>$uniPprice,
      'soluong'=>$soluong,
      'mau'=>$NameColor,
     'size'=>$size,
        'image'=>$img,
        'thanhtien'=>$total
    );
    $_SESSION['cart']=$item;
}
    }//end addCart
    /**
     * This is the update cart function
     */
    function updateCart(){
if($soluong<0){
    unset($_SESSION['cart'][$index]);
}//end if
else{
    $_SESSION['cart'][$index][]['soluong']=$soluong;
$tiennew=$_SESSION['cart'][$index]['soluong']*($_SESSION['cart'][$index]['uniPprice']);
    $_SESSION['cart'][$index][]['thanhtien']=$tiennew;
}//end else
    }//end updateCart
        // method to calculate total cash on time
        function getTotal(){
        $subtotal=0;
        foreach($_SESSION['cart'] as $item)
        {
            $subtotal+=$item['thanhtien'];
        }
        return number_format($subtotal,2);
        }//end getTotal            
}//end class
?>