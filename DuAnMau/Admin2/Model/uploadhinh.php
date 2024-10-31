<?php
function updoladImage(){
    $target_dir="Content/imagetourdien/";
    $target_file=$target_dir.basename($_FILES["image"]["name"]);
    $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $upload=1;
if(isset($_POST['submit'])){
    $check=getimagesize($_FILES["image"]["tmp_name"]);
    if($check!==false){
        $upload=1;
    }else{
        echo "Hình không tồn tại";
        $upload=0;
    }
}
if(file_exists($target_file)){
    echo "Hình đã tồn tại";
    $upload=0;
}
if($_FILES["image"]["size"]>500000){
    echo "Hình quá l��n";
    $upload=0;
}
if($imageFileType="jpg"&&$imageFileType="png"&&$imageFileType="jpeg"&&$imageFileType="gif"){
    echo " Không phải là hình ảnh";
    $upload=0;
}
    if($upload==1){
        if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)){
            echo "Upload thành công";
        }      
        else{
            echo "Upload thất bại";
        }
    }
}
?>