<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login2.php");
}
?>
<!DOCTYPE html>
<html>

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
    .text-yellow{
        color: white;
      }
  </style>

  <!-- Custom styles for this template -->
  <link href="carousel.css" rel="stylesheet">
</head>

<body style='background-color:#083248'>



  <header  class='text-yellow'>
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



  <section class="container pt-lg-5"  class='text-yellow'>
    <!--User table-->
    <!-- <h3 class="slideInDown animated">Here are the Users daily logs</h3> -->
    
    <!-- Log filter -->
    <div class="modal fade bd-example-modal-lg" id="Filter-export" tabindex="-1" role="dialog"
      aria-labelledby="Filter/Export" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg animate" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLongTitle">Filter Your User Log:</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        </div>
      </div>
    </div>



    <!-- //Log filter -->
    <div class="slideInRight animated">
      <div id="userslog"></div>
    </div>
  </section>
  </main>

  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Tool</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- <form method="POST" action="Export_Excel.php" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-6 col-sm-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">Filter By Date:</div>
                      <div class="panel-body">
                      <label for="Start-Date"><b>Select from this Date:</b></label>
                      <input type="date" name="date_sel_start" id="date_sel_start">
                      <label for="End -Date"><b>To End of this Date:</b></label>
                      <input type="date" name="date_sel_end" id="date_sel_end">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                          Filter By:
                        <div class="time">
                          <input type="radio" id="radio-one" name="time_sel" class="time_sel" value="Time_in" checked/>
                          <label for="radio-one">Time-in</label>
                          <input type="radio" id="radio-two" name="time_sel" class="time_sel" value="Time_out" />
                          <label for="radio-two">Time-out</label>
                        </div>
                      </div>
                      <div class="panel-body">
                        <label for="Start-Time"><b>Select from this Time:</b></label>
                        <input type="time" name="time_sel_start" id="time_sel_start">
                        <label for="End -Time"><b>To End of this Time:</b></label>
                        <input type="time" name="time_sel_end" id="time_sel_end">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-sm-12">
                    <label for="Fingerprint"><b>Filter By User:</b></label>
                    <select class="card_sel" name="card_sel" id="card_sel">
                      <option value="0">All Users</option>
                      <?php
                      require 'connectDB.php';
                      $sql = "SELECT * FROM users WHERE add_card=1 ORDER BY id ASC";
                      $result = mysqli_stmt_init($conn);
                      if (!mysqli_stmt_prepare($result, $sql)) {
                        echo '<p class="error">SQL Error</p>';
                      } else {
                        mysqli_stmt_execute($result);
                        $resultl = mysqli_stmt_get_result($result);
                        while ($row = mysqli_fetch_assoc($resultl)) {
                          ?>
                              <option value="<?php echo $row['card_uid']; ?>"><?php echo $row['username']; ?></option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-lg-4 col-sm-12">
                    <label for="Device"><b>Filter By Device department:</b></label>
                    <select class="dev_sel" name="dev_sel" id="dev_sel">
                      <option value="0">All Departments</option>
                      <?php
                      require 'connectDB.php';
                      $sql = "SELECT * FROM devices ORDER BY device_dep ASC";
                      $result = mysqli_stmt_init($conn);
                      if (!mysqli_stmt_prepare($result, $sql)) {
                        echo '<p class="error">SQL Error</p>';
                      } else {
                        mysqli_stmt_execute($result);
                        $resultl = mysqli_stmt_get_result($result);
                        while ($row = mysqli_fetch_assoc($resultl)) {
                          ?>
                              <option value="<?php echo $row['device_uid']; ?>"><?php echo $row['device_dep']; ?></option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-lg-4 col-sm-12">
                    <label for="Fingerprint"><b>Export to Excel:</b></label>
                    <input type="submit" name="To_Excel" value="Export">
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" name="user_log" id="user_log" class="btn btn-success">Filter</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </form> -->

        </div>
        <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
      </div>
    </div>
  </div>



    <!-- Modal -->
    <div class="modal fade" id="addBorrowedTool" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-6 col-sm-6">
                    <div class="panel panel-primary">

                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="panel panel-primary">

                    <label for="tool_name"><b>Select Tool:</b></label > 
                    <input class="borrower" name="borrower" id="borrower"></input>
                    <select class="card_sel form-control" name="card_sel" id="card_sel">
                    <?php
                      require 'connectDB.php';
                      $sql = "SELECT * FROM tool";
                      $result = mysqli_stmt_init($conn);
                      if (!mysqli_stmt_prepare($result, $sql)) {
                        echo '<p class="error">SQL Error</p>';
                      } else {
                        mysqli_stmt_execute($result);
                        $resultl = mysqli_stmt_get_result($result);
                        while ($row = mysqli_fetch_assoc($resultl)) {
                          ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['tool_name']; ?></option>
                          <?php
                        }
                      }
                      ?>
                      </select>
                     
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" name="user_log" id="user_log" class="btn btn-success">Filter</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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



  <section class="container py-lg-5"  class='text-yellow'>
    <!-- Log filter -->
    <div class="modal fade bd-example-modal-lg" id="Filter-export" tabindex="-1" role="dialog"
      aria-labelledby="Filter/Export" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg animate" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLongTitle">Filter Your User Log:</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        </div>
      </div>
    </div>

    <!-- <div class="row">
      <div class="col-4">
        <label for="Start-Date"><b>Select from this Date:</b></label>
        <input class="form-control" type="date" name="date_sel_start" id="date_sel_start" value="2023-07-30">
      </div>
      <div class="col-4">
        <label for="End -Date"><b>To End of this Date:</b></label>
        <input class="form-control" type="date" name="date_sel_end" id="date_sel_end" value="2023-10-31">
      </div>
      <div class="col-4">
        <label for="radio-one">Time-in</label>
        <input type="radio" id="radio-one" name="time_sel" class="time_sel" value="Time_in" checked />
        <hr>
        <label for="radio-two">Time-out</label>
        <input type="radio" id="radio-two" name="time_sel" class="time_sel" value="Time_out" />
      </div>
      <div class="col-4">
        <label for="Start-Time"><b>Select from this Time:</b></label>
        <input class="form-control" type="time" name="time_sel_start" id="time_sel_start" value="06:19">

      </div>
      <div class="col-4">
        <label for="End-Time"><b>To End of this Time:</b></label>
        <input class="form-control" type="time" name="time_sel_end" id="time_sel_end" value="18:19">
      </div>
      <div class="col-4">
      <label for="Fingerprint"><b>Filter By User:</b></label>
        <select class="form-control card_sel" name="card_sel" id="card_sel">
          <option value="0">All Users</option>
          <?php
          require 'connectDB.php';
          $sql = "SELECT * FROM users WHERE add_card=1 ORDER BY id ASC";
          $result = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($result, $sql)) {
            echo '<p class="error">SQL Error</p>';
          } else {
            mysqli_stmt_execute($result);
            $resultl = mysqli_stmt_get_result($result);
            while ($row = mysqli_fetch_assoc($resultl)) {
              ?>
              <option value="<?php echo $row['card_uid']; ?>">
                <?php echo $row['username']; ?>
              </option>
              <?php
            }
          }
          ?>
        </select>
      </div>
      <div class="col-4">
      <label for="Device"><b>Filter By Device department:</b></label>
        <select class="form-control dev_sel" name="dev_sel" id="dev_sel">
          <option value="0">All Departments</option>
          <?php
          require 'connectDB.php';
          $sql = "SELECT * FROM devices ORDER BY device_dep ASC";
          $result = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($result, $sql)) {
            echo '<p class="error">SQL Error</p>';
          } else {
            mysqli_stmt_execute($result);
            $resultl = mysqli_stmt_get_result($result);
            while ($row = mysqli_fetch_assoc($resultl)) {
              ?>
              <option value="<?php echo $row['device_uid']; ?>">
                <?php echo $row['device_dep']; ?>
              </option>
              <?php
            }
          }
          ?>
        </select>
      </div>
      <div class="col-4">
        <label for="user_log">Load</label>
        <button type="button" name="user_log" id="user_log" class="btn btn-success form-control">Load</button>
      </div>
    </div> -->

    

    <!-- //Log filter -->
    <div class="slideInRight animated"  class='text-yellow'>

      <div id="userslog"></div>

      <table id="usersLog" class="display table-responsive-sm text-yellow" style='background: #dba858'>

        <thead style='background: #E89C31'>
          <tr>
            <th>+</th>
            <!-- <th>Id</th> -->
            <th>Name</th>
            <!-- <th>S. No</th> -->
            <!-- <th>Card uid</th> -->
            <!-- <th>Device Dep</th> -->
            <!-- <th>Date</th> -->
            <!-- <th>Time in</th> -->
            <!-- <th>Time out</th> -->
            <!-- <th>Item hold</th> -->
            <th>Count</th>
          </tr>
        </thead>

        <tbody id="dtbody">

        </tbody>
      </table>

    </div>
  </section>



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

  

  <footer class="container">
  <hr class="featurette-divider" style='margin-top: 150px;'>
      <p class="float-end"><a href="#">Back to top</a></p>
      <img src="./AIS_YELLOW-removebg-preview.png" alt="" width='80px' height='50px'>
      <p>Avionics Inventory System </p>
    </footer>

  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="./dist/js/jquery-3.7.0.js"></script>
  <script src="./dist/js/jquery.dataTables.min.js"></script>
  <script src="./dist/js/dataTables.buttons.min.js"></script>
  <script src="./dist/js/jszip.min.js"></script>
  <script src="./dist/js/pdfmake.min.js"> </script>
  <script src="./dist/js/vfs_fonts.js"></script>
  <script src="./dist/js/buttons.html5.min.js"></script>
  <!-- <script src="./script.js"></script> -->
  <script src="./js/user_log.js"></script>

  <script>

    $(window).on("load resize ", function () {
      var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
      $('.tbl-header').css({ 'padding-right': scrollWidth });
    }).resize();

  </script>
  <script>

    $(document).ready(function () {

      var date_sel_start = $('#date_sel_start').val();
      console.log('date_sel_start: ' + date_sel_start);
      var date_sel_end = $('#date_sel_end').val();
      console.log('date_sel_end '+date_sel_end)
      var time_sel = $(".time_sel:checked").val();
      console.log('time_sel '+time_sel)
      var time_sel_start = $('#time_sel_start').val();
      console.log('time_sel_start '+time_sel_start)
      var time_sel_end = $('#time_sel_end').val();
      console.log('time_sel_end ' + time_sel_end)
      var card_sel = $('#card_sel option:selected').val();
      console.log('card_sel '+card_sel)
      var dev_uid = $('#dev_sel option:selected').val();
      console.log('dev_sel '+dev_uid)

      // $.ajax({
      //   url: "user_log_up.php",
      //   type: 'POST',
      //   data: {
      //       'select_date': 1,
      //   }
      //   }).done(function(data) {
      //     $('#userslog').html(data);
      //   });

      // setInterval(function(){
      //   $.ajax({
      //     url: "user_log_up.php",
      //     type: 'POST',
      //     data: {
      //         'select_date': 0,
      //     }
      //     }).done(function(data) {
      //       $('#userslog').html(data);
      //     });
      // },5000);
      
      var table = $('#usersLog').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5'
        ],
        columns: [
          { "data": "" },
          // { "data": "id" },
          { "data": "username" },
          // { "data": "serialnumber" },
          // { "data": "card_uid" },
          // { "data": "device_dep" },
          // { "data": "checkindate" },
          // { "data": "timein" },
          // { "data": "timeout" },
          // { "data": "itemhold" },
          { "data": "count"}
        ],
        columnDefs: [
          {
            targets: 0, // The column index where you want to render the button
            render: function (data, type, row, meta) {
              // return '<form><button type="button" class="btn btn-primary select_btn" id="' + data + '" title="select this UID">' + data + '</button></form>';
              return '<button type="button" class="btn" style="background-color:#e89c31">' + '+' + '</button>';
            }
          },

          {
            targets: 1, // The column index where you want to render the button
            render: function (data, type, row, meta) {
              // return '<form><button type="button" class="btn btn-primary select_btn" id="' + data + '" title="select this UID">' + data + '</button></form>';
              return '<b>' + data + '</b>';
            }
          },

          {
            targets: 2, // The column index where you want to render the button
            render: function (data, type, row, meta) {
              // return '<form><button type="button" class="btn btn-primary select_btn" id="' + data + '" title="select this UID">' + data + '</button></form>';
              return '<b>' + data + '</b>';
            }
          }
          

        ],
        order: [[1, 'asc']]
      });



      // Add a click event listener to the table body
    $('#usersLog tbody').on('click', 'tr', function () {

        var currentRow = table.row(this);
        var isCollapsed = currentRow.child.isShown();

        // Collapse or expand rows with the same username
        table.rows().eq(0).each(function (index) {
            var row = table.row(index);
            if (row.data().username === currentRow.data().username) {
              let data = format(row.data());
              console.log('format data: ' + data);
                if (isCollapsed) {
                    row.child(data).hide();
                    console.log('hide');
                } else {
                    row.child(data).show();
                    console.log('show');
                }
            }
        });

        // Toggle the collapse/expand icon in the group row
        //$(this).toggleClass('collapsed');

        // Redraw the table
        table.draw();
    });

    var getdata = [];

    function passdata(from){
      let datafrom = from
      getdata = datafrom
    }

    function format(data) {

      console.log(data.username);
        // This function returns the content for the child row
        // You can customize this based on your data structure
          let ret = $.ajax({
          url: 'user_item.php', // Replace with your data source URL
          type: 'GET', // You can use 'POST' if needed
          dataType: 'json',
          data: {
              'username': data.username,
              'log_date': 1,
              'date_sel_start': $('#date_sel_start').val(),
              'date_sel_end': $('#date_sel_end').val(),
              'time_sel_start': time_sel_start,
              'time_sel_end': time_sel_end,
              'dev_uid': dev_uid,
              'time_sel': time_sel,
              'card_sel': 0,
              'select_date': 0,

          },
          success: function (data) {
            passdata(data)
            console.log(getdata)          
            // Insert the retrieved data into the DataTable
          },
          error: function (jqXHR, textStatus, errorThrown) {
            passdata([])
            console.log('AJAX Error: ' + errorThrown);
          }
        });

        let _lineitem0 = 
        '<table class="table border">'+
        '<thead>'+
          '<tr>'+
            '<th scope="col">+</th>'+
            '<th scope="col">USER</th>'+
            '<th scope="col">ID</th>'+
            '<th scope="col">TOOL</th>'+
            // '<th scope="col">serialnumber</th>'+
            // '<th scope="col">username</th>'+
            
            '<th scope="col">UID</th>'+
            // '<th scope="col">device_dep</th>'+
            '<th scope="col">DATE</th>'+
            '<th scope="col">TIME IN</th>'+
            '<th scope="col">TIME OUT</th>'+
            
          '</tr>'+
        '</thead>'+
        '<tbody>';
          
      

        getdata.forEach(
          (p) => {
            let checkdate = p.checkindate
            checkdate = checkdate.replace('-','/');
            checkdate = checkdate.replace('-','/');

            let button = ''
            if(p.timeout == '00:00:00'){
              button = '<button class="tool_borrow" data-username="'+p.username+'" data-id="'+p.id+'" data-card_uid="'+p.card_uid+'" data-checkdate="'+p.checkdate+'" data-timein="'+p.timein+'" data-timeout="'+p.timeout+'">+</button>'
            }
           
             _lineitem0 += '<tr>'+
                    '<th scope="row">+</th>'+
                    '<td><b>'+p.username+'</b></td>'+
                    '<td>'+p.id+'</td>'+
                    '<td>' + button + '</td>'+
                    // '<td>'+p.serialnumber+'</td>'+
                    '<td>'+p.card_uid+'</td>'+
                    '<td>'+ checkdate +'</td>'+
                    // '<td>'+p.device_dep+'</td>'+
                    // '<td>'+p.checkindate+'</td>'+
                    '<td><b>'+p.timein+'</b></td>'+
                    '<td><b>'+p.timeout+'</b></td>'+
                  '</tr>'
            });
        _lineitem0 +=
          '</tbody>' +
          '</table>'
       
        let _data = getdata;
        console.log('data ' + _data);
        console.log("--" + getdata);
        console.log("--" + ret);

        // return '<div>' + data.username + ' Details</div>';
        return _lineitem0;
    }

    $(document).on('click', '.tool_borrow', function(res) {


      $('#addBorrowedTool').modal('show'); 
      
      console.log($(this).data('id'))
      console.log($(this).data('username'))
      console.log($(this).data('card_uid'))
      console.log($(this).data('checkdate'))
      console.log($(this).data('timein'))
      console.log($(this).data('timeout'))

      $('#borrower.value').val($(this).data('id'));



      // alert(this);
    })

    
    
      // Make an AJAX request to fetch data
      //http://localhost/rfidattendance/user_log_up2.php?select_date=0&log_date=2023-01-01&date_sel_start=2023-01-01&date_sel_end=2023-12-31&time_sel=&card_sel=0&dev_uid=0
      // http://localhost/rfidattendance/user_log_up2.php?
      // select_date=0&
      // log_date=2023-01-01&
      // date_sel_start=2023-01-01&
      // date_sel_end=2023-12-31&
      // time_sel=&
      // card_sel=0&
      // dev_uid=0
      $.ajax({
        url: 'user_log_up2.php', // Replace with your data source URL
        type: 'GET', // You can use 'POST' if needed
        dataType: 'json',

        data: {
              'log_date': 1,
              'date_sel_start': $('#date_sel_start').val(),
              'date_sel_end': $('#date_sel_end').val(),
              'time_sel_start': time_sel_start,
              'time_sel_end': time_sel_end,
              'dev_uid': dev_uid,
              'time_sel': time_sel,
              'card_sel': 0,
              'select_date': 0,

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

      // setInterval(function () {
      //   $.ajax({
      //     url: 'user_log_up2.php', // Replace with your data source URL
      //     type: 'GET', // You can use 'POST' if needed
      //     data: {
      //       'log_date': 1,
      //       'date_sel_start': date_sel_start,
      //       'date_sel_end': date_sel_end,
      //       'time_sel_start': time_sel_start,
      //       'time_sel_end': time_sel_end,
      //       'dev_uid': dev_uid,
      //       'time_sel': time_sel,
      //       'card_sel': 0,
      //       'select_date': 0,
      //     },
      //     success: function (data) {
      //       // Clear the existing data in the DataTable
      //       table.clear().draw();

      //       // Insert the retrieved data into the DataTable
      //       table.rows.add(data).draw();
      //     },
      //     error: function (jqXHR, textStatus, errorThrown) {
      //       console.log('AJAX Error: ' + errorThrown);
      //     }
      //   });
      // }, 5000)

      // setInterval(function(){
      // 	$.ajax({
      // 		url: 'user_log_up2.php?select_date=0&log_date=2023-01-01&date_sel_start=2023-01-01&date_sel_end=2023-12-31&time_sel=&card_sel=0&dev_uid=0', // Replace with your data source URL
      // 		type: 'GET', // You can use 'POST' if needed
      // 		dataType: 'json',
      // 		success: function(data) {
      // 			// Clear the existing data in the DataTable
      // 			table.clear().draw();

      // 			// Insert the retrieved data into the DataTable
      // 			table.rows.add(data).draw();
      // 		},
      // 		error: function(jqXHR, textStatus, errorThrown) {
      // 			console.log('AJAX Error: ' + errorThrown);
      // 		}
      // 	});
      // },5000);

    });




    // $('#example').DataTable({
    // 		dom: 'Bfrtip',
    // 		buttons: [
    // 			'copyHtml5',
    // 			'excelHtml5',
    // 			'csvHtml5',
    // 			'pdfHtml5'
    // 		]
    // 	});

  </script>

</body>

</html>