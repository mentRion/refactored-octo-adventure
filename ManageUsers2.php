<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="./dist/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="./dist/css/buttons.dataTables.min.css">
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="./css/manageusers.css"> -->

  <!-- Bootstrap core CSS -->  
    
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

	  <form enctype="multipart/form-data">
		<div class="alert_user"></div>
		<div class="row g-3 align-items-center">
			<div class="col-12">
				<legend><span class="number" disabled>1</span> User Info</legend>
			</div>
			<div class="col-3">
				<input type="text" class="form-control" type="hidden" name="user_id" id="user_id"  disabled>
			</div>
			<div class="col-3">
				<input type="text" class="form-control" type="text" name="name" id="name" placeholder="User Name...">
			</div>
			<div class="col-3">
				<input type="text" class="form-control" type="text" name="number" id="number" placeholder="Serial Number...">
			</div>
			<div class="col-3">
				<input type="text" class="form-control" type="text" name="email" id="email" placeholder="User Email">
			</div>
		</div>

			<div class="row g-3  align-items-center">
			<div class="col-12">
				<legend><span class="number">2</span> Additional Info</legend>
			</div>
				<div class="col-auto">
					<label>
					<label for="Device"><b>User Department:</b></label>
						<select class="dev_sel form-control" name="dev_sel" id="dev_sel" style="color: #000;">
						<option value="0">All Departments</option>
						<?php
							require 'connectDB.php';
							$sql = "SELECT * FROM devices ORDER BY device_name ASC";
							$result = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($result, $sql)) {
								echo '<p class="error">SQL Error</p>';
							} 
							else{
								mysqli_stmt_execute($result);
								$resultl = mysqli_stmt_get_result($result);
								while ($row = mysqli_fetch_assoc($resultl)){
						?>
								<option value="<?php echo $row['device_uid'];?>"><?php echo $row['device_dep']; ?></option>
						<?php
								}
							}
						?>
						</select>

						
					<!-- <input type="radio" name="gender" class="gender" value="Female">Female
					<input type="radio" name="gender" class="gender" value="Male" checked="checked">Male -->
				</label >
				</div>



				<div class="col-auto">
				<div class="form-check">
				<input type="radio" name="gender" class="gender" value="Female">Female
					<label class="form-check-label" for="flexCheckIndeterminate">
						Female
					</label>
				</div>

				<div class="form-check">
				<input type="radio" name="gender" class="gender" value="Male" checked="checked">Male
					<label class="form-check-label" for="flexCheckIndeterminate">
						Male
					</label>
				</div>
				</div>

				<div class="col-auto">
					<button type="button" name="user_add" class="user_add btn btn-primary">Add User</button>
				</div>

				<div class="col-auto">
					<button type="button" name="user_upd" class="user_upd btn btn-primary">Update User</button>
				</div>

				<div class="col-auto">
					<button type="button" name="user_rmo" class="user_rmo btn btn-primary">Remove User</button>
				</div>

				</div>
			
		</form>

      <div class="row featurette">
        <div class="col">
		<div class="slideInRight animated">
			<div id="manage_users"></div>
		</div>
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
  
  <!-- <script src="./script.js"></script> -->
  <!-- <script type="text/javascript" src="./js/bootbox.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap.js"></script> -->
	<script src="./js/manage_users.js"></script>
	<script>
	  	$(window).on("load resize ", function() {
		    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
		    $('.tbl-header').css({'padding-right':scrollWidth});
		}).resize();
	</script>
	<script>
	  $(document).ready(function(){
	  	  $.ajax({
	        url: "manage_users_up.php"
	        }).done(function(data) {
	        $('#manage_users').html(data);
	      });
	    setInterval(function(){
	      $.ajax({
	        url: "manage_users_up.php"
	        }).done(function(data) {
	        $('#manage_users').html(data);
	      });
	    },5000);
	  });
	</script>

</body>
</html>