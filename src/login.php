
<!DOCTYPE html>
<html>
<head>
	<!--
		Lots of Stuff will  be added here later.

		Just a little prototype

	-->
	<title>Login</title>
</head>
<body>
	<?php
    if (isset($_POST['email']) && isset($_POST['password'])) {
        require_once 'controller/LoginController.php';
        $controller = new LoginController();
        $email  = $controller->stripHtmlTags($_POST['email']);
        $password = $_POST['password'];

        $controller->setEmail($email);
        $controller->setPassword($password);
				echo $controller->checkUserLogin();
        if ($controller->checkUserLogin()) {
            header("Location: index.php");
        } else {
            header("Location: login.php?error=incorrectinfo");
        }
    }
    ?>
	<form action="?" method="POST">
		<label for="#email">E-Mail</label>
		<input name="email" id="email" type="email" placeholder="E-Mail">
		<label for="#password">Passwort</label>
		<input name="password" id="password" type="password" placeholder="Passwort">
		<input type="submit" value="Einloggen">
	</form>
</body>
</html>

<html style="color:#e7e7e7">
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!-- End Latest compiled and minified CSS -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>
			Login
		</title>
		<link rel="stylesheet" href="view.template/css/style.css">
		<link rel="stylesheet" href="view.template/css/bootstrap.css">
		<script  src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
		
		<!-- Navigationsleiste -->
		<div class="topnav" id="myTopnav" align="center">
			<h1 style="color:#c1b497;font-family:luxury;">S I E R R A</h1>
			<a href="index.php">HOME</a>
			<a href="noten.php">NOTEN</a>
			<a href="todolist.php"> TO-DO LIST </a>
			<a class='active' href="login.php"> LOGIN </a>
			<a href="admin.php"> ADMIN </a>
		</div>
	</head>
	<body style="background-color:#c4c4c4">
		<div class="container">
			<div style="color:black">
				<h1>Login</h1>
			</div>
			<div style="margin: 100px"></div>
			<div class="notification" id="pause"></div>
		</div>
		
		
		
		
		<!--JavaScript Start-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="view.template/js/bootstrap.js"></script>
		<!--JavaScript Ende-->
	</body>
	
	<div class="footer">
		
    <div class="footer_contents"><button id="btnchat" type="button" class="btn btn-primary">Chat</button></div>

</html>

