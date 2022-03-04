<?php

include_once "../Management/EnrollSubject.php";
include_once "../Management/SubjectManager.php";

$subjectManager = new SubjectManager("../Management/data.json");
$enrollSubjects = $subjectManager->getAll();

session_start();
if (isset($_SESSION["user"])) {
    echo "Welcome " . $_SESSION["user"];
} else {
    header("location: log-in.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="css/Style.css">
<body>
<form action="" method="post">
    <button type="submit" name="log-out" id="logout">Log-out</button>
</form>
<form>
<div>
    <form>
        <table border="1px">
            <tr>
                <td>STT</td>
                <td>TERM</td>
                <td>PROGRAM</td>
                <td>STATUS</td>
                <td>DATE</td>
                <td colspan="2">Editor</td>
            </tr>
            <?php foreach ($enrollSubjects as $key => $enrollSubject) { ?>
            <tr>
                <td><?php echo $key + 1 ?></td>
                <td><?php echo $enrollSubject->getTerm()?></td>
                <td><?php echo $enrollSubject->getProgram()?></td>
                <td><?php echo $enrollSubject->getStatus()?></td>
                <td><?php echo $enrollSubject->getDate()?></td>
                <td><a href="../Management/delete.php?id=<?php echo $key ?>">Delete</a></td>
                <td><a href="../Management/edit.php?id=<?php echo $enrollSubject->getId() ?>">Edit</a></td>
            </tr>
            <?php } ?>
            <button id="add"><a href="../Management/add.php">ADD</a></button>
        </table>
    </form>
</div>
</form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["log-out"])) {
        session_destroy();
        header("location: log-in.php");
    }
}
?>
