<?php
require_once("config/db.php");
$query="SELECT * FROM products;";
$result=mysqli_query($conn,$query);
$query1="SELECT * FROM products WHERE category='breakfast';";
$k2=mysqli_query($conn,$query1);
$k1=mysqli_num_rows($k2);
if($k1>=4) $k1=4; 
?>
           
<h3 class="title-big mb-2">Breakfast</h3>
            <div class="row menu-body">
            <?php
            $k=1;
            while($a = mysqli_fetch_assoc($result)){
                if($k>4) break;
                if($a['category']=="breakfast"){
                $k+=1;
                if($k<=$k1/2) echo '<div class="col-lg-6 menu-section">';
                else{ echo '</div>';
                    echo '<div class="col-lg-6 menu-section">';}
            ?>
                    <div class="row menu-item">
                        <div class="col-3 p-0 position-relative">
                            <img src="assets/images/<?=$a['img']?>" class="img-responsive" alt="">
                           </div>
                        <div class="col-9 pl-4">
                            <div class="row no-gutters">
                                <div class="col-9 menu-item-name">
                                    <h6><?=$a['name']?></h6>
                                </div>
                                <div class="col-3 menu-item-price text-right">
                                    <h6><?=$a['price']?>$</h6>
                                </div>
                            </div>
                            <div class="menu-item-description">
                                <p><?=$a['descr']?></p>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                    <div class="form-group-2 mt-4">
                          <a href="brea.php?ss=1" style="width: 100px" class="btn button-style d-flex ml-auto">More</a>
                        </div>
                </div>
            </div>