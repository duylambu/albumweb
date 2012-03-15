
<?php
if($_SESSION['user']!=null || isset($_SESSION['user']))
{?>
    <script>
    window.location="?param=admin";
    </script>    
<?php
}?>
<?php
$username='';
$pass='';
echo $_COOKIE['rememberme']['password'];
//setcookie('rememberme',"",-23424);
?>
<script>
function checkUserName2(username)
{
    var numaric = username;
    if(numaric.length<=0) return false;
	for(var j=0; j<numaric.length; j++)
		{
		  var alphaa = numaric.charAt(j);
		  var hh = alphaa.charCodeAt(0);
		  if((hh > 47 && hh<58) || (hh > 64 && hh<91) || (hh > 96 && hh<123))
		  {
		  }
		else	{                         
			 return false;
		  }
 		}
 return true;
}
function checkPassword2(pass)
{    
    if(pass=='' || pass==null) return false;
    
    var letterNumber = /^[0-9a-zA-Z]+$/;
    if((pass.match(letterNumber)))
    {
    return true;
    }
    else
    { 
    return false; 
    }
}
</script>
<style>
div#login{
    width:98%;
    height: auto;
    margin: 3px auto;
}
div#titlelogin{
    text-align: center;
    font-size: 25px;
    font-weight: bold;
}
form#loginform
{
    border: 1px solid black;
    padding:5px;
    background: aqua;
}
td.loginabc{
    font-size: 12px;    
}
div#errorlogin{
    color:red;
}
</style>
<script>
$(document).ready(function(){
    
    $('#signup').click(function(){
        $('#errorlogin').html('');
        var username=document.getElementById('username').value;
        var password=document.getElementById('password').value;
        if(!checkUserName2(username))
        {
            $('#errorlogin').html('username only alpha-numeric characters are allowed!');
            return;
        }
        if(!checkPassword2(password))
        {
            $('#errorlogin').html('passsword must contain both letters (a-z, A-Z) and numbers!');
            return;
        }
        var remember=document.getElementById('remember_me');
        //alert(username+password+remember.checked);
        //if(remember.value=type)
        $.ajax({
            url: 'frontend/login/login_post.php',
            type: 'POST',
            cache: false,
            data: {'username':username,'password':password,'remember_me':remember.checked},
            success: function(string){
                var getData = $.parseJSON(string);
               $('#errorlogin').html(getData.value+'temp:'+getData.temp);
                if(getData.value>0)
                {                    
                   window.location='?param=admin';    
                }
                else{
                  // $('#errorlogin').html('Log in Fail!');
                }

            },
            error: function (){
                alert('Error!');
               
            }
        });
    });
});
</script>

<div id="login">
<form id="loginform" action="" method="post" enctype="multipart/form-data">
    <div id="titlelogin">LOG IN!</div>
    <div>
        <table>
        <h1><?php echo $_COOKIE['user1'];?></h1>
        <div id="errorlogin"></div>
        <tr><td class="loginabc">User name:</td></tr>
        <tr><td><input type="text" name="username" id="username" value="<?php echo $username; ?>" /></td></tr>
        <tr><td class="loginabc">Password:</td></tr>
        <tr><td><input type="password" name="password" id="password" value="<?php echo $pass; ?>" /></td></tr>
        <tr><td class="loginabc">Remember me?</td></tr>
        <tr><td><input type="checkbox" name="remember_me" id="remember_me"/></td></tr>
        <tr><td><input type="button" name="signup" id="signup" value="Log In" /></td></tr>
        </table>
    </div>
</form>
</div>