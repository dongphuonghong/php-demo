
<div  class="col-md-4 col-md-offset-4"><h3 ><b>DANH SÁCH HÀNG HÓA</b></h3></div>
<div class="row col-12">
  <!-- thẻ a là thẻ link tới thêm 1 sản phẩm nên để trong href -->
<a href="index1.php?action=hanghoa&act=add_hanghoa"><h4>Thêm sản phẩm</h4></a>
</div>
<div class="row">
<table class="table">
    <thead>
      <!-- tiêu đề cho phần hàng hóa -->
      <tr class="table-primary">
        <th>Mã hàng</th>
        <th>Tên hàng</th>
        <th>Mã loại</th>
        <th>Đặc biệt</th>
        <th>Số lượt xem</th>
        <th>Ngày lập</th>
        <th>Mô tả</th>
        <th>Cập Nhật</th>
        <th>Xóa</th>
      </tr>
    </thead>
    <tbody>
      <!-- phần thân, gọi kết quả từ database vào -->
      <?php
        $hh=new hanghoa();
        $ht=$hh->getHangHoa();
        while($set=$ht->fetch()):
      ?>
      <tr>
        <td><?php echo $set['mahh'];?></td>
        <td><?php echo $set['tenhh'];?></td>
        <td><?php echo $set['maloai'];?></td>
        <td><?php echo $set['dacbiet'];?></td>
        <td><?php echo $set['soluotxem'];?></td>
        <td><?php echo $set['ngaylap'];?></td>
        <td><?php echo $set['mota'];?></td>
        <td><a href="index1.php?action=hanghoa&act=update_hanghoa&id=<?php echo $set['mahh'];?>">Cập nhật</a></td>
        <td><a href="index1.php?action=hanghoa&act=delete_hanghoa&id=<?php echo $set['mahh'];?>">Xóa</a></td>
      </tr>
     <?php
      endwhile;
     ?>
     <!-- kết thúc phần thân -->
    </tbody>
  </table>
</div>