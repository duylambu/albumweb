<?php
include_once('dbconnect.php');
?>
<style>
div#list-public-album{
    float:left;
}
div.album-item{
    width:130px;
    height:150px;
    float:left;
}
img.image-album{
    width:120px;
    height:120px;
    float:left;
}
</style>
<h2>PUBLIC ALBUMS</h2>
<div id="list-public-album">
<?php
$query="select * from album where owner=$id and public>0";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{?>
<div class="album-item">
<div class="album-avatar"><img class="image-album" src="upload/<?php echo $id;?>/<?php echo $row['album_id'];?>/avatar/<?php echo $row['avatar'];?>" /></div>
<div><?php echo $row['album_name'];?></div>
</div>
<?}
 ?>
</div>