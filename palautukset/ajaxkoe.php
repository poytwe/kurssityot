
<?php 
if(isset($_GET["ktunnus"])) $ktunnus=$_GET["ktunnus"]; 

$host ="magnesium"; 
$user = "a16vpoytalaakso"; 
$pass = "VerneriP"; 
$dbname = "ska16vpoytalaakso"; 

try  //yritetään ottaa yhteys 
{  
    $yhteys = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass); //luo PDO-olion 
}  
catch(PDOException $e) // jos ei onnistu (poikkeus) 
{  
    echo $e->getMessage(); //antaa ilmoituksen siitä, missä virhe 
} 

$sql = "SELECT * FROM pelaajat2 WHERE ktunnus ='$ktunnus' LIMIT 1"; 
$vastaus = $yhteys->prepare($sql); 
$vastaus->execute(); 
$vastaukset = $vastaus->fetchAll(PDO::FETCH_ASSOC); 

echo "pelaajalla ".$vastaukset[0]["ktunnus"]." on rahaa ".$vastaukset[0]["rahaa"]." ja nykyinen hahmo on ".$vastaukset[0]["nykyinen_hahmo"]; 
?> 