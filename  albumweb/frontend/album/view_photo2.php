<?php
include_once('dbconnect.php');
?>
<style>
div#detail-photo
{
    width:80%;
    height:auto;
    margin:0 auto;
}
img#image-detail{
    width:400px;
    height:400px;
}
</style>
<div id="detail-photo">
<?php
$aid=$_GET['aid'];
$id=$_GET['id'];

$query="select p.*,a.owner 
from photo as p left join album as a  on p.album_id=a.album_id 
where p.photo_id=$id and a.public>0";

$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{?>
<div id="photo-image"><img id="image-detail" src="upload/<?php echo $row['owner'];?>/<?php echo $row['album_id'];?>/<?php echo $row['image'];?>"/></div>
<div><?php echo $row['photo_name'];?></div>
<?}
 ?>
 </div>
