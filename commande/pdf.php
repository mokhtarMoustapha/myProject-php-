
  
  
  <?php
  require "../connection.php";
  
  $prix = 0;
  $id=$_GET['id_commande'];
  
  $requete = "SELECT distinct client.nom, commande.id_commande FROM client, commande, produits_demande WHERE 
        commande.id_client = client.id_client AND produits_demande.id_commande = commande.id_commande and commande.id_commande='$id'
         ORDER BY produits_demande.id_commande";
  $query = mysqli_query($con, $requete);
  // Initialize Dompdf
  require_once '../dompdf/autoload.inc.php';
  use Dompdf\Dompdf;
  $dompdf = new Dompdf();
  
  // Start building the HTML content
  $html = '<ul class="list_commandes">';
  while ($row = mysqli_fetch_assoc($query)) {
      $id = $row['id_commande'];
      $html .= '<li class="commande">';
      $html .= '<div id="content-to-print">';
      $html .= '<h4>' . 'commande ' . $id . '</h4>';
      $html .= '<h4>' . 'client ' . $row['nom'] . '</h4>';
  
      $requete = "SELECT produits_demande.nom_produits, produits_demande.quantite,
       produits_demande.prix, commande.dateAchat FROM produit, produits_demande, commande WHERE
        produits_demande.id_commande = commande.id_commande AND produits_demande.nom_produits = produit.nom_produits AND
         produits_demande.id_commande = '$id' ";
  
      $html .= '<p style=" font-weight: 600;
      margin-top: 10px;
      display: flex;
      width: 83%;
      align-items: center;
      justify-content: space-between ;color:#1C768F;">' . '<span >Produits</span>'.'<span style="margin-left:50">Quantite</span>' .
          '<span style="margin-left:50"> Prix  </span><span style="margin-left:50">Date</span></p>';
  
      $query1 = mysqli_query($con, $requete);
      $html .= '<div class="info">';
      while ($row1 = mysqli_fetch_assoc($query1)) {
          $html .= '<p>
           <span >'. $row1['nom_produits'] . '</span>'.
              '<span style="margin-left:70"> ' .$row1['quantite'] . '</span>'.
              '<span style="margin-left:83">' . $row1['prix'] .'</span>' .
              '<span style="margin-left:50;display:inline-block;">' . $row1['dateAchat'] . '</span></p>';
          $prix += $row1['prix'];
      }
      $html .= '<p style=" position: absolute;left: 215px;"><span style="color:#1C768F;">' . 'Prix Total : ' . '</span>' . $prix . '</p>';
      $prix = 0;
  }
  $html .= '</ul>';
  
  
  $dompdf->loadHtml($html);
  
 
  $dompdf->setPaper(0,0);
  
 
  $dompdf->render();
  
  
 $dompdf->stream("test.pdf");
  //pour re garder avant down
 // $dompdf->stream("test.pdf",array('Attachment'=>0));
  ?>
  

