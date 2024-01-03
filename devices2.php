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

  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   -->
  <!-- <link rel="stylesheet" type="text/css" href="css/devices.css"/> -->
  <link rel="stylesheet" href="./dist/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="./dist/css/buttons.dataTables.min.css">
  <script src="js/dev_config.js"></script>

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
    .text-yellow{
        color: white;
      }
  </style>

</script>

	<script>
		$(document).ready(function(){
		    $.ajax({
		      	url: "dev_up.php",
		      	type: 'POST',
		      	data: {
		        'dev_up': 1,
		  		}
	      	}).done(function(data) {
	  			$('#devices').html(data);
    		});
		});
	</script>
</head>

  <!-- Custom styles for this template -->
  <link href="carousel.css" rel="stylesheet">
</head>

<body style='background-color:#083248' class='text-yellow'>

  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #031b28">
      <div class="container-fluid">
      <a class="navbar-brand" href="dashboard.php"><img src="./AIS_YELLOW-removebg-preview.png" alt="" width='100px' height='65px'></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
          aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item active">
              <a class="nav-link" href="devices2.php" tabindex="-1">Department</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ManageUsers2.php">Manage Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="UsersLog2.php" tabindex="-1">Users' Log</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tool.php" tabindex="-1">Tools</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tool_log.php" tabindex="-1">Tool Log</a>
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
  <main>

    <div class="container marketing mt-5">
      <!-- <hr class="featurette-divider"> -->
    
        <div class="row my-3">
        <div class="col-lg-12">
          <div class="panel">
              <div class="panel-heading" style="font-size: 19px;">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#new-device" style="font-size: 18px; float: right; margin-top: -6px;">New Device</button>
              </div>
              <!-- <div class="panel-body">
                  <div id="devices"></div>
              </div> -->
            </div>
        </div>
      </div>

      <div class="panel-heading">
        <div class="row featurette">
          <div class="col">
          <!-- <div id="devices">
          </div> -->

            <table id="devices2" class="table-responsive-sm display" style='background: #dba858'>
              <thead style='background: #e89c31'>
              <tr>
                <th>Department</th>
                <th>Course/Year/Section</th>
                <th>Course UID</th>
                <th>Registration Date</th>
                <th>Mode</th>
                <th></th>
              </tr>
              </thead>
            </table>
          </div>
        </div>

        <hr class="featurette-divider" style='margin-top:150px;'>

      </div>

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
              <input class="form-control" type="text" name="up_name" placeholder="Enter your Name..."
                value="<?php echo $_SESSION['Admin-name']; ?>" required /><br>
              <label for="User-mail"><b>Admin E-mail:</b></label>
              <input class="form-control" type="email" name="up_email" placeholder="Enter your E-mail..."
                value="<?php echo $_SESSION['Admin-email']; ?>" required /><br>
              <label for="User-psw"><b>Password</b></label>
              <input class="form-control" type="password" name="up_pwd" placeholder="Enter your Password..." required /><br>
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
              <h3>Logout your account.</h3>
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

  <div class="modal fade" id="new-device" tabindex="-1" role="dialog" aria-labelledby="New Device" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h3 class="modal-title" id="exampleModalLongTitle">Add new device:</h3>
		        

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

		      </div>
		      <form action="" method="POST" enctype="multipart/form-data">
			      <div class="modal-body">
			      	<label for="User-mail"><b>Device Name:</b></label>
			      	<input class='form-control' type="text" name="dev_name" id="dev_name" placeholder="Device Name..." required/><br>
			      	<label for="User-mail"><b>Device Department:</b></label>
			      	<input class='form-control' type="text" name="dev_dep" id="dev_dep" placeholder="Device Department..." required/><br>
			      </div>
			      <div class="modal-footer">
			        <button type="button" name="dev_add" id="dev_add" class="btn btn-success">Create new Device</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
			  </form>
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

  <script type="text/javascript" src="./js/bootbox.min.js"></script>

  <script src="./js/dev_config.js"></script>
  <script>
    $(window).on("load resize ", function () {
      var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
      $('.tbl-header').css({ 'padding-right': scrollWidth });
    }).resize();
  </script>
  <script>
    $(document).ready(function () {


      // $.ajax({
      //   	url: "dev_up.php",
      //   	type: 'POST',
      //   	data: {
      //     'dev_up': 1,
      // 	}
      // 	}).done(function(data) {
      // 	$('#devices').html(data);
      // });

      var table = $('#devices2').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5'
        ],
        columns: [
          
          { "data": "device_name" },
          { "data": "device_dep" },
          { "data": "device_uid"},
          { "data": "device_date" },
          { "data": "device_mode" },
          { "data": "device_id" }

        ],
        
        
        columnDefs: [
          {
            targets: 0,
            render: function(data,type, row, meta){
              return '<b>'+data+'</b>'
            }
          },
          {
            targets: 2, // The column index where you want to render the button
            render: function (data, type, row, meta) {

              return data;

            }
          },
          {
            targets: 3, // The column index where you want to render the button
            render: function (data, type, row, meta) {

              // Create a Date object from the input date string
              const dateObject = new Date(data);

              // Get the month, day, and year from the Date object
              const month = (dateObject.getMonth() + 1).toString().padStart(2, '0');
              const day = dateObject.getDate();
              const year = dateObject.getFullYear();

              // Format the date as "month date year"
              const date = `${month}/${day}/${year}`;

              return date;

            }
          },
          {
            targets: 4, // The column index where you want to render the button
            render: function (data, type, row, meta) {

              var checked0 =  data === 0 ? 'checked' : '';
              var checked1 =  data === 1 ? 'checked' : '';

              return '<div class="mode_select">'+
    					      	'<input type="radio" id="'+row.id+'-one" name="'+row.id+'" class="mode_sel" data-id="'+row.id+'" value="0" '+checked0+' />'+
					            '<label for="">Enrollment</label><br>'+
		                  '<input type="radio" id="'+row.id+'" name="'+row.id+'" class="mode_sel" data-id="'+row.id+'" value="1" '+checked1+' />'+
					           '<label for="">Attendance</label>' +
					            '</div>';

            }
          },
          {
            targets: 5, // The column index where you want to render the button
            render: function (data, type, row, meta) {
              return '<td><button type="button" class="dev_uid_up btn btn-warning" id="del_'+ row.id +'" data-id="'+row.id+'" title="Update this device Token"><span class="glyphicon glyphicon-refresh"> </span>Update</button>'+
							        '</td>'+'<button type="button" class="dev_del btn btn-danger" id="del_'+ row.id +'" data-id="'+row.id+'" title="Delete this device"><span class="glyphicon glyphicon-trash"></span>Delete</button>';

            }
          }
          
        ]
        
      });

      // Make an AJAX request to fetch data
      $.ajax({
        url: 'dev_up2.php', // Replace with your data source URL
        type: 'GET', // You can use 'POST' if needed
        dataType: 'json',
        data: {
          'dev_up': 1
        },
        success: function (data) {
          // Clear the existing data in the DataTable
          table.clear().draw();
          console.log(data);

          // Insert the retrieved data into the DataTable
          table.rows.add(data).draw();
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log('AJAX Error: ' + errorThrown);
        }
      });


    });



  </script>

</body>

</html>