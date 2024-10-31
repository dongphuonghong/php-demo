        <?php
 class goods{
function getGoodsnew(){
    $db=new connect();
    $select="select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac from hanghoa a,cthanghoa b, mausac c WhERE a.mahh=b.idhanghoa and b.idmau=c.Idmau Order by a.mahh DESC limit 8";
    $result=$db->getList($select);
    return $result;
}//end getGoodsnew
function getGoodsSale(){
    $db=new connect();
    $select="select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac,b.giamgia from hanghoa a,cthanghoa b, mausac c WhERE a.mahh=b.idhanghoa and b.idmau=c.Idmau and b.giamgia!=0 Order by a.mahh DESC limit 4";
    $result=$db->getList($select);
    return $result;
}//end getGoodsSale
function getGoodsSaleAll(){
    $db=new connect();
    $select="select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac,b.giamgiafrom hanghoa a,cthanghoa b, mausac c      WhERE a.mahh=b.idhanghoa and b.idmau=c.Idmau and b.giamgia!=0 order by a.mahh desc";
$result=$db->getList($select);
    return $result;
function getGoodsNewAll(){
$db=new connect();
            $select="select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac,b.giamgia             from hanghoa a,cthanghoa b, mausac c             WhERE a.mahh=b.idhanghoa and b.idmau=c.Idmau and b.giamgia=0 order by a.mahh desc"; 
    $result=$db->getList($select);
    return $result;
}//end getGoodsNewAll        
function getGoodsNewAllPage($start,$limit){
$db=new connect();
            $select="select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac,b.giamgiafrom hanghoa a,cthanghoa b, mausac c WhERE a.mahh=b.idhanghoa and b.idmau=c.Idmau and b.giamgia=0 order by a.mahh desc limit ".$start.",".$limit;
        $result=$db->getList($select);
        return $result;
}//end getGoodsNewAllPage
function getGoodsId($id){
    $db=new connect();
                $select="select DISTINCT a.mahh,a.tenhh,b.dongia,a.mota from hanghoa a, cthanghoa bWHERE a.mahh=b.idhanghoa and a.mahh=$id";            
    $result=$db->getInstand($select);
    return $result;
}//end getGoodsId
    function getGoodsIdmau($id){
        $db=new connect();
                            $select="select DISTINCT a.Idmau,a.mausac from mausac a, cthanghoa b WHERE a.Idmau=b.idmau and b.idhanghoa=21";
                $result=$db->getList($select);
                return $result;
    }//end getGoodsIdmau
    function getGoodsIdsize($id){
        $db=new connect();
                                        $select="select DISTINCT a.idsize,a.size from sizegiay a,cthanghoa b WHERE a.idsize=b.idsize and b.idhanghoa=$id";            
                $result=$db->getList($select);
                return $result;
    }//end getGoodsIdsize
    function getGoodsIdHinh($id){
        $db=new connect();
                                                $select="select DISTINCT a.hinh from cthanghoa a WHERE a.idhanghoa=$id";
                $result=$db->getList($select);
                return $result;
    }//end getGoodsIdHinh
    function getGoodsIdMausac($idmau){
        $db=new connect();
                                                            $select="select DISTINCT a.mausac from mausac a WHERE a.Idmau=$idmau";
                                                            echo $select;
                $result=$db->getList($select);
                return $result;
    }//end getGoodsIdMausac
    function getGoodsIdMauSizeHinh($id,$idmau,$size){
        $db=new connect();
                                                                    $select="select DISTINCT a.hinh from cthanghoa a, sizegiay bWHERE a.idhanghoa=$id and idmau=$idmau and b.size=$size";          
$result=$db->getInstand($select);
                return $result;
    }//end getGoodsIdMauSizeHinh
    function searchProduct($name){
        $db=new connect();
                    $select="select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac,b.giamgia from hanghoa a, cthanghoa b,mausac c WHERE a.mahh=b.idhanghoa and b.idmau=c.Idmau and a.tenhh like '%$tenhh%' order by a.mahh desc";  
                    $result=$db->getList($select);
                    return $result;
                    }
            }//end                                              searchProduct
}//end class
?>