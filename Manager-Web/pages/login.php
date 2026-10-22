<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="author" content="Tsoeu Thabiso Andrew"> 
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Trend Heaven |Login Page</title>
   <link rel="stylesheet" href="../style/login.css">
   <link rel="icon" type="image/x-icon" href="../../image/icon/favicon.png">
 </head>
 <body>

    <div class="login-container">
      <h1>Welcome Back</h1>
      <h2>Login to your account</h2>

        <form method="POST">
         <label for="username">Username</label>
         <input type="text" id="username" placeholder="Enter your username"  >
         <span class="error">*<?php echo username_error ?>

         <label for="password">Password</label>
         <input type="password"  id="password"  placeholder="Enter your password"  >
         <span class="error">*<?php echo password_error ?>

         <div class="options">
              <label class="remember">
              <input type="checkbox">
              Remember me
              </label>

             <a href="#">Forgot password?</a>
         </div>

         <button type="submit">Login</button>
        </form>

        <p>Don't have an account?</p>
        <a href="#" class="create-account">Create Account</a>
    </div>

  </body>
</html>