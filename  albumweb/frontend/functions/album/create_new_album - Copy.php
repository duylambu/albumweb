<?php
include_once('../../../dbconnect.php');
include_once('../../../function.php');  
?>
<?php
$upload="upload";
 $albumname=$_POST['album_name'];
 $user=1;
 //$avatar=$_POST['avatar'];
 
 if(isset($albumname)&&isset($user))
 {
    //validate albumname
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
        $success=array('mess'=>$mess,'value'=>$value);
        echo json_encode($success);
        die;
    }
    if(isset($_FILES["file"]))
    {
        mkdir('upload',0,true);
        move_uploaded_file($avatar,
          "upload/" . 'avatar.jpg');
        
        
       if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/pjpeg"))
        && ($_FILES["file"]["size"] < 20000))
          {
          if ($_FILES["file"]["error"] > 0)
            {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            }
          else
            {
            //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
            //echo "Type: " . $_FILES["file"]["type"] . "<br />";
            //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
        
            if (file_exists("upload/" . $_FILES["file"]["name"]))
              {
          //echo $_FILES["file"]["name"] . " already exists. ";
          }
        else
          {
          move_uploaded_file($_FILES["file"]["tmp_name"],
          "upload/" . $_FILES["file"]["name"]);
          echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
          }
        }
      }
    else
      {
      echo "Invalid file";
      }
      
    }
    //end validate albumname
    $query="insert into album (album_name,owner, date_created,date_modified) values ('$albumname',$user,NOW(),NOW())";
    //$result=mysql_query($query);
    //$count=mysql_
    $mess="success!";
    $value=1;
    if(!$result)
    {
        $mess="Fail";
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