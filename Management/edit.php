<?php

include_once "EnrollSubject.php";
include_once "SubjectManager.php";

$subjectManager = new SubjectManager("data.json");
$enrollSubject = $subjectManager->getSubjectById($_GET["id"]);

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
<body>
<form method="post">
    <div>
        <fieldset>
            <legend><h2>Edit new term</h2></legend>
            <table>
                <tr>
                    <td>Term</td>
                    <td><input type="text" name="term" value="<?php echo $enrollSubject->getTerm() ?>" ></td>
                </tr>
                <tr>
                    <td>Program</td>
                    <td><input type="text" name="program" value="<?php echo $enrollSubject->getProgram()?>" ></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><input type="text" name="status" value="<?php echo $enrollSubject->getStatus()?>" ></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td><input type="date" name="date" value="<?php echo $enrollSubject->getDate()?>" ></td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">Save</button></td>
                </tr>
            </table>
        </fieldset>
    </div>
</form>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $term = $_REQUEST["term"];
    $program = $_REQUEST["program"];
    $status = $_REQUEST["status"];
    $date = $_REQUEST["date"];

    $data = $subjectManager->loadDataFile();

    foreach ($data as $item){
        if ($item->id == $_GET["id"]){
            $item->term=$term;
            $item->program = $program;
            $item->status=$status;
            $item->date=$date;
        }
    }

    $subjectManager->saveDataFile($data);

    header ("location: ../Log-in/User.php");
}


