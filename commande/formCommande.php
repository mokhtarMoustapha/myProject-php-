<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../test.css">
    <link rel="stylesheet" href="../test1.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css"> 
    <title>Ajouter Commande</title>
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
                    <li class="sous_element" id="ajt_commandes" onclick="affiche_page('ajoute_commandes')"><a href="formCommande.php"><i class="fa fa-plus"></i>Ajoute Commande</a></li>
                    <li class="sous_element" id="aff_commandes" onclick="affiche_page('affiche_commandes')"><a href="afficherCommande.php"><i class="fa fa-list"></i>Affiche Commandes</a></li>
                </ul>
            </li>
            
            
            <!-- =======PRODUITS ELEMENT======= -->
            <li class="navElement" id="nav_produits">Produits <i class="fa fa-angle-down"  id="flech_pr"></i>
                <!-- =======PRODUITS SOUS-ELEMENT======= -->
                <ul class="sous_liste" id="s_liste_produits">
                    <li class="sous_element" id="ajt_produits" onclick="affiche_page('ajoute_produits')"><a href="../produit/formProduit.php"><i class="fa fa-plus"></i>Ajoute Produits</a></li>
                    <li class="sous_element" id="aff_produits" onclick="affiche_page('affiche_produits')"><a href="../produit/afficherProduit.php"><i class="fa fa-list"></i>Affiche Produits</a></li>
                </ul>
            </li>
        </ul>
        <!-- ========NAV BAR LIST END======= -->

        <div class="navOptions">
            <a href="#"><button class="settings"><i class="fa fa-gear"></i>Parametres</button></a>
            <a href="../Admin.php"><button class="logout"><i class="fa fa-right-from-bracket"></i>Logout</button></a>
        </div>
    </div>



    <div class="ajoute_commandes page" id="ajoute_commandes">
        <div class="titre">
            <h1>Ajoute Commandes</h1>
        </div>
        <form class="entree_commandes" method="post">
            <h3 class="ttr">Enrez les donnes de commandees</h3>
            <div class="inputs" id="inputs">
                <input type="text" name="id_cl" id="id_cl" placeholder="Id client" class="id_cl_cmm">
                <div class="champ" id="champ">
                    <i class="fa fa-boxes"></i>
                    <input type="text" name="nom_pr_comm[]" id="nom_pr_comm" placeholder="Nom du produit">
                    <input type="text" name="quantite_comm[]" id="quantite_comm" placeholder="quantite" class="quantite">
                </div>
                <button type="button" id="plus" class="plus" onclick="ajoute_champ()"><i class="fa fa-plus"></i></button>
                <script>


 //pour Ajouter plusieur produits dans commande/////////////////////////////////////////////////////////////////////
                    let inputs = document.getElementById("inputs");
                    let plus_button = document.getElementById("plus");
       
                    function ajoute_champ() {
                        let nom_in = document.createElement("input");
                        nom_in.setAttribute("type", "text");
                        nom_in.setAttribute("name", "nom_pr_comm[]");
                        nom_in.setAttribute("id", "nom_pr_comm");
                        nom_in.setAttribute("placeholder", "Nom du produit");

                        let icon = document.createElement("i");
                        icon.setAttribute("class", "fa fa-boxes");
                        
                        let quantite_in = document.createElement("input");
                        quantite_in.setAttribute("type", "text");
                        quantite_in.setAttribute("name", "quantite_comm[]");
                        quantite_in.setAttribute("id", "quantite_comm");
                        quantite_in.setAttribute("placeholder", "quantite");
                        quantite_in.setAttribute("class", "quantite");

                        let champ = document.createElement("div");
                        champ.setAttribute("class", "champ");

                        champ.appendChild(icon);
                        champ.appendChild(nom_in);
                        champ.appendChild(quantite_in);
                        
                        inputs.appendChild(champ);
                    }
                </script>
            </div>
            <button type="submit" name = "Enregistrer" class="enreg"><i class="fa fa-save"></i>Enregistrer</button>
        </form>
    </div>


    <?php
    require"../connection.php";
  //ajouter du commande et produit demander////////////////////////////////////////////////////////////////////////////////////////
     if(isset($_POST['Enregistrer']) ):
                $quantite=$_POST["quantite_comm"];
                $id_client=$_POST["id_cl"];
                $nom_produit_commande=$_POST["nom_pr_comm"];
                $index=count($quantite);
    if (!empty($id_client) && !empty($quantite) && !empty($nom_produit_commande)) { 
       //verification lexistance du client et lexistance du nom produit/////////////////////////////////////////////////////////
           //verifier idclient
                $requete="SELECT * FROM client";
                $query=mysqli_query($con,$requete);
                while ($rows=mysqli_fetch_assoc($query)):
                    $allIDclient[]=$rows['id_client'];
                endwhile;
     //verification du nom produit ajouter
                $requete="SELECT nom_produits FROM produit";
                $query=mysqli_query($con,$requete);
              while ($rows=mysqli_fetch_assoc($query)):
                    $allnomProduits[]=$rows['nom_produits'];
              endwhile;
              for($i=0;$i<$index;$i++):
                $nomprdentrer[]=$nom_produit_commande[$i];
                endfor;
                $nomProduit=array_diff($nomprdentrer, $allnomProduits);
      //ajouter idclient a commande///////////////////////////////////////////////////////////////////////////////////////////
         if (!empty($allIDclient) and !empty($allnomProduits)){
          if(in_array($id_client,$allIDclient) and empty($nomProduit)){
             //verification la quantite du produit
                  for($i=0;$i<$index;$i++):
                    $n=$nom_produit_commande[$i];
                        $requete2="SELECT quantite from produit where nom_produits='$n'";
                        $query2=mysqLi_query($con,$requete2);
                    while ($row2=mysqli_fetch_assoc($query2)):
                            $quantite1=$row2['quantite'];
                    endwhile;
                    if($quantite[$i]>=$quantite1){
                        echo "<script type = 'text/javascript'>
                        alert('quantite entrer est suprieur a la quantite stocker');
                        </script>";  
                        return;       
                    }
                 endfor;
                // else {
                //     echo "<script type = 'text/javascript'>
                //     alert('quantite entrer est suprieur a la quantite stocker');
                //     </script>";
                // }
                    $requete="INSERT INTO commande(id_client,dateAchat) VALUES ('$id_client',NOW())";
                    $tm=mysqli_query($con,$requete); 
             //id_commande
                    $requete1="SELECT * from commande order by id_commande";
                    $tm1=mysqLi_query($con,$requete1);
                    while ($rows1=mysqli_fetch_assoc($tm1)):
                        $allIDcommande[]=$rows1['id_commande'];
                    endwhile;
                    $index1=count($allIDcommande)-1;
                    $id_commande=$allIDcommande[$index1];
             // prix du produit
                for($i=0;$i<$index;$i++):
                    $n=$nom_produit_commande[$i];
                    $requete2="SELECT prix from produit where nom_produits='$n'";
                    $query2=mysqLi_query($con,$requete2);
                    while ($row2=mysqli_fetch_assoc($query2)):
                            $prix=$row2['prix'];
                    endwhile;
                    $q=$quantite[$i];
                    $prix=$prix*$q;
          //ajouter des produits demander et leur prix et leur quantite avec id_commande         
                      $sr="INSERT into produits_demande(nom_produits,quantite,id_commande,prix)values('$n','$q','$id_commande','$prix')";
                      $sr=mysqLi_query($con,$sr);
                 endfor;
        
         if (!empty($tm) and !empty($sr)) {
             echo "<script type = 'text/javascript'>
                    alert('commande enregistre')
                    setTimeout(function(){
                        window.location.href='formCommande.php'
                    },1000);
                </script>"; 
                
             
        //     //    <meta http-equiv="refresh" content="3;url=formCommande.php"> 
        //     //   content=3    prend trois second avant de partir vers page formCommande.php  en html
                }
            
        }
            else{
                echo "<script type = 'text/javascript'>
                alert('ID entrer nest pas trouver ou le nom de produit ');
                </script>";
            } 
        }   
    }
else {
    echo "<script type = 'text/javascript'>
    alert('commande vide il faut ajouter ID client et  des produits et leurs quantite !!!');
    </script>"; 
    
     }
       
endif;
         
        
   ?>


    <script src="../js.js"></script> 
</body>
</html>