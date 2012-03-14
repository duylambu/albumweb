<?php
include_once('dbconnect.php');
?>
<h2>PUBLIC ALBUMS</h2>
<?php
$query='select * from album where public>0';
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{?>
<div id="album-item">
<div id="album-avatar"><img src="<?php echo $row['avatar'];?>" /></div>
<div><?php echo $row['album_name'];?></div>
</div>
<?}
 ?>