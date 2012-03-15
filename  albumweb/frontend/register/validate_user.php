<?php
include_once('../../dbconnect.php');
?>
<?php
$temp=0;

    if(isset($_POST['type'])&& isset($_POST['content']))
    {
    
        $type=$_POST['type'];
        $value=$_POST['content'];
        
        if($type==1)
        {
            $query="select * from user where user_name='$value'";
        }
        else
        if($type==2)
        {
            $query="select * from user where email='$value'";
        }
        else
        if($type==3)
        {
            $query="select * from user where fullname='$value'";
        } 
        else
        { 
            $query="";
        }
    
        $result=mysql_query($query);
        $users=mysql_num_rows($result);                  
       
         $member = array('value' => $users);                    
           echo json_encode($member); 
           die;  
    }
    else
    {
        
    }
    
    
?>