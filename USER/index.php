<?php
require_once '../Php/connector.php';
/*session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $userId = $_SESSION['user_id'];
    $userEmail = $_SESSION['username'];

    // Use this information to personalize the home page or display relevant data
    echo "Welcome, user with ID: $userId and email: $username!";
} else {
    // If no user is logged in, redirect to login page
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
    <title>QUICKTASK</title>
    <link rel="icon" href="assets/ICON.png" type="image/x-icon"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><embed src="assets/stopwatch.svg" type="image/svg+xml" />UICKTASK</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Php/Logout.php"><img src="person-circle.svg" alt=""></a>

              </li>
              <li class="nav-item"></li>
                <a class="nav-task" href="Employer.php">Quick! Become a Tasker</a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
      
      <section class="search">
        <div class="container col-lg-5 mt-5">
          <div class="row align-items-start">
              <h1 class="searchText" id="landing-text">A page where you can book TASKERS quickly</h1>
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-none" type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                  </svg>
                </button>
            </div>
          </div>
        </div>
        </form>
    </section>
    
    <section>
      <div class="accordion col-lg-5 mt-5" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
             <strong> Home Repair</strong>
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">

              <div class="card" style="width: 25rem;">
                <img src="assets/Home repair.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">This includes, carpentry, electrical help, plumbing and more.</p>
                </div>
              </div>

             </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
             <strong> Outdoor Help</strong>
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">

              <div class="card" style="width: 25rem;">
                <img src="assets/outdoor cleaning.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Outdoor help has many varieties of help like gardening, sweeping of dirt and more.</p>
                </div>
              </div>

             </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <strong>Mounting</strong>
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">

              <div class="card" style="width: 25rem;">
                <img src="assets/mounting.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Mounts your items like TV mounting, cabinet mounting and other mounting types.</p>
                </div>
              </div>

             </div>
          </div>
        </div>
      </div>
    </section>

<section class="Popular">
    <div class="container col-lg-7 mt-5">
        <div class="row align-items-start">
          <div class="col">
          <h3><strong>Popular Tasks</strong></h3>
          <div class="Task">
           
            <div class="card" style="width: 20rem;">
              <img src="assets/carpentry.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Carpentry</h5>
                <a href="latestTask.php" class="btn mt-5"><strong>Get Task</strong></a>
              </div>
            </div>

            <div class="card" style="width: 20rem;">
              <img src="assets/Plumbing.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Plumbing</h5>
                <a href="#" class="btn mt-5"><strong>Get Task</strong></a>
              </div>
            </div>

            <div class="card" style="width: 20rem;">
              <img src="assets/gardening.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Gardening</h5>
                <a href="#" class="btn mt-5"><strong>Get Task</strong></a>
              </div>
            </div>

            <div class="card" style="width: 20rem;">
              <img src="assets/Cab Mounting.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Mounting</h5>
                <a href="#" class="btn mt-5"><strong>Get Task</strong></a>
              </div>
            </div>
          
          </div>
          </div>
        </div>
      </div>
</section>
    
<section class="How">
  <div class="container col-lg-2 mt-5">
      <div class="row align-items-start">
        <div class="col1">
        <h3><b>How it works</b></h3>
        </div>
      </div>
    </div>
  <div class="container col-lg-6 mt-3">
      <div class="row align-items-start" >
        <div class="col" id="choose">
          <h5> <img src="assets/number1.svg" alt=""> <br> Choose a QuickTasker by price, skills, and reviews.</h5>
        </div>
        <div class="col" id="choose">
          <h5> <img src="assets/number2.svg" alt=""> <br> Schedule a QuickTasker as soon as today.</h5>
        </div>
        <div class="col" id="choose">
          <h5> <img src="assets/number3.svg" alt=""> <br> Chat, pay, and review all in one place..</h5>
        </div>
      </div>
    </div>
</section>

<section class="news">
  <div class="container py-2">
    <div class="row">
      <div class="col-lg-3 m-auto mt-0 text-center">
        <h1> JOIN US</h1>
        <input type="text" class="px-3" placeholder="Enter Your Email">
        <button class="btn2">Submit</button>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-11 ">
        <div class="row">
          <div class="col-lg-3 py-3">
            <h5 class="pb-4">Discover</h5>
            <p>Become a QuickTasker</p>
            <p>All services</p>
            <p>Help</p>
          </div>
          <div class="col-lg-3 py-3">
            <h5 class="pb-4">Company</h5>
            <p>About Us</p>
            <p>Home</p>
          </div>
          <div class="col-lg-3 py-3">
            <h5 class="pb-4">FAQ's</h5>
            <p>No charges</p>
            <p> On Shopping & delivery</p>
            <p> Always Care</p>
          </div>
          <div class="col-lg-3 py-3">
            <h5 class="pb-3">SOCMED</h5>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
              <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
            </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
  <path d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z"/>
</svg>

          </div>

        </div>

      </div>
    </div>
    <hr>
    <p class="text-center">Copyright © 2010 by Jacobs James Layam
      All rights reserved. </p>
</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>