<?php
require_once('database.php');//inclure file database.php

$id = $_GET['updateid'];
//la requete 
$sql = "SELECT * FROM `admini` WHERE id=$id";
//executer la requete
$result = mysqli_query($conn, $sql);
//recupere les resultats 
$row = mysqli_fetch_assoc($result);

$nom = $row['nom'];
$prenom = $row['prenom'];
$email = $row['email'];
$numero_telephone = $row['numero_telephone'];

$date_naissance = $row['date_naissance'];



if (isset($_POST["update"])) {//collect les données 
                
    $nom=$_POST['nom'];
                
    $prenom=$_POST['prenom'];
                
    $date_naissance=$_POST['date_naissance'];
                
    $email=$_POST['email'];
                
    $numero_telephone=$_POST['numero_telephone'];
                
    
                
   
    //la requete de modification des données selon id 
    $sql = "UPDATE `admini` SET 
        nom='$nom',
        prenom='$prenom',
        date_naissance='$date_naissance',
        email='$email',
        numero_telephone='$numero_telephone',
        
        WHERE id=$id";

    //execution de la requete SQL
    $result = mysqli_query($conn, $sql);

    if ($result) {//if it's true rediriger vers file gerer_etd.php
       
        header("loacation:supprimer_pat.php");
    } else {//if it's false error
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier Administrateur</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6660d3f5a2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="afficher_pat.css">
    <link rel="stylesheet" href="modifier_pat.css">
</head>
<body>
<div class="navbar">
        <div class="logo">
            <i class="fa-solid fa-house-medical-circle-xmark" style="color: #0e5add;"></i>
            <span>SHIFFAE</span>
        </div>
        
</div>
<nav class="navbar navbar-expand-lg navbar-info bg-info" style="background-color: #0e5add !important;">
        <h5 class="text-white">Gestion du Systeme Hopitale</h5>
        <DIV class="mr-auto"></DIV>
        <br>
        <div class="menu">
            <ul>
                <a class="a1"  href="gestion_admi.php"><li class="text-white" >Retourner</li></a>
            </ul>
        </div>
</nav>
    <!--creation du formulaire html-->
    <form action="" method="POST">
        <p>Modifier les données:</p>
        <label for="nom">NOM:</label>
        <input class="p" type="text" name="nom" required  value=<?php 
         echo $nom;//afin d'afficher les donnée existant
        ?>>
        <br>
        <label for="prenom">PRENOM:</label>
        <input class="p" type="text" name="prenom" required  value=<?php 
         echo $prenom;
        ?>><br>
        <label for="date_naissance">DATE DE NAISSANCE:</label>
        <input class="p" type="date" name="date_naissance" required  value=<?php 
         echo $date_naissance;
        ?>> <br>
        <label for="email">EMAIL:</label>
        <input class="p" type="email" name="email" required  value=<?php 
         echo $email;
        ?>> <br>
        <label for="numero_telephone">NUMERO DE TELEPHONE:</label>
        <input class="p" type="text" name="numero_telephone" required  value=<?php 
         echo $numero_telephone;
        ?>> <br>
        
        <input class="q" type="submit" name="update" value="MODIFIER"><br>
        <!--retourner facilement -->
        
    </form>
    
</body>
</html>
