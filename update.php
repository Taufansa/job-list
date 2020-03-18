<?php  
require 'security.php';
include 'navbar.php';
require 'class.php';
require 'db.php';


$edit  = new job(' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ');
$data = $edit->showdataedit($_GET['id']);





?>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<form class="form-horizontal" action='editjobprocess.php' method="post">
  <fieldset>
    <div class="container-fluid" style="padding-top: 60px;">
      
    
      <div id="legend">
        <legend class="text-center">Update Job</legend>
      </div>
      <div class="form-group row">
       
        <label class="col-sm-2 col-form-label"  for="type">Type</label>
        <input type="hidden" id="number" name="number" value="<?= $data['number']; ?>" class="form-control" required>
        <input type="hidden" name="time" value="<?= $data['time']; ?>" placeholder="" class="form-control" required>
        <input type="hidden" name="username" value="<?= $data['username']; ?>" placeholder="" class="form-control" required>
        <div class="col-sm-10">
           <div class="form-group">
			  <select class="form-control" id="type" name="type" value="">
			    <option value="<?= $data['type']; ?>">Type fixed (<?= $data['type']; ?>)</option>
         <!--  <option value="project">Project</option>
			    <option value="issue">Issue</option> -->
			  </select>
			</div> 
        </div>
      </div>
      <div class="form-group row">
        
        <label class="col-sm-2 col-form-label"  for="title">Title</label>
        <div class="col-sm-10">
          <input type="text" id="title" name="title" value="<?= $data['title']; ?>" class="form-control" required>
        </div>
      </div>
      <div class="form-group row">
      
        <label class="col-sm-2 col-form-label"  for="info">Describe</label>
        <div class="col-sm-10">
          <input type="text" id="info" name="info" value="<?= $data['info']; ?>" class="form-control" required>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label"  for="handle">Handled by</label>
        <div class="col-sm-10">
          <input type="text" id="handle" name="handle" value="<?= $data['handled_by']; ?>" class="form-control" required>
        </div>
      </div>

      <div class="form-group row"> 
       <!-- E-mail -->
        <label class="col-sm-2 col-form-label" for="request">Request by</label>
        <div class="col-sm-10">
          <input type="text" id="request" name="request" value="<?= $data['req_by']; ?>" class="form-control" required>
        </div>
      </div>
      

     <div class="form-group row">
     	<label class="col-sm-2 col-form-label"  for="start">Start Date</label>
        <div class="col-sm-10">
          <input type="date" id="start" name="start" value="<?= $data['start_date']; ?>" class="form-control" required>
          <input type="hidden" id="number" name="number" value="<?= $data['number']; ?>" class="form-control" required>
          
        </div>
   
        
      </div>
   
      <div class="form-group row">
        <!-- Password-->
        <label class="col-sm-2 col-form-label" for="end">End Date</label>
        <div class="col-sm-10">
          <input type="date" id="end" name="end" value="<?= $data['end_date']; ?>" class="form-control" required>
        </div>
      </div>

      <div class="form-group row">
            <!-- E-mail -->
            <label class="col-sm-2 col-form-label" for="status">Status</label>
            <div class="col-sm-10">
             <div class="form-group">
          <select class="form-control" id="status" name="status">
            <option value="<?= $data['status']; ?>">Document status (<?= $data['status']; ?>)</option>
            <option value="Outstanding">Outstanding</option>
            <option value="Ongoing">Ongoing</option>
            <option value="Finished">Finished</option>
            <option value="Closed">Closed</option>


          </select>
        </div> 
          </div>
          </div>
   

   
      <div class="form-group row">
        <!-- Button -->
        	<div class="col-sm-10">
        		<input type="submit" class="btn btn-success" value="Update" name="update">
            <input type="submit" class="btn btn-danger" value="Delete" name="delete">
        	</div>
       
      </div>
    </div>
  </fieldset>
</form>

