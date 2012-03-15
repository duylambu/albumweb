<?php
include_once('dbconnect.php'); 
?>

<?php
 $avatar=$_POST['file']; 
move_uploaded_file($avatar, "upload/" . 'avatar.jpg');
 ?>