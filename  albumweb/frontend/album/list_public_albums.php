<?php
include_once('dbconnect.php');
?>
<h2>PUBLIC ALBUMS</h2>
<style>
div#public-album{
    float:left;
}
div#album-item{
    width:120px;
    height:150px;
    float:left;
    margin: 10px;
}
img.image-album{
    width:120px;
    height:120px;
    float:left;
}
</style>
<div id="public-album">
<?php
$query='select * from album where public>0';
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{?>
<div id="album-item">
<div id="album-avatar"><a <a href="?param=view_album&id=<?php echo $row['album_id'];?>&uid=<?php echo $row['owner'];?>"><img class="image-album" src="upload/<?php echo $row['owner'];?>/<?php echo $row['album_id'];?>/avatar/<?php echo $row['avatar'];?>" /></a></div>
<div><a href="?param=view_album&id=<?php echo $row['album_id'];?>&uid=<?php echo $row['owner'];?>"><?php echo $row['album_name'];?></a></div>
</div>
<?}
 ?>
 </div>