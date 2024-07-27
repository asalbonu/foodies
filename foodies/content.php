<div class="menu-w3ls py-5" id="menu">
    <div class="container py-md-4 py-3">
<?php
if (isset($_GET["ss"])) {
    $ss = $_GET["ss"];
    if ($ss == "1" || $ss == "addemployer") {
        ?>

        <div class="row menu-body">
            <?php
           require_once("config/db.php");
           $query="SELECT * FROM products;";
           $result=mysqli_query($conn,$query);
           $query1="SELECT * FROM products WHERE category='breakfast';";
           $k2=mysqli_query($conn,$query1);
           $k1=mysqli_num_rows($k2);
           if($k1>=12) $k1=12;
           $k=1; 
            while($a = mysqli_fetch_assoc($result)){
                if($k>12) break;
                if($a['category']=="breakfast"){
                    $k+=1;
                if($k<=6) echo '<div class="col-lg-6 menu-section">';
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
                </div>
            </div>
            </div>
            <?php
            if($k>12){
            ?>
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

   <?php } }


   else if (isset($_GET["ss"])) {
        $ss = $_GET["ss"];
        if ($ss >="2") {
            ?>
            <div class="row menu-body">
            <?php
            while($a = mysqli_fetch_assoc($result)){
                if($k>12) break;
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
                </div>
            </div>
            <?php
            if($_GET['ss']>1){ $rr=$_GET['ss'];
            ?>
            <div class="container mt-5">
        <div class="row">
            <div class="col text-center">
                <!-- Back Button -->
                <!-- Forward Button -->
                <a href="?ss=<?=$rr-1?>" class="btn btn-primary">
                    Назад 
                </a>
            </div>
        </div>
    </div>
            <?php
            } 
            if($k>12){
            ?>
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
   <?php } } }
} 

?>