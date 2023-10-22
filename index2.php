<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="./dist/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="./dist/css/buttons.dataTables.min.css">

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
  </style>

  <!-- Custom styles for this template -->
  <link href="carousel.css" rel="stylesheet">
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #425b62">
      <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">Avionics</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
          aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index2.php">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ManageUsers2.php">Manage Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="UsersLog2.php" tabindex="-1">Users Log</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="devices2.php" tabindex="-1">Devices</a>
            </li>
            <?php  
                if (isset($_SESSION['Admin-name'])) {

                    echo '<li type="" class="nav-item">';
                    echo '<a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#admin-account">'.$_SESSION['Admin-name'].'</a>';
                    echo '</li>';

                    echo '<li type="" class="nav-item">';
                    echo '<a class="nav-link" data-bs-toggle="modal" data-bs-target="#logout-account" >Log Out</a>';
                    echo '</li>';
                }
                else{
                    echo '<a href="login.php">Log In</a>';
                }
            ?>
          </ul>
          
        </div>
      </div>
    </nav>
  </header>
  
  <main>
    <div class="container marketing">

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col">
          <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Serial No.</th>
                    <th>Gender</th>
                    <th>Card UID</th>
                    <th>User Date</th>
                    <th>Device Dept.</th>
                </tr>
            </thead>
            <tbody>
            <?php
                //Connect to database
                require'connectDB.php';

                    $sql = "SELECT * FROM users WHERE add_card=1 ORDER BY id DESC";
                    $result = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($result, $sql)) {
                        echo '<p class="error">SQL Error</p>';
                    }
                    else{
                        mysqli_stmt_execute($result);
                        $resultl = mysqli_stmt_get_result($result);
                    if (mysqli_num_rows($resultl) > 0){
                        while ($row = mysqli_fetch_assoc($resultl)){
                ?>
                            <TR>
                            <TD><?php echo $row['id']; echo" | "; echo $row['username'];?></TD>
                            <TD><?php echo $row['serialnumber'];?></TD>
                            <TD><?php echo $row['gender'];?></TD>
                            <TD><?php echo $row['card_uid'];?></TD>
                            <TD><?php echo $row['user_date'];?></TD>
                            <TD><?php echo $row['device_dep'];?></TD>
                            </TR>
                <?php
                        }   
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>User</th>
                    <th>Serial No.</th>
                    <th>Gender</th>
                    <th>Card UID</th>
                    <th>User Date</th>
                    <th>Device Dept.</th>
                </tr>
            </tfoot>
        </table>
        </div>
      </div>


      <hr class="featurette-divider">

    </div>
    
    <!-- FOOTER -->
    <footer class="container">
      <p class="float-end"><a href="#">Back to top</a></p>
      <p>&copy; 2017–2021 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>
  </main>


<!-- Modal -->
<div class="modal fade" id="admin-account" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="ac_update.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-body">
	      	<label for="User-mail"><b>Admin Name:</b></label>
	      	<input type="text" name="up_name" placeholder="Enter your Name..." value="<?php echo $_SESSION['Admin-name']; ?>" required/><br>
	      	<label for="User-mail"><b>Admin E-mail:</b></label>
	      	<input type="email" name="up_email" placeholder="Enter your E-mail..." value="<?php echo $_SESSION['Admin-email']; ?>" required/><br>
	      	<label for="User-psw"><b>Password</b></label>
	      	<input type="password" name="up_pwd" placeholder="Enter your Password..." required/><br>
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
		  <h1>Logout your account.</h1>
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
  <script src="./dist/js/jquery-3.7.0.js"></script>
<script src="./dist/js/jquery.dataTables.min.js"></script>
<script src="./dist/js/dataTables.buttons.min.js"></script>
<script src="./dist/js/jszip.min.js"></script>
<script src="./dist/js/pdfmake.min.js"> </script>
<script src="./dist/js/vfs_fonts.js"></script>
<script src="./dist/js/buttons.html5.min.js"></script>
  <script src="./script.js"></script>

</body>

</html>