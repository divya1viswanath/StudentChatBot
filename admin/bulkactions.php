<?php
include_once '../template/admin/header.php';
include_once '../support/dbactions.php';
?>
<!-- Features Section -->
<div id="features" class="text-center">
  <div class="container">
    <div class="col-md-10 col-md-offset-1 section-title">
      <h2>Bulk Actions</h2>
    </div>
    <div class="row">
      <div class="col-sm-3"> <i class="fa fa-comments-o"></i>
        
      </div>
      <div class="col-sm-6"> <i class="fa fa-bullhorn"></i>    
        <div class="form-group">
            <button class="btn btn-danger" onclick="wipedata();">Wipe Data</button>
        </div>
        <div class="form-group">
            <button class="btn btn-danger" onclick="wipestaff();">Wipe Staff</button>            
        </div>
        <div class="form-group">
            <button class="btn btn-danger" onclick="wipestudents();">Wipe Sudents</button>   
        </div>
        <div class="form-group">
            <button class="btn btn-danger" onclick="wipeunanswered();">Wipe Unanswered</button>   
        </div>
      </div>
      <div class="col-sm-3"> <i class="fa fa-magic"></i>
      </div>
    </div>
  </div>
</div>
<script>
    function wipedata() {
        if(confirm("Are you sure to wipe data? It cannot be undone"))
        {
            $.post("../support/admin/bulkactions.php", {action: 'wipedata'},
                function (data, textStatus, jqXHR) {
                    alert(data);
                }
            );
        }
    }

    function wipestaff(){
        if(confirm("Are you sure to wipe data? It cannot be undone"))
        {
            $.post("../support/admin/bulkactions.php", {action: 'wipestaff'},
                function (data, textStatus, jqXHR) {
                    alert(data);
                }
            );
        }
    }

    function wipestudents(){
        if(confirm("Are you sure to wipe data? It cannot be undone"))
        {
            $.post("../support/admin/bulkactions.php", {action: 'wipestudents'},
                function (data, textStatus, jqXHR) {
                    alert(data);
                }
            );
        }
    }

    function wipeunanswered() { 
        if(confirm("Are you sure to wipe data? It cannot be undone"))
        {
            $.post("../support/admin/bulkactions.php", {action: 'wipeunanswered'},
                function (data, textStatus, jqXHR) {
                    
                }
            );
        }
    }
</script>
<?php
include_once '../template/admin/footer.php'
?>