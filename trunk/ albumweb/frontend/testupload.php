<?php
include_once('dbconnect.php'); 
?>

<?php
 $avatar=$_POST['create_album']; 
move_uploaded_file($avatar, "upload/" . 'avatar.jpg');

$success=array('mess'=>$avatar,'value'=>1);
    echo json_encode($success);
 ?>