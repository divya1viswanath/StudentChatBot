<?php
include_once '../template/admin/header.php';
include_once '../support/dbactions.php';

if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['name'])){
        $sql="insert into students (name,phone,dob,regno,parent,bloodgroup,joiningdate,class,division,address)
        values ('".$_POST['name']."','".$_POST['phone']."','".$_POST['dob']."','".$_POST['regno']."',
        '".$_POST['parent']."','".$_POST['bloodgroup']."','".$_POST['joiningdate']."',
        '".$_POST['class']."','".$_POST['division']."','".$_POST['address']."')";

        echo $sql;
        if(SetData($sql))
        {
            echo "<script>alert('New Student Registered')</script>";
        }
        else
        {
            echo "<script>alert('Registration number already exists or something unexpected occured.')</script>";
        }
    }
}
?>
<form method="POST">
<!-- Features Section -->
<div id="features" class="text-center">
  <div class="container">
    <div class="col-md-12 col-md-offset-1 section-title">
      <h2>Student Registration</h2>
    </div>
    <div class="row">
      <div class="col-sm-12">  
        <div class="form-group">
            <label for="username">Register Number</label>
            <input type="text" name="regno" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Class</label>
            <input type="number" name="class" class="form-control" required max="10" min="1">
        </div>
        <div class="form-group">
            <label for="password">Division</label>
            <input type="text" name="division" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Parent</label>
            <input type="text" name="parent" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Phone</label>
            <input type="number" name="phone" class="form-control" minlength="10" maxlength="12" required>
        </div>
        <div class="form-group">
            <label for="password">Blood Group</label>
            <input type="text" name="bloodgroup" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">DOB</label>
            <input type="date" name="dob" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Joining Date</label>
            <input type="date" name="joiningdate" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Address</label>
            <input type="textarea" name="address" class="form-control" required>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Save</button>
        </div>
      </div>
      <div class="col-sm-3"> <i class="fa fa-magic"></i>
      </div>
    </div>
  </div>
</div>
</form>
<?php
include_once '../template/admin/footer.php'
?>