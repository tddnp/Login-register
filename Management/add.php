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
    <fieldset>
        <div>
            <table>
                <tr>
                    <td>TERM:</td>
                    <td><input type="text" name="term"></td>
                </tr>
                <tr>
                    <td>PROGRAM:</td>
                    <td><input type="text" name="program"></td>
                </tr>
                <tr>
                    <td>STATUS:</td>
                    <td><input type="text" name="status"></td>
                </tr>
                <tr>
                    <td>DATE:</td>
                    <td><input type="date" name="date"></td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">ADD</button>
                    </td>
                </tr>
            </table>
        </div>
    </fieldset>
</form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include_once "../Management/EnrollSubject.php";
    include_once "../Management/SubjectManager.php";

    $term = $_REQUEST["term"];
    $program = $_REQUEST["program"];
    $status = $_REQUEST["status"];
    $date = $_REQUEST["date"];

    $data = [
        "term" => $term,
        "program" => $program,
        "status" => $status,
        "date" => $date
    ];

    $subjectManager = new SubjectManager("data.json");
    $subjectManager->add($data);

    header("location: ../Log-in/User.php");
}