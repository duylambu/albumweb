<script>
$(document).ready(function(){    
    $(".search").keyup(function() 
    {
        var searchbox = $(this).val();
        //var dataString = {'searchword':searchbox,'aid':<?php echo $_GET['id'];?>};
        if(searchbox=='')
        {}
        else
        {
            $.ajax({
            type: "POST",
            url: "frontend/search/search_get.php",
            data: {'searchword':searchbox,'aid':<?php echo $_GET['id'];?>},
            cache: false,
            success: function(html)
            {
            $("#display").html(html).show();
            }
            });
        }
        //return false; 
    }); 
    $("#display").focusout(function(){       
        $(this).empty();
    });   
    
});
</script>

<style>
*{margin:0px}
#searchbox
{
width:250px;
border:solid 1px #000;
padding:3px;
}
#display
{
width:250px;
display:none;
float:right; margin-right:30px;
border-left:solid 1px #dedede;
border-right:solid 1px #dedede;
border-bottom:solid 1px #dedede;
overflow:hidden;
}
.display_box
{
padding:4px; 
border-top:solid 1px #dedede; 
font-size:12px; 
height:30px;
}
.display_box:hover
{
background:#3b5998;
color:#FFFFFF;
}
</style>

<div id="search-tool">
<input type="text" class="search" id="searchbox" />
<div id="display">
</div>
</div>
