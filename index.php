<?php  
require 'security.php'; 
require 'class.php';
require 'db.php';
$time = date('d-m-y H:i:s');
?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title><?= $_COOKIE['username']; ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sticky-footer-navbar/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    <header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" >JobList</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="addjob.php">Add Job</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="profile.php" tabindex="-1" aria-disabled="true">Profile</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Team
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModalScrollable">Create Team</a>
              <a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModalScrollable2">Join Team</a>
              <a class="dropdown-item" href="teamjobs.php">Team's Joblist</a>
          </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0" action="logout.php" method="post">
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" name="exit">Log out</button>
      </form>
    </div>
  </nav>
</header>

<div class="container" style="padding-top: 80px;">
    <h4 class="text-center"><?= $_COOKIE['username']; ?>'s Jobs</h4>
    <H3>Ongoing Jobs</H3>
    <ol>
        <?php 
            $show  = new job(' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ');
            $data_table = $show->showdata('Ongoing', $_COOKIE["username"]);
            //var_dump($data_table);
            //print_r($data_table);
            foreach ($data_table as $data) { ?>
                <li>
                    <a href="update.php?id=<?= $data['number'];?>"><?= $data['title']; ?></a>
                    <p><?= "Type : ".$data['type']." | Describe : ".$data['info']." | Handled by : ".$data['handled_by']." | Request by : ".$data['req_by']; ?></p>
                </li>
        <?php } ?>
    </ol>
</div>
<div class="container">
    <H3>Outstanding Jobs</H3>
    <ol>
        <?php 
            //$show  = new job(' ',' ',' ',' ',' ',' ',' ',' ');
            $data_table = $show->showdata('Outstanding', $_COOKIE["username"]);
            //print_r($data_table);
            foreach ($data_table as $data) { ?>
                <li>
                    <a href="update.php?id=<?= $data['number'];?>"><?= $data['title']; ?></a>
                    <p><?= "Type : ".$data['type']." | Describe : ".$data['info']." | Handled by : ".$data['handled_by']." | Request by : ".$data['req_by']; ?></p>
                    
                </li>
        <?php } ?>
    </ol>
</div>
<div class="container" >
    <H3>Finished Jobs</H3>
    <ol>
        <?php 
            //$show  = new job(' ',' ',' ',' ',' ',' ',' ',' ');
            $data_table = $show->showdata('Finished', $_COOKIE["username"]);
            //print_r($data_table);
            foreach ($data_table as $data) { ?>
                <li>
                    <a href="update.php?id=<?= $data['number'];?>"><?= $data['title']; ?></a>
                    <p><?= "Type : ".$data['type']." | Describe : ".$data['info']." | Handled by : ".$data['handled_by']." | Request by : ".$data['req_by']; ?></p>
                    
                </li>
        <?php } ?>
    </ol>
</div>
<div class="container">
    <H3>Closed Jobs</H3>
    <ol>
        <?php 
            //$show  = new job(' ',' ',' ',' ',' ',' ',' ',' ');
            $data_table = $show->showdata('Closed', $_COOKIE["username"]);
            //print_r($data_table);
            foreach ($data_table as $data) { ?>
                <li>
                    <a href="update.php?id=<?= $data['number'];?>"><?= $data['title']; ?></a>
                    <p><?= "Type : ".$data['type']." | Describe : ".$data['info']." | Handled by : ".$data['handled_by']." | Request by : ".$data['req_by']; ?></p>
                    
                </li>
        <?php } ?>
    </ol>
</div>
<!-- Begin page content -->
<!-- <main role="main" class="flex-shrink-0" style = "padding-top: 80px;"> -->
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable"> -->
      <!-- Launch demo modal -->
    <!-- </button> -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle">Create Team</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <form action="addteam.php" method="post">
              <div class="form-group">
                <label for="name" class="col-form-label">Team Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="form-group">
                <label for="info" class="col-form-label">Team Info</label>
                <input type="text" class="form-control" id="info" name= "info" required>
              </div>
              <div class="form-group">
                <label for="secret" class="col-form-label">Team Secret Code</label>
                <input type="password" class="form-control" id="secret" name = "secret" required>
              </div>
              <input type="hidden" name="admin" value="<?= $_COOKIE['username']; ?>" placeholder="" class="form-control" required>
              <input type="hidden" name="time" value="<?= $time; ?>" placeholder="" class="form-control" required>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="add">Add New Team</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="exampleModalScrollable2" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle">Join Team</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <form action="addteam.php" method="post">
              <div class="form-group">
                <label for="name" class="col-form-label">Team Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="form-group">
                <label for="secret" class="col-form-label">Team Secret Code</label>
                <input type="password" class="form-control" id="secret" name = "secret" required>
              </div>
              <input type="hidden" name="member" value="<?= $_COOKIE['username']; ?>" placeholder="" class="form-control" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="join">Join Team</button>
          </div>
          </form>
        </div>
      </div>
    </div>

</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Organize your time and job</span>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


  </body>
</html>
