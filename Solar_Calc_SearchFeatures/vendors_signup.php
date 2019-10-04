<?php include ('searchDB.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solar Service SignUp</title>
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
                <a href="index.html"><h5>Help your customers calculate requirement for their home here</h5></a>
            </div>
           
           
    </div>
    <!--- First Section-->
   <section class="showcase">
       <div class="container">
           <div class="row height align-items-center text-center justify-content-center " >
               <div class="col-md-9">
                   <h1 class="text-white font-weight-bold">Are You A Solar Power Service Provider?</h1>
                   <p class="text-white">Join us and let's help you triple your Revenue</p>
                   <a href="#section2" class="btn btn-warning text-uppercase font-weight-bold px-5 register">register with us</a>
                   
               </div>
           </div>
       </div>
   </section>
   <!-- End of First Section-->
   <!-- Form Section  Starts here-->
   <section>
       <br>
    <div class="container">
        <div class="row height-2 align-items-center text-center justify-content-center " >
            <div class="col-md-9  text-center text-dark">
                    <!-- Heading for form-->
                    <h2 class="text-capitalize text-dark" id="section2">register your business with us</h2>
                   
                <!-- card container for form-->    
                <div class="card card-body bg-warning">
                <?php include ('errormsg.php'); ?>
                <?php if($msg != ''): ?>
                    <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
                <?php endif; ?>
               
                    <form method="POST" action="">
                        <!-- Business name-->
                        <div class="form-group text-left mt-2">
                            <label class="text-muted">Business Name</label>
                            <input type="text" name="businessName" class="form-control form-control-lg" placeholder="Enter your Business Name">
                        </div>
                        <!-- Sevices-->
                        <div class="form-group text-left mt-2">
                            <label class="text-muted">What Solar Power Product or  Service do you provide?</label>
                            <input type="text" name="product" class="form-control form-control-lg text-muted" placeholder="e.g Solar Panels, Battery, Installation Services etc.">
                        </div>
                        <!-- State of business location-->
                        <div class="form-group text-left mt-2">
                                <label class="text-muted">State</label>
                                <select name="state" class="form-control form-control-lg">
                                    <option value="Select your State">Select your State</option>
                                    <option value="Abia">Abia</option>
                                    <option value="Abuja">Abuja</option>
                                    <option value="Adamawa">Adamawa</option>
                                    <option value="Akwa Ibom">Akwa Ibom</option>
                                    <option value="Anambra">Anambra</option>
                                    <option value="Bauchi">Bauchi</option>
                                    <option value="Bayelsa">Bayelsa</option>
                                    <option value="Benue">Benue</option>
                                    <option value="Borno ">Borno </option>
                                    <option value="Cross River">Cross River</option>
                                    <option value="Delta">Delta</option>
                                    <option value="Ebonyi">Ebonyi</option>
                                    <option value="Edo">Edo</option>
                                    <option value="Ekiti">Ekiti</option>
                                    <option value="Enugu">Enugu</option>
                                    <option value="Gombe">Gombe</option>
                                    <option value="Imo">Imo </option>
                                    <option value="Jigawa">Jigawa</option>
                                    <option value="Kaduna">Kaduna</option>
                                    <option value="Kano">Kano</option>
                                    <option value="Katsina ">Katsina </option>
                                    <option value="Kebbi">Kebbi</option>
                                    <option value="Kogi">Kogi</option>
                                    <option value="Kwara">Kwara</option>
                                    <option value="Lagos">Lagos</option>
                                    <option value="Nasarawa">Nasarawa</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Ogun">Ogun</option>
                                    <option value="Ondo">Ondo</option>
                                    <option value="Osun">Osun</option>
                                    <option value="Oyo">Oyo</option>
                                    <option value="Plateau">Plateau</option>
                                    <option value="Rivers">Rivers</option>
                                    <option value="Sokoto">Sokoto</option>
                                    <option value="Taraba">Taraba</option>
                                    <option value="Yobe">Yobe</option>
                                    <option value="Zamfara">Zamfara</option>
                                </select>
                        </div>
                        <!-- Address-->
                        <div class="form-group text-left mt-2">
                            <label class="text-muted">Address</label>
                            <input type="text" name="address" class="form-control form-control-lg text-muted" placeholder="Enter your Business Address here">
                        </div>
                        <!-- Phone number-->
                        <div class="form-group text-left mt-2 mb-0">
                            <!-- Label for phone number input group-->
                            <label class="text-muted">Phone Number</label>
                        </div>
                        <!-- phone number input group to aid prepending with icon-->
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span><i class="fas fa-phone"></i></span>
                                </div>
                            </div>
                            <input type="number" name="phone" class="form-control form-control-lg text-muted" placeholder="Enter your Business Phone Number here">
                        </div>
                        <!--Phone number ends here-->
                        <!-- Email-->
                        <div class="form-group text-left mt-2 mb-0">
                            <!-- Label for email input group-->
                            <label class="text-muted">Email</label>
                        </div>
                        <!-- email number input group to aid prepending with icon-->
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span><i class="fas fa-at"></i></span>
                                </div>
                            </div>
                                <input type="email" name="email" class="form-control form-control-lg text-muted" placeholder="Enter your Business Email here">
                        </div>
                         <!--Email ends here-->
                         <!-- Password-->
                        <div class="form-group text-left mt-2 mb-0">
                            <!-- Label for password input group-->
                            <label class="text-muted">Password</label>
                        </div>
                              <!-- Password input group to aid prepending with icon-->
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span><i class="fas fa-lock"></i></span>
                                    </div>
                                </div>
                                    <input type="password" name="password1" class="form-control form-control-lg text-muted" placeholder="Enter Password">
                            </div>
                            <!-- Password ends here-->
                            <!-- Confirm password-->
                        <div class="form-group text-left my-3">
                            <label class="text-muted">Confirm Password</label>
                            <input type="password" name="password2" class="form-control form-control-lg text-muted" placeholder="Confirm Password">
                        </div>
                                              
                        <!-- Confirm password ends here -->
                        <button type="submit" name="signup"class="form-control form-control-lg btn btn-outline-secondary btn-block text-uppercase font-weight-bold text-dark">sign up</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Card container for form ends here-->
</section>
<!-- End of Form Section-->






    <!--jquery-->
 <script src="./JS/jquery-3.4.1.min.js"></script>
    <!--bootstrap js-->
 <script src="./JS/bootstrap.bundle.min.js"></script>   
</body>
</html>