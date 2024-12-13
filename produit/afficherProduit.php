<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../test.css">
    <link rel="stylesheet" href="../test1.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <title>Dash Board</title>
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
                    <li class="sous_element" id="ajt_clients" onclick="affiche_page('ajoute_clients')"><a href="../client/formClient.php"><i class="fa fa-plus"></i>Ajoute Client</a></li>
                    <li class="sous_element" id="aff_clients" onclick="affiche_page('affiche_clients')"><a href="../client/afficherClient.php"><i class="fa fa-list"></i>Affiche Clients</a></li>
                </ul>
            </li>
            
            
            <!-- =======COMMANDES ELEMENT======= -->
            <li class="navElement" id="nav_commande">Commandes <i class="fa fa-angle-down"  id="flech_cmm"></i>
                <!-- =======COMMANDES SOUS-ELEMENT======= -->
                <ul class="sous_liste" id="s_liste_commandes">
                    <li class="sous_element" id="ajt_commandes" onclick="affiche_page('ajoute_commandes')"><a href="../commande/formCommande.php"><i class="fa fa-plus"></i>Ajoute Commande</a></li>
                    <li class="sous_element" id="aff_commandes" onclick="affiche_page('affiche_commandes')"><a href="../commande/afficherCommande.php"><i class="fa fa-list"></i>Affiche Commandes</a></li>
                </ul>
            </li>
            
            
            <!-- =======PRODUITS ELEMENT======= -->
            <li class="navElement" id="nav_produits">Produits <i class="fa fa-angle-down"  id="flech_pr"></i>
                <!-- =======PRODUITS SOUS-ELEMENT======= -->
                <ul class="sous_liste" id="s_liste_produits">
                    <li class="sous_element" id="ajt_produits" onclick="affiche_page('ajoute_produits')"><a href="formProduit.php"><i class="fa fa-plus"></i>Ajoute Produits</a></li>
                    <li class="sous_element" id="aff_produits" onclick="affiche_page('affiche_produits')"><a href="afficherProduit.php"><i class="fa fa-list"></i>Affiche Produits</a></li>
                </ul>
            </li>
        </ul>
        <!-- ========NAV BAR LIST END======= -->

        <div class="navOptions">
            <a href="#"><button class="settings"><i class="fa fa-gear"></i>Parametres</button></a>
            <a href="../Admin.php"><button class="logout"><i class="fa fa-right-from-bracket"></i>Logout</button></a>
        </div>
    </div>



    <script src="../js.js"></script>


        
<?php
require("../connection.php");

//MODIFIER  PRODUITS//////////////////////////////////////////////////
if (isset($_POST['modifier'])) :
     $id=$_POST['id_produits'];
     $nom=$_POST['nom_produits'];
     $prix=$_POST['prix'];
     $quantite=$_POST['quantite'];
     $requete="UPDATE produit SET nom_produits ='$nom',prix='$prix',quantite='$quantite'  WHERE id_produits='$id' ";
     $query=mysqli_query($con,$requete);
endif;


//recherche produits/////////////////////////////////////////////////////////////
echo" <div class='affiche_produits page' id='affiche_produits'>";
echo"<div class='titre'>";
 echo "<h1>Affiche produits</h1>";
echo "</div>";
echo "<form method = 'post' class='recherche' >";
echo  "<input type='text' name='search_pr' id='search_id_pr' placeholder='Entrez  le nom  de Produit'>";
echo  "<button name = 'rech' class = 'rech'> <i class='fa fa-magnifying-glass' ></i></button>";

echo "</form>";

 if (isset($_POST['rech'])) {
    $nom=$_POST['search_pr'];
    if (!empty($nom)) {
    echo "<ul class=list_produits>";
    $requete= "SELECT * FROM produit where nom_produits like '%{$nom}%'";
    $query=mysqli_query($con,$requete);

    while ($rows=mysqli_fetch_assoc($query)):
    echo " <li class='produit'>";
    echo  " <h4>produit ".$id=$rows['id_produits']."</h4>"; 
    echo "<div class=info>";
    echo  "<div class=cont>";
    echo  "<div class=list>"; 
    echo "<p class=ttr>Nom</p>";
    echo"<p class=ele>".$rows['nom_produits']."</p>";
    echo "</div>";
    echo"<div class=list>";
    echo" <p class=ttr>Quantite</p>";
    echo "<p class=ele>".$rows['quantite']."</p>";
    echo"</div>";
    echo"<div class=list>";
    echo "<p class=ttr>Prix</p>";
    echo "<p class=ele>".$rows['prix']."</p>";
    echo " </div>";
    echo"</div>";
    echo"<div class=options>";
    echo "<a href=deleteProduit.php?id_produits=".$rows['id_produits']."><button class=sup>Supprimer</button></a>";
    echo"<a href=modifierProduit.php?id_produits=".$rows['id_produits']."><button class=mod>Modifier</button></a>";
    echo"</div>";
    echo"</li>";
    endwhile;
    echo"</ul>";
echo"</div> ";
  return;
    }
    
 }
// ======AFFICHE tout les produits PRODUITS===== -->
                echo "<ul class=list_produits>";
                $requete="SELECT * FROM produit";
                $query=mysqli_query($con,$requete);
                while ($rows=mysqli_fetch_assoc($query)):
                echo " <li class='produit'>";
                echo  " <h4>produit ".$id=$rows['id_produits']."</h4>"; 
                echo "<div class=info>";
                echo  "<div class=cont>";
                echo  "<div class=list>"; 
                echo "<p class=ttr>Nom</p>";
                echo"<p class=ele>".$rows['nom_produits']."</p>";
                echo "</div>";
                echo"<div class=list>";
                echo" <p class=ttr>Quantite</p>";
                echo "<p class=ele>".$rows['quantite']."</p>";
                echo"</div>";
                echo"<div class=list>";
                echo "<p class=ttr>Prix</p>";
                echo "<p class=ele>".$rows['prix']."</p>";
                echo " </div>";
                echo"</div>";
                echo"<div class=options>";
                echo "<a href=deleteProduit.php?id_produits=".$rows['id_produits']."><button class=sup>Supprimer</button></a>";
                echo"<a href=modifierProduit.php?id_produits=".$rows['id_produits']."><button class=mod>Modifier</button></a>";
                echo"</div>";
                echo"</li>";
                endwhile;
                echo"</ul>";
            echo"</div> ";
      
?>





    
</body>
</html>

