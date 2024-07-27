<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Сотрудник</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="pages/employers/insert.php"  method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Имя</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Фамилия</label>
                    <input type="text" name="surname" class="form-control" id="exampleInputEmail1" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Дата рождения</label>
                    <input type="date" name="bd" class="form-control" id="exampleInputEmail1" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Пол</label>
                    <select name="gender" class="form-control">
                    <option value="male">Женшина</option>
                    <option value="female">Мужчина</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Статус</label>
                    <input type="text" name="position" class="form-control" id="exampleInputEmail1" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Изображения</label>
                    <input type="file" name="img" class="form-control" id="exampleInputEmail1" required>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="save" class="btn btn-primary">Submit</button>
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