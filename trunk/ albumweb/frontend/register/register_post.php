<?php include_once('../../dbconnect.php');
 
?>
<?php

$user=$_POST['username'];
$email=$_POST['email']; 
$password=$_POST['password'];
$fullname=$_POST['fullname'];
//$address=$_POST['address'];

if($user!=""&&$email!=""&&$password!=""&&$fullname!="")
{
    $flag=1;  
    //$message='a';  
    $query="select * from user where user_name='$user'";
    $result=mysql_query($query);
    $number=mysql_num_rows($result);     
    if($number>0)
    {
        $flag=0;
        $message='User name is existed!';         
    }
    else
    {
        $query1="select * from user where email='$email'";
        $result1=mysql_query($query1);
        $number=mysql_num_rows($result1);     
        if($number>0)
        {
            $flag=0;
            $message='Email is existed!';        
        }
        else
        {         
            $query="insert into user
            (user_name,email,password,full_name,phone,join_date) 
            values('".$user."','".$email."','".md5($password)."','".$fullname."','".$_POST['phone']."',NOW())";
            $result=mysql_query($query);
            $message="Register Successfully!";
            $flag=1;                    
        }
    }
    //if($number>0) $message='User name'; 
    $successmessage=array('successmessage'=>$message,'value'=>$flag);
    echo json_encode($successmessage);
    sleep(2);
}
else{
    $successmessage=array('successmessage'=>"Fail",'value'=>0);
    echo json_encode($successmessage);
    die;    
}

?>