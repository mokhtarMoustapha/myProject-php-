<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../test.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <title>Ajouter Clients</title>
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
                    <li class="sous_element" id="ajt_commandes"><a href="../commande/formCommande.php"><i class="fa fa-plus"></i>Ajoute Commande</a></li>
                    <li class="sous_element" id="aff_commandes"><a href="../commande/afficherCommande.php"><i class="fa fa-list"></i>Affiche Commandes</a></li>
                </ul>
            </li>
            
            
            <!-- =======PRODUITS ELEMENT======= -->
            <li class="navElement" id="nav_produits">Produits <i class="fa fa-angle-down"  id="flech_pr"></i>
                <!-- =======PRODUITS SOUS-ELEMENT======= -->
                <ul class="sous_liste" id="s_liste_produits">
                    <li class="sous_element" id="ajt_produits" ><a href="../produit/formProduit.php"><i class="fa fa-plus"></i>Ajoute Produits</a></li>
                    <li class="sous_element" id="aff_produits"><a href="../produit/afficherProduit.php"><i class="fa fa-list"></i>Affiche Produits</a></li>
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



<div class="ajoute_clients" id="ajoute_clients">
        <div class="titre">
            <h1>Ajoute Clients</h1>
        </div>
        <form class="entree_clients"  method="post">
            <h3 class="ttr">Enrez les données de clients</h3>
            <i class="fa fa-user"></i>
            <input type="text" name="nom_client" id="nom_client" placeholder="Nom">
            <i class="fa fa-phone"></i>
            <input type="tel" name="tel_client" id="tele_client" placeholder="Telephone">
            <i class="fa fa-at"></i>
            <input type="email" name="email_client" id="email_client" placeholder="E-mail">
            <i class="fa fa-location-dot"></i>
            <input type="text" name="adress_client" id="adress_client" placeholder="Adress">

            <button type="submit" class="enreg" name = "enregistrer"><i class="fa fa-save"></i>Enregistrer</button>
        </form>

          <?php

require"../connection.php";
//=====================ajouter du client=====================

if(isset($_POST['enregistrer']) ) :
    $nomclient=$_POST['nom_client'];
    $tel= $_POST['tel_client'];
    $adress=$_POST["adress_client"];
    $email=$_POST['email_client'];

    
        if (!empty($nomclient) and !empty($tel) and !empty($adress) and !empty( $email)) :
            $requete="INSERT INTO client(nom,telephone,adress,email)values('$nomclient','$tel','$adress','$email')";
            $tm=mysqli_query($con,$requete);
            if (!empty($tm)) {
                echo "<script type = 'text/javascript'>
                        alert('un nouveau client etait enregistree avec succes!!');
                        setTimeout(function(){
                            window.location.href='formClient.php';
                        },1000);
                    </script>";
        }  
        else {
            echo "<script type = 'text/javascript'>
                    alert('ERREUR!! le client n'etait pas enregistree');
                    setTimeout(function(){
                        window.location.href='formClient.php'
                    },1000);
                </script>";
        }
        endif;
endif;
?>
    </div>
 <script src="../js.js"></script>

</body>
</html>