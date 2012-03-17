<?php include_once('../../dbconnect.php');
 
?>
<?php
$upload="../../upload/";
$user=$_POST['username'];
$user=stripslashes($user);
$email=$_POST['email'];
$email=stripslashes($email); 
$password=$_POST['password'];
$password=stripslashes($password);
$fullname=$_POST['fullname'];
//$address=$_POST['address'];
$avatar=$_FILES["file"]["name"];
if($user!=""&&$email!=""&&$password!=""&&$fullname!="")
{
    $flag=1;  
    $message='';  
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
            (user_name,email,password,full_name,phone,join_date,avatar) 
            values('".$user."','".$email."','".md5($password)."','".$fullname."','".$_POST['phone']."',NOW(),'$avatar')";
            $result=mysql_query($query);
            $message="Register Successful!";
            $flag=1;
                  
                if(!$result)
                {
                    $mess="Register Fail!";
                    $value=0;
                }
                else {
                    $userid=mysql_insert_id();
                }
                
                $albumfolder=$upload.$userid.'/avatar/';
                //echo $albumfolder;
                if(mkdir($albumfolder,0,true))
                {
                    //echo "thanhcong!";
                }   
                else
                {
                    //echo "thatbai";
                } 
                if(isset($_FILES["file"]))
                {                   
                    
                   if (($_FILES["file"]["type"] == "image/gif")
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg"))
                    //&& ($_FILES["file"]["size"] < 20000))
                      {
                      if ($_FILES["file"]["error"] > 0)
                        {
                        $message= $_FILES["file"]["error"];
                        }
                      else
                        {
                           // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                           // echo "Type: " . $_FILES["file"]["type"] . "<br />";
                           // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                          // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
                    
                        if (file_exists($albumfolder. $_FILES["file"]["name"]))
                          {
                        //echo $_FILES["file"]["name"] . " already exists. ";
                      }
                    else
                      {
                      move_uploaded_file($_FILES["file"]["tmp_name"],$albumfolder. $_FILES["file"]["name"]);
                      //echo "$albumfolder" . $_FILES["file"]["name"];
                      $message="Register succefull!";
                      }
                    }
                  }
                else
                  {
                  $message="Invalid file";
                  }
                  
                }                    
        }
    }
    //if($number>0) $message='User name'; 
    //$successmessage=array('successmessage'=>$message,'value'=>$flag);
    echo $message;
    sleep(2);
}
else{
    //$successmessage=array('successmessage'=>"Fail",'value'=>0);
    //echo json_encode($successmessage);
    echo 'Fail!';
    die;    
}

?>