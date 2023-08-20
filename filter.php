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

if(!empty($_POST))
{
	$state=$_POST['state'];
	$catogory=$_POST['catogory'];
	//echo $state ." ".$catogory;


?>
<!doctype html>
<html lang="en">
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
<div id="result">
           <?php 
           		if($catogory!=""&&$state=="")
           		{
           			$query="select * from post where cat='$catogory' order by Price asc";
           			//echo $query;
           		}
           		else if($catogory=="" && $state!="")
           		{
           			$query="select * from post where loc='$state'  order by Price asc";
           			//echo $query;
           		}
           		else if($catogory!="" && $state!="")
           		{
           			$query="select * from post where cat='$catogory' and loc='$state'  order by Price asc";
           			//echo $query;
           		}
           		else
           		{
           			$query="select * from post order by Price asc";
           			//echo $query;
           		}

                        
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
                else
                {
            ?>
                	<h3><center> No search result found </center></h3>"
            <?php
                }
            ?>
           </div>
    </body>
</html>
<?php
}
else
{
	header("Location: home2.php");
}
?>