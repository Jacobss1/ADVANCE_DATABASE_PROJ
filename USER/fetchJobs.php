<?php
//require_once '../Php/connector.php';
require_once 'Employer.class.php';
require_once '../Php/registerLog.class.php';

function fetchRecords($jobDesc = '', $offer = '', $jobType = '', $Contract = '', $contactNo = []) {
    $db_con = (new DBConnection())->connect();
    $sql = "SELECT * FROM jobs WHERE 1=1";
    
    // Prepare the statement
    $statement = $db_con->prepare($sql);
    $statement->execute();
    
    // Get the result set from the executed statement
    $result = $statement->get_result();  // Fetch the result set
    
    // Fetch all rows from the result as an associative array
    return $result->fetch_all(MYSQLI_ASSOC);
}

$jobs = fetchRecords($jobDesc,$offer,$jobType,$Contract,$contactNo);
$accounts = fetchAccontRecords($lastName,$firstName,$username,$email,$password);

function fetchAccontRecords($lastname = '', $frstname = '', $username = '', $email =  '', $password = []){
    $db_con = (new DBConnection())->connect();
    $sql  = "SELECT * FROM accounts WHERE 1=1";
    $statement = $db_con->prepare($sql);
    $statement->execute();
    $result = $statement->get_result();  // Fetch the result set
    
    // Fetch all rows from the result as an associative array
    return $result->fetch_all(MYSQLI_ASSOC);

}
?>