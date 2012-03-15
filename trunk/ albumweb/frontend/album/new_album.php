<?php
include_once('../../dbconnect.php');
include_once('../../function.php');  
?>
<?php
$upload="../../upload/";
 $albumname=$_POST['album_name'];
 $user=$_POST['uid'];
 $avatar=$_FILES["file"]["name"];
 
 if(isset($albumname)&&isset($user))
 {
    $query="select * from album where owner='$user' and album_name='$albumname'";
    $result=mysql_query($query);
    $mess="OK!";
    $value=1;
    $count=mysql_num_rows($result);
    
    if($count>0)
    {
        $mess="Album name existed!";
        $value=0;        
        echo $mess;
        die;
    }
    $albumid=0;
    $query="insert into album (album_name,owner,date_created,date_modified,avatar) values ('$albumname',$user,NOW(),NOW(),'$avatar')";
    $result=mysql_query($query);
    $mess="success!";
    $value=1;
    if(!$result)
    {
        $mess="Fail";
        $value=0;
    }
    else {
        $albumid=mysql_insert_id();
    }
    
    if(isset($_FILES["file"]))
    {
        
        $albumfolder=$upload.$user.'/'.$albumid.'/';
        echo $albumfolder;
        if(mkdir($albumfolder,0,true))
        {
            echo "thanhcong!";
        }   
        else
        {
            echo "thatbai";
        } 
        
       if (($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg"))
        //&& ($_FILES["file"]["size"] < 20000))
          {
          if ($_FILES["file"]["error"] > 0)
            {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            }
          else
            {
               // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
               // echo "Type: " . $_FILES["file"]["type"] . "<br />";
               // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
              // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
        
            if (file_exists($albumfolder. $_FILES["file"]["name"]))
              {
            echo $_FILES["file"]["name"] . " already exists. ";
          }
        else
          {
          move_uploaded_file($_FILES["file"]["tmp_name"],$albumfolder. $_FILES["file"]["name"]);
          echo "$albumfolder" . $_FILES["file"]["name"];
          }
        }
      }
    else
      {
      echo "Invalid file";
      }
      
    }
    //end validate albumname    
 }
 else
 {
    
    echo json_encode('Invalid');
 }
?>