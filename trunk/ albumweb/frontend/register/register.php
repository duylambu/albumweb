
<script src="js/function.js">
</script>
<style>
input.error{border: 1px solid red;}
span.required{color:red;}
label, li.lberror{color:red;font-style: italic;font-size: 11;}
a#test{text-decoration: none;font-size: 13px;}
.code{
    width:30px;
}
.number{
    width:90px;
}
</style>

<script>
$(document).ready(function(){
    /*
   $('#submit_register').click(function(){
    var isSuccess=true;
    $('.lberror').remove('label');
    $('li.lberror').remove('li');
    $('#susscessRegister').html('');
    //check user name
    if(!checkUserName())
    {     
        isSuccess=false;
        $('#username').addClass('error');
       $('#username').parent(this).append('<label class="lberror" id="lbusername">only alpha-numeric characters are allowed</label>');
       
    }
    else
    {
       $('#username').removeClass('error');    
    }
    //end check user name
    
    //check email
    if(!checkEmail())
    {
    $('#email').addClass('error');
    $('#email').parent(this).append('<label class="lberror" id="lbemail">Email Invalid!</label>');
    isSuccess=false;
    }
    else
    {
        $('#email').removeClass('error');        
    }
    //end check email
    
    //checkpassword
    if(!checkPassword())
    {
        isSuccess=false;
        $('#password').addClass('error'); 
        $('#password').parent(this).append('<label class="lberror" id="lbemail">must contain both letters (a-z, A-Z) and numbers</label>');
               
    }
    else{
        $('#password').removeClass('error'); 
    }
    //end check password
    
    //check match password
    if(!checkMatchPassword())
    {
        isSuccess=false;
        $('#repassword').addClass('error'); 
        $('#repassword').parent(this).append('<label class="lberror" id="lbemail">Password not match!</label>');
        
    }
    else{
        $('#repassword').removeClass('error'); 
    }
    //end check match password
    
    
    //check full name
    if(!checkFullname())
    {
          isSuccess=false;
        $('#fullname').addClass('error'); 
        $('#fullname').parent(this).append('<label class="lberror" id="lbfullname">Full name is least 6 characters!</label>');
      
    }
    else{
        $('#fullname').removeClass('error'); 
    }
    //end check full name        
    
    //check phone number
    var codemess=checkCountryCode();
    if(codemess!='0')
    {
        isSuccess=false;
        $('#country_code').addClass('error'); 
        $('#country_code').parent(this).append('<li class="lberror" id="lbemail">'+codemess+'</li>');
        
    }
    else
    {
        $('#country_code').removeClass('error'); 
    }
    
    var areacodemess=checkAreaCode();
    if(areacodemess!='0')
    {
        isSuccess=false;
        $('#area_code').addClass('error'); 
        $('#area_code').parent(this).append('<li class="lberror" id="lbemail">'+areacodemess+'</li>');
    }
    else
    {
        $('#area_code').removeClass('error'); 
    }
    
    if(!checkPhonenumber())
    {
        isSuccess=false;
      $('#phone_number').addClass('error');  
      $('#phone_number').parent(this).append('<li class="lberror" id="lbemail">Phone number must be 7 number letters</li>');
      
    }
    else{
        $('#phone_number').removeClass('error'); 
    }
    //end check phone number
    
    //// validate success-> submit data.
    var isRedirect=false;
    if(isSuccess==false){return;}
    else(isSuccess)
    {
        
       $('#susscessRegister').html('Signing up....');
        var username=document.getElementById('username').value;
        var email=document.getElementById('email').value;
        var password=document.getElementById('password').value;
        var fullname=document.getElementById('fullname').value;
        var countrycode=document.getElementById('country_code').value;
        var areacode=document.getElementById('area_code').value;
        var number=document.getElementById('phone_number').value;
        var phonenumber=countrycode+'.'+areacode+'.'+number;               
        
            $.ajax({
            url: 'frontend/register/register_post.php',
            type: 'POST',
            cache: false,
            data: {'username':username,'email':email,'password':password,'fullname':fullname,'phone':phonenumber},
            success: function(string){
                var getData = $.parseJSON(string);                                  
                $('#susscessRegister').html(getData.successmessage);
                if(getData.value>0)
                {
                    //alert(getData.successmessage);
                    $('.content_register :input').val('');
                    //window.location="?param=log_in"; 
                    //isRedirect=true;                  
                }                
                sleep(2);
               // return;                
            },
            error: function (){
                alert('Error');
            }
        });
    }
   });
   */
   
   $('#username').focusout(function(){
    
     $('#lbusername').remove();
     if(!checkUserName())
    {            
        $('#username').addClass('error');
       $('#username').parent(this).append('<label class="lberror" id="lbusername">only alpha-numeric characters are allowed</label>');
       return;
    }     
        $('#checkuser').html('Checking...');
        $.ajax({
            url: 'frontend/register/validate_user.php',
            type: 'POST',
            cache: false,
            data: {'type':1,'content':$('#username').val()},
            success: function(string){
                var getData = $.parseJSON(string);
                if(getData.value>=1)
                {
                    $('#username').addClass('error');
                     $('#username').parent(this).append('<li class="lberror" id="lbusername">Username In use! Please, choose another user name!</li>');   
                }
                else
                {
                   $('#username').parent(this).append('<li class="lberror" id="lbusername">OK!</li>'); 
                }
                $('#checkuser').html(' ');
            },
            error: function (){
                alert('Error');
            }
        });
    });
    
    $('#btcancel').click(function(){
       $('.content_register :input').val(''); 
    });
    
    $('#submit_register').click(function()	
        {
            var isSuccess=true;
    $('.lberror').remove('label');
    $('li.lberror').remove('li');
    $('#susscessRegister').html('');
    //check user name
    if(!checkUserName())
    {     
        isSuccess=false;
        $('#username').addClass('error');
       $('#username').parent(this).append('<label class="lberror" id="lbusername">only alpha-numeric characters are allowed</label>');
       
    }
    else
    {
       $('#username').removeClass('error');    
    }
    //end check user name
    
    //check email
    if(!checkEmail())
    {
    $('#email').addClass('error');
    $('#email').parent(this).append('<label class="lberror" id="lbemail">Email Invalid!</label>');
    isSuccess=false;
    }
    else
    {
        $('#email').removeClass('error');        
    }
    //end check email
    
    //checkpassword
    if(!checkPassword())
    {
        isSuccess=false;
        $('#password').addClass('error'); 
        $('#password').parent(this).append('<label class="lberror" id="lbemail">must contain both letters (a-z, A-Z) and numbers</label>');
               
    }
    else{
        $('#password').removeClass('error'); 
    }
    //end check password
    
    //check match password
    if(!checkMatchPassword())
    {
        isSuccess=false;
        $('#repassword').addClass('error'); 
        $('#repassword').parent(this).append('<label class="lberror" id="lbemail">Password not match!</label>');
        
    }
    else{
        $('#repassword').removeClass('error'); 
    }
    //end check match password
    
    
    //check full name
    if(!checkFullname())
    {
          isSuccess=false;
        $('#fullname').addClass('error'); 
        $('#fullname').parent(this).append('<label class="lberror" id="lbfullname">Full name is least 6 characters!</label>');
      
    }
    else{
        $('#fullname').removeClass('error'); 
    }
    //end check full name        
    
    //check phone number
    var codemess=checkCountryCode();
    if(codemess!='0')
    {
        isSuccess=false;
        $('#country_code').addClass('error'); 
        $('#country_code').parent(this).append('<li class="lberror" id="lbemail">'+codemess+'</li>');
        
    }
    else
    {
        $('#country_code').removeClass('error'); 
    }
    
    var areacodemess=checkAreaCode();
    if(areacodemess!='0')
    {
        isSuccess=false;
        $('#area_code').addClass('error'); 
        $('#area_code').parent(this).append('<li class="lberror" id="lbemail">'+areacodemess+'</li>');
    }
    else
    {
        $('#area_code').removeClass('error'); 
    }
    
    if(!checkPhonenumber())
    {
        isSuccess=false;
      $('#phone_number').addClass('error');  
      $('#phone_number').parent(this).append('<li class="lberror" id="lbemail">Phone number must be 7 number letters</li>');
      
    }
    else{
        $('#phone_number').removeClass('error'); 
    }
    //end check phone number
    
    //// validate success-> submit data.
    var isRedirect=false;
    if(isSuccess==false){return;}
    else(isSuccess)
    {
            $("#preview").html('');
            $("#preview").html('<img style="width:100px;height:100px;" src="loader.gif" alt="Uploading...."/>');
            $("#registerform").ajaxForm(
            {
            target: '#preview'
            }).submit();
            
    }
    });
        
});
</script>
<style>
div#register
{
    width:98%;
    height: auto;
    margin:3px auto;
}
div#preview{
    color:red;
    font-size:13px;
    font-style:italic;
}
</style>
<div id='preview'>
</div>
          
