<?php
   ob_start();
   session_start();
   $valid = ($_SESSION['valid'] == true) ? : header('Refresh: 2; URL = login.php') ;
   include "connexion.php";


   $var0 = selectcount('select count(avis) from donner where avis ="0";');
   $var1 = selectcount('select count(avis) from donner where avis ="1";');
   $var2 = selectcount('select count(ID_EMLPOYE) from employe');

   $vaf1=intval($var0['0']);
   $vaf2=intval($var1['0']);
   $vaf3=intval($var2['0'])-(intval($var0['0'])+intval($var1['0']));

   $data = array($vaf1, $vaf2, $vaf3);


?>
        
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Charts / Chart.js - NiceAdmin Bootstrap Template</title>
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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

   <?php include "header.php"; ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Chart.js</h1>
     
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">nombre des machines en panne par rapport au temps </h5>
              <?php 
              $msg = '';
            if (isset($_POST['submit1']) && !($_POST['combobox1'] > $_POST['combobox2'])
              && !($_POST['combobox1'] == $_POST['combobox2'])) {

$_SESSION['var1']='select count(ID_MACHINE) from reparer WHERE datereparetion 
BETWEEN "'.$_POST['combobox1'].'" and "'.$_POST['combobox2'].'"group by datereparetion';

$_SESSION['var2'] ='select DISTINCT datereparetion from reparer WHERE datereparetion 
BETWEEN "'.$_POST['combobox1'].'" and "'.$_POST['combobox2'].'" order by datereparetion';

            }else{
  $_SESSION['var1'] = "select count(ID_MACHINE) from reparer group by datereparetion";
  $_SESSION['var2'] ='select DISTINCT datereparetion from reparer order by datereparetion';

            } ?>

              <form method="post" action="<?=$_SERVER['PHP_SELF']?>" >
        <?php $variable1 =select("select DISTINCT datereparetion from reparer ORDER by datereparetion"); ?>
                  <label >Entre ça:</label>
                  <select name="combobox1">
                    <?php foreach ($variable1 as $value) :?>
                    <option value=<?=$value; ?>> <?=$value; ?> </option>
                    <?php endforeach;?>
                  </select>
                  <label>ça :</label>
                  <select name="combobox2">
                    <?php foreach ($variable1 as $value) :?>
                    <option value=<?=$value; ?>> <?=$value; ?> </option>
                    <?php endforeach;?>
                  </select>

                  <input type="submit" name="submit1">
              </form>
              <canvas id="lineChart" style="max-height: 400px;"></canvas>
              <!-- End Line CHart -->

            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">nombre des soulitions par rapport au temps </h5>
              <?php 
              $msg = '';
                    if (isset($_POST['submit2']) && !($_POST['combobox3'] > $_POST['combobox4'])
                      && !($_POST['combobox3'] == $_POST['combobox4'])) {

                $_SESSION['var3']='select  count(ID_SOULITION) from soulition WHERE DATE_ACHATS 
                BETWEEN "'.$_POST['combobox3'].'" and "'.$_POST['combobox4'].'"group by DATE_ACHATS';

                $_SESSION['var4'] ='select DISTINCT DATE_ACHATS from soulition WHERE DATE_ACHATS 
                BETWEEN "'.$_POST['combobox3'].'" and "'.$_POST['combobox4'].'" order by DATE_ACHATS';

                    }else{
          $_SESSION['var3'] ="select  count(ID_SOULITION) from soulition group by DATE_ACHATS";
          $_SESSION['var4'] ="select DISTINCT DATE_ACHATS from soulition order by DATE_ACHATS";
            } ?>

              <form method="post" action="<?=$_SERVER['PHP_SELF']?>" >
        <?php $variable2 = select("select DISTINCT (DATE_ACHATS) from soulition ORDER by DATE_ACHATS"); ?>
                  <label >Entre ça:</label>
                  <select name="combobox3">
                    <?php foreach ($variable2 as $value) :?>
                    <option value=<?=$value; ?>> <?=$value; ?> </option>
                    <?php endforeach;?>
                  </select>
                  <label>ça :</label>
                  <select name="combobox4">
                    <?php foreach ($variable2 as $value) :?>
                    <option value=<?=$value; ?>> <?=$value; ?> </option>
                    <?php endforeach;?>
                  </select>
                  <input type="submit" name="submit2">
              </form>

              <!-- Bar Chart -->
              <canvas id="barChart" style="max-height: 400px;"></canvas>
              
              <!-- End Bar CHart -->

            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">avis pour les employe</h5>

              <!-- Pie Chart -->

              <script type="text/javascript">
  
                  var data = [];
                  var datai = <?=json_encode($data)?>;

                    for (var i in datai ) {
                        data.push(datai[i]);   
                    }
              </script>


              <canvas id="pieChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#pieChart'), {
                    type: 'pie',
                    data: {
                      labels: ['satisfaire','non satisfaire','ne dit pas votre avis'],
                      datasets: [{
                        label: 'My First Dataset',
                        data: data,
                        backgroundColor: ['rgb(255, 99, 132)','rgb(54, 162, 235)','rgb(255, 205, 86)' ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>
              <!-- End Pie CHart -->

            </div>
          </div>
        </div>

        <div class="col-lg-6"> 
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">nombre des machine en panne et no en panne</h5>

              <!-- Doughnut Chart -->
              <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
              <!-- End Doughnut CHart -->

            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">nombre de projet par rapport au temps</h5>

              <?php 
              $msg = '';
                    if (isset($_POST['submit3']) && !($_POST['combobox5'] > $_POST['combobox6'])
                      && !($_POST['combobox5'] == $_POST['combobox6'])) {

                $_SESSION['var5']='select count(ID_PROJET) from projet WHERE DATE_DOMAINE 
                BETWEEN "'.$_POST['combobox5'].'" and "'.$_POST['combobox6'].'"group by DATE_DOMAINE';

                $_SESSION['var6'] ='select DISTINCT DATE_DOMAINE from projet WHERE DATE_DOMAINE 
                BETWEEN "'.$_POST['combobox5'].'" and "'.$_POST['combobox6'].'" order by DATE_DOMAINE';

                    }else{
          $_SESSION['var5'] ="select  count(ID_PROJET) from projet group by DATE_DOMAINE";
          $_SESSION['var6'] ="select DISTINCT DATE_DOMAINE from projet order by DATE_DOMAINE";
            } ?>

              <form method="post" action="<?=$_SERVER['PHP_SELF']?>" >
        <?php $variable3 = select("select DISTINCT (DATE_DOMAINE) from projet ORDER by DATE_DOMAINE"); ?>
                  <label >Entre ça:</label>
                  <select name="combobox5">
                    <?php foreach ($variable3 as $value) :?>
                    <option value=<?=$value; ?>> <?=$value; ?> </option>
                    <?php endforeach;?>
                  </select>
                  <label>ça :</label>
                  <select name="combobox6">
                    <?php foreach ($variable3 as $value) :?>
                    <option value=<?=$value; ?>> <?=$value; ?> </option>
                    <?php endforeach;?>
                  </select>
                 <input type="submit" name="submit3">
              </form>

              <canvas id="barChart1" style="max-height: 400px;"></canvas>
           
              <!-- End Radar CHart -->

            </div>
          </div>
        </div>

      

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

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
  <script src="assets/js/functions.js"></script>
<script type="text/javascript"> 

var data1 =intpush(<?= json_encode(select($_SESSION['var2'] ));?>);
var label1 =intpush(<?= json_encode(select($_SESSION['var1'])); ?>);
chartline("lineChart", data1,label1);


var data4 =intpush(<?= json_encode(select('select  count(ID_MACHINE) from machine group by ETAT')); ?>);
var label4 =stringpush(<?= json_encode(select('select DISTINCT ETAT from machine')); ?>);
var color4 = colorpush(data4);
chartdoughnut('doughnutChart',label4,color4,data4);



var data2 =intpush(<?= json_encode(select($_SESSION['var3'])); ?>);
var label2 =stringpush(<?= json_encode(select($_SESSION['var4'])); ?>);
var color2 = colorpush(data2);
chartbar("barChart",label2,color2,data2);


var data3 =intpush(<?= json_encode(select($_SESSION['var5'])); ?>);
var label3 =stringpush(<?= json_encode(select($_SESSION['var6'])); ?>);
var color3 = colorpush(data3);
chartbar("barChart1",label3,color3,data3);



</script>

</body>

</html>