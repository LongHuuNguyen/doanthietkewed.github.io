<?php
    include('security.php');
    include('layout/header.php');
    include('layout/navbar.php');
    
    ?>

    <div class="table-responsive">
    <?php
        $query = "SELECT * FROM cuochop";
        $query_run = mysqli_query($connection, $query);
    ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
                  <th>ID</th>
                  <th>Tên Cuộc Họp</th>
                  <th>Loại Cuộc Họp</th>
                  <th>Hình Ảnh Diễn Giả</th>
                  <th>Thông Tin Diễn Giả</th>
                  <th>Từ Khoá</th>
                  <th>Mô Tả Cuộc Họp</th>
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
            <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['title']; ?></td>
                  <td><?php echo $row['loaicuochop']; ?></td>
                  <td><?php echo '<img src="http://localhost:8080/doanthietkewed/Publics/img/'.$row['images'].'"    alt="Image" width="100px;" height="100px;" >'?></td>
                  <td><?php echo $row['thongtin']; ?></td>
                  <td><?php echo $row['keyw']; ?></td>
                  <td><?php echo $row['content']; ?></td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="xoacuochop_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="xoacuochop_btn" class="btn btn-danger"> Xoá</button>
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
       <a href="cuochop.php" class="btn btn-success"> CANCEL </a>
    </div>

<?php
    include('layout/scripts.php');
    include('layout/footer.php');
    ?>