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
                    <li class="sous_element" id="ajt_clients" onclick="affiche_page('ajoute_clients')"><i class="fa fa-plus"></i>Ajoute Client</li>
                    <li class="sous_element" id="aff_clients" onclick="affiche_page('affiche_clients')"><i class="fa fa-list"></i>Affiche Clients</li>
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
                    <li class="sous_element" id="ajt_produits" onclick="affiche_page('ajoute_produits')"><i class="fa fa-plus"></i>Ajoute Produits</li>
                    <li class="sous_element" id="aff_produits" onclick="affiche_page('affiche_produits')"><i class="fa fa-list"></i>Affiche Produits</li>
                </ul>
            </li>
        </ul>
        <!-- ========NAV BAR LIST END======= -->

        <div class="navOptions">
            <a href="#"><button class="settings"><i class="fa fa-gear"></i>Parametres</button></a>
            <a href="../Admin.php"><button class="logout"><i class="fa fa-right-from-bracket"></i>Logout</button></a>
        </div>
    </div>

<!-- ========AJOUTE CLIENTS START======= -->

<div class="ajoute_clients page" id="ajoute_clients">
        <div class="titre">
            <h1>Modifier Clients</h1>
        </div>
<?php
        require"../connection.php";
       $id=$_GET['id_client'];
       $requete="SELECT * FROM client WHERE id_client='$id'";
       $query=mysqli_query($con,$requete);
       while ($rows=mysqli_fetch_assoc($query)):
     echo"<form class='entree_clients'  method='post' action='afficherClient.php'>";
           echo"<h3 class=ttr>Enrez les données a modifier</h3>";
           echo"<input type='text' name='id_client' style = 'display:none'value=".$rows['id_client']." required>";
           echo"<i class='fa fa-user'></i>";
           echo "<input type='text' name='nom' id='nom_client'  value=".$rows['nom']." required>";
           echo "<i class='fa fa-phone'></i>";
           echo "<input type='tel' name='telephone' id='tele_client' value=".$rows['telephone']." required>";
           echo "<i class='fa fa-at'></i>";
           echo "<input type='email' name='email' id='email_client'  value=".$rows['email']." required>";
           echo "<i class='fa fa-location-dot'></i>";
           echo "<input type='text' name='adress' id='adress_client' value=".$rows['adress']." required>";

           echo "<button type='submit' class='enreg' name = 'modifier'><i class='fa fa-pen-to-square'></i>modifier</button>";
           echo"</form>";
       endwhile;
          ?>
    </div>
 <script src="../js.js"></script>

</body>
</html>