<?php
include_once 'template/home/header.php';
?>
<?php

include_once 'support/dbactions.php';

if(isset($_POST['username']))
{
    $sql="select role from login where username='".$_POST['username']."' and password='".$_POST['password']."'";
    $res=GetData($sql);
    if($res->num_rows>0){
        while($row=$res->fetch_assoc()){
            switch($row['role'])
            {
                case 'admin':
                    $_SESSION['username']=$_POST['username'];
                    $_SESSION['role']='admin';
                    header("Location: admin/home.php");
                    return;
                case 'staff':
                    $_SESSION['username']=$_POST['username'];
                    $_SESSION['role']='staff';
                    header("Location: admin/home.php");
                    break;
            }
        }
    }
    else
    {
      echo "<script>alert('Invalid username or password')</script>";
    }
}


?>
<form method="POST">
<!-- Features Section -->
<div id="features" class="text-center">
  <div class="container">
    <div class="col-md-10 col-md-offset-1 section-title">
      <h2>Login</h2>
    </div>
    <div class="row">
      <div class="col-sm-3"> <i class="fa fa-comments-o"></i>
        
      </div>
      <div class="col-sm-6"> <i class="fa fa-bullhorn"></i>    
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="username" class="form-control" required>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Login</button>
        </div>
      </div>
      <div class="col-sm-3"> <i class="fa fa-magic"></i>
      </div>
    </div>
  </div>
</div>
</form>
<?php
include_once 'template/home/footer.php';
?>


