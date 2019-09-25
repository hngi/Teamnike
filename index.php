<?php 

    $electronics = "";
    $power = "";
    $hours = "";
    $errors = array();





    if(isset($_POST['calculate'])){
    $electronics = $_POST['electronics'];
    $power = $_POST['power'];
    $hours = $_POST['hours'];
    

    if(empty($electronics) || empty($power) || empty($hours)){
        array_push($errors, "All fields are required");
    }

    





    }
                    
                    
                    
                    
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/ff34a722c8.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="rows.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Solar Calculator</title>
</head>
<body>
    <div class="container"> 
        <header class="header">
            <h2>Team Nike</h2>
        </header>
        <div class="wrapper">
            <div class="body-head">
            <h1>Solar Calculator</h1>
            <p class="tagline">Calculate the amount of Solar Power you need to run your electronics</p>
            </div>
            <br>
            <div class=js-container>
            <?php include ('errormsg.php'); ?>
                <form method="POST" action="" >
                <div class="input-container">
                    <div class="box-1">
                    <Label><strong class="label">ELECTRONICS</strong></Label><br>
                    <input type="text" name="electronics" id="electronics" placeholder="Enter Name of Electronics">
                    </div> 
                    <div class="box-2">
                    <Label><strong class="label">WATTAGE</strong></Label><br>
                    <input type="number" name="power" id="power" placeholder="Enter Amount in Watts">
                    </div>
                    <div class="box-3">
                    <Label><strong class="label">HOURS IN USE</strong></Label><br>
                    <input type="number" name="hours" id="hours" placeholder="Enter No. of Hours">
                    </div> 
                    <div class="box-4">
                    <a href="#" id="add"><i class="fas fa-plus-circle fa-2x"></i></a>
                    </div>
                </div>
                    <br>
                    <div class="compiler">
                    <?php 
                                            
                    
                    
                    
                    ?>
                </div>

                    <br>
                    <div class="button">
                    <button class="calculate" name="calculate" class="full">Calculate</button>
                    </div>
                
                                     
                </form>
                <br>
                
                 
                    
 
               
            </div>
        </div>
    </div>
    
</body>





<footer class="footer"> <p>&copy; 2019 Team Nike.</p></footer>
</html>