<div id="susscessRegister" style="color: red;font-style: italic;"></div>
<div id="register">
<form name="registerform" id="registerform" action="frontend/register/register_post.php" method="Post" enctype="multipart/form-data">
    <table>
        <tr class="content_register">
            <td>User name<span class="required">(*)</span>:</td>
            <td><input type="text" name="username" id="username" value=""/><span><a href="#" id="validateusername"></a><div id="checkuser"></div></span></td>
        </tr>
        <tr class="content_register">
            <td>Email <span class="required">(*)</span>:</td>
            <td><input type="text" name="email" id="email" value="" /><span><div id="checkemail"></div></span></td>
            </tr>
        <tr class="content_register">
            <td>Password <span class="required">(*)</span>:</td>
            <td><input type="password" name="password" id="password" value="" /></td>
        </tr>
        <tr class="content_register">
            <td>Password(again)<span class="required">(*)</span>:</td>
            <td><input type="password" name="repassword" id="repassword" value="" /></td>
        </tr>
        <tr class="content_register">
            <td>Full name <span class="required">(*)</span>:</td>
            <td><input type="text" name="fullname" id="fullname" value="" /></td>
        </tr>       
        <tr id="phone" class="content_register">
            <td>Phone:</td><td>
            <input maxlength="3" class="code" type="text" name="country_code" id="country_code" value="" />
            <input type="text" class="code" name="area_code" maxlength="3" id="area_code" value="" />
            <input type="text" class="number" name="phone_number" id="phone_number" value="" maxlength="7" /></td>
        </tr>  
        <tr><td>Avatar:</td><td><input type="file" name="file" id="file" /></td></tr> 
        <tr><td><input type="button" name="submit_register" id="submit_register" value="Submit" /></td><td><input type="button" name="btcancel" id="btcancel" value="Cancel" /></td></tr>
    </table>
</form>
</div>
<div><a href="?param=log_in">Login</a></div>