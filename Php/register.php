<?php

require_once 'connector.php'; // Include your database connection file

function cleanInput($data) {
    return htmlspecialchars(trim($data));
}

class Account {
    protected $db_con;

    public function __construct() {
        $this->db_con = (new DBConnection())->connect();
    }

    // Method to fetch the hashed password by username
    public function fetchPasswordByUsername($username): ?string {
        $sql = "SELECT password FROM accounts WHERE username = ?";
        $statement = $this->db_con->prepare($sql);
        $statement->bind_param('s', $username); // 's' for string type
        $statement->execute();
        $statement->bind_result($hashedPassword);
        if ($statement->fetch()) {
            return $hashedPassword; // Return the hashed password if found
        } else {
            return null; // Return null if the username is not found
        }
    }
}

$username = $password = '';
$userErr = $passErr = $loginErr = '';

// Handling form submission for login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Clean inputs
    $username = cleanInput($_POST['username']);
    $password = cleanInput($_POST['password']);

    // Validation
    if (empty($username)) {
        $userErr = "Username is required.";
    }

    if (empty($password)) {
        $passErr = "Password is required.";
    }

    // If there are no validation errors, proceed with login
    if (empty($userErr) && empty($passErr)) {
        $account = new Account();
        $hashedPassword = $account->fetchPasswordByUsername($username);

        if ($hashedPassword === null) {
            // If username is not found in the database
            $loginErr = "Invalid username or password.";
        } elseif (password_verify($password, $hashedPassword)) {
            // Login successful, redirect to dashboard or homepage
            header('Location: ../USER/index.php');
            exit();
        } else {
            // If the password doesn't match
            $loginErr = "Invalid username or password.";
        }
    }
}


?>
