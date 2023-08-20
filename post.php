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
session_start();

if(isset($_POST['logout']))
{
  unset($_SESSION["uname"]);
  unset($_SESSION["passowrd"]);
  header("Location: signin.php");
}

if(!empty($_SESSION['uname'])&&!empty($_SESSION['passowrd'])&&!empty($_SESSION['utype']))
{
   $uname=$_SESSION["uname"];
   $pwd= $_SESSION["passowrd"];
   $utype=$_SESSION["utype"];
   // echo $uname ."pass  ". $pwd." ".$utype;
    $sql= "select * from register where uname= '$uname' and password='$pwd'";
    //echo $sql ;
    $row_count=$conn->query($sql);
      if ($row_count->num_rows > 0)
      {
        $row=$row_count->fetch_assoc();
        $Mnumber=$row['number'];
        $loc=$row['loc'];
        $addr=$row['addr'];
        $Email=$row['email'];
        $id=$row['id'];
        $cname=$row['fname'];
        //echo "success";
        
      }
        
}
else
{
  /*$uname=$_SESSION["uname"];
   $pwd= $_SESSION["passowrd"];
   $utype=$_SESSION["utype"];
    echo $uname ."  ". $pwd." ".$utype;*/
  header("Location: signin.php"); 
}



if(isset($_POST['post']))
{
  //echo "hi";
  $filename = $_FILES['photo']['name'];
  $filetmpname = $_FILES['photo']['tmp_name'];
  $folder = 'img/';
  //echo $filename;
  //$target = "img/".basename($_FILES['photo']['name']);


   $cat=$_POST['Category'];
   $tit=$_POST['ad_title'];
   //$photos =$_FILES['photo']['name'];
   $describ =$_POST['description'];
   $Price =$_POST['price'];
   //$cname =$_POST['contact_name'];
   

//echo $cat." , ". $title." , ". $photos." , ".$desc ." , ".$price ." , ".$cname." , ".$email." , ".$mnum." , ".$addr;
   //$sql="insert into post(cat, tit, photos, desc, price, cname, email, mnum, addr) values('$cat','$tit','$photos','$desc',$price,'$cname','$email',$mnum,'$addr')";

   move_uploaded_file($filetmpname, $folder.$filename);

   $sql="insert into post(cat,tit,photos,describ,Price,cname,Email,Mnumber,loc,addr,sellerid) values('$cat','$tit','$filename','$describ',$Price,'$cname','$Email',$Mnumber,'$loc','$addr',$id)";
   //echo $sql;

   if ($conn->query($sql)===TRUE)
  {
    echo "successfully";

    header("Location:thankspost.php");

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
	<title> Post and Sale </title>
  <link rel="stylesheet" href="style.css">
    <link href="_css/post.css" rel="stylesheet" type="text/css">
	<link href="_css/homepage.css" rel="stylesheet" type="text/css"/>
	<link href="_css/header.css" rel="stylesheet" type="text/css">
	<link  href="_css/foot.css" rel="stylesheet" type="text/css">
    
<!--/*colors used:
#b07df4
#d0affd */-->
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
            <img src="image/giphy.gif" alt="">
            </div>
<div id="body">
<div id="maincontent">
<div id="topheading">
<p> Post a Free Add</p>
</div>
<div id="allform">
<form name="thankspost" method="post" action="" enctype="multipart/form-data">
<table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" class="text" style="text-align:center;"><span style="color:red;">NOTE:</span> Feilds with <span style="color:red;">*</span> feilds are compulsory<br/><span></span></td>
    
  </tr>
  
  <tr style="height:60px;">
    <td width="150" class="text">Category you choosed</td>
    <td width="500" class="textwithbg"> <div class="dropdown">
 <div class="custom-select" style="width:200px;">
  <select name="Category">
    <option value="">Select:</option>
    <option value="Vehicles">Vehicles</option>
    <option value="Electronic">Electronic</option>
    <option value="furniture">furniture</option>
    <option value="Pets">Pets</option>
    <option value="Others">Others</option>
  </select>
</div>
</td>
 
  <tr>
    <td width="150" class="text"><span style="color:red;">*</span>Ad title:</td>
    <td ><input name="ad_title"  class="textfeilds" required type="text" placeholder="Write exact title as your product name or model" maxlength=" 70" size="70"></td>
  </tr>
   <tr>
    <td width="150" class="text"><span style="color:red;">*</span>Ad Photos:</td>
   <td><label for="photo"></label>
     <input type="file" name="photo" id="photo">
     <br/><span class="valid"></span></td>
  </tr>
  </tr>
   <tr>
    <td width="150" class="text">Description for your ad:</td>
   <td ><textarea name="description" cols="" rows=""  required type="text" class="textarea" placeholder="Describe what makes your ad unique, and the person watching it can easily understand it."> </textarea></td>
  </tr>
  </tr>
  </tr>
   <tr>
    <td width="150" class="text">Price:</td>
   <td style="font-size:12px; font-family:'Times New Roman';" > <p> Write price according to indian currency <input name="price" type="number" size="20" maxlength="50"  id="currency" placeholder="example: 50.00" required="required"> .OO Rupees</td>
  </tr>
</table>

  
  <tr>
    <td></td>
    <td ><input type="submit" id="submit" name="post" value="Post" ><input type="hidden"  value="mmm" ></td>
  </tr>
</table>


</form>			
</div>	
  </div>
	
</div>

<?php include("_includes/ender.php"); ?>

</body>

</html>