<?php
include_once '../dbactions.php';
switch($_POST['action'])
{
    case 'wipedata':
        SetData('truncate table login');
        SetData('truncate table questions');
        SetData("truncate table students");
        echo "Data cleared";
        break;
    case 'wipestaff':
        SetData("delete from login where role='staff'");
        echo "Data cleared";
        break;
    case 'wipestudents':
        SetData("truncate table students");
        echo "Data cleared";
        break;
    case 'deletestaff':
        SetData("delete from login where username='".$_POST['username']."'");
        echo 'The staff has been deleted';
        break;
    case 'wipeunanswered':
        SetData("truncate table unanswered");
        echo 'The questions have been deleted';
        break;
}
?>