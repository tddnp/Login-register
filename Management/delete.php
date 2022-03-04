<?php

include_once "EnrollSubject.php";
include_once "SubjectManager.php";

$subjectManager = new SubjectManager("data.json");
$enrollSubjects = $subjectManager->loadDataFile();

array_splice($enrollSubjects,$_GET["id"],1);

$subjectManager->saveDataFile($enrollSubjects);

header ("location:../Log-in/User.php");
