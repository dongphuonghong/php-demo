<?php
$act="type";
if(isset($_GET['act'])){
    $act=$_GET['action'];
}
switch ($act){
    case 'type':
        include_once "./View/addloaisanpham.php";
        break;
        case 'type_action':
            if(isset($_POST['submit_file'])){
                $file=$_FILES['file']['tmp_name'];
                file_put_contents($file,str_replace("\xEF\xBB\xBF","",file_get_contents($file)));
                $file_open=fopen($file,"r");
                while(($data=fgetcsv($file_open,1000,","))!==false){
                    $maloai=$data[0];
                    $tenloai=$data[1];
                    $idmenu=$data[2];
                    $db=new connect();
                    $query="insert into loai(maloai,tenloai,idmenu) values('$maloai','$tenloai','$idmenu')";
                    $db->exec($query);
                }
                echo '<script>alert("Import thành công");</script>';
                include_once "./View/addloaisanpham.php";
            }
            break;
}
?>