<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login2.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Carousel Template · Bootstrap v5.0</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/"> -->

    
    <!-- Bootstrap core CSS -->
<link href="./css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .text-yellow{
        color: white;
      }
      .featurette-heading {
            text-align: justify;
            text-align-last: left; 
            text-justify: inter-word; 
            margin-top: 0px;
        }

        .lead {
            text-align: justify;
            text-align-last: left;
            text-justify: inter-word;
            margin-top: 50px;
        }

    </style>

 
    
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body style='background-color:#083248'>
    
  <header class='text-yellow'>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #031b28">
      <div class="container-fluid">
      <a class="navbar-brand" href="dashboard.php"><img src="./AIS_YELLOW-removebg-preview.png" alt="" width='100px' height='65px'></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
          aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ManageUsers2.php">Manage Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="UsersLog2.php" tabindex="-1">Users' Log</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="devices2.php" tabindex="-1">Department</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tools.php" tabindex="-1">Tools</a>
            </li>

          </ul>

        </div>
        <div class="d-flex">
        <div class="collapse navbar-collapse" id="navbarCollapse">

        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
            <?php
            if (isset($_SESSION['Admin-name'])) {
              // echo '<li class="nav-item">';
              // echo '<a href="#" class="nav-link" data-toggle="modal" data-target="#admin-account">'.$_SESSION['Admin-name'].'</a>';
              // echo '</li>';
              // echo '<li class="nav-item">';
              // echo '<a class="nav-link" href="logout.php">Log Out</a>';
              // echo '</li>';
            
              // echo '<li type="" class="nav-item">';
              // echo '<a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#admin-account">' . $_SESSION['Admin-name'] . '</a>';
              // echo '</li>';

              echo '<li type="" class="nav-item">';
              echo '<a class="nav-link" data-bs-toggle="modal" data-bs-target="#logout-account" >Log Out</a>';
              echo '</li>';
            } else {
              echo '<a href="login2.php">Log In</a>';
            }
            ?>
            </li>
          <ul>
        </div>
          </div>
      </div>
    </nav>
  </header>

<main class='text-yellow'> 

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
      <img src="./Philscahangar.jpg" alt="Los Angeles">

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Avionics Inventory System</h1>
            <p>Some representative placeholder content for the first slide of the carousel.</p>
            
          </div>
        </div>
      </div>
    
      <div class="carousel-item">
      <img src="./Philscacessna.jpg" alt="Los Angeles">
        <div class="container">

          <div class="carousel-caption text-end">
            <h1>One more for good measure.</h1>
            <p>Some representative placeholder content for the third slide of this carousel.</p>
          
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <div class="row featurette">
      <div class="">
        <div class="text-center">
          <h1>Avionics Instructors</h1>
          <p>The instructors of the Aviation Electronics Technology of PhilSCA Villamor Campus</p>
          
        </div>
      </div>
      
    </div>

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        
      <img class="rounded-circle" width="200px" height="250px" alt="avatar1" src="./toolkeeper.webp" />


        <h2>Heading</h2>
        
        
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
      <img class="rounded-circle" width="200px" height="250px" alt="avatar1" src="./toolkeeper.webp" />

        <h2>Heading</h2>
        
        
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
      <img class="rounded-circle" width="200px" height="250px" alt="avatar1"  src="./toolkeeper.webp"  />

        <h2>Heading</h2>
        
       
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
      
    <div class="container marketing">
    <p></p><p></p><p></p>
<div class="row featurette">
  <div class="">
    <div class="text-center">
      <h1>Administrators</h1>
      <p>The researchers behind the project</p>
      
    </div>
  </div>
  
</div>

