
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form class="entree_commandes" method="post">
            <h3 class="ttr">Enrez les donnes de commandees</h3>
            <div class="inputs" id="inputs">
                <input type="text" name="id_cl" id="id_cl" placeholder="Id client" class="id_cl_cmm">
                <div class="champ" id="champ">
                    <i class="fa fa-boxes"></i>
                    <input type="text" name="nom[]" id="nom_pr_comm" placeholder="Nom du produit">
                    <input type="text" name="quantite[]" id="quantite_comm" placeholder="quantite" class="quantite">
                </div>
                <button type="button" id="plus" class="plus" onclick="ajoute_champ()"><i class="fa fa-plus"></i></button>
                <script>


 //pour Ajouter plusieur produits dans commande/////////////////////////////////////////////////////////////////////
                    let inputs = document.getElementById("inputs");
                    let plus_button = document.getElementById("plus");
       
                    function ajoute_champ() {
                        let nom_in = document.createElement("input");
                        nom_in.setAttribute("type", "text");
                        nom_in.setAttribute("name", "nom[]");
                        nom_in.setAttribute("id", "nom_pr_comm");
                        nom_in.setAttribute("placeholder", "Nom du produit");

                        let icon = document.createElement("i");
                        icon.setAttribute("class", "fa fa-boxes")
                        
                        let quantite_in = document.createElement("input");
                        quantite_in.setAttribute("type", "text");
                        quantite_in.setAttribute("name", "quantite[]");
                        quantite_in.setAttribute("id", "quantite_comm");
                        quantite_in.setAttribute("placeholder", "quantite");
                        quantite_in.setAttribute("class", "quantite");

                        let champ = document.createElement("div");
                        champ.setAttribute("class", "champ");

                        // champ.appendChild(icon);
                        champ.appendChild(nom_in);
                        champ.appendChild(quantite_in);
                        
                        inputs.appendChild(champ);
                    }
                </script>
            </div>
            <button type="submit" name = "Enregistrer" class="enreg"><i class="fa fa-save"></i>Enregistrer</button>
        </form>
    </div>
</body>
</html>

<?php  
require"connection.php";
if (isset($_POST['Enregistrer'])) {
    $name=$_POST['nom'];
    $quantite=$_POST['quantite'];
    $index=count($name);
    echo $index;
    for ($i=0; $i < $index; $i++) { 
        $n=$name[$i];
        $q=$quantite[$i];
        $f="INSERT INTO produits(nom_produits,quantite)values('$n','$q')";
        mysqli_query($con,$f);
    }
}

?>
