<?php

require"../connection.php";

//client
$id=$_GET['id_produits'];
$sql="DELETE FROM produit where id_produits='$id' ";
$query=mysqli_query($con,$sql);

if(isset($query)){
  header("location:afficherProduit.php");
}else {
   echo"erreur";
}





   

?>


