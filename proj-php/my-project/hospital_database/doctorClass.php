<?php
require_once './staffClass.php';
require_once './SurgeonInterface.php';

class Doctor extends Staff implements SurgeonInterface
{
    public $specialty;
    public function __construct($id, $name, $salary, $specialty)
    {
        parent::__construct($id, $name, $salary);
        $this->specialty = $specialty;
    }

    public function performDuty()
    {
        return "Doctor ".$this->name ." is treating patients , its specialty is ".$this->specialty.
        ", and its salary ".$this->getSalary()." And after the taxed ".$this->getTaxedSalary()."<br>";
    }

    public function performSurgery()
    {
        return 'performSurgery';
    }
}