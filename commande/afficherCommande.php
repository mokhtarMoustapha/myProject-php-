<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../test.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
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


    <div class="affiche_commandes page" id="affiche_commandes">
        <div class="titre">
            <h1>Affiche Commandes</h1>
        </div>
        <!-- <div class="recherche">
            <i class="fa fa-magnifying-glass"></i>
            <input type="text" name="search_comm" id="search_comm" placeholder="Entrez l' ID de commande">
            <i class="fa fa-sliders"></i> -->
            <!-- <div class="search_options"  >
                 <input type="number" name="search_id_cl" id="search_id_cl" placeholder="Entrez l'ID de client"> -->
            <!-- </div>  -->
               <!-- <button name="search"></button> -->
        <!-- </div> --> 

        <form method="post" class="recherche">
            <input type="tel" name="recherche" id="search" placeholder=" Entrez le numero du demandeur ">
            <button name="search"><i class="fa fa-magnifying-glass"></i></button>
       </form> 

<?php
  require"../connection.php";


//modifier les commandes
if (isset($_POST['modifier'])) {
    $id=$_POST['id_commande'];
    $nom=$_POST['nom_produits'];
    $prix=$_POST['prix'];
    $quantite=$_POST['quantite'];
    $requete="UPDATE produits_demande SET prix='$prix',quantite='$quantite' WHERE id_commande='$id' and nom_produits ='$nom'";
    $query=mysqli_query($con,$requete);
     
}

//RECHERCHE dans les commandes/////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['search'])) {                      
   $telephone=$_POST['recherche'];
    if (!empty($telephone)) {
        $prix=0;
        //  $id=$_GET['id_client'];
       
        $requete="SELECT distinct  client.nom,commande.id_commande from client,commande,produits_demande where 
              commande.id_client=client.id_client and produits_demande.id_commande=commande.id_commande and  client.telephone='$telephone'
               order by produits_demande.id_commande";
            $query=mysqli_query($con,$requete);
            echo" <ul class='list_commandes'>" ;
            while ($row=mysqli_fetch_assoc($query)) {
            echo"<li class='commande'>";
            echo "<div id='content-to-print'>";
            echo"<h4>".'commande '.$id=$row['id_commande']."</h4>";
            echo"<p class='cl_nom'>".'client '.$row['nom']."</p>"; 
            $requete="SELECT produits_demande.nom_produits,produits_demande.quantite,
             produits_demande.prix ,commande.dateAchat  from produit, produits_demande,commande where
              produits_demande.id_commande=commande.id_commande and  produits_demande.nom_produits=produit.nom_produits and
               produits_demande.id_commande = '$id' ";
            
                   echo " <p class='titres'>"."<span class='ttr'>Produits</span>".''."<span class='ttr'>Quantite</span>"."".
                   "<span class='ttr'> Prix  </span>".""."<span class='ttr'>Date</span>"."</p>";
                  
                 $query1=mysqli_query($con,$requete);
                 echo"<div class='info'>";
                 while ($row1=mysqli_fetch_assoc($query1)) {
                      echo " <p class='ttr1'><span class='ttr1'>".$row1['nom_produits']."</span><span class='ttr1'>".$row1['quantite'].
                      "</span><span class='ttr1'>" .$row1['prix']."</span><span class='ttr1'>" .$row1['dateAchat']."</span></p>";
                        $prix +=($row1['prix']);

                      
                       }
                       echo"<p class='pt'><span>".'Prix Total : '."</span>".$prix."</p>";
                       $prix=0;
                       
                       echo"<div class='options'>";
                       echo "<a href=deleteCommande.php?id_commande=".$id."><button class='sup'>Supprimer</button></a>";
                       echo "<a href=modifierCommande.php?id_commande=".$id."><button class='mod'>Modifier</button></a>";
                       echo"</div>";

                       echo"<a href=pdf.php?id_commande=".$id."><button id='pdf' class='pdf'><i class='fa fa-file-pdf'></i></button></a>";
                       echo"</div>";
                       echo"</li>";
                      } ;
                      echo"</ul>";
                return;
            }
  
}



// //afficher tous les commandes 
//      $prixTotal=0;


//     $requete="SELECT client.nom,commande.id_commande,produits_demande.nom_produits,produits_demande.quantite,produits_demande.quantite*
//      produits_demande.prix,produits_demande.prix,commande.dateAchat from client,commande,produits_demande,produit where
//        produits_demande.nom_produits=produit.nom_produits and  produits_demande.id_commande=commande.id_commande and
//         client.id_client=commande.id_client ";

