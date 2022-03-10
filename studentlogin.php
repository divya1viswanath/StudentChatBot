<?php
include_once 'template/home/header.php';
?>
<?php

include_once 'support/dbactions.php';

if(isset($_POST['regno']))
{
    $sql="select * from students where regno='".$_POST['regno']."' and dob='".$_POST['dob']."'";
    $res=GetData($sql);
    if($res->num_rows>0){
        $_SESSION['regno']=$_POST['regno'];
        header("Location: student/index.php");
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
            <label for="username">Register Number</label>
            <input type="number" name="regno" id="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">DOB</label>
            <input type="date" name="dob" id="username" class="form-control" required>
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


