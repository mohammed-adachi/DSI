<?php 
   include "connexion.php";
   $var0 = selectcount('select count(avis) from donner where avis ="0";');
   $var1 = selectcount('select count(avis) from donner where avis ="1";');
   $var2 = selectcount('select count(ID_EMLPOYE) from employe');

   $vaf1=intval($var0['0']);
   $vaf2=intval($var1['0']);
   $vaf3=intval($var2['0'])-(intval($var0['0'])+intval($var1['0']));

   $data = array($vaf1, $vaf2, $vaf3);


   $date = selectrow('select count(ID_MACHINE) from reparer GROUP BY datereparetion');

   $SQL1="select count(ID_MACHINE) from reparer group by datereparetion";


 ?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>adache</title>
</head>
<body>



<canvas id="lineChart" style="width:100%;max-width:600px"></canvas>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

  <script src="assets/js/functions.js"></script>


 <script>


var data1 =intpush(<?= json_encode(select('select DISTINCT datereparetion from reparer order by datereparetion'));?>);
var label1 =intpush(<?= json_encode(select($SQL1)); ?>);
chartline("lineChart", data1,label1);

</script>




</body>
</html>