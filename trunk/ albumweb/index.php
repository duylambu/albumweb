<?php
	session_start();  
	ob_start();
	ini_set('display_errors', 0);
	include("connectDB.php");
	include("frontend/function/function.php");
	include("frontend/title_meta/title_meta.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi">
<head>
  
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $title_meta; ?></title>
	<link rel="stylesheet" href="skin/front-menu-nav/menu_style.css" type="text/css" />
    <link rel="stylesheet" href="skin/front-end-style.css" type="text/css" />
    <script src="js/jquery.js"></script>
</head>
<body>	
<div id="wrapper">
	<div class="menu">
    <?php include_once("skin/front-menu-nav/menu-nav.php");?>		
	</div>
    <div id="wrapper-container" style="">
    <div id="left-container">
    <?php
         include_once("frontend/processing_left.php"); 
    ?>  
    </div>
    <div id="main-container">
         <?php
         include_once("frontend/processing_center.php"); 
         ?>                                       
    </div>
    <div id="right-container">
        <?php        
        include_once("frontend/processing_right.php");        
        //include_once("frontend/sidebar-right/ad-bottom-right.php");        
         ?>
        <div id="search-bar">
        <?php
	       //include("cumchucnang/tim_kiem/khung.php");
        ?>
        </div>
    </div>
    </div>
    <?php
    include("frontend/footer/footer.php"); 
    ?>
</div>
</body>
</html>