<?php
include_once '../dbactions.php';

switch($_POST['action']){
    case 'addquestion':
        echo(AddQuestion());
        break;
    case 'deletequestion':
        DeleteQuestion();
        break;
}

function AddQuestion()
{
    $sql="select * from questions where question='".$_POST['question']."'";
    $res=GetData($sql);
    if($res->num_rows>0){
        die('This Question already exists');
    }
    else{
        $sql="insert into questions values('".$_POST['question']."','".$_POST['answer']."')";
        if(SetData($sql))
            die("New Question Added");
        else
            die("Unable to add new question");
    }
}

function DeleteQuestion()
{
    $sql="delete from questions where question='".$_POST['question']."'";
    if(SetData($sql))
        echo "Question Deleted";
    else
        echo "Unable to delete the question";
}
?>