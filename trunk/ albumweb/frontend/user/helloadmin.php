<?php
if($_SESSION['user']==null || !isset($_SESSION['user']))
{?>
    <script>
    window.location="?param=log_in";
    </script>    
<?php
}?>
<?php
session_start(); 
?>
<h1>Hello:<?php echo $_SESSION['user']['username'];?></h1>