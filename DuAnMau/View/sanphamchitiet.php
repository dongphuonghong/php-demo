    <script type="text/javascript">
    function chonsize(a) {
        document.getElementById("size").value = a;

    }
</script>
<section>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mb-5 font-weight-bold">CHI TIẾT SẢN PHẨM</h3>
        </div>

    </div>
    <article class="col-12">
        <!-- <div class="card"> -->
        <div class="container-fliud">
            <div class="wrapper row">
                <form action="index.php?action=giohang&act=giohang_action" method="post">
                    <!-- <input type="hidden" name="action" value="giohang&add_cart"/> -->

                    <div class="preview col-md-6">
                        <div class="tab-content">

                            <!-- điều hướng qua trang chi tiết sản phẩm và truyền id của mã sản phẩm 
                            mà người dùng chọn -->
                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $hh = new hanghoa();
                                $sanpham = $hh->getHangHoaId($id); // $sanpham=array(mahh=2,tenhh=...)
                                $tenhh = $sanpham['tenhh'];
                                $dongia = $sanpham['dongia'];
                                $mota = $sanpham['mota'];

                            }
                            ?>
                            <?php
                            $hinh = $hh->getHangHoaIdHinh($id);
                            $img = $hinh->fetch(); // lấy ra dòng đầu tiên
                            ?>
                            <div class="tab-pane active" id=""><img
                                    src="Content/imagetourdien/<?php echo $img['hinh']; ?>" alt="" width="200px"
                                    height="350px">
                            </div>

                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <?php
                            while ($img = $hinh->fetch()):
                                ?>
                                <li class="active"><a href="#<?php echo $img['hinh']; ?>" data-toggle="tab">
                                        <img src="<?php echo 'Content/imagetourdien/' . $img['hinh']; ?>"
                                            alt="Học thiết kế web bán hàng Online"></a>
                                </li>
                                <?php
                            endwhile;
                            ?>
                        </ul>
                    </div>
                    <div class="details col-md-6">
                        <input type="hidden" name="mahh" value="<?php echo $id;?>" />
                        <h3 class="product-title">
                            <?php echo $tenhh; ?>
                        </h3>
                        <div class="rating">
                            <div class="stars"> <span class="fa fa-star checked"></span> <span
                                    class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span
                                    class="fa fa-star"></span> <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <p class="product-description">

                        </p>
                        <h4 class="price">Giá bán:
                            <?php echo $dongia; ?>đ
                        </h4>

                        <h5 class="colors">Màu:
                            <select name="mymausac" class="form-control" style="width:150px;">
                                <?php
                                $mau = $hh->getHangHoaIdMau($id);
                                while ($set = $mau->fetch()):
                                    ?>
                                    <option value="<?php echo $set['Idmau']; ?>">
                                        <?php echo $set['mausac']; ?>
                                    </option>
                                    <?php
                                endwhile;
                                ?>
                            </select><br>

                            <input type="hidden" name="size" id="size" value="35" />
                            Kích Thước:
                            <?php
                            $sizegiay = $hh->getHangHoaIdSize($id);
                            while ($set = $sizegiay->fetch()):

                                ?>
                                <button type="button" name="" onclick="chonsize(<?php echo $set['size'];?>)" class="btn btn-default-hong btn-circle" id="hong"
                                    value="<?php echo $set['idsize']; ?>">
                                    <?php echo $set['size']; ?>
                                </button>
                                <?php
                            endwhile;
                            ?>
                            </br></br>
                            Số Lượng:

                            <input type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="10" />


                        </h5>

                        <div class="action">

                            <button class="add-to-cart btn btn-default" type="submit" data-toggle="modal"
                                data-target="#myModal">MUA NGAY
                            </button>

                            <a href="http://hocwebgiare.com/" target="_blank"> <button class="like btn btn-default"
                                    type="button"><span class="fa fa-heart"></span></button> </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- </div> -->
    </article>
</section>

<p class="float-left"><b>BÌnh luận </b></p>
<hr>
</div>
<form action="" method="post">
    <div class="row">

        <input type="hidden" name="txtmahh" value="" />
        <img src="Content/imagetourdien/people.png" width="50px" height="50px" ; />
        <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment"
            placeholder="Thêm bình luận">  </textarea>
        <input type="submit" class="btn btn-primary" id="submitButton" style="float: right;" value="Bình Luận" />

    </div>

</form>
<div class="row">
    <p class="float-left"><b>Các bình luận</b></p>
    <hr>
</div>
<div class="row">
    <br />
</div>

</div>
</section>