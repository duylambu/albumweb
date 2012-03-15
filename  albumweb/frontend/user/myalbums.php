<?php
include_once('dbconnect.php');
?>
<?php
$id=$_GET['id']; 
$id=1;
$query="select * from album where owner=$id";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{?>
    <div id="album-item">
    <div><a><img src="<?php echo $row['avatar'];?>" /></a></div>
    <div><a><?php echo $row['album_name'];?></a></div>
    </div>
<?php 
}
?>