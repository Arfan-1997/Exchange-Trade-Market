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


 $uname=$_SESSION["uname"];
 $pwd= $_SESSION["passowrd"];
//echo $uname ."  ". $pwd;
$sql= "select * from register where uname= '$uname' and password='$pwd'";
//echo $sql ;
$row_count=$conn->query($sql);
  if ($row_count->num_rows > 0)
  {
    $row=$row_count->fetch_assoc();
    //echo "success";
    //header("Location: home2.php"); 
    if(isset($_POST['logout']))
    {
      unset($_SESSION["uname"]);
      unset($_SESSION["passowrd"]);
      header("Location: home.php");
    }

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XTM-eXchange Trade Market</title>
    <link rel="stylesheet" href="style.css">
     <link href="assets/css/external.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body>
        <header>
        <div class="wrapper">
            <div class="logo" href="home2.php">
            <img src="image/post%20and%20sale%20logo.png" alt="">
            </div>
                <ul class="nav-area">
                    <div class="dropdown">
                  <button class="dropbtn">HOME</button>
                    <div class="dropdown-content">
                    <a href="home2.php">go to home
                        
                        </a></div></div>
                        
<div class="dropdown">
  <button class="dropbtn">POST</button>
  <div class="dropdown-content">
    <a href="post.php">Sell the product</a>
   
  </div>
                    </div>
  
                    <div class="dropdown">
  <button class="dropbtn">CONTACT US</button>
  <div class="dropdown-content">
    <a href="contact.php">go to contact</a>
     
  </div>
                    </div>
                    
                        <div class="dropdown">
  <button class="dropbtn">ABOUT US</button>
  <div class="dropdown-content">
    <a href="about.php">go to about</a>
   
  </div>
                    </div>         
                  
                                <div class="dropdown">
  <button class="dropbtn">ADMIN</button>
  <div class="dropdown-content">
    <a href="admin/login.php">go to admin log in</a>
  </div>
                               
                    </div>
                    
                   
                    
                   <div id="sign">
              <div id="register">
                   <ul class="nav-area">
             
                      <button><?php echo($row['fname']);?><br></button>
                  </ul>
                       </div>
                    
                     <ul class="nav-area">

                   
<div id="signin">
  <form method="POST">
    <!--<a  href="home2.php?signout" data-lightbox="si" >Login</a> -->
    <button name="logout">Logout</button>

  </form>
</div>
                    </ul>
                    
                    </div>               </ul>
        
                      
   <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>XTM Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>

           
            <div class="container">
                <div class="jumbotron">
                    <h1>Welcome to our XTM store!!!</h1>
                    <p>We have the best product in the best price,</p>
                    <p><h4>The scope of this application is to provide a user-friendly interface to the buyer and seller. The Internet is here to stay when the buyer and the seller will be online, and many businesses have made their first leap to the Internet with a website, and many other are now moving forward using the Internet, not only as an advertising and promotion platform but as an active business platform. In the current scenario, the shopping business is growing day by day. At the same time, they are trying to provide maximum facilities to the user.<h4></p>
                    <p><h4>“eXchange Trade Market “is a web application developed for “online buy and sell the product “easily. The main objective of the buy and sell the product online is to manage the seller details as to post the product detail, and the buyer detail is how to buy the product. The project is built at the administrative end and thus only the administrator is guaranteed the access authority. The purpose of the project is to build an application program to reduce manual work for managing the different categories of Products. It keeps all the information about the data.<h4></p></br>
                      <p><h4>•  Users will login using their credentials.</br>
                  <br>• Seller can add the Product available on a particular date with bust details such as Product Type, Product image,etc.</br>
                  <br>• They can also add offers for their Product. </br>
                  <br>• Buyers can search the Product availability of their preferred date, view the product information and offers. </br>
                  <br>• Buyer will log in using their credential.</br> 
                  <br>• Admin can view the product, and Product details and provide offers from their side.</br></h4>
                  </p>
                </div>
              </div>
            </div>
          </body>
        </div>
      </header>
    </body>
    </html>
    <?php
}
else
{
  header("Location: signin.php");
}
?>