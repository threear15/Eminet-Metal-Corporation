function validation()
{
var a=document.forms["form"]["fname"].value;
var b=document.forms["form"]["mname"].value;
var c=document.forms["form"]["lname"].value;
var d=document.forms["form"]["email"].value;
var e=document.forms["form"]["phone"].value;
var f=document.forms["form"]["gender"].value;
var g=document.forms["form"]["street"].value;
var h=document.forms["form"]["brgy"].value;
var i=document.forms["form"]["city"].value;
var j=document.forms["form"]["username"].value;
var k=document.forms["form"]["password"].value;
var l=document.forms["form"]["cpassword"].value;


if ((a==null || a==""))
  {
  alert("You must enter your First name");
  document.form.fname.focus(); 
  return false;
  }


if ((b==null || b==""))
  {
  alert("You must enter your Middle name");
  document.form.mname.focus(); 
  return false;
  }


  if ((c==null || c==""))
  {
  alert("You must enter your Last name");
  document.form.lname.focus(); 
  return false;
  }



if ((d==null || d==""))
  {
  alert("You must enter your Email Address");
  document.form.email.focus(); 
  return false;
}


if ((e==null || e==""))
  {
  alert("You must enter your Contact number");
  document.form.phone.focus(); 
  return false;
  }


if ((f==null || f==""))
  {
  alert("You must specify your Gender");
  document.form.gender.focus(); 
  return false;
}


if ((g==null || g==""))
  {
  alert("You must enter your Street Name.");
  document.form.street.focus(); 
  return false;
}

if ((h==null || h==""))
  {
  alert("You must enter your Baranggay");
  document.form.brgy.focus(); 
  return false;
}

if ((i==null || i==""))
  {
  alert("You must enter your City");
  document.form.city.focus(); 
  return false;
}

if ((j==null || j==""))
  {
  alert("You must enter your Username");
  document.form.username.focus(); 
  return false;
}

if ((k==null || k==""))
  {
  alert("You must enter your Password");
  document.form.password.focus(); 
  return false;
}

if ((l==null || l==""))
  {
  alert("You must confirm your Password");
  document.form.cpassword.focus(); 
  return false;
}

  
if( k != l ) {
alert("Password does not match");
document.form.confirmpassword.focus(); 
  return false;
}

var atpos=d.indexOf("@");
var dotpos=d.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=d.length)
  {
  alert("Not a valid Email Address");
  document.form.email.focus(); 
  return false;
  } 

}
