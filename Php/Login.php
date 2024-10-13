<?php 
require_once 'register.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://kit.fontawesome.com/c26cd2166c.js"></script>
    <link rel="stylesheet" href="log.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    <section class="main">
        <div class="container" id="signIn">
            <h1 class="form-title">Sign In</h1>

            <!-- Sign-In Form -->
            <form action="Login.php" method="POST" id="loginForm">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="username" id="email" value="<?php echo htmlspecialchars($username); ?>" placeholder="Email">
                    <?php if (!empty($usernameErr)) echo "<span class='error'>$usernameErr</span>"; ?>
                    <span style="color:red;"></span>
                    <label for="username">username</label>
                </div>

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($password); ?>" placeholder="paswword">
                    <?php if (!empty($passErr)) echo "<span class='error'>$passErr</span>"; ?>
                    <label for="password">Password</label>
                    <p class="recover"><a href="#">Recover password</a></p>
                </div>

                <?php if (!empty($loginErr)) echo "<div class='error'>$loginErr</div>"; ?>
                <input type="submit" class="btn" value="Login">
            </form>

            <p class="or">----or-----</p>
            <div class="icons">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-google-plus"></i>
            </div>

            <div class="links">
                <p>Don't Have an Account yet?</p>
                <a href="SignUp.php">Sign Up</a>
            </div>
        </div>
    </section>

   
</body>

</html>
