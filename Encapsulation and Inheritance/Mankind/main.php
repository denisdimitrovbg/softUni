<?php
spl_autoload_register();

$studentData = explode(" ", readline());

$studentFirstName = $studentData[0];
$studentLastName = $studentData[1];
$studentFacultyNumber = $studentData[2];

try {
    $student = new Student($studentFirstName, $studentLastName, $studentFacultyNumber);
    echo $student;
}catch (Exception $ex){
    echo $ex->getMessage();
    return;
}

$workerData = explode(" ", readline());

$workerFirstName= $workerData[0];
$workerLastName= $workerData[1];
$workerSalary= $workerData[2];
$workerHours= $workerData[3];

try {
    $worker = new Workers($workerFirstName, $workerLastName, $workerSalary, $workerHours);
    echo $worker;
}catch (Exception $ex){
    echo $ex->getMessage();
}


