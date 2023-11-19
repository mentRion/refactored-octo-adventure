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
              <a class="nav-link active" aria-current="page" href="index.php">Users</a>
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
              echo '<a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#admin-account">' . $_SESSION['Admin-name'] . '</a>';
              echo '</li>';

              echo '<li type="" class="nav-item">';
              echo '<a class="nav-link" data-bs-toggle="modal" data-bs-target="#logout-account" >Log Out</a>';
              echo '</li>';
            } else {
              echo '<a href="login2.php">Log In</a>';
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
      <div class="panel-heading">Your Devices:
        <div class="row featurette">
          <div class="col">
          <!-- <div id="devices">
          </div> -->

            <table id="devices2" class="table-responsive-sm display">
              <thead>
              <tr>
                <th>Name</th>
                <th>Department</th>
                <th>UID</th>
                <th>Date</th>
                <th>Mode</th>
                <th>Config</th>
              </tr>
              </thead>
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
            targets: 2, // The column index where you want to render the button
            render: function (data, type, row, meta) {

              return '<td><button type="button" class="dev_uid_up btn btn-warning" id="del_'+ row.id +'" data-id="'+row.id+'" title="Update this device Token"><span class="glyphicon glyphicon-refresh"> </span>Update</button>'+
                      data +
							        '</td>';

            }
          },
          {
            targets: 4, // The column index where you want to render the button
            render: function (data, type, row, meta) {

              var checked0 =  data === 0 ? 'checked' : '';
              var checked1 =  data === 1 ? 'checked' : '';

              return '<div class="mode_select">'+
    					      	'<input type="radio" id="'+row.id+'-one" name="'+row.id+'" class="mode_sel" data-id="'+row.id+'" value="0" '+checked0+' />'+
					            '<label for="">Enrollment</label>'+
		                  '<input type="radio" id="'+row.id+'" name="'+row.id+'" class="mode_sel" data-id="'+row.id+'" value="1" '+checked1+' />'+
					           '<label for="">Attendance</label>' +
					            '</div>';

            }
          },
          {
            targets: 5, // The column index where you want to render the button
            render: function (data, type, row, meta) {
              return '<button type="button" class="dev_del btn btn-danger" id="del_'+ row.id +'" data-id="'+row.id+'" title="Delete this device"><span class="glyphicon glyphicon-trash"></span>Delete</button>';

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