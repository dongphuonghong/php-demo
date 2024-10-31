<?php
class cthanghoa{
function insertcthanghoa($ma,$mamau,$masyze,$dongia,$slt,$hinh,$giamgia){
    $db=new connect();
    $sql="insert into cthanghoa(idhanghoa,idmau,idsyze,dongia,soluongton,hinh,giamgia) values('$ma','$mamau','$masyze','$dongia','$slt','$hinh','$giamgia')";
    echo $sql;
    $result=$db->exec($sql);
    return $result;
}
}
?>