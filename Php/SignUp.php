<?php


require_once 'registerLog.class.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcom</title>
    <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>
<link rel="stylesheet" href="log.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
   
    
   <section class="main">
   <div class="container" id="signUp" style="display: active;">
    <h1 class="form-title">Register</h1>
    <form action="SignUp.php" method="POST" id="signUpForm">
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="firstname" id="fname" placeholder="Firstname" value ="<?php echo htmlspecialchars($firstName); ?>" >
       <?php if(!empty($firstNameErr)) echo"<br> <span class = 'error'>$firstNameErr</span>"; ?>
            <label for="fname"> Firstname</label>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="lastname" id="lastname" placeholder="Lastname"value ="<?php echo htmlspecialchars($lastName); ?>">
            <?php if(!empty($lastNameErr)) echo"<br> <span class = 'error'>$lastNameErr</span>"; ?>
            <label for="lname"> Lastname</label>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="username" id="username" placeholder="username"value ="<?php echo htmlspecialchars($username); ?>">
            <?php if(!empty($usernameErr)) echo"<br> <span class = 'email-error'>$usernameErr</span>"; ?>
            <label for="username"> username</label>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="text" name="email" id="email" placeholder="Email"value ="<?php echo htmlspecialchars($email); ?>">
            <?php if(!empty($emailErr)) echo"<br> <span class = 'email-error'>$emailErr</span>"; ?>
            <label for="mail"> Email</label>
         <!--   <p id="email-error" style="color: red;"></p>  Error message for email -->
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="password"value ="<?php echo htmlspecialchars($password); ?>">
             <?php if(!empty($passErr)) echo"<br> <span class='error'>$passErr</span>"; ?>
            <label for="password"> password</label>
        </div>
        <div class="input-group">
    <i class="fas fa-lock"></i>
    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
    <?php if(!empty($confirmPassErr)) echo"<br> <span class='error'>$confirmPassErr</span>"; ?>
    <label for="confirm_password">Confirm Password</label>
</div>
        <input type="submit" class="btn" value="Sign Up" name="signUp">
        <?php
        if(!empty($successMessage)):?>
          <div class="message success"><?php echo htmlspecialchars($successMessage); ?></div>
       <?php endif; ?>
       <?php if(!empty($errMessage)):?>
       <div class="message error"><?php echo htmlspecialchars($errMessage); ?></div>
       <?php endif; ?>
       
       </form>

       <p class="or">----or-----</p>
    <div class="links">
        <p>Already Have  Account?</p>
        <a href="Login.php">Sign In</a>
    </div>
</div>

        </div>
     
       <script src="loginPage.js"></script>
       </body>

</html>
       