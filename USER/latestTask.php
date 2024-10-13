<?php
include_once '../Php/connector.php';
require_once 'taskSearch.class.php';

/*session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $userId = $_SESSION['user_id'];
    $userEmail = $_SESSION['username'];

    // Use the session information to personalize the page, fetch tasks, etc.
    echo "Welcome to the latest tasks, $username!";
    // You can now retrieve tasks for this user using $userId or any other logic.
} else {
    // Redirect to login if no session exists
    header("Location: ../Php/login.php");
    exit();
}
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/ICON.png" type="image/x-icon"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="latestTask.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><embed src="assets/stopwatch.svg" type="image/svg+xml" />UICKTASK</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <nav>
          <li><a class="dropdown" href="#"><embed src="person-circle.svg" type="image/svg+xml"></a>
            <ul>
              <li><a href="../Php/logout.php"><img src="box-arrow-right.svg" alt=""></a></li>
            </ul>
          </li>
        </nav>
      </div>
    </div>
  </div>
</nav>

<div class="dropdown-list">
  <button class="dropdown-toggle">All jobs</button>
  <div class="dropdown-menu">
    <label><input type="checkbox" name="category" value="carpentry"> Carpentry</label>
    <label><input type="checkbox" name="category" value="plumbing"> Plumbing</label>
    <label><input type="checkbox" name="category" value="gardening"> Gardening</label>
    <label><input type="checkbox" name="category" value="mounting"> Mounting</label>
  </div>
</div>

<div class="search-container">
  <form action="" method="POST">
    <input type="text" class="search-input" placeholder="Search for jobs, posts, or people..." name="searchKey">
    <button type="submit" class="search-btn">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
      </svg>
    </button>
  </form>
</div>
<?php



?>
<div class="box-container">
<?php
// Fetch searchKey from POST request
$searchKey = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['searchKey'])) {
    $searchKey = htmlspecialchars($_POST['searchKey']);
}

// Use the fetchFilters function to get filtered job results
$jobs = fetchFilters($searchKey);

if (!empty($jobs)) {
    foreach ($jobs as $job) {
?>

<form action="" method="post">
  <div class="box">
    <?php if (!empty($job['image'])) { ?>
      <img src="./Uploaded_images/<?php echo $job['image']; ?>" alt="Job Image" style="width:100%; height:auto;">
    <?php } ?>

    <h5>Job Description</h5>
    <h3><?php echo $job['jobDesc']; ?></h3>
    <div class="offer">$<?php echo $job['offer']; ?></div>
    <div class="job-type">Job Type: <?php echo $job['type_name']; ?></div> <!-- Display the job type name here -->
    <input type="text" name="Contract" value="<?php echo $job['Contract']; ?>">
    <input type="text" name="contactNo" value="<?php echo $job['contactNo']; ?>">
    <input type="submit" class="btn" value="Get" name="Get">
  </div>
</form>

<?php
    }
} else {
    echo "<p>No jobs found.</p>";
}
?>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKeENJ6zY4LZKkcYV+E0bZZlMZ2X/nl0q3kh0UMFStkEhnsasNqRBRNV2IkB6cgv" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
