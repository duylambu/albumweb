<?php 
include_once('../../dbconnect.php');
?>
<?php
session_start();
$session_id='1'; // User session id
$path = "../../upload/";
$albumid=$_POST['albumid'];
$uid=$_POST['uid'];
$uploadfolder=$path.$uid.'/'.$albumid.'/';

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    if(!is_dir($uploadfolder))
    {
        mkdir($uploadfolder,0,true);    
    }
    
    $name = $_FILES['photoimg']['name'];
    $size = $_FILES['photoimg']['size'];
    if(strlen($name))
    {
    list($txt, $ext) = explode(".", $name);
    if(in_array($ext,$valid_formats))
    {
    if($size<(1024*1024)) // Image size max 1 MB
    {
        $photoid=1;
        
        $q="select MAX(photo_id) as max from photo";
        $r=mysql_query($q);        
        while($row=mysql_fetch_array($r))
        {
           $photoid=$row['max']+1; 
           break;
        }
        sleep(1);
        
        $photoname='photo_'.$photoid.'.'.$ext;
       $query="insert into photo (album_id,photo_name,date_created,date_modified,image)
        values ($albumid,'$txt',NOW(),NOW(),'$photoname')";
        $result=mysql_query($query);
        if(!$result){
            //echo 'insert that bai';
            //echo $query;
        }
        else{
            //echo 'insert thanh cong';
        }
        $q2="update album set date_modified=NOW() where album_id=$albumid";
        mysql_query($q2);
        
    //$actual_image_name = time().$session_id.".".$ext;
    $actual_image_name = $photoname;
    $tmp = $_FILES['photoimg']['tmp_name'];
    if(move_uploaded_file($tmp, $uploadfolder.$actual_image_name))
    {    
    //mysql_query("UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id'");
    echo "<div class='photo-item'>
    <div class='photo-image'><img style='width:100px;height:100px;' src='upload/$uid/$albumid/".$actual_image_name."' class='preview'>
    </div>
    <div class='photo-name'>$txt</div>";
    }
    else
    echo "failed";
    }
    else
    echo "Image file size max 1 MB"; 
    }
    else
    echo "Invalid file format.."; 
    }
    else
    echo "Please select image..!";
    exit;
}
?>