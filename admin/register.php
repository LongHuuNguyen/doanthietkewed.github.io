<?php
   include('security.php');
   include('layout/header.php');
   include('layout/navbar.php');
   ?>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm tài khoản mới</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="code.php" method="POST">
            <div class="modal-body">
               <div class="form-group">
                  <label> Tên đăng nhập </label>
                  <input type="text" name="username" class="form-control" placeholder="Enter Username">
               </div>
               <div class="form-group">
                  <label> Email </label>
                  <input type="email" name="email" class="form-control" placeholder="Enter Email">
               </div>
               <div class="form-group">
                  <label> Mật khẩu </label>
                  <input type="password" name="password" class="form-control" placeholder="Enter Password">
               </div>
               <div class="form-group">
                  <label> Nhập lại mật khẩu </label>
                  <input type="password" name="confirmpassword" class="form-control" placeholder="Enter Confirm Password">
               </div>
            </div>

            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
               <button type="submit" name="registerbtn" class="btn btn-primary">Lưu</button>
            </div>
         </form>
      </div>
   </div>
</div>
<div class="container-fluid">
   <div class="card shadow mb-4">
      <div class="card shadow py-3">
         <h6 class="m-0 font-weight-bold text-primary">Hồ sơ tài khoản Quản trị<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">Thêm hồ sơ admin</button>
         </h6>
      </div>
      <div class="card-body">
         <div class="table-responsive">
          <?php 
          $connection = mysqli_connect("localhost","root","","conferenceschedule");
          $query = "SELECT * FROM register";
          $query_run = mysqli_query($connection,$query);
           ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Người dùng</th>
                     <th>Email</th>
                     <th>Mật khẩu</th>
                     <th>Sửa</th>
                     <th>Xoá</th>
                  </tr>
               </thead>
               <tbody>
                <?php 
                if(mysqli_num_rows($query_run)>0)
                {
                  while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                  <tr>
                     <td><?php echo $row['id']; ?></td>
                     <td><?php echo $row['username']; ?></td>
                     <td><?php echo $row['email']; ?></td>
                     <td><?php echo $row['password']; ?></td>
                     <td>
                      <form action="register_edit.php" method="post">
                      <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                       <button type="submit" name ="edit_btn" class="btn btn-success">Sửa</button>
                     </form>
                   </td>
                     <td>
                      <form action="register_delete.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> Xoá</button>
                </form>
              </td>
                  </tr>
                  <?php  
                  }
                }
                else
                {
                  echo "No record Found";
                }
                 ?>
               </tbody>
            </table>
            <div>
            <?php 
            if (isset($_SESSION['success']) && $_SESSION['success'] !='') {
              echo '<h2>'.$_SESSION['success'].'</h2>';
              unset($_SESSION['success']);
              # code...
            }
            if (isset($_SESSION['status']) && $_SESSION['status'] !='') {
              echo '<h2 class="bg-info">'.$_SESSION['status'].'</h2>';
              unset($_SESSION['status']);
              # code...
            }
             ?>
           </div>
         </div>
      </div>
   </div>
<?php
   include('layout/scripts.php');
   include('layout/footer.php');
   ?>