<?php
session_start();
if (isset($_SESSION['Admin-name'])) {
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/login.css">
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

    .hero-image {
      background-image: url("./Philscahangar.jpg");
      background-color: #031b28;
      height: 500px;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
    }
    .modal-content {
            background-color: #083248;
            color: #fff;
            /* Add any other styles you need */
        }
  </style>

  <!-- Custom styles for this template -->
  <link href="carousel.css" rel="stylesheet">

</head>
<body class='hero-image'>


<!-- <main>
  <h1 class="slideInDown animated">Please, Login with the Admin E-mail and Password</h1>
  <h1 class="slideInDown animated" id="reset">Please, Enter your Email to send the reset password link</h1>

<section>
  <div class="slideInDown animated">
    <div class="login-page">
      <div class="form">
        <?php  
          if (isset($_GET['error'])) {
            if ($_GET['error'] == "invalidEmail") {
                echo '<div class="alert alert-danger">
                        This E-mail is invalid!!
                      </div>';
            }
            elseif ($_GET['error'] == "sqlerror") {
                echo '<div class="alert alert-danger">
                        There a database error!!
                      </div>';
            }
            elseif ($_GET['error'] == "wrongpassword") {
                echo '<div class="alert alert-danger">
                        Wrong password!!
                      </div>';
            }
            elseif ($_GET['error'] == "nouser") {
                echo '<div class="alert alert-danger">
                        This E-mail does not exist!!
                      </div>';
            }
          }
          if (isset($_GET['reset'])) {
            if ($_GET['reset'] == "success") {
                echo '<div class="alert alert-success">
                        Check your E-mail!
                      </div>';
            }
          }
          if (isset($_GET['account'])) {
            if ($_GET['account'] == "activated") {
                echo '<div class="alert alert-success">
                        Please Login
                      </div>';
            }
          }
          if (isset($_GET['active'])) {
            if ($_GET['active'] == "success") {
                echo '<div class="alert alert-success">
                        The activation like has been sent!
                      </div>';
            }
          }
        ?>


        <div class="alert1"></div>
        <form class="reset-form" action="reset_pass.php" method="post" enctype="multipart/form-data">
          <input type="email" name="email" placeholder="E-mail..." required/>
          <button type="submit" name="reset_pass">Reset</button>
          <p class="message"><a href="#">LogIn</a></p>
        </form>
        <form class="login-form" action="ac_login2.php" method="post" enctype="multipart/form-data">
          <input type="email" name="email" id="email" placeholder="E-mail..." required/>
          <input type="password" name="pwd" id="pwd" placeholder="Password" required/>
          <button type="submit" name="login" id="login">login</button>
          <p class="message">Forgot your Password? <a href="#">Reset your password</a></p>
        </form>
      </div>  

    </div>
  </div>
</section>
</main> -->




<div class="slideInDown animated">
    <div class="login-page">
      <div class="form">
<div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

        
          
          <h4 class="col-lg-12 col-md-3 col-xs-3 thumb text-center">Login</h4>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button> -->

          <?php  
          if (isset($_GET['error'])) {
            if ($_GET['error'] == "invalidEmail") {
                echo '<div class="alert alert-danger">
                        This E-mail is invalid!!
                      </div>';
            }
            elseif ($_GET['error'] == "sqlerror") {
                echo '<div class="alert alert-danger">
                        There a database error!!
                      </div>';
            }
            elseif ($_GET['error'] == "wrongpassword") {
              
                echo '<div class="alert alert-danger">
                        Wrong password!!
                      </div>';
            }
            elseif ($_GET['error'] == "nouser") {
                echo '<div class="alert alert-danger">
                        This E-mail does not exist!!
                      </div>';
            }
          }
          if (isset($_GET['reset'])) {
            if ($_GET['reset'] == "success") {
                echo '<div class="alert alert-success">
                        Check your E-mail!
                      </div>';
            }
          }
          if (isset($_GET['account'])) {
            if ($_GET['account'] == "activated") {
                echo '<div class="alert alert-success">
                        Please Login
                      </div>';
            }
          }
          if (isset($_GET['active'])) {
            if ($_GET['active'] == "success") {
                echo '<div class="alert alert-success">
                        The activation like has been sent!
                      </div>';
            }
          }
        ?>


        </div>
        <div class="modal-body">
        <div class="row my-5">
            <div class="col-12 center">
              <div class="position-relative">
                <div class="position-absolute top-50 start-50 translate-middle"><img src="./AIS_YELLOW-removebg-preview.png" alt="" width='px' height='80px'></div>
              </div>            
            </div>
          </div>
          <div class="row my-5">
            <div class="col-12 center">
              <div class="position-relative">
                <div class="position-absolute top-50 start-50 translate-middle">Avionics Inventory System</div>
              </div>            
            </div>
          </div>
        <form class="reset-form" action="reset_pass.php" method="post" enctype="multipart/form-data">
          <input class="form-control" type="email" name="email" placeholder="E-mail..." required/>
          <button class="btn btn-primary form-control" type="submit" name="reset_pass">Reset</button>
          <p class="message" ><a href="#">LogIn</a></p>
        </form>
        <form class="login-form" action="ac_login2.php" method="post" enctype="multipart/form-data">
          <label for="email">Email</label>
          <input class="form-control mb-3" type="email" name="email" id="email" placeholder="E-mail..." required/>
          <label for="pwd">Password</label>
          <input class="form-control mb-3" type="password" name="pwd" id="pwd" placeholder="Password" required/>
          <button class="btn btn-primary form-control mb-3" type="submit" name="login" id="login" style="background-color: #dba858;">Sign in</button>
          <p class="message">Forgot your Password?</p> <a href="#"><p class="float-end">Reset your password</a></p>
        </form>
        </div>
        
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
      </div>
    </div>
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

<script>
      $(window).on("load resize ", function() {
          var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
          $('.tbl-header').css({'padding-right':scrollWidth});
      }).resize();
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click', '.message', function(){
          $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
          $('h1').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
      });
    </script>

</body>
</html>