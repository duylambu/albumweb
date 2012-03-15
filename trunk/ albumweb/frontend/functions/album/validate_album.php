<?php
include_once('../../../dbconnect.php'); 
?>
<?php
 $albumname=$_POST['albumname'];
 $user=$_POST['user'];
 
 if(isset($albumname)&&isset($user))
 {
    $query="select * from album where owner='$user' and album_name='$albumname'";
    $result=mysql_query($query);
    //$count=mysql_
    $mess="OK!";
    $value=1;
    $count=mysql_num_rows($result);
    if($count>0)
    {
        $mess="Album name existed!";
        $value=0;
    }
    $success=array('mess'=>$mess,'value'=>$value);
    echo json_encode($success);
 }
 else
 {
    $success=array('mess'=>'Invalid','value'=>0);
    echo json_encode($success);
 }
?>