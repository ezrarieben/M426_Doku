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
			Admin
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
			<a href="login.php"> LOGIN </a>
			<a class="active" href="admin.php"> ADMIN </a>
		</div>
	</head>
	<body style="background-color:#c4c4c4">
		<div class="container">
			<div style="margin: 100px"></div>
			<div class="notification" id="pause"></div>
		</div>
		<div id="border">
			<center>
			<h1 class="whitefont">Benutzer erfassen</h1>
			<form>
				<b>Vorname:</b><br>
				<input type="text" style="width:300px" name="vorname" placeholder="Max"><br>
				<b>Nachname:</b><br>
				<input type="text" style="width:300px" name="nachname" placeholder="Muster"></br>
				<b>E-Mail:</b><br>
				<input type="mail" style="width:300px" name="email" placeholder="Max.Muster@example.com"><br>
				<b>Passwort:</b><br>
				<input type="password" style="width:300px" name="passwort" placeholder="*******"><br>
				<b>Gruppe:</b><br>
				<input type="text" style="width:300px" name="gruppe" placeholder="Klasse"><br>
				<input type="submit" class="btn btn-default" value="Erfassen" />
			</form>
			</center>
			</br>
<?php
        error_reporting(E_ALL);
ini_set('display_errors', '1');
        /**
        *
        * TODO: Check if user is an admin and serve the page differently to non admins
        *
        */
        if (isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['passwd']) && isset($_POST['group'])) {
            $name = $controller->stripHtmlTags($_POST['name']);
            $firstname = $controller->stripHtmlTags($_POST['firstname']);
            $email = $controller->stripHtmlTags($_POST['email']);
            $password = crypt($_POST['passwd'], $controller->generateSalt());
            if (isset($_POST['isAdmin']) && $_POST['isAdmin'] == "true") {
                $isAdmin = true;
            } else {
                $isAdmin = false;
            }
            $groupName = $controller->stripHtmlTags($_POST['group']);
            if ($controller->createUser($name, $firstname, $email, $password, $isAdmin, $groupName)) {
                header("Location: createacct.php?success");
            } else {
                header("Location: createacct.php?error");
            }
        }
    ?>

<form action="?" method="POST">
                <label for="#name">Name</label>
                <input name="name" id="name" type="text" placeholder="Name">
                <label for="#firstname">Vorname</label>
                <input name="firstname" id="firstname" type="text" placeholder="Vorname">
                <label for="#email">E-Mail</label>
                <input name="email" id="email" type="email" placeholder="E-Mail">
                <label for="#passwd">Passwort</label>
                <input name="passwd" id="passwd" type="password" placeholder="Passwort">
                <label for="#group">Gruppe</label>
                <select name="group" id="group">
                        <?php
                $groups = $controller->retreiveGroups();
                foreach ($groups as $group) {
                    echo "<option value='".$group."'>".$group."</option>";
                }
            ?>
                </select>
                <label for="#isAdmin">Ist der Nutzer Admin?</label>
                <input type="checkbox" name="isAdmin" id="isAdmin" value="true">
                <input type="submit" value="Benutzer erstellen">
        </form>

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
