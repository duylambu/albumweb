function checkUserName()
{
    var username=document.getElementById('username');
    var numaric = username.value;
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

function checkEmail() {
    var email = document.getElementById('email');
    if(email.value.length<=0) return false;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(email.value)) {
    email.focus;
    return false;
    }
    return true;
}

function checkPassword()
{
    var pass=document.getElementById('password');
    
    if(pass.value=='' || pass.value==null) return false;
    
    var letterNumber = /^[0-9a-zA-Z]+$/;
    if((pass.value.match(letterNumber)))
    {
    return true;
    }
    else
    { 
    return false; 
    }
}

function checkFullname()
{
    var fullname=document.getElementById('fullname');
    if(fullname.value.length<6)
    {        
          return false; 
    } 
    else return true;
}
function checkBirthday()
{
    var dd=document.getElementById('ddbirthday');
    var mm=document.getElementById('mmbirthday');
    var yy=document.getElementById('yyyybirthday');
    return checkDayMonth(dd.value,mm.value,yy.value);
    
}
function checkLeapYear(year)
{
    if(year%4==0 ||(year%100==0 && year%400==0))
    {
        return true;
    }
    return false;
}
function checkDayMonth(dd,mm,yy)
{
    var errorMessegage="0";
    switch(mm)
    {
        case '1':
        case '3':
        case '5':
        case '7':
        case '8':
        case '10':
        case '12': {
            if(dd>31||dd<=0)
            {
                errorMessegage='thang '+mm+' khong co ngay '+dd;
            }
            break;
        }
        case '4':
        case '6':
        case '9':
        case '11':{
            if(dd<=0||dd>30)
            {
                errorMessegage='thang '+mm+' khong co ngay '+dd;
            }
            break;
        }
        case '2':
        {
            if(checkLeapYear(yy))
            {
                    if(dd>29)
                    { 
                        errorMessegage='thang 2 nam '+yy+' la nam nhuan, nen co toi da 29 ngay';
                    }
            }
            else
            {
                if(dd>28)
                { 
                    errorMessegage='thang 2 nam '+yy+' khong phai la nam nhuan, nen co toi da 28 ngay';
                }
            }
            break;
        }
    default: errorMessegage="";
      break;
    }
    return errorMessegage;
}
function checkIsNumber(phonenumber)
{
      var check = true;
      var value = phonenumber;
      if(value=="")return false;       
      for(var i=0;i < phonenumber.length; ++i)
      {
           var new_key = value.charAt(i); 
           if(((new_key < "0") || (new_key > "9")) && !(new_key == ""))
           {
                check = false;
                break;
           }
      }      
      return check;      
}
function checkPhonenumber()
{
    var phonenumber=document.getElementById('phone_number');
    if(phonenumber.value.length==0) return true;
    if(phonenumber.value.length!=7) return false;
    return checkIsNumber(phonenumber.value);
}
function checkMatchPassword()
{
    var pass=document.getElementById('password');
    var repass=document.getElementById('repassword');
    if(pass.value!=repass.value)
    {
        return false;
    }
    return true;
}
function checkCountryCode()
{
    var countrycode=document.getElementById('country_code');
    if(countrycode.value=='') return '0';
    if(countrycode.value.length>3 || countrycode.value.length<=0) {
     return "country Code must be 1-3 number letters!";   
    }
    else
    {
        if(!checkIsNumber(countrycode.value))
        {
            return 'Country Code must be the number!';
        }
        else return '0';
    }
}
function checkAreaCode()
{
    var areacode=document.getElementById('area_code');
    if(areacode.value=='') return '0';
    if(areacode.value.length>3 || areacode.value.length<=0) {
     return "Area Code must be 1-3 number letters!";   
    }
    else
    {
        if(!checkIsNumber(areacode.value))
        {
            return 'Area Code must be the number!';
        }
        else return '0';
    }
}

function checkValidate(type,value,urllink)
{
        $.ajax({
            url: urllink,
            type: 'POST',
            cache: false,
            data: {'type':type,'value':value},
            success: function(string){
                var getData = $.parseJSON(string);
            return getData.value;
            },
            error: function (){
                return 0;
            }
        });
}