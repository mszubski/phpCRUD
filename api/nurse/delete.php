<?php
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/nurse.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare nurse object
$nurse = new Nurse($db);
 
// set nurse property values
$nurse->id = $_POST['id'];
 
// remove the nurse
if($nurse->delete()){
    $nurse_arr=array(
        "status" => true,
        "message" => "Successfully Removed!"
    );
}
else{
    $nurse_arr=array(
        "status" => false,
        "message" => "nurse Cannot be deleted. may be he's assigned to a patient!"
    );
}
print_r(json_encode($nurse_arr));
?>
