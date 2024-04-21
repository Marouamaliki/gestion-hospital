<?php 
require_once("database.php");//inclure et executer le database.php
$msg='';
//collect les données after submitting it
if(isset($_POST['registrer'])){
    //recupere les données du formulaire
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $numero_telephone=$_POST['numero_telephone'];
    $date_naissane=$_POST['date_naissane'];
    $pasword=$_POST['pasword'];

    //demarer la transiction
    $conn->begin_transaction();
    try{
        //create an array username , concatenation entre $nom et $prenom
        $username=$prenom.'.'.$nom;
        //préparationde la requete
        $stmt_user=$conn->prepare("INSERT INTO users (`username`, `pasword` ,`type`) VALUES (?,?,'administrator')" );
        //hash the password for more security
        $hashed_password=password_hash($pasword,PASSWORD_DEFAULT);
        //liaison des paramètres
        $stmt_user->bind_param("ss",$username,$hashed_password);
        //exécution de la requete
        $stmt_user->execute();
        //récupérer l'identifiant généré automatiquement
        $user_id=$stmt_user->insert_id;
        //préparation de la requete
        $stmt_admin=$conn->prepare("INSERT INTO `admini`(`id`, `user_id`, `nom`, `prenom`, `email`, `numero_telephone`, `date_naissance`) 
        VALUES(?,?,?,?,?,?,?)");
        //liaison des paramètre
        $stmt_admin->bind_param("isssss",$user_id,$nom,$prenom,$email,$numero_telephone,$date_naissane);
        //exécution de la requete
        $stmt_admin->execute();
        //valider la transiction
        $conn->commit();
        //message lors d'une execution correcte
        $msg="enregister avec succés!";
    }finally{
        if(isset($stmt_user)){
            //fermer la requete user
            $stmt_user->close();
        }
        if(isset($stmt_admin)){
            //fermer la requete admin
            $stmt_admin->close();

        }
    }
    if(isset($_GET['retourner'])){//rediriger vers file service.php
        header("location:service.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="stylesheet" href="registration_admin.css">
</head>
<body>
    <div>
    <h1>Registration Form</h1>
    <p>Entrer les informations</p>


    <!-- formulaire pour enregistrer les administrateur! -->
    <form method="post"> 
        <label for="nom">Nom:</label>
        <input  class="p" type="text" name="nom" required><br>
        <label  for="prenom">Prénom:</label>
        <input  class="p" type="text" name="prenom" required><br>
        <label for="email">email:</label>
        <input class="p" type="text" name="email" required><br>
        <label for="numero_telephone">numéro de telephone::</label>
        <input class="p" type="text" name="numero_telephone" required><br>
        <label for="date_naissane">Date de naissance:</label>
        <input class="p" type="text" name="date_naissane" required ><br>
        <label for="pasword">Password:</label>
        <input class="p" type="text" name="pasword" required><br>
        <input class="q" type="submit" name="registrer" value="submit">
        <div style="color: red;">
            <?php 
              echo $msg;
            ?>
        </div>


    </form>
    <div>
    <a href="service.php" style="color: black ;">Retourner</a><!--retourner facilement-->
    </div>
    </div>
</body>
</html>