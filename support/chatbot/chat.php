<?php
#if(!isset($_SESSION['role']))
    #die('Oops! I cannot answer your question.');
include_once '../dbactions.php';
$q=$_POST['q'];
GetDBAnswers($_POST['q']);
function GetDBAnswers($q)
{
    $res=GetData("select answer from questions where question='".$q."'");
    if($res->num_rows>0){
        while($r=$res->fetch_assoc()){
            echo $r['answer'];
        }
    }
    else{
        GetInbuiltAnswers();
    }
}

function GetInbuiltAnswers()
{
    switch($_POST['q']){
        case 'who are you':
            echo "I am the chatbot.";
            break;
        case 'hi':
        case 'hello':
        case 'hey':
            echo "Hi there";
            break;
        case 'what is the time':
        case 'what is the time now':
        case 'time please':
            echo "The time is ".date('h i s');
            break;
        case 'what can you do':
            echo "I can help you to find information of students.";
            break;
        case 'who created you':
            echo "A group of energetic developers gave me life.";
            break;
        case 'help':
            echo 'find &lt;REGISTER NUMBER> - Shows the details of the student with the specified roll number<br>';
            echo 'class &lt;CLASS NUMBER> - Lists the details of the students in a class<br>';
            echo 'parent &lt;HINT OF THE NAME> - Lists the students with similar names<br>';
            echo 'phone &lt;PHONE NUMBER> - Lists the students with specified phone number<br>';
            echo 'count &lt;COUNT> - Returns the number of students in the specified class<br>';
            echo 'list &lt;CLASS NUMBER> - Lists the names of the students in the specified class<br>';
            break;
        default:
            GetActions();
            break;
    }
}
function GetActions()
{
    switch ($_POST['q']) {
        case (preg_match('/find.*/', $_POST['q']) ? true : false) :
            $id=str_ireplace('find',"",$GLOBALS['q']);
            $id=trim($id);
            $sql="select * from students where regno='".$id."'";
            $res=GetData($sql);
            if($res->num_rows>0)
            {
                while($r=$res->fetch_assoc()){
                    echo 'Name: '.$r['name'].'<br/>';
                    echo 'Class: '.$r['class'].'<br/>';
                    echo 'Division : '.$r['division'].'<br/>';
                    echo 'Parent: '.$r['parent'].'<br/>';
                    echo 'Phone: '.$r['phone'].'<br/>';
                    echo 'Reg No: '.$r['regno'].'<br/>';
                    echo 'Blood Group: '.$r['bloodgroup'].'<br/>';
                    echo 'Address: '.$r['address'].'<br/>';
                    echo 'DOB: '.$r['dob'].'<br/>';
                }
            }
            break;
        case (preg_match('/class.*/', $_POST['q']) ? true : false) :
            $id=str_ireplace('class',"",$GLOBALS['q']);
            $id=trim($id);
            $sql="select * from students where class='".$id."'";
            $res=GetData($sql);
            if($res->num_rows>0)
            {
                while($r=$res->fetch_assoc()){
                    echo '<h1 class="text-center">Name: '.$r['name'].'<br/></h1>';
                    echo 'Class: '.$r['class'].'<br/>';
                    echo 'Division : '.$r['division'].'<br/>';
                    echo 'Parent: '.$r['parent'].'<br/>';
                    echo 'Phone: '.$r['phone'].'<br/>';
                    echo 'Reg No: '.$r['regno'].'<br/>';
                    echo 'Blood Group: '.$r['bloodgroup'].'<br/>';
                    echo 'Address: '.$r['address'].'<br/>';
                    echo 'DOB: '.$r['dob'].'<br/>';
                }
            }
            break;
        case (preg_match('/parent.*/', $_POST['q']) ? true : false) :
            $id=str_ireplace('parent',"",$GLOBALS['q']);
            $id=trim($id);
            $sql="select * from students where parent like '%".$id."%'";
            $res=GetData($sql);
            if($res->num_rows>0)
            {
                while($r=$res->fetch_assoc()){
                    echo '<h1 class="text-center">Name: '.$r['name'].'<br/></h1>';
                    echo 'Class: '.$r['class'].'<br/>';
                    echo 'Division : '.$r['division'].'<br/>';
                    echo 'Parent: '.$r['parent'].'<br/>';
                    echo 'Phone: '.$r['phone'].'<br/>';
                    echo 'Reg No: '.$r['regno'].'<br/>';
                    echo 'Blood Group: '.$r['bloodgroup'].'<br/>';
                    echo 'Address: '.$r['address'].'<br/>';
                    echo 'DOB: '.$r['dob'].'<br/>';
                }
            }
            break;
        case (preg_match('/phone.*/', $_POST['q']) ? true : false) :
            $id=str_ireplace('phone',"",$GLOBALS['q']);
            $id=trim($id);
            $sql="select * from students where phone = '".$id."'";
            $res=GetData($sql);
            if($res->num_rows>0)
            {
                while($r=$res->fetch_assoc()){
                    echo '<h1 class="text-center">Name: '.$r['name'].'<br/></h1>';
                    echo 'Class: '.$r['class'].'<br/>';
                    echo 'Division : '.$r['division'].'<br/>';
                    echo 'Parent: '.$r['parent'].'<br/>';
                    echo 'Phone: '.$r['phone'].'<br/>';
                    echo 'Reg No: '.$r['regno'].'<br/>';
                    echo 'Blood Group: '.$r['bloodgroup'].'<br/>';
                    echo 'Address: '.$r['address'].'<br/>';
                    echo 'DOB: '.$r['dob'].'<br/>';
                }
            }
            break;
        case (preg_match('/count.*/', $_POST['q']) ? true : false):
            $id=str_ireplace('count',"",$GLOBALS['q']);
            $id=trim($id);
            $sql="select * from students where class = '".$id."'";
            $res=GetData($sql);
            echo 'Number of students in class '.$id.': '.$res->num_rows;
            break;
        case (preg_match('/list.*/', $_POST['q']) ? true : false):
            $id=str_ireplace('list',"",$GLOBALS['q']);
            $id=trim($id);
            $sql="select name,regno from students where class = '".$id."'";
            $res=GetData($sql);
            if($res->num_rows>0)
            {
                while($r=$res->fetch_assoc()){
                    echo 'Name: '.$r['name'].'<br/>';
                    echo 'Reg No: '.$r['regno'].'<br/>';
                    echo '<br>';
                }
            }
            break;         
        default:
            echo "I dont know the answer to that. Maybe, I will learn it soon.";
            SetData("insert into unanswered values('".$_POST['q']."')");
            break;
    }
}
?>