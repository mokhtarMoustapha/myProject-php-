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

<!-- ajouter produit -->
    <div class="ajoute_produits page" id="ajoute_produits">
        <div class="titre">
            <h1>Ajoute Produits</h1>
        </div>
        <form class="entree_produits" action="#" method="post">
            <h3 class="ttr">Enrez les produits</h3>
            <div class="inputs" id="input_pr">
                <div class="champ" id="champ">
                    <i class="fa fa-box"></i>
                    <input type="text" name="nom_produits" id="nom_pr" placeholder="Nom du produit">
                    <input type="text" name="prix_produits" id="prix_pr" placeholder="prix" class="petit">
                    <input type="text" name="quantite_pr" id="quantite_pr" placeholder="quantite" class="petit">
                </div>
                
            </div>
            <button type="submit" class="enreg" name="ajouter"><i class="fa fa-save"></i>Enregistrer</button>
        </form>
    </div>
    <!-- ====AJOUTE PRODUITS END====== -->
    <?php
    require"../connection.php";
// //ajouter du produits/////////////////////////////////////////////////////////////////////////////////////////////
        if(isset($_POST['ajouter']) ) :
                 $quantite=$_POST['quantite_pr'];
                 $nom= $_POST['nom_produits'];
                 $prix=$_POST["prix_produits"];
             //verfication esqueles le nom  de produits a dejas enregistrer
                 $requete = "SELECT * FROM produit";
                 $query=mysqli_query($con,$requete);
              while ($rows = mysqli_fetch_assoc($query)) {
               $nom2[]=$rows['nom_produits']; }
            if (!empty($nom) and !empty($quantite) and !empty($prix)):
                if (!empty($nom2)){
                    if(in_array($nom,$nom2)){
                        echo "<script type = 'text/javascript'>
                        alert('le nom dejas enregistrer');
                        </script>"; 
                        return;
                     }   
                    }                    
                   
                     $requete="INSERT INTO produit(nom_produits,quantite,prix)values('$nom','$quantite','$prix')";
                     $tm=mysqli_query($con,$requete); ;
                    
        
                  
                endif;
               
                if (!empty($tm)) :
                    echo "<script type = 'text/javascript'>
                            alert('un nouveau produit etait enregistree avec succes!!');
                            setTimeout(function(){
                                window.location.href='formProduit.php'
                            },1000);
                        </script>";
            endif;
        endif;
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////          

    ?>


    <script src="../js.js"></script>

</body>
</html>