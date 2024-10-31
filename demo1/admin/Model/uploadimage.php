<?php
function uploadImage(){
    $target_dir="../../DuAnMau/Content/imagetourdien/";
    $target_file=$target_dir.basename($_FILES['image']['name']);
    $upload=1;
    if(isset($_POST['submit'])){
        $check=getimagesize($_FILES['image']['tmp_name']);
        if($check!==false){
            $upload=1;
        }else{
            $upload=0;
        }
    }
    if(file_exists($target_file)){{
        $upload=0;
        echo '<script> alert("Hình đã tồn tại")</script>';
    }
    if($_FILES['image']['size']>500000){
        $upload=0;
        echo '<script> alert("Hình quá l��n")</script>';
    }
    $imagefileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($imagefileType!="jpg"&&$imagefileType!="png"&&$imagefileType!="jpeg"&&$imagefileType!="gif"&&$imagefileType!="bmp"){
        $upload=0;
        echo '<script> alert("Chỉ chấp nhận file jpg,png,jpeg,gif,bmp")</script>';
    }
    if($upload==1){
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file)){
            echo '<script> alert("Upload thành công")</script>';
        }else{
            echo '<script> alert("Upload thất bại")</script>';
        }
    }
    }
}
?>