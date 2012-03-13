<?php include_once('../../config/connectDB.php');
 
?>
<?php

$user=$_POST['username'];
$email=$_POST['email']; 
$password=$_POST['password'];
$fullname=$_POST['fullname'];
/*$successmessage=array('successmessage'=>'username:'.$user.',email:'
.$email.',pass:'.$password.',fullname:'.$fullname.',birthday:'.$_POST['birthday']
.',phone:'.$_POST['phone'].',country'.$_POST['country'].',department:'.$_POST['department']);
    echo json_encode($successmessage);
*/

if($user!=""&&$email!=""&&$password!=""&&$fullname!="")
{
    $flag=1;  
    //$message='a';  
    $query="select * from users where user_name='$user'";
    $result=mysql_query($query);
    $number=mysql_num_rows($result);     
    if($number>0)
    {
        $flag=0;
        $message='User name is existed!';         
    }
    else
    {
        $query1="select * from users where email='$email'";
        $result1=mysql_query($query1);
        $number=mysql_num_rows($result1);     
        if($number>0)
        {
            $flag=0;
            $message='Email is existed!';        
        }
        else
        {         
            $query="insert into users 
            (user_name,email,password,fullname,birthday,phone,signup_date,department_id,country_id) values('"
            .$user."','".$email."','".md5($password)."','".$fullname."','"
            .$_POST['birthday']."','".$_POST['phone']."',NOW(),".$_POST['department'].",".$_POST['country'].")";
            $result=mysql_query($query);
            $message='Register Successfully';
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