<?php
include_once('dbconnect.php');
?>
<?php
if($_POST)
{
$q=$_POST['searchword'];
$aid=$_POST['aid'];

$sql_res=mysql_query("select a.owner,p.album_id,p.photo_name,p.image,p.photo_id 
from photo as p left join album as a on p.album_id=a.album_id 
where p.album_id=$aid and (p.photo_name like '%$q%' or p.photo_name like '%$q%') order by p.photo_name LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
?>
<div class="display_box" align="left">
<img style="width: 25px;height:25px;" src="upload/
<?php echo $row['owner'];?>/
<?php echo $row['album_id'];?>/
<?php echo $row['image'];?>"/>
<a href="?param=view_photo&id=<?php echo $row['photo_id'];?>&aid=<?php echo $row['album_id'] ?>"><?php echo $row['photo_name'];?></a>
</div>
<?php
}
}
else
{}
?>