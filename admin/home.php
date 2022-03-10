<?php
include_once '../template/admin/header.php';
include_once '../support/dbactions.php';
?>
<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6">
      <h2>Unanswered Questions</h2>
      <?php
      $res=GetData("select * from unanswered");
      if($res->num_rows>0)
      {
        while($r=$res->fetch_assoc())
        {
          echo "<p>".$r['question']."</p>";
        }
      }
      ?>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="about-text">
          <h2>Add a chatbot question</h2>
          <p id="message"></p>
          <div class="list-style">
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label for="Question">Question</label>
                <input type="text" class="form-control" id="question" required>
              </div>
              <div class="form-group">
                <label for="Answer">Answer</label>
                <input type="text" class="form-control" id="answer" required>
              </div>
              <div class="form-group">
                <button class="btn btn-primary" onclick="addquestion();">Add new question</button>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Features Section -->
<div id="features" class="text-center">
  <div class="container">
    <div class="col-sm-12">
      <table class="table">
        <tr>
          <th>Question</th>
          <th>Answer</th>
          <th>Action</th>
        </tr>
        <?php
        $res=GetData("select * from questions");
        if($res->num_rows>0):
          while($row = $res->fetch_assoc()){
        ?>
        <tr>
          <td>
            <?php echo($row['question']);?>
          </td>
          <td>
            <?php echo($row['answer']);?>
          </td>
          <td>
            <button class="btn btn-link text-danger" onclick="deletechat('<?php echo($row['question']); ?>');">Delete</button>
          </td>
        </tr>
        <?php
          }
        endif;
        ?>
        
      </table>
    </div>
  </div>
</div>


<script>
  function addquestion(param) { 
    var q=$('#question').val();
    var a=$('#answer').val();
    $.post("../support/admin/chatquestion.php", {action: 'addquestion', question: q, answer: a},
      function (data, textStatus, jqXHR) {
        $('#message').html(data);
      }
    );
  }

  function deletechat(id) {  
    $.post("../support/admin/chatquestion.php", {action: 'deletequestion', question: id},
      function (data, textStatus, jqXHR) {
        alert(data);
        window.location.reload();
      }
    );
  }
</script>

<?php
include_once '../template/admin/footer.php'
?>