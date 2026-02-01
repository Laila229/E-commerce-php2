<?php

// start Staff class 

abstract class Staff
{
    public $name;
    protected $id;
    //لأنه يمكن الوصول إليه من الـ Child Classes، لكن لا يمكن لأي كود خارجي تغييره مباشرة
    private $salary;
    // لأنه يعتبر من البيانات الحساسة لذلك يجب منع التغيير المباشر عليه،
    //  ويمكن الوصول إليه فقط عبر  getters/setters

    //construct
    public function __construct($id, $name, $salary)
    {
        $this->id = $id;
        $this->name = $name;
        $this->salary = $salary;
    }

    //destruct
    public function __destruct()
    {
        echo $this->name . " record closed <br>";
    }

    // set salary method 
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    // get salary method 
    public function getSalary()
    {
        return $this->salary;
    }

    abstract public function performDuty();

    public function getTaxedSalary() {
        $tax = $this->salary*.10;
        return $this->salary - $tax;
    }
}

// end Staff class 