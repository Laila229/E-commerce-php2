<?php
require_once './doctorClass.php';
require_once './nurseClass.php';
require_once './HospitalManager.php';

$doc1 = new Doctor(1, "Ahmad", 5000, "Cardiology");
// $doc1->salary = 10000; error
$doc1->setSalary(6000);
$doc2 = new Doctor(2, "Omar", 7000, "Neurology");

$nurse1 = new Nurse(3, "Fatima", 3000, "Morning");
$nurse2 = new Nurse(4, "Sara", 3200, "Night");

$manager = new HospitalManager();
$staffMembers = [$doc1, $doc2, $nurse1, $nurse2];

foreach ($staffMembers as $staff){
    echo $manager->checkWork($staff);
}