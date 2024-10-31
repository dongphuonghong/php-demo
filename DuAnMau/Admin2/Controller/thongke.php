<?php
$action="thongke";
if(isset($_GET['action'])){
    $action=$_GET['action'];
}
switch($action){
    case 'thongke':
        include_once "./View/thongke.php";
        break;
    case 'thongke_action':
}

?>