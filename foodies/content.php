<?php
if (isset($_GET["ss"])) {
    $ss = $_GET["ss"];
    if ($ss == "1" || $ss == "addemployer") {
        ?>

        <div class="row menu-body">
            <?php
           $query1="SELECT * FROM products WHERE category = 'breakfast' LIMIT 6 OFFSET 1";
           $k2=mysqli_query($conn,$query1);
           echo '<div class="col-lg-6 menu-section">';
            while($a = mysqli_fetch_assoc($k2)){
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
                    <?php }
                    echo "</div>";
                    ?>
                </div>
            <div class="container mt-5">
        <div class="row">
            <div class="col text-center">
                <!-- Back Button -->
                <!-- Forward Button -->
                <a href="?ss=2" class="btn btn-primary">
                    Вперед 
                </a>
            </div>
        </div>
    </div>

   <?php } }  ?>