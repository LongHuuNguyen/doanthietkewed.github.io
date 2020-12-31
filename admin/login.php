<?php
   include('layout/header.php');
   ?>
<div class="container">
   <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-6 col-md-6">
         <div class="card o-hidden border-5 shadow-lg my-4">
            <div class="card-body p-5">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="p-5">
                        <div class="text-center">
                           <h1 class="h4 text-gray-900 mb-4">Chào Mừng!!</h1>
                        </div>
                        <?php
                           if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                           {
                               echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                               unset($_SESSION['status']);
                           }
                           ?>
                     </div>
                     <form class="user" action="code.php" method="POST">
                        <div class="form-group">
                           <input type="username" name="username" class="form-control form-control-user" placeholder="Enter Username"/>
                        </div>
                        <div class="form-group">
                           <input type="password" name="password" class="form-control form-control-user" placeholder="Password"/>
                        </div>
                        <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<?php
   include('layout/scripts.php');
   include('layout/footer.php');
   ?>