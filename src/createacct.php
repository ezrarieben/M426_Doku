<?php
    require_once 'controller/CreateAcctController.php';
    $controller = new CreateAcctController();
?>
<!DOCTYPE html>
<html>
<head>
	<!--
		Lots of Stuff will  be added here later.

		Just a little prototype

	-->
	<title>Neuer Benutzer registrieren</title>
</head>
<body>
	<?php
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
</body>
</html>
