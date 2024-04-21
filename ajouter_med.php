<?php
require_once("database.php");//inclure le database.php(connexion à la base de donnée)
$msg='';//definir une variable $msg
if(isset($_POST['submit'])){// condition verification de submit des infos du dormulaire html

    $nom=$_POST['nom'];//recupere les données du formulaire

    $prenom=$_POST['prenom'];

    $email=$_POST['email'];

    $numero_telephone=$_POST['numero_telephone'];

    $specialite=$_POST['specialite'];

    $password=$_POST['pasword'];
    
    $conn->begin_transaction();//demarrer la transiction
    try{
    $name=$prenom;//definir un variable $name qui prend comme valeur $prenom
    $username=$prenom.".".$nom;//definir un variable username concatenation entre $nom et $prenom
    //préparation de la requete table users
    $stmt_user=$conn->prepare("INSERT INTO `users`( `username`, `type`, `prenom`, `pasword`) VALUES(?,'medecin',?,?)");
    //crypter le mot de passe donnée pour une connexion plus securisée
    $hashed_password=password_hash($password,PASSWORD_DEFAULT);
    //liaison des paramètres
    $stmt_user->bind_param("sss",$username,$name,$hashed_password);
    //execution de la requete
    $stmt_user->execute();
    //récupérer l'identifiant généré automatiquement
    $user_id=$stmt_user->insert_id;
    //préparation de la requete (table students)
    $stmt_std=$conn->prepare("INSERT INTO `medecin`(`user_id`, `nom`, `prenom`, `email`, `numero_telephone`, `specialite`) VALUES (?,?,?,?,?,?)");
    //liaison des parametre
    $stmt_std->bind_param("isssss", $user_id, $nom, $prenom, $email, $numero_telephone, $specialite);
    //execution de la requete    
    $stmt_std->execute();
   //valider la transiction
    $conn->commit();
    //afficher le message lors d'execution correcte
    $msg="enregister avec succés!";
    }
    finally{ if(isset($stmt_user)){
            //fermer la requete
            $stmt_user->close();
        }
        if(isset($stmt_admin)){
            //fermer la requete
            $stmt_admin->close();
        }
    }
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter medecin</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6660d3f5a2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="afficher_pat.css">
    <link rel="stylesheet" href="ajouter_pat.css">

</head>
<body>
<div class="navbar">
        <div class="logo">
            <i class="fa-solid fa-house-medical-circle-xmark" style="color: #0e5add;"></i>
            <span>SHIFFAE</span>
        </div>
        
</div>

               
    <div>
        <!--Formulaire html pour ajouter des etd-->
         <h1>Ajouter medecin</h1>
         <p>Entrer les informations du medecin</p>
         <form method="POST">
             <label for="nom">Nom:</label>
             <input class="p"type="text" name="nom" required><br>
             <label for="prenom">Prenom:</label>
             <input class="p" type="text" name="prenom" required><br>
             <label for="email">Email:</label>
             <input class="p" type="text" name="email" required><br>
             <label for="numero_telephone">Numero de telephone:</label>
             <input class="p" type="text" name="numero_telephone" required><br>
             <label for="specialite">Specialitée:</label>
             <select class="p" type="text" name="specialite" required><br>
             <option value="Cardiology">Cardiologie</option>
            <option value="Orthopedics">Pédiatrie</option>
            <option value="Gastroenterology">otorhinolaryngologie</option>
            <option value="Cardiology">Obstétrique et Gynécologie</option>
            <option value="Orthopedics">Médecine Générale</option>
            <option value="Gastroenterology">Gastro-entérologie</option>
            </select>
             
             <label for="pasword">Mot de Passe:</label>
             <input class="p" type="password" name="pasword" required><br>
             <input class="q" type="submit" name="submit" value="Ajouter">

             <div style="color:red;">
                <?php 
                echo $msg;
                 ?>
            </div>

    </form> 
    <div>
    <a class="a1" style="color:#0e5add"  href="gestion_med_admi.php">Retourner</a>
</nav>
    </div>
</body>
</html>