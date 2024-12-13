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
                    <li class="sous_element" id="ajt_clients" onclick="affiche_page('ajoute_clients')"><a href="formClient.php"><i class="fa fa-plus"></i>Ajoute Client</a></li>
                    <li class="sous_element" id="aff_clients" onclick="affiche_page('affiche_clients')"><a href="afficherClient.php"><i class="fa fa-list"></i>Affiche Clients</a></li>
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







    <div class="ajoute_produits page" id="ajoute_produits">
        <div class="titre">
            <h1>Modifier Produit</h1>
        </div>
        <?php

            require"../connection.php";
            $id=$_GET['id_produits'];
            $requete="SELECT * FROM produit WHERE id_produits='$id'";
            $query=mysqli_query($con,$requete);
            while ($rows=mysqli_fetch_assoc($query)):
        echo "<form class='entree_produits' action='afficherProduit.php' method='post'>";
            echo "<h3 class='ttr'>Modifier les produits</h3>";
            echo "<div class='inputs' id='input_pr'>";
                echo "<div class='champ' id='champ'>";
                   echo " <i class='fa fa-box'></i>";
                echo  "<input type=text name=id_produits id=nom_pr  value=".$rows['id_produits']." required style = 'display : none'>";
                   echo  "<input type=text name=nom_produits id=nom_pr  value=".$rows['nom_produits']." required>";
                    echo "<input type=text name=prix id=prix_pr value=".$rows['prix']." required class=petit>";
                 echo "<input type='text' name='quantite' id='quantite_pr' value=".$rows['quantite']." required class='petit'>";
               echo" </div>";
                
            echo "</div>";
            echo" <button type='submit' class='enreg' name='modifier'><i class='fa fa-save'></i>Modifier</button>";
        echo" </form>";
            endwhile;
        ?>
    </div>

