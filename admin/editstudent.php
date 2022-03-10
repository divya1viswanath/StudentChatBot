<?php
include_once '../template/admin/header.php';
include_once '../support/dbactions.php';

if(isset($_POST['name'])){
    $sql="update students set name='".$_POST['name']."',phone='".$_POST['phone']."',parent='".$_POST['parent']."',class='".$_POST['class']."',division='".$_POST['division']."',bloodgroup='".$_POST['bloodgroup']."',address='".$_POST['address']."' where regno='".$_POST['regno']."'";
    if(SetData($sql))
    {
        echo "<script>alert('Profile updated')</script>";
    }
}



#echo "select * from students where regno = '".$_GET["id"]."'";
$res=GetData("select * from students where regno = '".$_GET["id"]."'");
$name='';
$parent='';
$phone='';
$class='';
$division='';
$bloodgroup='';
$address='';
if($res->num_rows>0)
{
    while($r=$res->fetch_assoc()){
        $name=$r['name'];
        $parent=$r['parent'];
        $phone=$r['phone'];
        $class=$r['class'];
        $division=$r['division'];
        $bloodgroup=$r['bloodgroup'];
        $address=$r['address'];
    }
}
?>
<form method="POST">
<!-- Features Section -->
<div id="features" class="text-center">
  <div class="container">
    <div class="col-md-12 col-md-offset-1 section-title">
      <h2>Student Details</h2>
    </div>
    <div class="row">
      <div class="col-sm-12">  
        <div class="form-group">
            <label for="username">Register Number</label>
            <input type="text" name="regno" value="<?php echo $_GET['id']?>" class="form-control" required readonly>
        </div>
        <div class="form-group">
            <label for="password">Name</label>
            <input type="text" name="name" value="<?php echo $name;?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Class</label>
            <input type="number" name="class" class="form-control" value="<?php echo $class;?>" required max="10" min="1">
        </div>
        <div class="form-group">
            <label for="password">Division</label>
            <input type="text" name="division" class="form-control" value="<?php echo $division;?>" required>
        </div>
        <div class="form-group">
            <label for="password">Parent</label>
            <input type="text" name="parent" class="form-control" value="<?php echo $parent;?>" required>
        </div>
        <div class="form-group">
            <label for="password">Phone</label>
            <input type="number" name="phone" class="form-control" value="<?php echo $phone;?>" required>
        </div>
        <div class="form-group">
            <label for="password">Blood Group</label>
            <input type="text" name="bloodgroup" class="form-control" value="<?php echo $bloodgroup;?>" required>
        </div>
        <div class="form-group">
            <label for="password">Address</label>
            <input type="textarea" name="address" class="form-control" value="<?php echo $address;?>" required>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Update</button>
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