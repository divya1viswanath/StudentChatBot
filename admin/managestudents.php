<?php
include_once '../template/admin/header.php';
include_once '../support/dbactions.php';
?>
<form>
<!-- Features Section -->
<div id="features" class="text-center">
  <div class="container">
    <div class="col-md-12">
      <h2>Student Management</h2>
    </div>
    <div class="col-sm-12">  
        <div class="form-inline">
            Class
            <select name="class" id="class" class="form-control">
                <?php
                    for($i=1;$i<10;$i++)
                    {
                ?>
                <option value="<?php echo($i)?>"><?php echo($i)?></option>
                <?php
                    }
                ?>
            </select>
            <button type="submit" class="btn btn-primary" class="form-control">Search</button>
        <div>
        <br/>
      </div>
    </div>

    <div class="container">
        <?php
        if(!isset($_GET['class'])){

        }
        else
        {
            $res=GetData("select * from students where class='".$_GET['class']."'");
            if($res->num_rows>0)
            {?>
                <table class="table">
                    <tr>
                        <td>Name</td>
                        <td>Class</td>
                        <td>Division</td>
                        <td>Parent</td>
                        <td>Phone</td>
                        <td>Action</td>                
                    </tr>
            <?php
                while($r=$res->fetch_assoc())
                {
            ?>
                    <tr>
                        <td><?php echo $r['name'];?></td>
                        <td><?php echo $r['class'];?></td>
                        <td><?php echo $r['division'];?></td>
                        <td><?php echo $r['parent'];?></td>
                        <td><?php echo $r['phone'];?></td>
                        <?php if($_SESSION['role']=='admin'){ ?>
                            <td><a href="editstudent.php?id=<?php echo $r['regno'];?>">Edit</a></td>                
                        <?php } else{ ?>
                            <td>Only Admins can edit.</td>   
                        <?php } ?>             
                    </tr>

            <?php       
                }
            }
        }
        ?>
        

        </table>
    </div>
  </div>
</div>
</form>
<?php
include_once '../template/admin/footer.php';
?>