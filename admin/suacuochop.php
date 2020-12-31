<?php
    include('security.php');
    include('layout/header.php');
    include('layout/navbar.php');
    
    ?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Sửa Thông Tin Cuộc Họp </h6>
        </div>
        <div class="card-body">
        <?php

            if(isset($_POST['suacuochop_btn']))
            {
                $id = $_POST['suacuochop_id'];
                
                $query = "SELECT * FROM  cuochop WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);
                foreach($query_run as $row)
                {
                    ?>

                        <form action="code.php" method="POST">

                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                            <div class="form-group">
                                <label>Tiêu đề cuộc họp</label>
                                <input type="text" name="edit_title" value="<?php echo $row['title'] ?>" class="form-control"
                                    placeholder="Tiêu đề cuộc họp">
                            </div>
                            <div class="form-group">
                                <label>Phân Loại Cuộc Họp </label>
                     <!-- col-md-12 Begin -->
                     <select type="text" name="edit_loaicuochop" class="form-control">
                        <!-- form-control Begin -->
                        <option> Chọn </option>
                        <option>Cuộc Họp Online</option>
                        <option>Cuộc Họp Offline</option>
                     </select>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh diễn giả</label>
                                <input type="file" name="edit_images" value="<?php echo $row['images'] ?>"
                                    class="form-control" placeholder="Hình ảnh diễn giả">
                            </div>
                            <div class="form-group">
                                <label>Thông tin diễn giả</label>
                                <input type="text" name="edit_thongtin" value="<?php echo $row['thongtin'] ?>"
                                    class="form-control" placeholder="Thông tin diễn giản">
                            </div>
                            <div class="form-group">
                                <label>Từ khoá cuộc họp</label>
                                <input type="text" name="edit_keyw" value="<?php echo $row['keyw'] ?>"
                                    class="form-control" placeholder="Từ Khoá">
                            </div>
                            <div class="form-group">
                                <label>Mô tả cuộc họp</label>
                                <input type="text" name="edit_content" value="<?php echo $row['content'] ?>"
                                    class="form-control" placeholder="Mô tả cuộc họp">
                            </div>

                            <a href="cuochop.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="updatecuochop" class="btn btn-primary"> Update </button>

                        </form>
                        <?php
                }
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