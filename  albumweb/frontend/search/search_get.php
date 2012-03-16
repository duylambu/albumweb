<?php
include_once('../../dbconnect.php');
?>
<?php
if($_POST)
{
$q=$_POST['searchword'];
$aid=$_POST['aid'];

$sql_res=mysql_query("select * from photo where photo_name like '%$q%' or photo_name like '%$q%' and album_id=$aid order by photo_name LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
    
    /*
$fname=$row['fname'];
$lname=$row['lname'];
$img=$row['img'];
$country=$row['country'];
$re_fname='<b>'.$q.'</b>';
$re_lname='<b>'.$q.'</b>';
$final_fname = str_ireplace($q, $re_fname, $fname);
$final_lname = str_ireplace($q, $re_lname, $lname);
*/

?>
<div class="display_box" align="left">
<?php echo $row['photo_name'];?>
<!--<img src="user_img/
<?php //echo $img; ?>" />
<?php //echo $final_fname; ?>&nbsp;
<?php //echo $final_lname; ?><br/>
<?php //echo $country; ?>
*/
-->
</div>
<?php
}
}
else
{}
?>