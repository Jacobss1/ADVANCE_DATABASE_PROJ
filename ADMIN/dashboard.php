<?PHP
require_once '../USER/Employer.class.php';
require_once '../USER/fetchJobs.php';
//require_once '../USER/employer.php';
require_once '../Php/registerLog.class.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link rel="icon" href="assets/ICON.png" type="image/x-icon"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
    <header><embed src="assets/stopwatch.svg" type="image/svg+xml" />UICKADMIN</header>
    <ul>
     <li><a href="#" id="dashboard"><i class="fas fa-qrcode"></i>Dashboard</a></li>
     <li><a href="#" id="."><i class="fas fa-link"></i>Shortcuts</a></li>
     <li><a href="#" id="."><i class="fas fa-stream"></i>Overview</a></li>
     <li><a href="#" id="."><i class="fas fa-calendar-week"></i>Events</a></li>
     <li><a href="#" id="."><i class="far fa-question-circle"></i>About</a></li>
     <li><a href="#" id="."><i class="fas fa-sliders-h"></i>Services</a></li>
     <li><a href="#" id="."><i class="far fa-envelope"></i>Contact</a></li>
     <li><a href="index.html" id="logout"><i class="bi bi-box-arrow-left"></i>Logout</a></li>
    </ul>
   </div>
   <section>
    <div class="container">
      <div class="content-wrapper">

        <div class="row">

          <div class="card" id="card1">
            <div class="card-body">
            <?php if (empty($jobs)) : ?>
        <?php else : ?>
                 
                <table class="" border="1">
            <thead>
                <tr>
                    <th>Job Description</th>
                    <th>Offer</th>
                    <th>Job Type</th>
                    <th>Contract</th>
                    <th>Contact No.</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php foreach ($jobs as $jobDetails) : ?>
                        <tr>
                        <td><?php echo htmlspecialchars($jobDetails['jobDesc']); ?></td>
                            <td><?php echo htmlspecialchars($jobDetails['offer']); ?></td>
                            <td><?php echo htmlspecialchars($jobDetails['jobTypeId']); ?></td>
                            <td><?php echo htmlspecialchars($jobDetails['Contract']); ?></td>
                            <td><?php echo htmlspecialchars($jobDetails['contactNo']); ?></td>
                </tr>
              
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
            </div>    
          </div>

          <div class="card" id="card2">
            <div class="card-body">
            <?php if (empty($accounts)) : ?>
        <?php else : ?>
                 
                <table class="" border="1">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>action</th>
                    
                  
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php foreach ($accounts as $accountDetails) : ?>
                        <tr>
                        <td><?php echo htmlspecialchars($accountDetails['firstname']); ?></td>
                            <td><?php echo htmlspecialchars($accountDetails['lastname']); ?></td>
                            <td><?php echo htmlspecialchars($accountDetails['username']); ?></td>
                            <td><?php echo htmlspecialchars($accountDetails['email']); ?></td>
                            <td>
                              
                              <a href="">Restrict</a>
                            </td>
                       
                </tr>
              
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
            </div>    
          </div>

          <div class="card" id="card3">
            <div class="card-body">
              <h5 class="card-title">VISITORS VISITED (CONCEPT)</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary">card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>    
          </div>

        </div>

        <!-- ROW 2 -->
        <div class="row">

          <div class="card" id="card4">
            <div class="card-body">
              <h5 class="card-title">Clients and taskers TABLE summary(CONCEPT)</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>    
          </div>

        </div>

        <!-- ROW 3 -->
        <div class="row">

          <div class="card" id="card5">
            <div class="card-body">
              <h5 class="card-title">CLIENTS PAGE SUMMARY (CONCEPT)</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>    
          </div>

          <div class="card" id="card6">
            <div class="card-body">
              <h5 class="card-title">TASKERS PAGE SUMMARY (CONCEPT)</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>    
          </div>

        </div>

        <!-- ROW 4 -->
        <div class="row">
          
          <div class="card" id="card7">
            <div class="card-body">
              <h5 class="card-title">TRANSACTIONS PAGE (CONCEPT)</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>    
          </div>

          <div class="card" id="card8">
            <div class="card-body">
              <h5 class="card-title">Pie Chart(CONCEPT)</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>    
          </div>

        </div>

        <!-- ROW 5 -->
        <div class="row">

          <div class="card" id="card9">
            <div class="card-body">
              <h5 class="card-title">REPORTS LOG TABLE  (CONCEPT)</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>    
          </div>

        </div>

        <footer class="footer">
          <p>Copyright @ 2024 Jeekobs All rights reserved</p>
         </footer>

      </div>
    </div>
   </section>
</body>
</html>