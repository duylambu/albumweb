<?php
include_once('dbconnect.php');
?>
<h2>DETAIL ALBUM</h2>
<div id="detail-album">
<?php
$id=$_GET['id'];
$id=5;
$query="select * from photo where album_id=$id";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{?>
<div id="photo-item">
<div id="photo-image"><img src="<?php echo $row['image'];?>" /></div>
<div><?php echo $row['photo_name'];?></div>
</div>
<?}
 ?>
 </div>