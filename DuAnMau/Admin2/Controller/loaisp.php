<?php
$action='loaisp';
if(isset($_GET['action'])){
    $action=$_GET['action'];
}
switch ($action) {
    case 'loaisp':
        include_once "./View/loaisp.php";
        break;
    case 'loaisp_action':
        $masp='';
        $tensp='';
        if($_POST['submit']){
            $masp=$_POST['masp'];
            $tensp=$_POST['tensp'];
        }
        include_once "./View/loaisp.php";
        break;
        case 'loaisp_action':
            if(isset($_POST['submit_file'])){
                $file=$_FILES['file']['tmp_name'];
                file_put_contents($file,str_replace("\xEF\xBB\xBF","",file_get_contents($file)));    
                $file_open=fopen($file,"r");
                while(($csv=fgetcsv($file_open,1000,","))!==false){
                    $db=new connect();
                    $maloai=$csv[0];
                    $tenloai=$csv[1];
                    $idmenu=$csv[2];
                    $query="Insert into loai(maloai,tenloai,idmenu)     
                    values ('$maloai','$tenloai','$idmenu')";
                    echo $query;
                    $db->exec($query);
                }
            }
            echo '<script> alert("import thành công")</script>';
            include "./View/addloaisanpham.php";
            break;
}
?>