<?php 
require_once("database.php");//include database.php
session_start();//demarrer ou reprendre une session existante
$msg='';//crée une variable $msg
if(isset($_POST['ajouter'])){//condition de verification pour le formulaire HTML
    $username=mysqli_real_escape_string($conn,$_POST['username']);//Protège les caractères spéciaux d'une chaîne pour l'utiliser dans une requête SQL
    $password=mysqli_real_escape_string($conn,$_POST["pasword"]);
    //préparation la requete
    if($stmt=$conn->prepare("SELECT `id`, `username`, `type`, `prenom`, `pasword` FROM `users` WHERE username=? ")){
        //liaison des paramètres
        $stmt->bind_param('s',$username);
        //execution de la requete
        $stmt->execute();
        //Récupère un jeu de résultats depuis la requête préparée
        $result=$stmt->get_result();
        //verification si la requete renvoyé des resultats
        if($result->num_rows >0){
            //parcourir les resultat
            $row=$result->fetch_assoc();
            //accéder aux valeurs
            $hashed_password=$row['pasword'];
            $role_user=$row['type'];
            $nom=$row['prenom'];
            //verification de hashpassword avec le password entrée par user
            if(password_verify($password,$hashed_password)){
               $_SESSION['username']=$row;
               //verification du role d'user
                if($role_user== "administrator"){//si c'est un admin va se transferer à l'interfcae admin
                    header("location:interface_admi.php");
                    exit();
                }
                elseif($role_user== "medecin"){//si c'est un std transferer à l'interface std
                   header("location:interface_medecin.php");
                   exit();
                }
                elseif($role_user== "patient"){//si c'est un std transferer à l'interface std
                    header("location:interface_patient.php");
                    exit();
                 }
                else{
                    $msg="error";//si ni std ni admin afficher un message d'ereur
                }
             }
            else{//si le mot de passe entrée est different de mot de pass hashed 
                $msg="username ou/et mot de passe incorrecte! ";
                }}
    else{
        $msg="error";}
        
                    
    }

    
}


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="connexion.css">
</head>
<body>

<div class="container container--static">
    <div class="info-box left">
        <h2 class="heading">Don't have an account?</h2>
        <p class="info-text">Si vous ne disposez pas encore d'un compte, veuillez vous rendre à l'hôpital afin d'obtenir les informations nécessaires pour en créer un.</p>
    </div>
</div>
<div class="container container--sliding">
    <div class="slider-content login">
        <h2 class="heading alt">Connexion</h2>
        <form method="post" id="login">
            <label for="username">Nom d'utilisateur:
            <input class="email" type="text" name="username" placeholder="Nom d'utilisateur" required></label>
            <label for="pasword">Mot de passe:
            <input class="password" type="password" name="pasword" placeholder="Mot de passe" required></label>
            <input style="hover {background-color: #ffffff;color: #0e5add;}"  class="button" type="submit" name="ajouter" value="connect">
        </form>
        <div>
                <?php echo $msg;?>
            </div>
    </div>
</div>
</body>
</html>