<?php
include 'include/header.php';





$montant = 5;
$devisefrom = "EUR";
$deviseto = "USD";

echo '<p> la conversion est: '.convertir(5,"EUR").' '.$deviseto.' </p>';




//fonction convertir pour la conversion de devise
function convertir($devisefrom, $montant)

//verifie sie le montant est numerique sinon il me faut un nombre

{

  if(!is_numeric(($montant))) return 'il me faut un nombre';
  if($devisefrom = "EUR"){
  $total=$montant*1.15023; //1 EUR =1,15023USD
  }
  else {
    $total=$montant*0.869310;  //1 USD = 0,869310 EUR
  }
    return ($total);
}




?>
