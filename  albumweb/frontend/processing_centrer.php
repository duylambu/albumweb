
<?php
if($_GET['param']=="album")
    {
        include_once("album/list_public_albums.php");
        return;
    }
    if($_GET['param']=="edit_album")
    {
        include_once("album/edit_album.php");
        return;
    }
    if($_GET['param']=="index")
    {
        include_once("frontend/user/list_users.php");
        include_once("frontend/album/list_public_albums.php");
        return;
        //exit();
    }
    if($_GET['param']=="log_in")
    {
        include_once("login/login.php");
        return;
    }
    if($_GET['param']=="admin")
    {
        include_once("frontend/user/helloadmin.php");
        return;
    }
    if($_GET['param']=="logout")
    {
        include_once("frontend/logout/logout.php");
        return;
    }
    if($_GET['param']=="register")
    {
        include_once("register/register.php");
        return;
    }
    if($_GET['param']=="country")
    {
        include_once("country/country.php");
        return;
    }
    if($_GET['param']=="myalbums")
    {
        include_once("user/myalbums.php");
        return;
    }    
    if($_GET['param']=="view_album")
    {
        include_once("album/view_album.php");
        return;
    }
    if($_GET['param']=="view_photo")
    {
        include_once("album/view_photo2.php");
        return;
    }
    if($_GET['param']=="detail_album")
    {
        include_once("album/detail_album.php");
        return;
    }
    if($_GET['param']=="user_info")
    {
        include_once("user/profile.php");
        return;
    }
    if($_GET['param']=="view_user")
    {
        include_once("frontend/user/list_users.php");
        return;
    }
    else
    {
        include_once("frontend/user/list_users.php");
        include_once("frontend/album/list_public_albums.php");
        //exit();
    }
?>