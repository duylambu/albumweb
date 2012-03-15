<?php
if($_SESSION['user']==null || !isset($_SESSION['user']))
{?>
    <script>
    window.location="?param=log_in";
    </script>    
<?php
}?>
<h1>Hello Admin :</h1><?php
session_start(); 
echo $_SESSION['user']['username'];
?>