<!-- Three columns of text below the carousel -->
<div class="row">
  <div class="col-lg-4">
    
  <img class="rounded-circle" width="200px" height="250px" alt="avatar1" src="./Patrick gradpic.jpg" />


    <h2>Patrick</h2>
    <p>Thesis Leader</p>
    
  </div><!-- /.col-lg-4 -->
  <div class="col-lg-4">
  <img class="rounded-circle" width="200px" height="250px" alt="avatar1" src="./Allen gradpic.jpg" />

    <h2>Allen</h2>
    <p>Thesis Member</p>
    
  </div><!-- /.col-lg-4 -->
  <div class="col-lg-4">
  <img class="rounded-circle" width="200px" height="250px" alt="avatar1"  src="./CJ gradpic.jpg"  />

    <h2>Carl</h2>
    <p>Thesis Member</p>
    <p>Fuck THESIS!!!</p>

  </div><!-- /.col-lg-4 -->

  
</div><!-- /.row -->

<div class="row">
<div class="col-lg-4 offset-4">
  <img class="rounded-circle" width="200px" height="250px" alt="avatar1"  src="./Choy gradpic.jpg"  />4
    <h2>Choy</h2>
    <p>Thesis Member</p>
    
  
  </div><!-- /.col-lg-4 -->
</div>

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider" style='margin-top: 50px;'>

    <div class="row featurette">
      <div class="col-md-11">
        <h1 class="featurette-heading" style='margin-top: 0px;'>Unparalleled Security, Streamlined Management <span class="text-muted" >It’ll blow your mind.</span></h1>
        <p></p>
        <p class="lead" style='margin-top: 50px;'>In the dynamic and safety-critical world of aviation, tool room security and management are paramount. Introducing a revolutionary solution that elevates tool room security to unprecedented levels while streamlining inventory management processes: the integration of Radio Frequency Identification (RFID) technology with the Avionics Inventory System (AIS).</p>

        <p class="lead">A system that:</p>
        <!-- Other paragraphs with the same styling -->

        <p class="lead">Utilizes RFID tags to uniquely identify and track every tool in the tool room, preventing unauthorized access and ensuring the whereabouts of every critical piece of equipment.

        Leverages RFID technology to automate tool check-in and check-out procedures, eliminating manual processes and reducing the risk of human error.

        Integrates seamlessly with the AIS, providing real-time visibility into tool inventory levels and usage patterns, enabling data-driven decision-making for procurement and maintenance planning.</p>

       <p class="lead">Empowers tool room personnel with real-time alerts and notifications, ensuring immediate action in case of tool misplacement or unauthorized access attempts.

        Streamlines the tool calibration process, ensuring that only calibrated and certified tools are used on aircraft, enhancing overall safety and compliance.

        Provides comprehensive audit trails for all tool movements and usage, fostering accountability and transparency within the tool room.</p>

       <p class="lead"> This groundbreaking integration of RFID technology and AIS marks a new era in tool room security and management. By combining the power of real-time tracking, automated inventory management, and enhanced security measures, this system empowers aviation organizations to achieve unparalleled levels of efficiency, safety, and compliance.

        The future of tool room security and management is here. Embrace the power of RFID and AIS to transform your operations today.</p>
      </div>
      
  
    </div>


    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <img src="./AIS_YELLOW-removebg-preview.png" alt="" width='80px' height='50px'>
    <p>Avionics Inventory System </p>
  </footer>
</main>


  <!-- Modal -->
  <div class="modal fade" id="admin-account" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="ac_update.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-body">
	      	<label for="User-mail"><b>Admin Name:</b></label>
	      	<input class="form-control" type="text" name="up_name" placeholder="Enter your Name..." value="<?php echo $_SESSION['Admin-name']; ?>" required/><br>
	      	<label for="User-mail"><b>Admin E-mail:</b></label>
	      	<input class="form-control" type="email" name="up_email" placeholder="Enter your E-mail..." value="<?php echo $_SESSION['Admin-email']; ?>" required/><br>
	      	<label for="User-psw"><b>Password</b></label>
	      	<input class="form-control" type="password" name="up_pwd" placeholder="Enter your Password..." required/><br>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" name="update" class="btn btn-success">Save changes</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	  </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<div class="modal fade" id="logout-account" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log out</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="logout.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
      <h3 style='text-secondary'>Logout your account.</h3>
        </div>
        <div class="modal-footer">
          <button type="submit" name="update" class="btn btn-success">Yes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        </div>
	  </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>


    <script src="./js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
