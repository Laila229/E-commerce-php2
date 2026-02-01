<?php
require_once 'staffClass.php';
require_once './EmergencyInterface.php';

class Nurse extends Staff implements EmergencyInterface
{

    public $shiftTime;

    public function __construct($id, $name, $salary, $shiftTime)
    {
        parent::__construct($id, $name, $salary);
        $this->shiftTime = $shiftTime;
    }

    public function performDuty()
    {
        return  "Nurse ".$this->name." is caring for patients , its shift is ".$this->shiftTime.
        ", and its salary ".$this->getSalary()." And after the taxed ".$this->getTaxedSalary()."<br>";
    }

    public function handleEmergency()
    {
        return 'handleEmergency';
    }
}