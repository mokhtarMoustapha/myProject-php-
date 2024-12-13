<?php

require"../connection.php";


$id=$_GET['id_commande'];



$requete="DELETE from produits_demande where produits_demande.id_commande='$id' ";
$query=mysqli_query($con,$requete);

$requete1="DELETE from  commande where commande.id_commande='$id' ";
$query1=mysqli_query($con,$requete1);

if(isset($query) and isset($query1)){
   header("location:afficherCommande.php");
}else {
    echo"erreur";
}


?>