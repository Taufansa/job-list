
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<form class="form-horizontal" action='info.php' method="post">
  <fieldset>
    <div class="container-fluid">
      
    
      <div id="legend">
        <legend class="text-center">Register</legend>
      </div>
      <div class="control-group">
       
        <label class="control-label"  for="nip">NIP</label>
        <div class="controls">
          <input type="text" id="nip" name="nip" placeholder="" class="input-xlarge" required>
        </div>
      </div>
      <div class="control-group">
        
        <label class="control-label"  for="nama">Full Name</label>
        <div class="controls">
          <input type="text" id="nama" name="nama" placeholder="" class="input-xlarge" required>
        </div>
      </div>
      <div class="control-group">
      
        <label class="control-label"  for="grade">Grade</label>
        <div class="controls">
          <input type="text" id="grade" name="grade" placeholder="" class="input-xlarge" required>
        </div>
      </div>
      <div class="control-group">
        
        <label class="control-label"  for="dept">Department</label>
        <div class="controls">
          <input type="text" id="dept" name="dept" placeholder="" class="input-xlarge" required>
        </div>
      </div>
      <div class="control-group">

         <div class="control-group">
            <!-- E-mail -->
            <label class="control-label" for="phone">Phone</label>
            <div class="controls">
              <input type="text" id="phone" name="phone" placeholder="" class="input-xlarge" required>
            </div>
          </div>
     
        <label class="control-label"  for="username">Username</label>
        <div class="controls">
          <input type="text" id="username" name="username" placeholder="" class="input-xlarge" required>
          <p class="help-block">Username can contain any letters or numbers, without spaces</p>
        </div>
      </div>
   
      <div class="control-group">
        <!-- Password-->
        <label class="control-label" for="password">Password</label>
        <div class="controls">
          <input type="password" id="password" name="password" placeholder="" class="input-xlarge" required>
          <p class="help-block">Password should be at least 4 characters</p>
        </div>
      </div>
   
      <div class="control-group">
        <!-- Password -->
        <label class="control-label"  for="password_confirm">Password (Confirm)</label>
        <div class="controls">
          <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge" required>
          <p class="help-block">Please confirm password</p>
        </div>
      </div>
   
      <div class="control-group">
        <!-- Button -->
        <div class="controls">
          <input type="submit" class="btn btn-success" value="Register" name="regist">
          <br>
          <br>
          <p class=""><a href="login.php">Already have an account? </p>
        </div>
      </div>
    </div>
  </fieldset>
</form>