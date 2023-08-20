<?php

$host="localhost";
$user="root";
$password="";
$db="XTM";
$conn = new mysqli($host, $user, $password,$db);
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
session_start();
$count=0;

if(isset($_POST['login']))
{
  $count=1;
  //echo "hello";
  $uname=$_POST['username'];
  $pwd =$_POST['password'];
  //echo $uname ."  ". $pwd;
  $sql="select * from register where uname= '$uname' and password='$pwd'";
  $row_count=$conn->query($sql);
  if ($row_count->num_rows > 0)
  {
    $row=$row_count->fetch_assoc();
    $utype=$row['utype'];
    $email=$row['email'];

  
    echo "success";   
    $_SESSION["uname"]=$uname; 
    $_SESSION["passowrd"]=$pwd;
    $_SESSION["utype"]=$utype;
    header("Location: home2.php");
  }
  else
  {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: signin.php");
    //$count=0;
  }
}


?>




<html> 
<head>
  <title> Post and Sale </title>
  
  
  <link href="_css/signin.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="signinbody">

<div id="signininimage">
  <a href="signin.php" ><img src="_images/signin.png" width="150" height="150" alt="signin image"></a> 
  <br/> <span style="color:red; line-height:40px; font-family:'Comic Sans MS', cursive; font-size:12px;"> </span>
  </div>
<div id="sheading">
  <p> Log into your account....</p>
</div>
<div id="textfeildbg">
<form name="signin" method="post" action="">
  <?php
    if($count==0)
    {

  ?>
    <input  type="text" placeholder="Username" name="username" id="textfeilds" >
    
    <input type="password" placeholder="Password(min. 6 characters)" name="password" maxlength="50" id="password">
  <input name="login" type="hidden" value="mmm">
  <input type="submit" id="submit" value="Log In" name="login" >
    
    <a href="home.php"  id="forget">Return to homepage</a>
   <?php
  }
  else if($count==1)
    {
    ?>
    <input type="hidden" name="hidden_uname" value="<?php echo $row['uname']; ?>">
    <input type="hidden" name="hidden_pwd" value="<?php echo $row['password']; ?>">
    <input type="hidden" name="hidden_email" value="<?php echo $row['email']; ?>">
    <input  type="text" placeholder="enter OTP" name="otp" id="textfeilds" >
    <input type="submit" id="submit" value="Log In" name="submit" >


    <?php

    }
    else if($count==2)
    {
      ?>
      <input  type="text" placeholder="enter OTP" name="otp" id="textfeilds" >
    <input type="submit" id="submit" value="Log In" name="submit" >

    <?php
    }
?>
</form>

</div>
</div>