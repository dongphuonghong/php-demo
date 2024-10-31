<?php
if(isset($_GET['id'])){
    $ma=$_GET['id'];
    $g=new goods();
    $result=$g->getGoodsId($ma);
    $tenhh=$result['tenhh'];
    $maloai=$result['maloai'];
    $dacbiet=$result['dacbiet'];
    $sls=$result['soluotxem'];
    $ngaylap=$result['ngaylap'];
    $mota=$result['mota'];
}
?>
<?php
$ac=1;
    if(isset($_GET['action'])){
        if(isset($_GET['action']) && ($_GET['action']=='add_goods')){
$ac=1;
        }
        else{
            $ac=2;
        }
    }
?>
<?php
    if($ac==1){
        echo '<h1> THÊM SẢN PHẨM</h1>';
    }
    else{
        echo '<h1> UPDATE SẢN PH��M</h1>';
    }
    ?>
    <div class="row col-md-4 col-md-offset-4" >
        <?php
        if($ac==1){
            echo '<form action="index.php?action=goods&act=insert_action" method="post" enctype="multipart/form-data">;';
        }
        else{
            echo '<form action="index.php?action=goods&act=update_action&id=" method="post" enctype="multipart/form-data">;';
        }
        ?>
            <table class="table" style="border: 0px;">

<tr>
  <td>Mã hàng</td>
  <td> <input type="text" class="form-control" name="mahh" value="<?php if(isset($mahh)) echo $mahh;?>"  readonly/></td>
</tr>
<tr>
  <td>Tên hàng</td>
  <td><input type="text" class="form-control" name="tenhh" value="<?php if(isset($tenhh)) echo $tenhh;?>" maxlength="100px"></td>
</tr>

<tr>
  <td>Mã loại</td>
  <td>
    <!--thêm đây để người dùng chọn loại add hàng vào -->
    <select name="maloai" class="form-control" style="width:150px;">
<?php
$selectedtype=-1;
    if(isset($maloai)){
        $selectedtype=$maloai;
    }
    $t=new type();
    $result=$t->getType();
    while ($set = $result->fetch()):
?>
            <!-- hiển thị cái đc chọn chính là selected -->
            <option value="<?php echo $set['maloai']?>" <?php if($selecttype==$set['maloai']) echo 'selected'?>><?php echo $set['tenloai'];?></option>
            <?php
              endwhile;
            ?>
              <!--kết thúc thêm -->
              </select>
        </td>
      </tr>
      <tr>
        <td>Đặc biệt</td>
        <td><input type="text" class="form-control" value="<?php if(isset($dacbiet)) echo $dacbiet;?>" name="dacbiet" >
        </td>
      </tr>
      <tr>
        <td>Số lượt xem</td>
        <td><input type="text" class="form-control" value="<?php if(isset($slx)) echo $slx;?>" name="slx" >
        </td>
      </tr>
      <tr>
        <td>Ngày lập</td>
        <td><input type="text" class="form-control" value="<?php if(isset($ngaylap)) echo $ngaylap;?>" name="ngaylap">
        </td>
      </tr>
      <tr>
        <td>Mô tả</td>
        <td><input type="text" class="form-control" value="<?php if(isset($mota)) echo $mota;?>" name="mota">
        </td>
      </tr>     
      <tr>
        <td colspan="2">
          <input type="submit" value="submit">
</td>
      </tr>
    </table>
  </form>
</div>