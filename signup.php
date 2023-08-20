<?php

$host="localhost";
$user="root";
$password="";
$db="XTM";
$conn = new mysqli($host, $user, $password,$db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['signup']))
{

  //echo "hi";


  $fname=$_POST['f_name'];
  $lname=$_POST['l_name'];
  $email=$_POST['u_email'];
  $number =$_POST['m_number'];
  $addr =$_POST['address'];
  $password=$_POST['u_pass'];
  $uname=$_POST['username'];
  $loc=$_POST['Location'];
  $utype=$_POST['utype'];


  echo $number."  ". $loc."  ". $email."  ".$addr ."  ".$utype;  
  $sql="insert into register(fname,lname,email,number,addr,password,uname,loc,utype) values('$fname','$lname','$email',$number,'$addr','$password','$uname','$loc','$utype')"; 

  if($conn->query($sql)===TRUE)
  {
    echo "successfully";

    header("Location: signin.php");

  }
  else
  {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up</title>
<link rel="stylesheet" type="text/css" href="_css/signup.css" />
</head>

<body>
<div id="signupbody">
<div id="signininimage">
  <a href="signup.php"><img src="_images/signin.png" width="150" height="150" alt="signin image"></a><br/> 
  <span style="color:#FF3737; padding-bottom:10px; line-height:40px; font-family:Verdana, Geneva, sans-serif; font-size:14px;" ></span>
  
  </div>
<div id="sheading">
	<p> Fill all the Detail</p>
</div>
<div id="textfeildbg">
<form name="signin" method="post" action="">
	<input name="f_name" type="text" placeholder="First name" maxlength="60" id="textfeilds"  required="required">
    
    <input name="l_name" type="text" placeholder="Last name" maxlength="50" id="textfeilds" required="required" >
    
    <input name="u_email" type="email" placeholder="Email Address" maxlength="50" id="emailfeilds" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">

 
    <input type="text" name="m_number" reqiured class="textfeilds" id="textfeilds"  placeholder="Example:9945461596" maxlength="10" size="70"  type="number" required="required">
   
  
 
 


   <input name="address"  class="textfeilds" id="textfeilds" type="text" placeholder="Enter you address where you can provide the product" maxlength=" 70" size="70" required="text">

    
    <input name="u_pass" type="password" placeholder="Password(min. 6 characters)" maxlength="50" id="password" pattern=".{6,}">
    
    <input name="username" type="text" placeholder="User Name" maxlength="50" id="textfeilds" required="required" />

   
  <select name="Location">
    <option value="">Location:</option>
    <option value="Andhra Pradesh">Andhra Pradesh</option>
    <option value="Amaravati">Amaravatic</option>
    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
    <option value="Assam">Assam</option>
    <option value="Bihar">Bihar</option>
    <option value="Chhattisgarh">Chhattisgarh</option>
    <option value="Goa">Goa</option>
    <option value="Gujarat">Gujarat</option>
    <option value="Haryana">Haryana</option>
    <option value="Himachal Pradesh">Himachal Pradesh</option>
    <option value="Jharkhand">Jharkhand</option>
    <option value="Karnataka">Karnataka</option>
    <option value="Kerala">Kerala</option>
    <option value="Madhya Pradesh">Madhya Pradesh</option>
    <option value="Maharashtra">Maharashtra</option>
    <option value="Manipur">Manipur</option>
    <option value="Nagpur">Nagpur</option>
    <option value="Meghalaya">Meghalaya</option>
    <option value="Mizoram">Mizoram</option>
    <option value="Punjab">Punjab</option>
     <option value="Rajasthan">Rajasthan</option>
    <option value="Sikkim">Sikkim</option>
    <option value="Tamil Nadu">Tamil Nadu</option>
    <option value="Uttar Pradesh">Uttar Pradesh</option>
    <option value="Uttarakhand">Uttarakhand</option>
    <option value="Dehradun">Dehradun</option>
  </select>

  <select name="utype">
    <option value="seller">Seller</option>
    <option value="buyer">Buyer</option>
  </select>

	<br><input type="submit" id="submit" value="Sign Up" name="signup">

	<a href="home.php"  id="forget">Return to homepage</a>

</form>

</div>

</div>
</body>
</html>