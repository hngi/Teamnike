<?php

$data = json_decode(file_get_contents("users.json"), true);
// Start session
session_start();
if (isset($_SESSION['Username'])) {
	$user['Username'] = $_SESSION['Username'];
} else {
	header('location: login.php');
	exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Nike Solar Calculator</title>
	<link rel="stylesheet" href="styles/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="nav.css">
</head>

<body>
	<nav>
		<div class="logo">
			<p>NIKE</p>
		</div>
		<div class="navItems">
			<a href="index.php">Home</a>
			<a href="doc.html">Documentation</a>
			<a href="faq.html">Faq</a>
			<a href="contact form.html">Contact us</a>
			<a class="btn btn-sm btn-danger" href="logout.php">Logout</a>
		</div>
	</nav>
	<div class="container">

		<div id="legend">
			<h1> <span class="smalltitle">Solar</span> Calculator</h1>
		</div>
		<div>
			<p class="des-text">Calculate the average daily kWh per hour ouput in your home based on a well installed solar system</p>
		</div>
		<div class="row input_container inputform visible">
			<form class="form" method="post" action="" role="form">
				<div class="col-xs-12 col-sm-3">
					<h4>ELECTRONIC</h4>
					<!-- <label>Name of Electronic</label> -->
					<input maxlength="18" type="text" id="electronic" required class="form-control" name="electronic" placeholder="Name of Electronic">
				</div>

				<div class="col-xs-12 col-sm-3">
					<h4>POWER USE</h4>
					<!-- <label>Amount in Watts</label> -->
					<input type="number" id="power_use" required class="form-control" name="power" placeholder="Amount in Watts">
				</div>

				<div class="col-xs-12 col-sm-3">
					<h4>HOURS IN USE</h4>
					<!-- <label>Number of Hours</label> -->
					<input type="number" id="hours_use" required class="form-control" name="hours" placeholder="Number of Hours">
				</div>
				<div class="col-xs-12 col-sm-3">
					<button class="add_btn" id="add_btn" type="button"><span class="plus-sign">+</span></button>
				</div>
			</form>
		</div>
		<div class="row input_container outputform hidden">
			<form class="form" method="post" action="" role="form">
				<div class="col-xs-12 col-sm-3">
					<h4>ELECTRONIC</h4>
					<input type="text" id="elect_edit" required class="form-control" name="electronic" placeholder="Name of Electronic">
				</div>

				<div class="col-xs-12 col-sm-3">
					<h4>POWER USE</h4>
					<!-- <label>Amount in Watts</label> -->
					<input type="number" id="power_edit" required class="form-control" name="power" placeholder="Amount in Watts">
				</div>

				<div class="col-xs-12 col-sm-3">
					<h4>HOURS IN USE</h4>
					<!-- <label>Number of Hours</label> -->
					<input type="number" id="hours_edit" required class="form-control" name="hours" placeholder="Number of Hours">
				</div>
				<div class="col-xs-12 col-sm-3">
					<button id="edit_btn" class="add_btn" type="button"><span class="glyphicon glyphicon-save">save</span></button>
				</div>
			</form>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="computed">
					<div id="electDetails">
					</div>

					<div class="cont">
						<span class="left">Total</span> = <span class="right" id="total">0Watts</span>
					</div>

				</div>
			</div>
		</div>
		<div>
			<button class="btn1" onclick="calcu_function()" data-toggle="modal" data-target="#myModal">Calculate</button>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog ">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">TOTAL SOLAR POWER NEEDED FOR YOUR USE</h4>
					</div>
					<div class="modal-body">
						<h1><span id="result"></span></h1>
						<p id="comments"></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="jquery/jquery.min.js"></script>
	<script src="styles/js/bootstrap.min.js"></script>
	<script src="action.js"></script>
</body>

</html>