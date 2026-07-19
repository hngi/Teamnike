<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Nike Solar Calculator</title>
	<link rel="stylesheet" href="styles/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="style.css"> -->
	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
	<style>
		* {
			padding: 0;
			margin: 0;
			font-family: 'Open Sans', sans-serif;
			font-weight: normal;
		}

		label {
			text-transform: uppercase;
		}

		input.form-control {
			padding: 20px;
			border-radius: 3px;
			/* border: 0; */
		}

		button.btn.btn-primary {
			ont-weight: 600;
		}

		.btn.btn-primary {
			width: 100%;
			text-transform: uppercase;
			letter-spacing: 2px;
			background-color: #c0392b;
			border: 0;
			border-radius: 3px;
			padding: 10px;
		}

		.hero {
			background: url('image/0001-img.jpg');
			/* background-color: #000; */
			background-position: center;
			background-size: cover;
			background-repeat: no-repeat;
			height: 400px;
			width: 55%;
		}

		.container {
			/* display: flex; */
			width: 350px;
			height: auto;
			margin: 5% auto;
			padding: 0;
			/* border: 1px solid #000; */
			background-color: #add8e6;
			box-shadow: 4px 3px 20px 0px black;
		}

		.card {
			padding: 3em 2em;
		}

		.tab {
			width: 100%;
			display: flex;
		}

		.tabReg,
		.tabLog {
			width: 50%;
			display: flex;
			justify-content: space-around;
			padding: 20px;
			color: #fff;
			font-size: 1em;
			text-transform: uppercase;
			font-weight: 600;
			letter-spacing: 2px;
			cursor: pointer;
			border: none;
		}

		.nonActiveTab {
			background-color: #c0392b;
			transition: 1s;
		}

		/* #signup {
			display: none;
		} */

		.logo {
			border: 3px solid #000;
			border-radius: 3px;
			padding: 1em 2em;
			display: flex;
			align-items: center;
			justify-content: center;
			width: 50px;
			height: auto;
			box-sizing: border-box;
			margin: 45px auto 0 auto;
		}

		.logo p {
			font-weight: 900;
			margin: 0;
		}
	</style>

</head>

<body class="bg-secondary">

	<?php
	session_start();

	$msg = '';

	if (isset($_GET['signup'])) {
		if ($_GET['signup'] == 'success') {
			$msg = '<p style="color: green">Your account has been created successfully</p>';
			// echo 'hi';
		}
	}

	/* Trigger when the login btn is clicked */
	if (isset($_POST['login'])) {

		/* Fetch users.json file */
		$data = json_decode(file_get_contents("users.json"), true);

		/* Get form data */
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];

		/* Form validation */
		if (empty($email || $pwd)) {
			$msg = '<div class="alert alert-danger">Please fill in all fields</div>';
		} elseif (strlen($pwd) < 5) {
			$msg = '<div class="alert alert-danger">Password must be more than 5 character.</div>';
		} else {
			/* loop through the users.json data */
			foreach ($data['users'] as $user) {
				/* Check if pwd is valid & email is registered */
				if ($pwd !== $user['Password']) {
					$msg = '<div class="alert alert-danger">Password is incorrect.</div>';
				} elseif ($email !== $user['Email']) {
					$msg = '<div class="alert alert-danger">Email is not registered.</div>';
				} else {
					/* Login the user */
					if ($email === $user['Email'] && $pwd === $user['Password']) {
						$_SESSION['Username'] = $user['Username'];
						header('location: welcome.php');
						exit;
					}
				}
			}
		}
	}

	?>

	<div class="logo">
		<p>NIKE</p>
	</div>
	<div class="container">
		<div class="tab">
			<div class="tabLog nonActiveTab">Login</div>
		</div>
		<div class="card">
			<form class="card-body" method="post" action="login.php" enctype="multipart/form-data" id="login">
				<div class="invalid-feedback"><?php if (isset($msg)) {
													echo  $msg;
												} ?> </div>
				<div class="form-group"> 
					<label class="sr-only" for="uid">Email</label>
					<input class="form-control" type="text" name="email" placeholder="Email">
				</div>
				<div class="form-group">
					<label class="sr-only" for="pwd">Password</label>
					<input class="form-control" type="password" name="pwd" placeholder="Password">
				</div>
				<div class="form-group">
					<button class="btn btn-primary " type="submit" name="login">Login</button>
				</div>
			</form>
			<div style="font-size: 14px; color:#111; font-weight:500" class="lead text-white font-weight-bold">Don't have an account? <a style="color:#111; font-weight:500" href="register.php">Create an account!</a></div>
		</div>
	</div>

	<script src="jquery/jquery.min.js"></script>
	<script src="styles/js/bootstrap.min.js"></script>
	<script src="action.js"></script>
	
</body>

</html>