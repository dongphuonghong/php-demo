    <!-- quảng cáo -->
    <?php
    include "quangcao.php";
    ?>
    <!-- end quảng cáo -->
    <?php
        // b1: xác định tổng số sản phẩm mà trang đang phân trang
        $g=new goods();
        $count=$g->getGoodsNewAll()->rowCount();//14
        //b2: cho giới hạn
        $limit=8;
        //b3:tính tổng số trang và start dựa vào $count và $limit
        $trang=new page();
        $page=$trang->findPage($count,$limit);//2
        // gọi start
        $start=$trang->findStart($limit);
    ?>
   
    <!-- end số lượt xem san phẩm -->
    <!-- sản phẩm-->
    <?php
    $ac=1;
    if(isset($_GET['action']))
    {
        if(isset($_GET['act'])&& $_GET['act']=='promotional products')
        {
            $ac=2;  
        }
        else if(isset($_GET['act'])&& $_GET['act']=='Search')
        {
            $ac=3;  
        }
        else
        {
            $ac=1;
        }
    }
    ?>

    <!--Section: Examples-->
    <section id="examples" class="text-center">

        <!-- Heading -->
        <div class="row">
            <div class="col-lg-8 text-right">
                <?php
                    if($ac==1)
                    {
                        echo '<h3 class="mb-5 font-weight-bold" style="color: red;">SẢN PHẨM Sanr Phẩm all</h3>';
                    }
                    if($ac==2)
                    {
                        echo '<h3 class="mb-5 font-weight-bold" style="color: red;">SẢN PHẨM sale</h3>';
                    }
                    if($ac==3)
                    {
                        echo '<h3 class="mb-5 font-weight-bold" style="color: red;">SẢN PHẨM TIM KIEM</h3>';
                    }
                ?>
            </div>
        </div>
        <!--Grid row-->
        <div class="row">
                    <?php
                        $g=new goods();
                        if($ac==1)
                        {
                            //$result=$hh->getHanghoaNewAll();// chưa phân trang nên hiển thị 14 san pham
                            $result=$g->getGoodsNewAllPage($start,$limit);
                        }
                        if($ac==2)
                        {
                            $result=$g->getGoodsSaleAll();
                        }
                        if($ac==3)
                        {
                            if(isset($_POST['txtsearch']))
                            {
                                $tk=$_POST['txtsearch'];
                            $result=$g->searchProduct($tk);
                            }
                        }
                    while($set=$result->fetch()):
                    ?>
                <!--Grid column-->
                <div class="col-lg-3 col-md-4 mb-3 text-left">
                    <div class="view overlay z-depth-1-half">
                        <img src="Content\imagetourdien\<?php echo $set['hinh'];?>" class="img-fluid" alt="">
                        <div class="mask rgba-white-slight"></div>
                    </div>
                    <?php
                        if($ac==1)
                        {   
                            echo '<h5 class="my-4 font-weight-bold" style="color: red;">'.number_format($set['dongia']).'<sup><u>đ</u></sup></br>
                            </h5>';
                        }
                        if($ac==2)
                        {
                            echo '<h5 class="my-4 font-weight-bold">
                            <font color="red">'.number_format($set['giamgia']).'<sup><u>đ</u></sup></font>
                            <strike>'.number_format($set['dongia']).'</strike><sup><u>đ</u></sup>
                        </h5>';
                        }
                    ?>
            
                    <a href="index.php?action=product&act=productDetails&id=<?php echo $set['mahh'];?>">
                    <span><?php echo $set['tenhh']." - ".$set['mausac'];?></span></br></a>
                    <button class="btn btn-danger" id="may4" value="lap 4">New</button>
                    <h5>Số lượt xem: <?php echo $set['soluotxem'];?></h5>
                </div>
            <?php
                endwhile;
            ?>
        </div>

        <!--Grid row-->

    </section>
    
                
    <!-- end sản phẩm mới nhất -->
    
    <?php
    if($ac==1):
    ?>
    <div class="col-md-6 div col-md-offset-3">
                    <ul class="pagination">
                        <?php
                        // tạo nút lùi, lùi vẫn lớn hơn 1 và tổng số trang phải >1
                        $current_page=isset($_GET['page'])?$_GET['page']:1;
                        if($current_page>1 && $page>1)
                        {
                            echo ' <li ><a href="index.php?action=product&page='.($current_page-1).'">Prev</a></li>';
                        }
                            for($i=1;$i<=$page;$i++){
                        ?>
                        <li ><a href="index.php?action=product&page=<?php echo $i;?>"><?php echo $i;?></a></li>
                    <?php
                            }
                            // next vẫn nhỏ hơn tổng số trang
                            if($current_page<$page && $page>1)
                        {
                            echo ' <li ><a href="index.php?action=product&page='.($current_page+1).'">Next</a></li>';
                        }
                    ?>
                    </ul>
    </div>
    <?php
    endif;
    ?>