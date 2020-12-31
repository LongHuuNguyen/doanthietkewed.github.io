
<?php
include('security.php');

?>
<?php
if (isset($_POST['registerbtn'])) {
    $username  = $_POST['username'];
    $email     = $_POST['email'];
    $password  = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    
    $email_query     = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if (mysqli_num_rows($email_query_run) > 0) {
        $_SESSION['status']      = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    } else {
        if ($password === $cpassword) {
            $query     = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
            $query_run = mysqli_query($connection, $query);
            
            if ($query_run) {
                // echo "Saved";
                $_SESSION['status']      = "Đã thêm tài khoản Admin";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            } else {
                $_SESSION['status']      = "Lỗi! Khoogn thêm được tài khoản";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');
            }
        } else {
            $_SESSION['status']      = "Vui lòng nhập mật khẩu giống nhau";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');
        }
    }
    
}
?>




<?php
if (isset($_POST['updatebtn'])) {
    $id       = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email    = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    
    $query     = "UPDATE register SET username='$username', email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    
    if ($query_run) {
        $_SESSION['status']      = "Thông tin tài khoản được cập nhật";
        $_SESSION['status_code'] = "success";
        header('Location: register.php');
    } else {
        $_SESSION['status']      = "Lỗi ! không cập nhật được tài khoản";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    }
}

?>

<?php
if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];
    
    $query     = "DELETE * FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    
    if ($query_run) {
        $_SESSION['status']      = "Đã xoá tài khoản";
        $_SESSION['status_code'] = "success";
        header('Location: register.php');
    } else {
        $_SESSION['status']      = "Lỗi! Không xoá được tài khoản";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');
    }
}
?>

<?php
if (isset($_POST['login_btn'])) {
    $username_login = $_POST['username'];
    $password_login = $_POST['password'];
    
    $query     = "SELECT * FROM register WHERE username='$username_login' AND password='$password_login'";
    $query_run = mysqli_query($connection, $query);
    
    if (mysqli_fetch_array($query_run)) {
        $_SESSION['username'] = $username_login;
        header('Location: index.php');
    } else {
        $_SESSION['status'] = "Tài khoản/ Mật khẩu Không khớp";
        header('Location: login.php');
    }
    
}
?>

<?php

if (isset($_POST['logout_btn'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('Location: login.php');
}

?>

<?php
if (isset($_POST['insrtbtn'])) {
    
    
    $loaicuochop   = $_POST['loaicuochop'];
    $title = $_POST['title'];
    $images       = $_POST['images'];
    $thongtin    = $_POST['thongtin'];
    $keyw         = $_POST['keyw'];
    $content      = $_POST['content'];
    
    $query     = "INSERT INTO cuochop (loaicuochop,title,images,thongtin,keyw,content) VALUES ('$loaicuochop','$title','$images','$thongtin','$keyw','$content')";
    $query_run = mysqli_query($connection, $query);
    
    if ($query_run) {
        // echo "Saved";
        $_SESSION['status']      = "Thêm cuộc họp thành công!";
        $_SESSION['status_code'] = "success";
        header('Location: cuochop.php');
    } else {
        $_SESSION['status']      = "Lỗi! Không thêm được cuộc họp";
        $_SESSION['status_code'] = "error";
        header('Location: cuochop.php');
    }
}

?>


<?php
if (isset($_POST['updatecuochop'])) {
    

    $id    = $_POST['edit_id'];
    $title = $_POST['edit_title'];
    $loaicuochop   = $_POST['edit_loaicuochop'];
    $images       = $_POST['edit_images'];
    $thongtin    = $_POST['edit_thongtin'];
    $keyw         = $_POST['edit_keyw'];
    $content      = $_POST['edit_content'];
    
    $query     = "UPDATE  cuochop SET id='$id', title='$title', loaicuochop='$loaicuochop', images='$images', thongtin='$thongtin', keyw='$keyw', content='$content' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    
    if ($query_run) {
        $_SESSION['status']      = "Thông Tin Đã Được Cập Nhật";
        $_SESSION['status_code'] = "success";
        header('Location: cuochop.php');
    } else {
        $_SESSION['status']      = "Cập Nhật Thông Tin Lỗi";
        $_SESSION['status_code'] = "error";
        header('Location: cuochop.php');
    }
}

?>

<?php
if (isset($_POST['xoacuochop_btn'])) {
    $id = $_POST['xoacuochop_id'];
    
    $query     = "DELETE  * FROM cuochop WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    
    if ($query_run) {
        $_SESSION['status']      = "Đã Xoá Cuộc Họp";
        $_SESSION['status_code'] = "success";
        header('Location: cuochop.php');
    } else {
        $_SESSION['status']      = "Xoá Cuộc Họp Không Thành Công!";
        $_SESSION['status_code'] = "error";
        header('Location: cuochop.php');
    }
}
?>





<?php
if (isset($_POST['seach_data'])) {
    $id = $_POST['id'];
    $visible = $_POST['visible'];
    
    $query     = "UPDATE cuochop SET visible='$visible'WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    
}
?>

<?php
if (isset($_POST['delete_checkbox_product'])) {
    $id = "1";
    
    $query     = "DELETE FROM cuochop WHERE visible='$id' ";
    $query_run = mysqli_query($connection, $query);
    if (query_run) {

        $_SESSION['success']="Đã xoá các cuộc họp";
        header('Location: cuochop.php');
        # code...
    }
    else
    {
        $_SESSION['status']=" Lỗi! Không xoá được các cuộc họp";
        header('Location:cuochop.php');
    }
}
?>
