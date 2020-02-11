<?php

$lines = (int) readline();
$employees=[];
$deparments=[];
for ($i=0; $i< $lines; $i++){
    $input =explode(' ', readline());
    $employerName=$input[0];
    $employerSalary=(float)$input[1];
    $employerPosition=$input[2];
    $employerDepartment=$input[3];
    if (!empty($input[5]) && is_numeric($input[5])){
        $employerAge=(int) $input[5];
    }else{
        $employerAge=(int)-1;
    }

    if (!empty($input[4]) && !(is_numeric($input[4]))){
        $employerEmail=$input[4];
    }elseif(!empty($input[4]) && is_numeric($input[4])) {
        $employerAge=(int) $input[4];
    }else{
        $employerEmail='n/a';
    }


    $employees[$employerName]= new Employee($employerName,$employerSalary,$employerPosition,$employerDepartment,$employerEmail,$employerAge);

}


$bestSalary=0;
$bestSalaryDevison = "";

foreach ($employees as $employee ){

    if(!array_key_exists($employee->getDepartment(),$deparments)){
        $deparments[$employee->getDepartment()] = $employee->getSalary();
    }else{
        $deparments[$employee->getDepartment()] += $employee->getSalary();
    }

    if ($deparments[$employee->getDepartment()] > $bestSalary){
        $bestSalary = $deparments[$employee->getDepartment()];
        $bestSalaryDevison = $employee->getDepartment();
    }

}
echo 'Highest Average Salary: '.$bestSalaryDevison.PHP_EOL;


usort($employees, function($a, $b) {
    return $a->getSalary() < $b->getSalary() ? 1 : -1;
});
foreach ($employees as $employee){


    if ($employee->getDepartment() === $bestSalaryDevison){
        echo $employee.PHP_EOL;
    }
}


