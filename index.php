<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once 'template/home/header.php';
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
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="col-sm-5"></div>
    <div class="col-sm-6">
        <h3>Hi, Login to chat with me</h3>
        <p class="text-center"><span id="msElem"></span></p>
    </div>
</div>
<?php
include_once 'template/home/footer.php';
?>