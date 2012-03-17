<?php
if($_SESSION['user']==null || !isset($_SESSION['user']))
{?>
    <script>
    window.location="?param=log_in";
    </script>    
<?php
} 
?>
<?php
include_once('dbconnect.php');
?>
<style>
div#detail-album-info{
    margin-top:20px;
    font-size:11px;
    text-align: left;
}
div#album-info
{
    width: 100%;
    height:120px;
    float:left;
}
img#album-info-image{
    width:100px;
    height:100px;
}
</style>
<h4>Album info</h4>
<div id="detail-album-info">
<?php
$uid=$_SESSION['user']['id'];
$id=$_GET['id'];
$query="select album.*,count(photo.photo_id) as soluong 
from album,photo 
where  album.album_id=$id and album.album_id=photo.album_id";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{?>
<div id="album-info">
<div id="album-info-image"><img id="album-info-image" src="upload/<?php echo $uid;?>/<?php echo $row['album_id'];?>/avatar/<?php echo $row['avatar'];?>"/></div>
<div><?php echo $row['album_name'];?></div>
<div>Total photos:<?php echo $row['soluong'];?></div>
<div>Created:<?php echo $row['date_created'];?></div>
<div>Modified:<?php echo $row['date_modified'];?></div>
</div>
<?}
 ?>
 </div>
 
  
<div id="popup_name" class="popup_block">    
</div>  