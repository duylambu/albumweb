<?php
include_once('dbconnect.php');
?>
<style>
div#photo-item
{
    width:120px;
    height:120px;
    float:left;
}
img#image{
    width:100px;
    height:100px;
}
</style>
<h2>VIEW ALBUM</h2>
<div id="detail-album">
<?php
$uid=$_GET['uid'];
$id=$_GET['id'];
$query="select * from photo where album_id=$id";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{?>
<div id="photo-item">
<div id="photo-image"><img id="image" src="upload/<?php echo $uid;?>/<?php echo $row['album_id'];?>/<?php echo $row['image'];?>"/></div>
<div><?php echo $row['photo_name'];?></div>
</div>
<?}
 ?>
 </div>