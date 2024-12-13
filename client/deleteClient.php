<?php
 require"../connection.php";

//client
$id=$_GET['id_client'];
$sql="DELETE FROM client where id_client='$id' ";
$query=mysqli_query($con,$sql);

if(isset($query)){
   header("location:afficherClient.php");
}else {
    echo"erreur";
}





	

?>