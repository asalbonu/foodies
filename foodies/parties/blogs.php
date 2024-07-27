 <?php 
  require_once("config/db.php");
 $query="SELECT * FROM posts;";
 $result=mysqli_query($conn,$query); 
 ?>
 <section class="w3l-blog-sec py-5">
        <div class="services-layout py-md-4 py-3">
            <div class="container">
              <br> <br>
                <h3 class="title-big mb-4 pb-2">Blog Posts</h3>
                <div class="row">
                            <?php
                            while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <br>
                            <br>
                             <div class="col-lg-4 col-md-6 column column-img" id="zoomIn">
                            <div class="services-gd">
                            <div class="serve-info">
                                <h3 class="date"><?=$row['created_at']?></h3>
                                <a href="#blog">
                                    <figure>
                                        <img class="img-responsive" src="assets/images/posts/<?=$row['image']?>" alt="blog-image">
                                    </figure>
                                </a>
                                <h3> <a href="#blog" class="vv-link"><?=$row['title']?></a>
                                </h3>
                                <ul class="admin-list">
                                    <li><a href="#blog"><span class="fa fa-user-circle"
                                                aria-hidden="true"></span>
                                            <?=$row['created_by']?></a></li>
                                    
                                </ul>
                            </div>
                            </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>