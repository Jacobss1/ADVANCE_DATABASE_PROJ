<?php

require_once '../Php/connector.php';

function fetchFilters($searchKey = '') {
    $db_con = (new DBConnection())->connect();

    // Base SQL query to select from jobs and join with job_types
    $sql = "SELECT jobs.*, job_types.type_name 
            FROM jobs 
            JOIN job_types ON jobs.jobTypeId = job_types.id 
            WHERE 1=1";

    // Add filtering condition if search key is provided
    if (!empty($searchKey)) {
        $sql .= " AND (jobs.jobDesc LIKE ? OR job_types.type_name LIKE ?)";
    }

    // Add order by clause
    $sql .= " ORDER BY jobs.jobDesc ASC";

    // Prepare the SQL statement
    $statement = $db_con->prepare($sql);

    // If searchKey is provided, bind the searchKey to the placeholders
    if (!empty($searchKey)) {
        $searchKey = '%' . $searchKey . '%';  // Wrap searchKey with % for LIKE query
        $statement->bind_param('ss', $searchKey, $searchKey);  // 'ss' for two string parameters
    }

    // Execute the statement
    $statement->execute();

    // Get the result set and fetch all rows
    $result = $statement->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);  // Fetch results as an associative array
}

// Fetch searchKey from POST request if available
$searchKey = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $searchKey = htmlspecialchars($_POST['searchKey']);
}

// Fetch the filters using the search key
$filters = fetchFilters($searchKey);

?>
