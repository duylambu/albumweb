<? 
function kiemtradangnhap($user,$pass)
{
    if($user=='admin'&&$pass=='admin')
    return 1;
    else return 0;
}
function get_table($table_name)
{
return mysql_query("select * from ".$table_name."");
}
function get_data($query)
{
    return mysql_query($query);
}
function check_existing($query)
{
    $temp=mysql_query($query);
    $count=0;
    $count=mysql_num_rows($temp);    
    return $count;
}
?>