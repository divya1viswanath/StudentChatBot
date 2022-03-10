<?php
class DBActions{
    public function GetConnnection()
    {
        $conn=new mysqli('localhost','root','','studentchat');
        if ($conn->connect_error) {
            return null;
        }          
        else{
            return $conn;
        }
    }
    public function GetData($sql)
    {
        if($sql==null)
            die();
        $conn=$this->GetConnnection();
        if($conn==null)
            die();
        return $conn->query($sql);
    }
    public function SetData($sql)
    {
        if($sql==null)
            die();
        $conn=$this->GetConnnection();
        if($conn==null)
            die();
        return $conn->query($sql);
    }
}

function GetData($sql)
{
    if($sql==null)
        die();
    $dba=new DBActions();
    return $dba->GetData($sql);
}

function SetData($sql)
{
    if($sql==null)
    die();
    $dba=new DBActions();
    if($dba->SetData($sql)>0){
        return true;
    }
    else{
        return false;
    }
}
?>