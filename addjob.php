<?php  
require 'security.php';
include 'navbar.php';

$time = date('d-m-y H:i:s');
$username = $_COOKIE["username"];
?>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<form class="form-horizontal" action='addjobprocess.php' method="post">
  <fieldset>
    <div class="container-fluid" style="padding-top: 60px;">
      
    
      <div id="legend">
        <legend class="text-center">Add New Job</legend>
        <input type="hidden" name="time" value="<?= $time; ?>" placeholder="" class="form-control" required>
        <input type="hidden" name="username" value="<?= $_COOKIE['username']; ?>" placeholder="" class="form-control" required>
      </div>
      <div class="form-group row">
       
        <label class="col-sm-2 col-form-label"  for="type">Type</label>
        <div class="col-sm-10">
           <div class="form-group">
			  <select class="form-control" id="type" name="type">
			    <option value="Project">Project</option>
			    <option value="Issue">Issue</option>
			  </select>
			</div> 
        </div>
      </div>
      <div class="form-group row">
        
        <label class="col-sm-2 col-form-label"  for="title">Title</label>
        <div class="col-sm-10">
          <input type="text" id="title" name="title" placeholder="" class="form-control" required>
        </div>
      </div>
      <div class="form-group row">
      
        <label class="col-sm-2 col-form-label"  for="info">Describe</label>
        <div class="col-sm-10">
          <input type="text" id="info" name="info" placeholder="" class="form-control" required>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label"  for="handle">Handled by</label>
        <div class="col-sm-10">
          <input type="text" id="handle" name="handle" placeholder="" class="form-control" required>
        </div>
      </div>

      <div class="form-group row"> 
       <!-- E-mail -->
        <label class="col-sm-2 col-form-label" for="request">Request by</label>
        <div class="col-sm-10">
          <input type="text" id="request" name="request" placeholder="" class="form-control" required>
        </div>
      </div>
      

     <div class="form-group row">
     	<label class="col-sm-2 col-form-label"  for="start">Start Date</label>
        <div class="col-sm-10">
          <input type="date" id="start" name="start" placeholder= "" class="form-control" required>
          
        </div>
   
        
      </div>
   
      <div class="form-group row">
        <!-- Password-->
        <label class="col-sm-2 col-form-label" for="end">End Date</label>
        <div class="col-sm-10">
          <input type="date" id="end" name="end" placeholder="" class="form-control" required>
        </div>
      </div>

      <div class="form-group row">
            <!-- E-mail -->
            <label class="col-sm-2 col-form-label" for="status">Status</label>
            <div class="col-sm-10">
	           <div class="form-group">
				  <select class="form-control" id="status" name="status">
				    <option value="Outstanding">Outstanding</option>
				    <option value="Ongoing">Ongoing</option>
				  </select>
				</div> 
	        </div>
          </div>
   

   
      <div class="form-group row">
        <!-- Button -->
        	<div class="col-sm-10">
        		<input type="submit" class="btn btn-success" value="Add" name="add">
        	</div>
       
      </div>
    </div>
  </fieldset>
</form>
