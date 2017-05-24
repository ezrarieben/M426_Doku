<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once "controller/MarksController.php";

$markcontroller = new MarksController();

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<table border="2px solid">
    <?php
    foreach ($markcontroller->getMarks() as $mark) {
        ?>
            
        <tr>
            <td><?php echo $modulId->getModuleNumber() ?></td>
            <td><?php echo $modulId->getModuleName() ?></td>
        </tr>
        <tr>
            <td><?php echo $mark->getDescription(); ?></td>
            <td><?php echo $mark->getMark(); ?></td>
        </tr>

        <?php
    }
    ?>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
