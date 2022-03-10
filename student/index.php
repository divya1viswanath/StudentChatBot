<?php
include_once '../template/student/header.php';
$res=GetData("select * from students where regno = '".$_SESSION['regno']."'");
while($r=$res->fetch_assoc())
{
?>
<!-- Features Section -->
<div id="features" class="text-center">
  <div class="container">
    <div class="col-md-10 col-md-offset-1 section-title">
      <h2>Your Details</h2>
    </div>
    <div class="row">
      <div class="col-sm-3"> <i class="fa fa-comments-o"></i>
        
      </div>
      <div class="form-group">
            <label for="username">Register Number</label>
            <input type="text" name="regno" value="<?php echo $r['regno'];?>" class="form-control" required readonly>
        </div>
        <div class="form-group">
            <label for="password">Name</label>
            <input type="text" name="name" value="<?php echo $r['name'];?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Class</label>
            <input type="number" name="class" class="form-control" value="<?php echo $r['class']; ?>" required max="10" min="1">
        </div>
        <div class="form-group">
            <label for="password">Division</label>
            <input type="text" name="division" class="form-control" value="<?php echo $r['division'];?>" required>
        </div>
        <div class="form-group">
            <label for="password">Parent</label>
            <input type="text" name="parent" class="form-control" value="<?php echo $r['parent'];?>" required>
        </div>
        <div class="form-group">
            <label for="password">Phone</label>
            <input type="number" name="phone" class="form-control" value="<?php echo $r['phone'];?>" required>
        </div>
        <div class="form-group">
            <label for="password">Blood Group</label>
            <input type="text" name="bloodgroup" class="form-control" value="<?php echo $r['bloodgroup'];?>" required>
        </div>
        <div class="form-group">
            <label for="password">Address</label>
            <input type="textarea" name="address" class="form-control" value="<?php echo $r['address'];?>" required>
        </div>
    </div>
  </div>
</div>

<?php
}
include_once '../template/student/footer.php';
?>