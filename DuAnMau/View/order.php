<div class="table-responsive">
 <?php
  if(!isset($_SESSION['makh'])):
    echo '<script> alert("Bạn phải đăng nhập");</script>';
    echo '<meta http-equiv="refresh" content="0;url=../index1.php?action=dangnhap"/>';
 ?>
 <?php
  else:
 ?>
    <form action="" method="post">
      <table class="table table-bordered" border="0">
      <?php
        if(isset($_SESSION['masohd']))
        {
          $masohd=$_SESSION['masohd'];
          $hd=new hoadon();
          $kh=$hd->getThongTinKhHoaDon($masohd);
          $tenkh=$kh['tenkh'];
          $ngay=$kh['ngaydat'];
          $dc=$kh['diachi'];
          $sodt=$kh['sodienthoai'];
                  
      ?>
                        
       <tr>
          <td colspan="4">
            <h2 style="color: red;">HÓA ĐƠN</h2>
          </td>
        </tr>
      <tr>
          <td colspan="2">Số Hóa đơn: <?php echo $masohd;?></td>
          <td colspan="2"> Ngày lập: <?php echo $ngay;?> </td>
        </tr>
       <tr>
          <td colspan="2">Họ và tên:</td>
          <td colspan="2"><?php echo $tenkh;?></td>
        </tr>
       <tr>
          <td colspan="2">Địa chỉ:  </td>
          <td colspan="2"><?php echo $dc;?></td>
        </tr>
        <tr>
          <td colspan="2">Số điện thoại: </td>
          <td colspan="2"><?php echo $sodt;?></td>
        </tr>
        ?>
      </table>
      <!-- Thông tin sản phầm -->
      <table class="table table-bordered">
        <thead>

          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th>Giá</th>
          </tr>
        </thead>
        <tbody>
          
          <?php
            $tt=$hd->getThonTinHangHoaDS($masohd);
            $j=0;
            while ($set=$tt->fetch()):
            $j++;
          ?>
            <tr>
              <td><?php echo $j;?></td>
              <td><?php echo $set['tenhh'];?></td>
              <td>Màu: <?php echo $set['mausac'];?> Size: <?php echo $set['size'];?> </td>
              <td>Đơn Giá: <?php echo number_format($set['dongia']);?>  - Số Lượng: <?php echo $set['soluongmua'];?> <br />
              </td>
            </tr>
          <?php
            endwhile;
          ?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b> 
                <?php
                  $gh=new giohang();
                  echo $gh->getTotal();
                ?>
                <sup><u>đ</u></sup></b>
            </td>
          <?php
        }
          ?>
          </tr>
        </tbody>
      </table>
    </form>
  <?php
   endif;
  ?>
</div>
</div>