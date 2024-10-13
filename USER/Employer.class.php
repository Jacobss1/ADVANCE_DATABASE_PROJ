<?php
require_once '../Php/connector.php';

function purifyInput($input){
    return htmlspecialchars(trim($input));
}

class details{
    public $jobDesc = '';
    public $offer = '';
    public $jobType = ''; // Expect the job type name, not ID
    public $Contract = '';
    public $contactNo = '';
    public $image = '';
    protected $db_con;

    public function __construct() {
        $this->db_con = (new DBConnection())->connect();
    }

    public function postJob(){
        // First, get the job type id from the job_types table
        $jobTypeId = $this->getJobTypeId($this->jobType);

        if ($jobTypeId === null) {
            // If job type not found or couldn't be inserted, return false
            return false;
        }

        // Now, insert the job into the jobs table using the jobTypeId
        $sql = "INSERT INTO jobs (jobDesc, offer, jobTypeId, Contract, contactNo, image) VALUES(?, ?, ?, ?, ?, ?)";
        $statement = $this->db_con->prepare($sql);

        // Update bind_param to include jobTypeId
        $statement->bind_param('ssdiss', $this->jobDesc, $this->offer, $jobTypeId, $this->Contract, $this->contactNo, $this->image);
        
        return $statement->execute(); // Execute the query
    }

    // Helper function to get job type id
    private function getJobTypeId($jobType) {
        $sql = "SELECT id FROM job_types WHERE type_name = ?";
        $statement = $this->db_con->prepare($sql);
        $statement->bind_param('s', $jobType);
        $statement->execute();
        $result = $statement->get_result();
    
        if ($result->num_rows > 0) {
            // Job type exists, return the id
            $row = $result->fetch_assoc();
            return $row['id'];
        } else {
            // Job type doesn't exist, insert a new job type
            $sqlInsert = "INSERT INTO job_types (type_name) VALUES (?)";
            $statementInsert = $this->db_con->prepare($sqlInsert);
            $statementInsert->bind_param('s', $jobType);
    
            if ($statementInsert->execute()) {
                // Make sure you correctly fetch the insert id
                return $this->db_con->insert_id;
            } else {
                // Log error if insertion fails
                error_log("Failed to insert job type: " . $this->db_con->error);
                return null;
            }
        }
    }
}

$jobDesc = $offer = $jobType = $Contract = $contactNo = $image = '';
$errMessage = '';
$jobDescErr = $offerErr = $jobTypeErr = $ContractErr = $contactNoErr = $imageErr = '';

// handles the form data and posting to the database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Clean inputs
    $jobDesc = purifyInput($_POST['jobDesc']);
    $offer = purifyInput($_POST['offer']);
    $jobType = purifyInput($_POST['jobType']); // Expecting the job type name, not the ID
    $Contract = purifyInput($_POST['Contract']);
    $contactNo = purifyInput($_POST['contactNo']);
    
    // Handle the image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = './Uploaded_images/' . $image_name; // Define where to store the uploaded images
        
        // Move the image to the designated folder
        if (move_uploaded_file($image_tmp_name, $image_folder)) {
            $image = $image_name; // Save only the file name or full path in the database
        } else {
            $imageErr = "Failed to upload the image.";
        }
    } else {
        $imageErr = "Image is required.";
    }

    // Validation
    if (empty($jobDesc)) {
        $jobDescErr = "Job Desc is required.";
    }
    if (empty($offer)) {
        $offerErr = "Put a damn price on it! this ain't slavery.";
    }
    if (empty($jobType)) {
        $jobTypeErr = "Please specify the job type.";
    }
    if (empty($Contract)) {
        $ContractErr = "Don't expect they'll work forever without a contract!";
    }
    if (empty($contactNo)) {
        $contactNoErr = "How will they contact you without your number?";
    }
    if (empty($image)) {
        $imageErr = "Proof is required!";
    }

    if (empty($jobDescErr) && empty($offerErr) && empty($jobTypeErr) && empty($ContractErr) && empty($contactNoErr) && empty($imageErr)) {
        $newJob = new details();
        $newJob->jobDesc = $jobDesc;
        $newJob->offer = $offer;
        $newJob->jobType = $jobType;
        $newJob->Contract = $Contract;
        $newJob->contactNo = $contactNo;
        $newJob->image = $image;

        if ($newJob->postJob()) {
            $successMessage = 'Job successfully posted!';
            header('Location: Employer.php');
            exit();
        } else {
            $errMessage = 'Error: Job not successfully posted.';
        }
    } else {
        $errMessage = 'All fields are required.';
    }
}
?>
