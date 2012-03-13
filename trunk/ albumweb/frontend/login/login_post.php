<?php include_once('../../config/connectDB.php');?>

<?php
session_start();
if(isset($_COOKIE['rememberme']))
{
    unset($_COOKIE['rememberme']);
}
$username=$_POST['username'];
$password=$_POST['password'];
$remem=$_POST['remember_me'];
if($username!=null && $username!="" && $password!=null && $password!="")
{
        $password=md5($password);
    $query="select * from users where user_name='$username' and password='$password'";
    $result=mysql_query($query);
    while($t=mysql_fetch_array($result))
    {
        $user=$t;
        break;
    }
    if($user['user_name']==$username && $user['password']==$password)
    {        
        $tempUser=array('username'=>$user['user_name'],
        'fullname'=>$user['fullname'],
        'email'=>$user['email']);
        $_SESSION['user']=$tempUser;
        $rs=array('value'=>1,'temp'=>$_POST['remember_me']);
         
        //$tem=array('key'=>'username:'.$user['user_name'].'email:'.$user['email']);
        //echo json_encode($tem);
        //die;
        if($remem!=null&&$remem=='true')
        {
            $remember=array('username'=>$username,'password'=>$password);
            setcookie('rememberme',$remember,time()+24*60*60*60);
        }
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