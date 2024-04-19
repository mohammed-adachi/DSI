<?php
include "connexion.php";
   ob_start();
   session_start();
   $valid = ($_SESSION['valid'] == true) ? : header('Refresh: 2; URL = login.php') ;

      


?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Contact - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Contact</h1>
    </div><!-- End Page Title -->

    <section class="section contact">

      <div class="row gy-4">

        <div class="col-xl-6">

          <div class="row">
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p>A108 Adam Street,<br>New York, NY 535022</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p>info@example.com<br>contact@example.com</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-clock"></i>
                <h3>Open Hours</h3>
                <p>Monday - Friday<br>9:00AM - 05:00PM</p>
              </div>
            </div>
          </div>

        </div>



        <?php
                  $msg = '';

            
            if (isset($_POST['submit']) && !empty($_POST['email']))
              { 
                $user =selectobject("select * from employe WHERE EMAIL='".$_POST['email']."'");
               if ($_POST['email'] == $user["EMAIL"]) 
               {     
InsertOrUpdate("INSERT INTO donner VALUES('".$user["ID_EMLPOYE"]."','1','".date("Y-m-d")."','".$_POST['checkbox']."')");
              }  
                
            }  
           
         ?>   


        <div class="col-xl-6">
          <div class="card p-4">
            <form action="" method="post" class="email-form">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="First Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="text" class="form-control" name="last" placeholder="Last Name" required>
                </div>

                <div class="col-md-12">
                  <input type="email" class="form-control" name="email" placeholder="email" required>
                </div>

                <div class="col-md-12">
                  <h3>es tu satisfait</h3>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="checkbox" id="oui" value="1" checked>
                  <label class="form-check-label" for="oui">
                   oui
                     </label>
                     </div>
                     <div class="form-check">
                      <input class="form-check-input" type="radio" name="checkbox" id="non" value="0">
                      <label class="form-check-label" for="non">
                         non
                       </label>
                     </div>

                </div>

                <button type="submit" name="submit" class="btn btn-primary">Send</button>
              </div>
            </form>
          </div>

        </div>

      </div>

    </section>

  </main><!-- End #main -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>