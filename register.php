
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

// Registration form
if (isset($_POST['reg'])) {
	$msg = ''; /* Error message */

	// get json file
	$user = json_decode(file_get_contents("users.json"), true);

	$uid = $_POST['uid'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$rtpwd = $_POST['cpwd'];

	if (empty($uid && $email && $pwd && $rtpwd)) {
		$msg = '<div class="alert alert-danger">Please fill in all fields</div>';
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$msg = '<div class="alert alert-danger">Invalid email address</div>';
	} elseif ($pwd != $rtpwd) {
		$msg = '<div class="alert alert-danger">Passwords don\'t match, check password again!</div>';
	} elseif (strlen($pwd) < 5) {
		$msg = '<div class="alert alert-danger">Password must be greater than 5</div>';
	} else {
		// $userData = json_decode($file, true);
		unset($_POST["reg"]);
		// $user["user"] = array_values($user["user"]);
		array_push($user["users"], [
			"Username" => $uid,
			"Email" => $email,
			"Password" => $pwd
		]);
		if (file_put_contents("users.json", json_encode($user))) {
			// Start session
			session_start();
			// Store session variable
			$user['Username'] = $_SESSION['Username'];
			header('Location: login.php?signup=success');
		}
	}
}

?>

	<div class="logo">
		<p>NIKE</p>
	</div>
	<div class="container">
		<div class="tab">
			<!-- <div class="tabLog nonActiveTab">Login</div> -->
			<div class="tabReg nonActiveTab">Signup</div>
		</div>
		<div class="card">
			<form class="card-body" method="post" action="register.php" enctype="multipart/form-data" id="signup">
				<div class="invalid-feedback"><?php if (isset($msg)) { echo  $msg; } ?> </div>
				<div class="form-group">
					<label class="sr-only" for="uid">Username</label>
					<input id="uid" class="form-control" type="text" name="uid" placeholder="Username">
				</div> 
				<div class="form-group">
					<label class="sr-only" for="email">Email</label>
					<input id="email" class="form-control" type="email" name="email" placeholder="Email">
				</div>
				<div class="form-group">
					<label class="sr-only" for="pwd">Password</label>
					<input id="pwd" class="form-control" type="password" name="pwd" placeholder="Password">
				</div>
				<div class="form-group">
					<label class="sr-only" for="cpwd">Confrim Password</label>
					<input id="cpwd" class="form-control" type="password" name="cpwd" placeholder="Confrim Password">
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit" name="reg" id="regBtn">Signup</button>
				</div>
			</form>
			<div style="font-size: 14px; color:#111; font-weight:500" class="lead text-white text-center font-weight-bold">Already have an account? <a style="color:#111; font-weight:500" href="login.php">Login!</a></div>
		</div>
	</div>

	<script src="jquery/jquery.min.js"></script>
	<script src="styles/js/bootstrap.min.js"></script>
	<script src="action.js"></script>
</body>

</html>