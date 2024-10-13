<?php
require_once 'connector.php';

function cleanInput($data) {
    return htmlspecialchars(trim($data));
}

class Account {
    public $firstName = '';
    public $lastName = '';
    public $username = '';
    public $email = '';
    public $password = '';
    /*public $role = 'staff';
    public $is_staff = true;
    public $is_admin = false;
*/
    protected $db_con;

    // Constructor to initialize database connection
    public function __construct() {
        $this->db_con = (new DBConnection())->connect();
    }

    // Check if email already exists in the database
    public function emailExists($email) {
        $sql = "SELECT COUNT(*) FROM accounts WHERE email = ?";
        $statement = $this->db_con->prepare($sql);
        $statement->bind_param('s', $email); // 's' for string type
        $statement->execute();
        $statement->bind_result($count);
        $statement->fetch();
        return $count > 0; // returns true if email exists
    }

    // Check if username already exists in the database
    public function usernameExists($username) {
        $sql = "SELECT COUNT(*) FROM accounts WHERE username = ?";
        $statement = $this->db_con->prepare($sql);
        $statement->bind_param('s', $username); // 's' for string type
        $statement->execute();
        $statement->bind_result($count);
        $statement->fetch();
        return $count > 0; // returns true if username exists
    }

    // Sign up new user
    public function signUp() {
        $sql = "INSERT INTO accounts (firstname, lastname, username, email, password) VALUES (?, ?, ?, ?, ?)";
        $statement = $this->db_con->prepare($sql);
        $statement->bind_param('sssss', $this->firstName, $this->lastName, $this->username, $this->email, $this->password); // 'sssss' for five strings
        return $statement->execute();
    }
}

$firstName = $lastName = $username = $email = $password =  $confirmPassword = '';
$successMessage = '';
$errMessage = '';
$firstNameErr = $lastNameErr = $usernameErr = $emailErr = $passErr = $confirmPassErr = '';

// Handling form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Clean inputs
    $firstName = cleanInput($_POST['firstname']);
    $lastName = cleanInput($_POST['lastname']);
    $username = cleanInput($_POST['username']);
    $email = cleanInput($_POST['email']);
    $password = cleanInput($_POST['password']);
    $confirmPassword = cleanInput($_POST['confirm_password']);

    // Validation
    if (empty($firstName)) {
        $firstNameErr = "First name is required.";
    }

    if (empty($lastName)) {
        $lastNameErr = "Last name is required.";
    }

    if (empty($email)) {
        $emailErr = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
    } 

    if (empty($password)) {
        $passErr = "Password is required.";
    } elseif (strlen($password) < 8) {
        $passErr = 'Password must be at least 8 characters long.';
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $passErr = 'Password must contain at least one uppercase letter.';
    } elseif (!preg_match('/[a-z]/', $password)) {
        $passErr = 'Password must contain at least one lowercase letter.';
    } elseif (!preg_match('/[\W_]/', $password)) {  // Checks for special characters
        $passErr = 'Password must contain at least one special character.';
    } elseif (strpos($password, $firstName) !== false || strpos($password, $lastName) !== false || strpos($password, $username) !== false) {
        $passErr = 'Password must not contain your username, first name, or last name.';
    }

    if (empty($confirmPassword)) {
        $confirmPassErr = "Confirm password is required.";
    } elseif ($password !== $confirmPassword) {
        $confirmPassErr = "Passwords do not match.";
    }

    // Check if the email or username already exists
    if (empty($emailErr) && empty($usernameErr)) {
        $newAcc = new Account();

        if ($newAcc->emailExists($email)) {
            $emailErr = "Email already exists. Please use a different email.";
        }

        if ($newAcc->usernameExists($username)) {
            $usernameErr = "Username is already taken. Please use a different one.";
        }
    }

    // Only attempt to sign up if no validation errors
    if (empty($firstNameErr) && empty($lastNameErr) && empty($emailErr) && empty($usernameErr) && empty($passErr) && empty($confirmPassErr)) {
        $newAcc = new Account();
        $newAcc->firstName = $firstName;
        $newAcc->lastName = $lastName;
        $newAcc->username = $username;
        $newAcc->email = $email;
        $newAcc->password = password_hash($password, PASSWORD_BCRYPT);

        if ($newAcc->signUp()) {
            $successMessage = 'Success!';
            header('Location: Login.php');
            exit(); // Ensure no further code is executed after redirection
        } else {
            $errMessage = 'Error: Account not successfully created.';
        }
    } else {
        $errMessage = 'All fields are required.';
    }
}
?>
