<?php
include_once('dbconnect.php');
?>
<h2>USERS</h2>
<div>
<?php
$query='select * from user';
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{?>
   <div><a><img src="<?php echo $row['avatar'];?>" /></a></div>
   <div><a href="#"><?php echo $row['user_name']; ?></a></div>
<?php
}
?>
</div>