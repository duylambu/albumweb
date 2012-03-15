<?php 
include_once('../../dbconnect.php');
?>
<?php
session_start();

$username=$_POST['username'];
$password=$_POST['password'];
$remem=$_POST['remember_me'];


if($username!=null && $username!="" && $password!=null && $password!="")
{
    $password=md5($password);
    $query="select * from user where user_name='$username' and password='$password'";
    $result=mysql_query($query);
    $count=mysql_num_rows($result);
    if($count<=0)
    {
        $rs=array('value'=>0,'temp'=>'User is not existed!');
        echo json_encode($rs);
        die;
    }
    
    while($t=mysql_fetch_array($result))
    {
        $user=$t;
        break;
    }
    
    if($user['user_name']==$username && $user['password']==$password)
    {        
        $tempUser=array('username'=>$user['user_name'],
        'fullname'=>$user['full_name'],
        'email'=>$user['email'],
        'id'=>$user['user_id']);
        $_SESSION['user']=$tempUser;
        $rs=array('value'=>1,'temp'=>$_POST['remember_me']);
        echo json_encode($rs);
        die;
    }
    else
    {
        $rs=array('value'=>0,'temp'=>$_POST['remember_me']);
        echo json_encode($rs);
    }          
    
}
else
{
    $rs=array('value'=>'-1');
        echo json_encode($rs);
} 
?>