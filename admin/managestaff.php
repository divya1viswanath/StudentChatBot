<?php
include_once '../template/admin/header.php';
include_once '../support/dbactions.php';
if(isset($_POST['username']))
{
    if(SetData("insert into login values ('".$_POST['username']."','".$_POST['password']."','staff')"))
    {
        echo "<script>alert('New record added');</script>";
    }
    else
    {
        echo "<script>alert('Please pick another username');</script>";
    }
}
?>
<form method="POST">
<!-- Features Section -->
<div id="features" class="text-center">
  <div class="container">
    <div class="col-md-12">
      <h2>Add Staff</h2>
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
            <input type="text" name="password" id="username" class="form-control" required>
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Add</button>
        </div>
      </div>
      <div class="col-sm-3"> <i class="fa fa-magic"></i>
      </div>
    </div>

    <?php
    $res=GetData("select * from login where role='staff'");
    if($res->num_rows>0)
    {
    ?>
        <table class="table">
        <tr>
            <td>Username</td>
            <td>Password</td>
            <td>Action</td>
        </tr>
    <?php
        while($r=$res->fetch_assoc())
        {
    ?>
            <tr>
                <td><?php echo $r['username']; ?></td>
                <td><?php echo $r['password']; ?></td>
                <td><button class="btn btn-link" onclick="deletestaff('<?php echo $r['username']; ?>');">Delete</button></td>
            </tr>
    <?php
        }
    ?>
        </table>
    <?php
    }
    ?>
    
    </table>
  </div>
</div>
</form>
<script>
    function deletestaff(id)
    {
        if(confirm("Are you sure you want to delete "+id+" ?"))
        {
            $.post("../support/admin/bulkactions.php", {action: 'deletestaff', username: id},
                function (data, textStatus, jqXHR) {
                    alert(data);
                }
            );
        }
    }
</script>
<?php
include_once '../template/admin/footer.php';
?>