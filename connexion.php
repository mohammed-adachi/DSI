<?php
function connect()
{
$bdd= new PDO('mysql:host=localhost;dbname=dsi', 'root','');
return $bdd;
}



function select(string $sql)
{
$bdd=connect();
$query= $bdd->prepare($sql);    
$query->execute();
while($data=$query->fetch()){
    $results[]= $data[0];
}
return $results;
}

function selectcount($input)
{
$bdd=connect();
$query= $bdd->prepare($input);    
$query->execute();
while($data=$query->fetch()){
    $results[]= $data['0'];
}
return $results;
}




function InsertOrUpdate(string $sql)
{

try {
  $conn = connect();
  $stmt = $conn->prepare($sql);
  $stmt->execute();
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;   
}

function selectobject(string $sql)
{
$bdd=connect();
$query= $bdd->query($sql);  
$query->execute();
$data=$query->fetch(PDO::FETCH_ASSOC);
return  $data;
}

function selectrow(string $sql)
{
$bdd=connect();
$query= $bdd->query($sql);  
$query->execute();
$data=$query->fetch(PDO::FETCH_OBJ);
return  $data;
}


function selectall($sql)
{
$bdd=connect();
$query= $bdd->prepare($sql);  
$query->execute();
$data=$query->fetchAll();
return  $data;
}


?>

