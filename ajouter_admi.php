<?php 
require_once("database.php");//inclure et executer le database.php
$msg='';
//collect les données after submitting it
if(isset($_POST['submit'])){
    //recupere les données du formulaire
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $numero_telephone=$_POST['numero_telephone'];
    $date_naissane=$_POST['date_naissance'];
    $pasword=$_POST['pasword'];

    //demarer la transiction
    $conn->begin_transaction();
    try{
        $name=$prenom;
        //create an array username , concatenation entre $nom et $prenom
        $username=$prenom.'.'.$nom;
        //préparationde la requete
        $stmt_user=$conn->prepare("INSERT INTO `users`(`username`, `type`, `prenom`, `pasword`) VALUES (?,'administrator',?,?)" );
        //hash the password for more security
        $hashed_password=password_hash($pasword,PASSWORD_DEFAULT);
        //liaison des paramètres
        $stmt_user->bind_param("sss",$username,$name,$hashed_password);
        //exécution de la requete
        $stmt_user->execute();
        //récupérer l'identifiant généré automatiquement
        $user_id=$stmt_user->insert_id;
        //préparation de la requete
        $stmt_admin=$conn->prepare("INSERT INTO `admini`(`user_id`, `nom`, `prenom`, `email`, `numero_telephone`, `date_naissance`) 
        VALUES(?,?,?,?,?,?)");
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
        header("location:gestion_admi.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter admin</title>
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
         <h1>Ajouter Administrateur</h1>
         <p>Entrer les informations du admin</p>
         <form method="POST">
             <label for="nom">Nom:</label>
             <input class="p"type="text" name="nom" required><br>
             <label for="prenom">Prenom:</label>
             <input class="p" type="text" name="prenom" required><br>
             <label for="email">Email:</label>
             <input class="p" type="text" name="email" required><br>
             <label for="numero_telephone">Numero de telephone:</label>
             <input class="p" type="text" name="numero_telephone" required><br>
             
             <label for="date_naissance">Date de Naissance:</label>
             <input class="p" type="text" name="date_naissance" required><br>
             
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
    <a class="a1" style="color:#0e5add"  href="gestion_admi.php">Retourner</a>
</nav>
    </div>
</body>
</html>