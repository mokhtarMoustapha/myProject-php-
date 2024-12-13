<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../test.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <title>Afficher clients</title>
</head>
<body>

<!-- menu -->
    <!-- ========NAV BAR START======= -->
    <div class="navBar">
        
        <!-- ========NAV BAR LIST START======= -->
        <ul class="navList">
            <img src="../logo_LMMH/vector/default-monochrome.svg" alt="logo" class="logo">
            
            <!-- =======CLINETS ELEMENT======= -->
            <li class="navElement" id="nav_clients">Clients <i class="fa fa-angle-down" id="flech_cl"></i>
                <!-- =======CLINETS SOUS-ELEMENT======= -->
                <ul class="sous_liste" id="s_liste_clients">
                    <li class="sous_element" id="ajt_clients"><a href="formClient.php"><i class="fa fa-plus"></i>Ajoute Client</a></li>
                    <li class="sous_element" id="aff_clients"><a href="afficherClient.php"><i class="fa fa-list"></i>Affiche Clients</a></li>
                </ul>
            </li>
            
            
            <!-- =======COMMANDES ELEMENT======= -->
            <li class="navElement" id="nav_commande">Commandes <i class="fa fa-angle-down"  id="flech_cmm"></i>
                <!-- =======COMMANDES SOUS-ELEMENT======= -->
                <ul class="sous_liste" id="s_liste_commandes">
                    <li class="sous_element" id="ajt_commandes" ><a href="../commande/formCommande.php"><i class="fa fa-plus"></i>Ajoute Commande</a></li>
                    <li class="sous_element" id="aff_commandes" ><a href="../commande/afficherCommande.php"><i class="fa fa-list"></i>Affiche Commandes</a></li>
                </ul>
            </li>
            
            
            <!-- =======PRODUITS ELEMENT======= -->
            <li class="navElement" id="nav_produits">Produits <i class="fa fa-angle-down"  id="flech_pr"></i>
                <!-- =======PRODUITS SOUS-ELEMENT======= -->
                <ul class="sous_liste" id="s_liste_produits">
                    <li class="sous_element" id="ajt_produits"><a href="../produit/formProduit.php"><i class="fa fa-plus"></i>Ajoute Produits</a></li>
                    <li class="sous_element" id="aff_produits" ><a href="../produit/afficherProduit.php"><i class="fa fa-list"></i>Affiche Produits</a></li>
                </ul>
            </li>
        </ul>
        <!-- ========NAV BAR LIST END======= -->

        <div class="navOptions">
            <a href="#"><button class="settings"><i class="fa fa-gear"></i>Parametres</button></a>
            <a href="../Admin.php"><button class="logout"><i class="fa fa-right-from-bracket"></i>Logout</button></a>
        </div>
    </div>



    <!-- ========afficher client======= -->
    <div class="affiche_clients page" id="affiche_clients">
        <div class="titre">
           <h1>Affiche Clients</h1> 
        </div>
        <form method="post" class="recherche">
            <input type="tel" name="recherche" id="search" placeholder="   Entrez le N°telephone de client">
            <button name="search"><i class="fa fa-magnifying-glass"></i></button>
      </form> 
        <table class = "table_client" id = "table_client">
            <?php
            require"../connection.php";


           //modification  des donnes du client

             
            if (isset($_POST["modifier"])) {
                $email=$_POST["email"];
                $id=$_POST['id_client'];
                $nom=$_POST["nom"];
                $tel= $_POST['telephone'];
                $adress=$_POST['adress'];
                $requete="UPDATE client SET nom='$nom',telephone='$tel',adress='$adress',email='$email' WHERE id_client='$id' ";
                $query=mysqli_query($con,$requete);
            }
            //recherche//////////////////////////////////////////////////
            if (isset($_POST['search'])) {
              $recherche=$_POST['recherche'];

            if (!empty($recherche)) {
            $requete= "SELECT * FROM client where telephone LIKE '%{$recherche}%'";
            $query=mysqli_query($con,$requete);

            echo"<th>"."id"."</th>";
            echo"<th>".'nom_client'."</th>";
            echo"<th>".'adress'."</th>";
            echo"<th>".'telephone'."</th>";
            echo"<th>".'email'."</th>";
            echo "<th>Options</th>";
            while ($rows=mysqli_fetch_assoc($query)) {
            echo "<tr class = 'style'>";
            echo"<td>".$id=$rows['id_client']."</td>";
            echo"<td>".$rows['nom']."</td>";
            echo"<td>".$rows['adress']."</td>";
            echo"<td>".$rows['telephone']."</td>";
            echo"<td>".$rows['email']."</td>";
            echo "<td class= 'options'>
                   <a href=deleteClient.php?id_client='$id'> <button class='sup'>suprime</button></a>
                    <a href=modifierClient.php?id_client='$id'><button class='mod'>modifier</button></a>
                  </td>";
            echo "</tr>";}
            return;}
            }
    //afficher tous les clients
            $requete="SELECT * FROM client order by id_client";
            $query=mysqli_query($con,$requete);

            echo"<th>"."id"."</th>";
            echo"<th>".'nom_client'."</th>";
            echo"<th>".'adress'."</th>";
            echo"<th>".'telephone'."</th>";
            echo"<th>".'email'."</th>";
            echo "<th>Options</th>";
            while ($rows=mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo"<td>".$id=$rows['id_client']."</td>";
            echo"<td>".$rows['nom']."</td>";
            echo"<td>".$rows['adress']."</td>";
            echo"<td>".$rows['telephone']."</td>";
            echo"<td>".$rows['email']."</td>";
            echo "<td class= 'options'>
            <a href=deleteClient.php?id_client=".$id."><button class ='sup'> Suprime</button></a>
            <a href=modifierClient.php?id_client=".$id."><button class ='mod'> Modifier</button></a>
          </td>";
            echo "</tr>";
            };

            ?>
            </table>
    </div> 

    <script src="../js.js"></script>
</body>
</html>