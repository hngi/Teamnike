<?php include ('searchDB.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solar Service Vendor Search</title>
    <!--Bootstrap css-->
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <!-- Font Awesome-->
    <script src="./JS/all.js"></script>
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">  -->
    <link rel="stylesheet" href="./CSS/main.css">
    
</head>
<body>
    <!--Navbar-->
    <div class="container-1">
        <div class = "navbar row flex-row justify-content-center">
            <div>
                HNGi6 Team Nike
            </div>
            <div id = "doc-title">
                <a href="index.html"><h5>Calculate Solar Power Requirements for Your Home</h5></a>
            </div>
            <div id = "doc-title">
                    <a href="vendors_signup.php"><h5>Solar Power Provider? Register Your Business here</h5></a>
            </div>
           
    </div>
    <!---search Section-->
   <section class="showcase-1">
        <div class="container">
           <div class="row height-2 align-items-center text-center justify-content-center " >
               <div class="col-md-8">
                   <h1 class="text-white font-weight-bold">Find A Solar Power Service Provider in Your Area</h1>
                   <form method="POST" action="search.php" class="form-inline p-3">
                   
                            <input type="text" name="search" id="search" class="form-control form-control-lg text-muted border-warning rounded-0" style="width:80%" placeholder="Enter your location ">
                            <button type="submit" name="submit" class="btn btn-warning btn-lg rounded-0" style="width:20%"><i class="fas fa-search"></i></button>
                           
                        
                            
                    </div>
                    </form>
               </div>
           </div>
       </div>
   </section>
   <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <?php
                       /*  $record_per_page = 5;
                        $page = '';
                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                        }else {
                            $page =1;
                        }

                        $start_from = ($page-1)*$record_per_page; */
                        // checking if a value is entered into search bar
                        if(!isset ($_POST['submit'])){
                         echo '';
                        }else {
                         $q = $_POST['search'];
                         if($_POST['search'] == ''){
                            header('location: search.php');
                        }
                            // geting results from data base
                         $query = "SELECT * FROM vendors_details WHERE businessName LIKE '%$q%' OR product LIKE '%$q%' OR address LIKE '%$q%' OR state LIKE '%$q%' OR phone LIKE '%$q%' OR email LIKE '%$q%' ";
                         $result = mysqli_query($db, $query);
                         $num_rows = mysqli_num_rows($result);
                         ?>
                         <p><strong><?php echo $num_rows; ?></strong> results for <?php echo $q; ?></p>
                         <?php
                         while($row = mysqli_fetch_array($result)){
                             $id = $row['id'];
                             $businessName = $row['businessName'];
                             $product = $row['product'];
                             $state = $row['state'];
                             $address = $row['address'];
                             $phone = $row['phone'];
                             $email = $row['email'];
                            
                             echo '<h3>' . $businessName . '</h3><p>' . $product . '</p><p>' . $address . '</p><p>' . $state . '</p><p> ' . $phone . '</p><p>' . $email .  '</p><br>';
                         }

                        }
                    ?>
                </div>
            </div>
        </div>
   </section>
  





    <!--jquery-->
 <script src="./JS/jquery-3.4.1.min.js"></script>
    <!--bootstrap js-->
 <script src="./JS/bootstrap.bundle.min.js"></script>   
</body>
</html>
