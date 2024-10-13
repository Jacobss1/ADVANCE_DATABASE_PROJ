<?php
include 'connector.php';
session_start();
//session_unset(); // remove all data stored

if(isset($_SESSION['user_id'])){
    $userId = $_SESSION['user_id'];

    //executing the logout  and recording the activity status
    $db_con = (new DBConnection())->connect();
    $status = 'logout';
    $sql = "INSERT INTO user_activity(user_id,action) VALUES(?,?)";
    $statement = $db_con->prepare($sql);
    $statement->bind_param('is',$userId,$status);
    $statement->execute();
    $statement->close();
}
session_destroy(); // destroy any data gathered
header('Location: Login.php');
exit();



?>