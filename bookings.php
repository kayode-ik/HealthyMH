<?php
session_start();
ob_start();
include "Functionss.php";
?>

<?php
if (isset($_POST['submit'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $phone = $_POST['phoneNumber'];
  $date = $_POST['date'];
  $booktime = $_POST['booktime'];
  $details = $_POST['details'];



  $object = new Functionss();
  $response = array();
  $response = $object->postFormUser($firstname, $lastname, $email, $phone, $date, $booktime, $details);
  // $result = $object->sendBookingEmail($firstname,$lastname,$email,$phone,$date,$booktime, $details);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Healthy Marriage Hub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../../stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="hmhstyle.css">

  <link rel="shortcut icon" type="image/x-icon" href="/images/Logo_favicon.png">
  <!-- Place favicon.ico in the root directory -->
  <style>
    .container2 {
      display: inline-block;
      cursor: pointer;
    }

    .bar1,
    .bar2,
    .bar3 {
      width: 35px;
      height: 5px;
      background-color: #000;
      margin: 6px 0;
      transition: 0.4s;
    }

    .change .bar1 {
      -webkit-transform: rotate(-45deg) translate(-9px, 6px);
      transform: rotate(-45deg) translate(-9px, 6px);
    }

    .change .bar2 {
      opacity: 0;
    }

    .change .bar3 {
      -webkit-transform: rotate(45deg) translate(-8px, -8px);
      transform: rotate(45deg) translate(-8px, -8px);
    }

    .clearfix {
      clear: both;
    }
  </style>

</head>

<body>
  <div class="wrap">
    <div class="container">
      <div class="row">

        <!-- == CONTACT DETAILS == -->
        <div class="col-md-6 d-flex align-items-center">
          <p class="mb-0 phone pl-md-2">
            <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> 555 67 78 564</a>
            <a href="#" class="mr-2"><span class="fa fa-mail mr-1"></span>hello@thehealthymarriage.com</a>

            <!-- <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> Address</a> -->

          </p>
        </div>

        <!-- ==SOCIAL MEDIA LINKS FA-FA -->
        <div class="col-md-6 d-flex justify-content-md-end">
          <div class="social-media">
            <p class="mb-0 d-flex">
              <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
              <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
              <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="/images/LogoNew03.png" alt="image"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span>
        <div class="container2" onclick="myFunction(this)">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
      </button>

      <!-- ===NAVBAR MENU LINKS  ==-->
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item "><a href="about.php" class="nav-link">About</a></li>
          <li class="nav-item "><a href="services.php" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
          <li class="nav-item active"><a href="booking.php" class="nav-link" style="
    background: #e1ad01;
    color: white;" >Book Now</a></li>

        </ul>
      </div>
    </div>
  </nav>

  <section class="hero-wrap hero-wrap-2" id="services_header" style="    margin-top: 64px;
  margin-bottom: -50px;
">
    <!-- <div class="overlay"></div> -->
    <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate mb-5 text-center">
          <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span>
          </p>
          <h3 class="mb-0 bread">Bookings</h3>
        </div>
      </div>
    </div>
  </section>

  <!-- Booking now section -->

  <section style=
  "margin-top: 57px;font-family: 'flaticon'; 
  margin-left: 30px; margin-right: 30px; margin-bottom: 57px;">
    <div class="container">
      <div class="row">
          <div class="col-md-6">
            <div class="elegant-calencar">
              <!-- <p id="reset">reset</p> -->
              <div id="header" class="clearfix">
                <div class="pre-button"></div>
                  <div class="head-info">
                    <div class="head-day"></div>
                    <div class="head-month"></div>
                  </div>
                  <!-- <div class="next-button">></div> -->
                <table id="calendar">
                  <thead>
                    <tr>
                      <th>Sun</th>
                      <th>Mon</th>
                      <th>Tue</th>
                      <th>Wed</th>
                      <th>Thu</th>
                      <th>Fri</th>
                      <th>Sat</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

            <div class="col-md-6">
              <!-- <h2>Vertical (basic) form</h2> -->
              <form action="#" method="post">
              <?php
                        // check for a successful form post  
                        if (isset($response) && $response['response_code'] == 0) {
                            echo "<div class=\"alert alert-success\"><b style='color: green'>" . $response['response_message'] . "</b></div><br>";
                        }
                        // check for a error form post  
                        if (isset($response) && $response['response_code'] < 0) {
                            echo "<div class=\"alert alert-danger\"><b style='color: red'>"  . $response['response_message'] . "</b></div><br>";
                        }

                        ?>
                <div class="form-group">
                  <label style="font-size: 22px;" for="firstname">Firstname:</label>
                  <input type="text" class="form-control" id="firstname" placeholder="Enter Firstname" name="firstname">
                </div>
                <div class="form-group">
                  <label style="font-size: 22px;" for="lastname">Lastname:</label>
                  <input type="lastname" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname">
                </div>
                <div class="form-group">
                  <label style="font-size: 22px;" for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                  <label for="lastname">Phone Number:</label>
                  <input type="text" class="form-control" id="phoneNumber" placeholder="Enter phoneNumber" name="phoneNumber">
                </div>
                <div class="form-group">
                  <label style="font-size: 22px;" for="lastname">Date:</label>
                  <input type="date" class="form-control" id="date" placeholder="Enter Date" name="date">
                </div>
                <div class="form-group">
                  <label style="font-size: 22px;" for="prefDate">Pick Appointment Time</label>
                  <div>
                    <select name="booktime" class="form-control" aria-label="Default select example">
                      <option selected>Pick a Time</option>
                      <option value="8am-8:50am">8am-8:50am</option>
                      <option value="9am-9:50am">9am-9:50am</option>
                      <option value="10am-10:50am">10am-10:50am</option>
                      <option value="11am-11:50am">11am-11:50am</option>
                      <option value="12pm-12:50pm">12pm-12:50pm</option>
                      <option value="1pm-1:50pm">1pm-1:50pm</option>
                      <option value="2pm-2:50pm">2pm-2:50pm</option>
                      <option value="3pm-3:50pm">3pm-3:50pm</option>
                      <option value="4pm-4:50pm">4pm-4:50pm</option>
                    </select>
                  </div>
                </div>
                <div class="form-group w-100">
                  <label style="font-size: 22px;" for="lastname">Details:</label>
                  <div>
                    <textarea class=" w-100" name="details" id="details" cols="10" rows="5"></textarea>
                  </div>
                </div>

                <button value="Submit" type="submit" name="submit" class="btn btn-primary w-50">Send</button>
              </form>
            </div>
        </div>
      </div>
  </section>




  <!-- ==== FOOTER SECTION === -->
  <footer class="ftco-footer">
    <div class="container">
      <div class="row mb-5">

        <!-- == LOGO DIV  == -->
        <div class="col-sm-12 col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2 logo"><a class="navbar-brand" href="index.php"><img src="/images/LogoNew02.png" alt="image"></a></h2>
            <p>Counseling For Your Better Life.</p>
            <ul class="ftco-footer-social list-unstyled mt-2">
              <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a>
              </li>
              <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
            </ul>
          </div>
        </div>

        <!--  == EXPLORE DIV == -->
        <div class="col-sm-12 col-md">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">Explore</h2>
            <ul class="list-unstyled">
              <li><a href="about.php"><span class="fa fa-chevron-right mr-2"></span>About</a></li>
              <li><a href="services.php"><span class="fa fa-chevron-right mr-2"></span>Services</a></li>
              <li><a href="contact.php"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
            </ul>
          </div>
        </div>

        <!--  === LEGAL DIV == -->
        <div class="col-sm-12 col-md">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">Legal</h2>
            <ul class="list-unstyled">
              <li><a href="contact.php"><span class="fa fa-chevron-right mr-2"></span>Join us</a></li>
              <li><a href="blog.php"><span class="fa fa-chevron-right mr-2"></span>Blog</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Privacy &amp; Policy</a></li>
              <!-- <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Term &amp; Conditions</a></li> -->
            </ul>
          </div>
        </div>

        <!-- ==== COMPANY DIV == -->
        <div class="col-sm-12 col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Company</h2>
            <ul class="list-unstyled">
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>About Us</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Blog</a></li>
              <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
            </ul>
          </div>
        </div>

        <!-- HAVE A QUESTION -->
        <div class="col-sm-12 col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon fa fa-map marker"></span><span class="text">Address</span></li>
                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">555 67 78 564</span></a></li>
                <li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span class="text"><span class="__cf_email__" data-cfemail="bfd6d1d9d0ffc6d0cacddbd0d2ded6d191dcd0d2">hello@thehealthymarriage</span></span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--  === COPYRIGHT DIV ===  -->
    <div class="container-fluid px-0 py-5 bg-black">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p class="mb-0" style="color: rgba(255,255,255,.5);">
              Copyright &copy;
              <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
              <script>
                document.write(new Date().getFullYear());
              </script> All rights reserved
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var datePicker = document.getElementById('prefDate');
      var instances = M.Datepicker.init(datePicker);
    });
  </script>
  <script>
    function myFunction(x) {
      x.classList.toggle("change");
    }
  </script>
  <script src="bookings.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/counselor/services.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Feb 2021 08:06:34 GMT -->

</html>