<?php

$host="localhost";
$user="root";
$password="";
$db="XTM";
$conn = new mysqli($host, $user, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['feed']))
{
 
 	 $cname=$_POST['scontact_name'];
  	 $email=$_POST['semail'];
  	 $smnum=$_POST['snumber'];
  	 $feedback=$_POST['fback'];
   

    $sql="insert into feed(cname,email,smnum,feedback) values('$cname','$email',$smnum,'$feedback')";

  	 if ($conn->query($sql)===TRUE)
 	 {
   		 echo "successfully";

    		header("Location:feedbackthank.php");

  	}
 	 else
  	{
  	  echo "Error: " . $sql . "<br>" . $conn->error;
 	 } 
}

$conn->close();
?>

<html> 
<head>
	<title> XTM Contact </title>
  <link rel="stylesheet" href="style.css">
    <link href="_css/post.css" rel="stylesheet" type="text/css">
	<link href="_css/homepage.css" rel="stylesheet" type="text/css"/>
	<link href="_css/header.css" rel="stylesheet" type="text/css">
	<link  href="_css/foot.css" rel="stylesheet" type="text/css">
    

	<script type="text/javascript">
function performClick(node) {
   var evt = document.createEvent("MouseEvents");
   evt.initEvent("click", true, false);
   node.dispatchEvent(evt);
}

var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);



</script>
<style type="text/css">
.valid{
	text-align:left;
	font-size:10px;
	font-family:"Comic Sans MS", cursive;
	color:#F00;	
	
}


</style>   
</head>


<body>
<div class="wrapper">
            <div class="logo">
            <img src="image/post%20and%20sale%20logo.png" alt="">
            </div>
<div id="body">
<div id="maincontent">
<div id="topheading">
<p> Feeback</p>
</div>
<div id="allform">
<form name="thankspost" method="post" action="" enctype="multipart/form-data">
<table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" class="text" style="text-align:center;"><span style="color:red;">NOTE:</span> Feilds with <span style="color:red;">*</span> feilds are compulsory<br/><span></span></td>
    
  </tr>
  
<div id="sellerinfo">
<p> User Feedback</p>
</div>
<table width="100%" cellspacing="0" cellpadding="0">
 <tr>
    <td width="150" class="text">Contact name:</td>
    <td ><input name="scontact_name"  class="textfeilds" type="text" placeholder="Your name through which the caller pronounce you" maxlength=" 70" size="70" required type="text"></td>
  </tr>
  
  <tr>
    <td width="150" class="text"><span style="color:red;">*</span>Email:</td>
    <td ><input name="semail" required  class="textfeilds" type="email" placeholder="Enter a valid email address." maxlength=" 70" size="70"><br/><p style="font-size:12px; background: #FFF url(_images/emailshare.png) no-repeat; padding-left:20px;">Your email address wont be shared </p></td>
  </tr>
  
   <tr>
    <td width="150" class="text">Mobile Number:</td>
    <td ><input type="text" name="snumber" reqiured class="textfeilds" placeholder="Example:9945461596" maxlength="10" size="70"  type="number" required="required"></td>
  </tr>
    </tr>
  

</td>

   <tr>
    <td width="150" class="text">Feedback:</td>
   <td ><textarea name="fback" cols="" rows=""  required type="text" class="textarea" placeholder="Describe what makes your ad unique, and the person watching it can easily understand it."> </textarea></td>
  </tr>
  
  <tr>
    <td></td>
    <td ><input type="submit" id="submit" name="feed" value="Submit" ><input type="hidden"  value="mmm" ></td>
  </tr>
</table>


</form>			
</div>	
  </div>
	
</div>


</body>

</html>
    




 
            <footer id="contactus" style="background-color:#F69824;"  >
    
   <body>
<div class="wrapper">
             <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="home2.php">
                                <img src="image/contact.gif" alt="Cannon" style="height: 200px;width: 230px;">
                            </a>
            </div>

    <div class="container row" style="width:300%">
    <div class="col-md-4 col-md-offset-2">
    
    <p style="color: Red" class="footer-links">
            <a style="color: Red" href="home2.php"><h4> Home</h4></a>  
        </p>
            <h3 style="color: aqua"><a href="about.php"> Developed by <h4 style="font-family:audiowide;display:inline">Sheikh Mohammed Arfan</h4> </a></h3>
        
          
        
        
    </div>
    
    
    <div class="col-md-3 col-md-offset-3">
            <div id="contact" class="container-fluid bg-grey">
                            <h2 class="text-center " style="font-family:Comfortaa;color:aqua">CONTACT US</h2>
  
   <br>
    <div >
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><h4 class="text-center " style="font-family:Comfortaa;color:maroon">Name:Sheikh mohammed arfan</h4>
      <p><h4 class="text-center " style="font-family:Comfortaa;color:white">Phone no: +917090128600 </h4>
      <p><h5 class="text-center " style="font-family:Comfortaa;color:red">Email ID:arfansma7@gmail.com</h5>
    </div>
    
  
</div>
</div>
    
    </div>
    
    

    
</footer>   	



</head>
</body>
</html>