//                 $query=mysqli_query($con,$requete);
//                 echo" <ul class='list_commandes'> " ;
//                 while ($row=mysqli_fetch_assoc($query)) {
//                  echo"<li class='commande' id='content-to-print'>"; 
//               echo"<h4><span  class='id_commande'>".'commande: '."</span>".$row['id_commande']."</h4>";
//                 echo"<p class='cl_nom'>".'client: '.$row['nom']."</p>"; 
//                 echo"<div class='info'>";
//                   echo " <div class='cont'>";
//                   $id=$row['id_commande'];
//                     echo "<div class = 'info'>";
//                         echo "<div class = 'cont'>";
//                             echo " <div class='list'>";
//                                     echo " <p class='ttr'>Produits</p>";
//                                     echo " <p class='ele'>".$row['nom_produits']."</p>";
//                                 echo " </div>";
//                                 echo " <div class='list'>";
//                                     echo"<p class='ttr'>Quantite</p>";
//                                     echo"<p class='ele'>".$row['quantite']."</p>";
//                                 echo"</div>";
                                
//                                 echo"<div class='list'>";
//                                   echo"<p class='ttr'>Prix</p>";
//                                   echo"<p class='ele'>".$row['prix']."</p>";
//                                 echo"</div>";
                                
//                                 echo"<div class='list'>";
//                                   echo"<p class='ttr'>Date</p>";
//                                   echo"<p class='ele'>".$row['dateAchat']."</p>";
//                                 echo"</div>";

                                
//                                 $prixTotal +=($row['prix']);
//                                 echo"<p class='pt'><span>".'Prix Total :'."</span>".$prixTotal."</p>";
//                             echo"</div>";
//                                 echo"<div class='options'>";
//                                     echo "<a href=deleteCommande.php?id_commande=".$row['id_commande']."><button class='sup'>Supprimer</button></a>";
//                                     echo "<a href=modifierCommande.php?id_commande=".$row['id_commande']."><button class='mod'>Modifier</button></a>";
//                                     echo "</div>";
//                                 echo " </div>";
//                                 echo"<button id='pdf' class='pdf'><i class='fa fa-file-pdf'></i></button>";
//                         echo"</div>";
//                     echo "</li>";
//                 }
//                 echo "</ul>";





        // // //         ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                $prix=0;
        //  $id=$_GET['id_client'];
       
        $requete="SELECT distinct  client.nom,commande.id_commande from client,commande,produits_demande where 
              commande.id_client=client.id_client and produits_demande.id_commande=commande.id_commande order by produits_demande.id_commande";
            $query=mysqli_query($con,$requete);
            echo" <ul class='list_commandes'>" ;
            while ($row=mysqli_fetch_assoc($query)) {
            echo"<li class='commande'>";
            echo "<div id='content-to-print'>";
            echo"<h4>".'commande '.$id=$row['id_commande']."</h4>";
            echo"<p class='cl_nom'>".'client '.$row['nom']."</p>"; 
            $requete="SELECT produits_demande.nom_produits,produits_demande.quantite,
             produits_demande.prix ,commande.dateAchat  from produit, produits_demande,commande where
              produits_demande.id_commande=commande.id_commande and  produits_demande.nom_produits=produit.nom_produits and
               produits_demande.id_commande = '$id' ";
            
                   echo " <p class='titres'>"."<span class='ttr'>Produits</span>".''."<span class='ttr'>Quantite</span>"."".
                   "<span class='ttr'> Prix  </span>".""."<span class='ttr'>Date</span>"."</p>";
                  
                 $query1=mysqli_query($con,$requete);
                 echo"<div class='info'>";
                 while ($row1=mysqli_fetch_assoc($query1)) {
                      echo " <p class='ttr1'><span class='ttr1'>".$row1['nom_produits']."</span><span class='ttr1'>".$row1['quantite'].
                      "</span><span class='ttr1'>" .$row1['prix']."</span><span class='ttr1'>" .$row1['dateAchat']."</span></p>";
                        $prix +=($row1['prix']);

                      
                       }
                       echo"<p class='pt'><span>".'Prix Total : '."</span>".$prix."</p>";
                       $prix=0;
                       
                       echo"<div class='options'>";
                       echo "<a href=deleteCommande.php?id_commande=".$id."><button class='sup'>Supprimer</button></a>";
                       echo "<a href=modifierCommande.php?id_commande=".$id."><button class='mod'>Modifier</button></a>";
                       echo"</div>";

                       echo"<a href=pdf.php?id_commande=".$id."><button id='pdf' class='pdf'><i class='fa fa-file-pdf'></i></button></a>";
                       echo"</div>";
                       echo"</li>";
                      } ;
                      echo"</ul>";
                     

                      /////////////////////////////////////////////////////////






                ?> 

    </div>

    <script src="../js.js"></script> 

     <script>
        window.onload = () => {
        let pdf=document.getElementById('pdf').addEventListener('click', () => { 
            html2canvas(document.querySelector("#content-to-print")).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jspdf.jsPDF();
                pdf.addImage(imgData, 'PNG', 10, 10);
                pdf.save('download.pdf');
                });
            });
        }

             
// window.onload=function() {
// let pdf=document.getElementById('pdf').addEventListener('click',()=>{
    
// });
// let filepdf=this.document.getElementById('PDF');
// html2pdf().from(filepdf).save();
// }

</script>
</body>
</html>