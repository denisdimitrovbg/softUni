<?php


$loops = intval(readline());
$n = 0;
$departments = [];

class Employee
{

    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $salary;
    /**
     * @var string
     */
    private $position;

    /**
     * @var string
     */
    private $department;

    /**
     * @var string;
     */
    private $email;

    /**
     * @var int
     */
    private $age;

    public function __construct(string $name,
                                float $salary,
                                string $position,
                                string $department,
                                string $email = "n/a",
                                int $age = -1)
    {
        $this->name = $name;
        $this->salary = number_format($salary, 2, ".", "");
        $this->position = $position;
        $this->department = $department;
        $this->email = $email;
        $this->age = $age;

//    if ($email==null){
//        $this->email="n/a";
//    }
//    if($age==null){
//        $this->age= (int)-1;
//    }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {

        return $this->salary;
    }

    /**
     * @return string
     */

    public function getPosition(): string
    {

        return $this->position;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @return string
     */

    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }


    public function __toString()
    {
        $payment = number_format($this->getSalary(), 2, ".", "");
        return "{$this->getName()} {$payment} {$this->getEmail()} {$this->getAge()}\n";
    }

}

class Department
{
    private $name;
    private $employees;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->employees = [];

    }

    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;


    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function avgSalary(): float
    {
        $sum = 0;
        foreach ($this->employees as $employee) {
            $sum += $employee->getSalary();

        }
        return $sum / count($this->employees);

    }

//    public function __toString()
//    {
//      foreach ($this->getEmployees() as $employee){
//          echo {$this->getName()};
//
//      }
//
//    }

}


while ($loops != $n) {
    $input = explode(" ", readline());
    $employeeName = $input[0];
    $employeeSalary = (float)$input[1];
    $employeePosition = $input[2];
    $departmentName = $input[3];
    $employeeEmail = "n/a";
    $employeeAge = (int)-1;


    if (count($input) == 5) {
        if (is_numeric($input[4])) {
            $employeeAge = (int)$input[4];
        } else {
            $employeeEmail = $input[4];
        }
    } elseif (count($input) == 6) {
        $employeeEmail = $input[4];
        $employeeAge = (int)$input[5];
    }

    $employee = new Employee($employeeName, $employeeSalary, $employeePosition, $departmentName, $employeeEmail, $employeeAge);
    if (!key_exists($departmentName, $departments)) {
        $department = new Department($departmentName);
        $departments[$departmentName] = $department;

    }


    $departments[$departmentName]->addEmployee($employee);

    $n++;
}

usort($departments, function (Department $d1, Department $d2) {
    return $d2->avgSalary() <=> $d1->avgSalary();

});

$departmentNameKey = $departments[0]->getName();

$firstDepartment = $departments[0]->getEmployees();
usort($firstDepartment, function (Employee $e1, Employee $e2) {
    return $e2->getSalary() <=> $e1->getSalary();
});


echo "Highest Average Salary: " . $departmentNameKey . PHP_EOL;
foreach ($firstDepartment as $employee) {
    echo $employee;
}