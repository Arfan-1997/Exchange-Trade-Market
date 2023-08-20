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

if(isset($_POST['logout']))
{
  unset($_SESSION["uname"]);
  unset($_SESSION["passowrd"]);
  header("Location: signin.php");
}
if(isset($_POST['delete']))
{
  $item_id=$_POST['delete'];
  //echo $item_id;
  $delete_query="delete from post where itemid=$item_id";
  //echo $delete_query;
  if ($conn->query($delete_query) === TRUE) 
  {
      //echo "Record deleted successfully";
  } 
  else 
  {
  echo "Error deleting record: ".$delete_query."  " . $conn->error;
  }
}
if(isset($_POST['buyer_post']))
{
    header("Location:signup.php");
}

 $uname=$_SESSION["uname"];
 $pwd= $_SESSION["passowrd"];
 $utype=$_SESSION["utype"];
//echo $uname ."  ". $pwd." ".$utype;
$sql= "select * from register where uname= '$uname' and password='$pwd'";
//echo $sql ;
$row_count=$conn->query($sql);
  if ($row_count->num_rows > 0)
  {
    $row=$row_count->fetch_assoc();
    $id=$row['id'];
    //echo "success";
    //header("Location: home2.php"); 
    

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
    <body><form method="POST">
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
  
  <?php
        if($utype=='seller')
        {
  ?>

<div class="dropdown">
  <button class="dropbtn">POST</button>
  <div class="dropdown-content">
    <a href="post.php">Sell the product</a>
   
  </div>
</div>
  <?php
}
else if($utype=='buyer')
{
?>

<button class="dropdown dropbtn" id="buyer_post" name="buyer_post">POST</button>

<?php
}

  ?>
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
                    <p>We have the best product in the best price</p>
                </div>


                 <form class="mb-0" method="post" name="search" >
                                <div class="form-box search-properties">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="catogory" id="catogory">
                                                        <option value="">Select Catogory</option>
                                                        <option value="Vehicles">Vehicles</option>
                                                        <option value="Electronic">Electronic</option>
                                                        <option value="furniture">furniture</option>
                                                        <option value="Pets">Pets</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="type" id="type" required="true">
                                                        <option value="">Select Location</option>
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
                                            </div>
                                        </div>
                                       
                                       
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <input type="submit" value="Search"   id="search" class="btn btn--primary btn--block">
                                        </div>
                                      
                                      
                                    </div>
                                    <!-- .row end -->
                                </div>
                                <!-- .form-box end -->
                            </form>
            </div>
            <div id="filter">
                <?php
                    if($utype=='buyer')
                    {
                ?>
                <div id="result">
               <?php 
                            $query="select * from post order by Price asc";
                            $query_execute=$conn->query($query);
                            if($query_execute->num_rows>0)
                            {
                ?>
                <div class="container">
                    <div class="row">
                        <?php
                            while($rows=$query_execute->fetch_assoc())
                            {
                        ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="thumbnail">
                                <a href="show.php?id=<?php echo $rows['itemid']?>">
                                    <img src="img/<?php echo $rows['photos']?>" alt="Cannon" style="height: 200px;width: 230px;">
                                </a>
                                <center>
                                    <div class="caption">
                                        <h3><?php echo $rows['tit']?></h3>
                                        <p>Price: Rs. <?php echo $rows['Price']?></p>
                                        
                                            <p><a href="show.php?id=<?php echo $rows['itemid']?>" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                            
                                        
                                    </div>
                                </center>
                            </div>
                            
                        </div>
                        <?php
                                }
                            ?>
                        
                    </div>



                </div>
                <?php
                    }
                ?>
           </div>
           <?php
                }
           else if($utype=='seller')
           {
            ?>
            <!--*****************************seller section  -->
            <div id="result">
               <?php 
                            $query="select * from post where sellerid=$id order by Price asc";
                            $query_execute=$conn->query($query);
                            if($query_execute->num_rows>0)
                            {
                ?>
                <div class="container">
                    <div class="row">
                        <?php
                            while($rows=$query_execute->fetch_assoc())
                            {
                        ?>
                        <div class="col-md-3 col-sm-6">
                            <form method="POST">
                            <div class="thumbnail">
                                <a href="show.php?id=<?php echo $rows['itemid']?>">
                                    <img src="img/<?php echo $rows['photos']?>" alt="Cannon" style="height: 200px;width: 230px;">
                                </a>
                                <center>
                                    <div class="caption">
                                        <h3><?php echo $rows['tit']?></h3>
                                        <p>Price: Rs. <?php echo $rows['Price']?></p>
                                        
                                           <p><a href="edit.php?id=<?php echo $rows['itemid']?>" role="button" class="btn btn-primary btn-block">Update</a></p> 
                                           <button class="btn btn-primary btn-block delete" name="delete"  value="<?php echo $rows['itemid']?>">Delete</button></p>
                                        
                                    </div>
                                </center>
                            </div>
                            </form>
                        </div>
                        <?php
                                }
                            ?>
                        
                    </div>



                </div>
                <?php
                    }
                ?>
           </div>

        <?php
           }
           ?>
        
        </div>    





<footer id="contactus" style="background-color:lightgrey;">
    
   <body>
<div class="wrapper">
            <div style="height: 30px;width: 50px;" >
                <img src="image/c83743742baaaf9c-contact-us-gif-gif-images-download.gif" style="width:280px;height:250px"; alt="">
            </div>

    <div class="container row" style="width:100%">
    <div class="col-md-4 col-md-offset-2">
    
    <p style="color: Red" class="footer-links">
            <a style="color: Red" href="home2.php"><h4> Home</h4></a>  
        </p>
            <h3 style="color: blue"><a href="about.php"> Developed by <h4 style="font-family:audiowide;display:inline">Sheikh Mohammed Arfan</h4> </a></h3>
        
          
        
        
    </div>
    
    
    <div class="col-md-3 col-md-offset-3">
            <div id="contact" class="container-fluid bg-grey">
                            <h2 class="text-center " style="font-family:Comfortaa;color:darkblue">CONTACT US</h2>
  
   <br>
    <div >
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><h4 class="text-center " style="font-family:Comfortaa;color:maroon">Name:Sheikh mohammed arfan</h4>
      <p><h4 class="text-center " style="font-family:Comfortaa;color:black">Phone no: +917090128600 </h4>
      <p><h5 class="text-center " style="font-family:Comfortaa;color:black">Email ID:arfansma7@gmail.com</h5>
    </div>
    
  
</div>
</div>
    
    </div>
    
    

    
</footer>   

 
        

 </div></form>
    </body>
    <script type="text/javascript">
         $(".delete").on('click',function()
        {
          return confirm('Are you sure you want do delete ?');
        });

         $("#buyer_post").on('click',function()
         {
            return confirm('register as a seller');
            //window.location.replace("signup.php");
         });


        $("#search").on('click',function(e)
        {
            catogory=$("#catogory").val();
            state=$("#type").val();
            e.preventDefault();
            //alert(state);
            $.ajax(
            {
                 url:"filter.php",
                method:"POST",
                data:{state:state,catogory:catogory},
                dataType :"html",
                success:function(data)
                {
                    $('#filter').html(data);
                }
            });

        });
    </script>
</html>
<?php
}
else
{
  header("Location: signin.php");
}
?>        











