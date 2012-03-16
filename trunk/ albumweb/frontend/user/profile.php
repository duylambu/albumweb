<?php
include_once('dbconnect.php');
?>
<style>
div#user-info{
    min-height:150px;
}
img#user-avatar
{
    width:120px;
    height:120px;
    float:left;
}
#tbinfo{
    min-height:120px;
}
</style>
<?php
$id=$_GET['id'];
if($id!=null && !empty($id))
{?>

   <?php
    $query="select * from user where user_id=$id";
    $result=mysql_query($query);
    while($row=mysql_fetch_array($result))
    {?>
      <div id="user-info">
      <div><img id="user-avatar" src="upload/<?php echo $row['user_id']?>/avatar/<?php echo $row['avatar']; ?>" /></div>
      <table id="tbinfo">
      <tr><td>Name:</td><td><?php echo $row['user_name']; ?></td></tr>
      <tr><td>Full Name:</td><td><?php echo $row['full_name']; ?></td></tr>
      <tr><td>Name:</td><td><?php echo $row['user_name']; ?></td></tr>
      </table>
      </div>  
    <?php
    }
    ?>
    <?php
    include_once('public_albums.php'); 
    ?>
    
<?php
} 
?>