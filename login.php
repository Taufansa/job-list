 <!DOCTYPE html>
 <html>
 <head>
   <title>Login</title>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" type="text/css" href="css/logstyle.css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 </head>
 <body>
 
<div class="wrapper fadeInDown">
 
  <div id="formContent">
    <!-- Tittle -->
    <div class="fadeIn first">
      <h2><b>JobList</b></h2>
    </div>

    <!-- Login Form -->
    <form action='login_process.php' method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="username" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
      <input type="submit" class="fadeIn fourth" value="Log In" name="login">
      <p class="fadeIn fifth"><a href="register.php">Don't have an account? </p>
     
    </form>
  </div>
</div>

 </body>
 </html>