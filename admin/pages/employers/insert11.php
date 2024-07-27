<?php
require_once("../config.php");
if(isset($_POST['sub'])){
$name=$_POST['name'];
$price=$_POST['price'];
$desc=$_POST['desc'];
$category=$_POST['category'];
$targetDir = "../foodies/assets/images/";
  $image = time().'.jpg'; 
  $targetFile = $targetDir . $image;
 $k= move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile);
$query="INSERT INTO products(name,price,descr,category,img) 
VALUES('$name', $price,'$desc','$category','$image');";
$result=mysqli_query($conn,$query);
}
?>
<?php
if(isset($_POST['sub'])){
    ?>
<script>
    window.location.href="?page=4";
</script>
<?php }?>
<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Блюдо</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="?page=3"  method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group" style="align-content: center;">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="name" class="form-control" name="name" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Price</label>
                            <input type="number" class="form-control" name="price" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Image</label>
                            <input type="file" class="form-control" name="img" multiple="">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Category</label>
                           <select name="category" class="form-control">
                            <option value="breakfast">Breakfast</option>
                            <option value="lunch">Lunch</option>
                            <option value="dinner">Dinner</option>
                           </select>
                          </div>
                          </div>
                          <div class="col-md-6 right-cont-contact mt-md-0 mt-1">
                                <div class="form-group">
                                    <label for="w3lSubject">Description</label>
                                    <textarea class="form-control" name="desc" id="w3lMessage" placeholder=""
                                        required=""></textarea>
                                </div>
                            </div>
                        </div>
                     
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="sub" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
 
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>