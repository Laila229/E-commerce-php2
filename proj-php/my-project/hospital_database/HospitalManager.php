<?php
require_once './staffClass.php';
class HospitalManager{
    public function checkWork(Staff $staffMember){
        return $staffMember->performDuty();
    }
}