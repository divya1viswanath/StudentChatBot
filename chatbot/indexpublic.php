<?php
include_once '../template/home/header.php';
?>
<style>
 @keyframes msPulseEffect {
   0% {
     box-shadow: 0 0 0 0px rgba(0, 0, 0, 0.5);
   }
 100% {
     box-shadow: 0 0 0 30px rgba(0, 0, 0, 0);
   }
 }
 #msElem{
   margin: 30px;
   display: flex;
   justify-content: center;
   align-items: center;
   width: 100px;
   height: 100px;
   color:white;
   background-color: #0078D7;
   border-radius: 50%;
   text-decoration: none;
   animation: msPulseEffect 1s infinite;
 }
</style>
<!-- Contact Section -->
<div id="contact">
  <div class="container">
    <div class="col-md-8">
      <div class="row">
        <div class="section-title">
          <h2>Ask Me Anything</h2>
          <p>Please fill out the form below to send us an email and we will get back to you as soon as possible.</p>
        </div>
        <form name="sentMessage" id="contactForm" novalidate>
          <div class="row">
            <div class="col-sm-12">
              <div id="chatanswer"></div>
            </div>   
          </div>
          <div class="form-group">
            <input type="text" name="message" id="question" class="form-control" placeholder="Type your question here" required></textarea>
            <p class="help-block text-danger"></p>
          </div>
          <div id="success"></div>
          <button type="button" class="btn btn-custom btn-lg" onclick="askquestion();">Send Message</button>
        </form>
      </div>
    </div>
    <div class="col-md-3 col-md-offset-1 contact-info">
      <div class="contact-item">
        <h3>Hi, I'm listening</h3>
        <p><span id="msElem"></span></p>
      </div>
      
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="social">
          <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    function askquestion() {  
        var question=$('#question').val();
        $.post("../support/chatbot/chat.php", {q: question},
            function (data, textStatus, jqXHR) {
                $('#chatanswer').html("You: "+question+"<br>Me: "+data);
            }
        );
    }
</script>
<?php
include_once '../template/chatbot/footer.php';
?>