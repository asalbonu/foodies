<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users1";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$q = $_GET['search'];
$query = "SELECT * FROM products WHERE name LIKE '%$q%' OR category LIKE '%$q%'";
$result = mysqli_query($conn,$query);
$k1 = mysqli_num_rows($result);
?>
<?php require_once("parties/header.php");?>
  <div class="inner-banner">
        <section class="w3l-breadcrumb">
            <div class="container">
                <h4 class="inner-text-title font-weight-bold mb-sm-3 mb-2">Foodies Menu</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span>Menu</li>
                </ul>
            </div>
        </section>
    </div>
    <div class="menu-w3ls py-5" id="menu">
        <div class="container py-md-4 py-3">
        <h3 class="title-big mb-2">Result</h3>
            <div class="row menu-body">
            <?php
            if($k1==0){
            ?>
            <h3 class="title-big mb-2" style="color: red">There is no such dish</h3>
            <?php
            }
           else{ $k=0;
            while($a = mysqli_fetch_assoc($result)){
                $k+=1;
                if($k<=$k1/2) echo '<div class="col-lg-6 menu-section">';
                else{ echo '</div>';
                    echo '<div class="col-lg-6 menu-section">';}
            ?>
                    <div class="row menu-item">
                        <div class="col-3 p-0 position-relative">
                            <img src="assets/images/<?=$a['img']?>" class="img-responsive" alt="">
                            <a href="parties/delete2.php?id=<?=$a['id']?>" class="btn button-style button-style-2" style="background-color: red">Delete</a>
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
        <section class="w3l-promocode">
        <div class="promo-block pt-md-0 pt-4">
            <div class="container">
                <div class="row aap-4-section">
                    <div class="col-lg-6 app4-right-image">
                        <img src="assets/images/img3.png" class="img-responsive" alt="App Device" />
                    </div>
                    <div class="col-lg-6 app4-left-text pl-lg-0 mb-lg-0 mb-sm-2 mb-4">
                        <h6>For 30% Discount</h6>
                        <h4>Get Our Promocode Now</h4>
                        <p class="mb-4"> Uspendisse efficitur orci urna. In et augue ornare, tempor massa in, luctus
                            sapien. Proin a
                            diam et dui fermentum molestie vel id neque. </p>
                        <div class="app-4-connection">
                            <div class="newsletter">
                                <label>Never Miss a Deal From Foodies</label>
                                <form action="#" methos="GET" class="d-flex wrap-align">
                                    <input type="email" placeholder="Enter your email id" required="required" />
                                    <button type="submit">Get Promocode</button>
                                </form>
                            </div>
                            <p class="mobile-text-app mt-4 pt-2">(Or) To Get Our Mobile Apps</p>
                            <div class="app-4-icon">
                                <ul>
                                    <li><a href="#url" title="Apple" class="app-icon apple-vv"><span class="fa fa-apple"
                                                aria-hidden="true"></span></a></li>
                                    <li><a href="#url" title="Google play" class="app-icon play-vv"><span
                                                class="fa fa-play" aria-hidden="true"></span></a></li>
                                    <li><a href="#url" title="Microsoft" class="app-icon windows-vv"><span
                                                class="fa fa-windows" aria-hidden="true"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once("parties/footer.php");?>