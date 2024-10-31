<?php
$act="loai";
if(isset($_GET['act'])){
    $act=$_GET['act'];
}
switch ($act) {
    case 'loai':
        include_once "./View/addloaisanpham.php";
        break;
        case 'loai_action':
            if(isset($_POST['submit_file'])){
                $file=$_FILES['file']['tnpname_name'];
                file_put_contents($file,str_replace("\xEF\xBB\xBF","",file_get_contents($file)));
                $file_open=fopen($file,"r");
                while(($data=fgetc($file_open,1000,","))!==false){
                    $maloai=$data[0];
                    $tenloai=$data[1];
                    $menu=$data[2];
                    $db=new connect();
                    $query="insert into loai (maloai,tenloai,menu) value($maloai,'$tenloai',$menu)";
                    $query->exec($query);
                                    }                                    
                                    echo '<script>
                                    Swal.fire({
                                        title: " Import ",
                                        text: " bạn đã Import thành công ",
                                        icon: "success"
                                      });
                                    </script>';
                                include_once "./View/addloaisanpham.php";
            }
            break;
}
?>