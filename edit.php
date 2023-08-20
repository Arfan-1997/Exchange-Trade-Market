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

if(!empty($_GET['id']))
{
  $id=$_GET['id'];

  if(isset($_POST['save']))
    {

      $db_image=$_POST['db_image'];
        $cat=$_POST['Category'];
       $tit=$_POST['ad_title'];
       //$photos =$_POST['photo'];
       $describ =$_POST['description'];
       $Price =$_POST['price'];
       $cname =$_POST['contact_name'];
       $Email =$_POST['email'];
       $number =$_POST['m_number'];
       $loc=$_POST['Location'];
       $addr =$_POST['address'];
      
      $filename = $_FILES['photo']['name'];
      $filetmpname = $_FILES['photo']['tmp_name'];

      echo $filename;
      if($filename!="")
      {
        
        $folder = '../img/';
        move_uploaded_file($filetmpname, $folder.$filename);
        $update_query="update post set cat='$cat',tit='$tit',photos='$filename',describ='$describ',Price=$Price,cname='$cname',Email='$Email',Mnumber=$number,loc='$loc',addr='$addr' where itemid=$id";
        
      }
      else
      {          
          $update_query="update post set cat='$cat',tit='$tit',describ='$describ',Price=$Price,cname='$cname',Email='$Email',Mnumber=$number,loc='$loc',addr='$addr' where itemid=$id";
      }      
       //echo $filetmpname ."<br>";
        //echo $folder.$filename;

       //echo $cat ." ".$tit ." ". $filetmpname ." ".$describ ." ".$Price ." ". $cname ." ".$Email ." ".$number ." ".$loc ." ".$addr;       
       echo $update_query;
       if ($conn->query($update_query)===TRUE)
      {
        header("Location:thankspost.php");
        exit();
               
      }
      else
      {
        //echo "error";
        echo "Error :" .$update_query. "<br>" .$conn->error;
      }
    }


  $query="select * from post where itemid=$id"; 
  //echo $query;
  $query_execute=$conn->query($query);
  if($query_execute->num_rows>0)
  {
   $rows=$query_execute->fetch_assoc();
  }
  
 

?>




<html> 
<head>
  <title> Post and Sale </title>
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

<div id="body">
<div id="maincontent">
<div id="topheading">
<p> User update</p>
</div>
<div id="allform">
<form   method="post" action="" enctype="multipart/form-data">
<table width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" class="text" style="text-align:center;"><span style="color:red;">NOTE:</span> Feilds with <span style="color:red;">*</span> feilds are compulsory<br/><span></span></td>
    
  </tr>
  
  <tr style="height:60px;">
    <td width="150" class="text">Category you choosed</td>
    <td width="500" class="textwithbg"> <div class="dropdown">
 <div class="custom-select" style="width:200px;">
  <select name="Category">
    <option value="<?php echo $rows['cat']?>"><?php echo $rows['cat']?></option>
    <option value="Vehicles">Vehicles</option>
    <option value="Electronic">Electronic</option>
    <option value="furniture">furniture</option>
    <option value="Pets">Pets</option>
    <option value="Others">Others</option>
  </select>
</div>
</td>
 
  <tr>
    <td width="150" class="text"><span style="color:red;"></span>Ad title:</td>
    <td ><input name="ad_title"  class="textfeilds" value="<?php echo $rows['tit']?>" required type="text" placeholder="Write exact title as your product name or model" maxlength=" 70" size="70"></td>
  </tr>
   <tr>
    <td width="150" class="text"><span style="color:red;">*</span>Ad Photos:</td>
  <!-- <td><label for="photo"></label>
     <input type="file" name="photo" id="photo" value="<?php echo $rows['photos']?>">
     <br/><span class="valid"></span></td> -->

     <td id="show_img"><img style="width: 150px;height: 100px;" src="img/<?php echo $rows['photos']?>">(Previous image)<br>
      <input type="file" name="photo" id="photo">(Changed image)
      <input type="hidden" name="db_image" value="<?php echo $rows['photos']?>">
     </td>
     
     
  </tr>
  </tr>
   <tr>
    <td width="150" class="text">Description for your ad:</td>
   <td ><textarea name="description" cols="" rows=""  required type="text" class="textarea" placeholder="Describe what makes your ad unique, and the person watching it can easily understand it."><?php echo $rows['describ']?> </textarea></td>
  </tr>
  </tr>
  </tr>
   <tr>
    <td width="150" class="text">Price:</td>
   <td style="font-size:12px; font-family:'Times New Roman';" > <p> Write price according to indian currency <input name="price" type="number" value="<?php echo $rows['Price']?>" size="20" maxlength="50"  id="currency" placeholder="example: 50.00" required="required"> .OO Rupees</td>
  </tr>
</table>
<div id="sellerinfo">
<p> Seller information</p>
</div>
<table width="100%" cellspacing="0" cellpadding="0">
 <tr>
    <td width="150" class="text">Contact name:</td>
    <td ><input name="contact_name"  class="textfeilds" type="text" value="<?php echo $rows['cname']?>" placeholder="Your name through which the caller pronounce you" maxlength=" 70" size="70" required type="text"></td>
  </tr>
  
  <tr>
    <td width="150" class="text"><span style="color:red;">*</span>Email:</td>
    <td ><input name="email" required  class="textfeilds" type="email" value="<?php echo $rows['Email']?>" placeholder="Enter a valid email address." maxlength=" 70" size="70"><br/><p style="font-size:12px; background: #FFF url(_images/emailshare.png) no-repeat; padding-left:20px;">Your email address wont be shared </p></td>
  </tr>
  
   <tr>
    <td width="150" class="text">Mobile Number:</td>
    <td ><input type="text" name="m_number" value="<?php echo $rows['Mnumber']?>" reqiured class="textfeilds" placeholder="Example:9945461596" maxlength="10" size="70"  type="number" required="required"></td>
  </tr>
    </tr>
  

   <tr style="height:60px;">
    <td width="150" class="text">STATE</td>
    <td width="800" class="textwithbg"> <div class="dropdown">
 <div class="custom-select" style="width:200px;">
  <select name="Location">
    <option value="<?php echo $rows['loc']?>"><?php echo $rows['loc']?></option>
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
</div>
</td>

   <tr>
    <td width="150" class="text">Ad Address:</td>
    <td ><input name="address"  class="textfeilds" type="text" value="<?php echo $rows['addr']?>" placeholder="Enter you address where you can provide the product" maxlength=" 70" size="70" required="text"></td>
  </tr>
  
 
<tr>
    <td></td>
    <td ><input type="submit" id="submit" name="save" value="Save" ><input type="hidden"  value="mmm" ></td>
  </tr>
</table>


</form>     
</div>  
  </div>
  
</div>
  <?php
    

  ?>   
     <!-- Footer -->
     <?php include("_includes/ender.php"); ?>




</body>

</html>
<?php
}
else{
  echo "string";
}
?>