<?php
    include('security.php');
    include('layout/header.php');
    include('layout/navbar.php');
    
    ?>

    <div class="table-responsive">
    <?php
        $query = "SELECT * FROM register";
        $query_run = mysqli_query($connection, $query);
    ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
              <th> ID </th>
              <th> Tài khoản </th>
              <th>Email </th>
              <th>Mật khẩu</th>
              <th>Xoá</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($query_run) > 0)        
        {
            while($row = mysqli_fetch_assoc($query_run))
            {
               ?>
          <tr>
            <td><?php  echo $row['id']; ?></td>
            <td><?php  echo $row['username']; ?></td>
            <td><?php  echo $row['email']; ?></td>
            <td><?php  echo $row['password']; ?></td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> Xoá</button>
                </form>
            </td>
          </tr>
          <?php
            } 
        }
        else {
            echo "No Record Found";
        }
        ?>
        </tbody>
      </table>
      <a href="register.php" class="btn btn-success"> CANCEL </a>
    </div>

<?php
    include('layout/scripts.php');
    include('layout/footer.php');
    ?>