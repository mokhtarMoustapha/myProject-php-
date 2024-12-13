<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_style.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <title>Projet_php_login</title>
</head>
<body>
    <div class="continaire">
        <div class="fenaitreLogin" id="FL">
            <div class="titre">
                <h2> Login</h2>
                <p>Entrez vos donnees pour rentrer</p>
            </div>
            <form  method="post">
                <div class="inputs">
                    <i class="fa fa-user icon"></i>
                    <input type = "text"   placeholder="Username" class="input" spellcheck="false" name="nom">
                    <i class="fa fa-lock icon"></i>
                    <i class="fa fa-eye icon" id="affPass"></i>
                    <input type="password" class="input" id= "password" placeholder="Mot de pass" name="motpass">
                    <script>
                        let password = document.getElementById("password");
                        let aff_password = document.getElementById("affPass");

                        aff_password.addEventListener('click', () => {
                            if (password.type == "password") {
                                password.type = "text";
                                aff_password.classList.remove("fa-eye");
                                aff_password.classList.add("fa-eye-slash");
                            }
                            else {
                                password.type = "password";       
                                aff_password.classList.add("fa-eye");
                                aff_password.classList.remove("fa-eye-slash");
                            }
                        });
                    </script>
                </div>
              
                  <input type="submit" class="log"  name="entrer" value="LOGIN">
                
            </form>
            <div class="slide">
                <img src="logo_LMMH/vector/default-monochrome-white.svg" alt="logo" class="logo">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti ad a nulla!</p>
            </div>
        </div>

        
    </div>
    <?php
    require("connection.php");
    if (isset($_POST['entrer'])) {
        $motpass=$_POST['motpass'];
        $nom=$_POST['nom'];
        $requete="SELECT motpass from admin where nom='$nom'";
        $query=mysqli_query($con,$requete);
        while($rows=mysqli_fetch_assoc($query)):
            $password = $rows['motpass'];
            if ($motpass==$password):
                header("location:client/formClient.php");
            else :
                echo "<script type = 'text/javascript'>
                alert('nom ou mot de pass non reconue!!');
                </script>";
            endif;
        endwhile;
  };

  ?> 
  <script src = "js.js"></script>
</body>
</html>