<?php
include_once('dbconnect.php');
?>
<style>
div#content-list-user{
    padding: 3px;
    width: 100%;
    float: left;
}
div#user-item{
    width:120px;
    height:120px;
    float:left;
}
img#image
{
    width:100px;
    height:100px;
}
</style>
<h2>USERS</h2>
<div id="content-list-user">
<?php
$query='select * from user';
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{?>
    <div id="user-item">
   <div><a><img id="image" src="upload/<?php echo $row['user_id']?>/<?php echo $row['avatar'];?>" /></a></div>
   <div><a href="#"><?php echo $row['user_name']; ?></a></div>
   </div>
<?php
}
?>
</div>