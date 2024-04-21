<?php 
require_once("database.php");
session_start();

$sql="SELECT * FROM `medecin`" ;
$result=mysqli_query($conn,$sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher patients</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6660d3f5a2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="afficher_pat.css">

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
                <a class="a1"  href="gestion_med_admi.php"><li class="text-white" >Retourner</li></a>
            </ul>
        </div>
</nav>
    <!--création d'une table pour afficher et gerer les infos des etudiants-->
    <h1>Afficher les données des Medecins:</h1>
    <table>
        <tr>
            <td>
                Matricule:
            </td>
            
            <td>
                Nom:
            </td>
            
            <td>
                Prenom:
            </td>
            
            
            <td>
                Email:
            </td>
            
            <td>
                Numero de Telephone:
            </td>

            <td>
                Spécialité:
            </td>
        </tr>

        <?php 
         if($result){//if it's true
            while($row=mysqli_fetch_assoc($result)){//recupère résultats de la ressource de résultats sous forme de tableau associatif
                $matricule=$row['id'];
                $user_id=$row['user_id'];
                $nom=$row['nom'];
                $prenom=$row['prenom'];
                $email=$row['email'];
                $numero_telephone=$row['numero_telephone'];
                $specialite=$row['specialite'];
            
           
                //afficher ses résultats
                echo '<tr>
                <td>'.$matricule.'</td>
                <td>'.$nom.'</td>
                <td>'.$prenom.'</td>
                <td>'.$email.'</td>
                <td>'.$numero_telephone.'</td>
                <td>'.$specialite.'</td>
                </tr>';
                
            }}
         
        
        
        ?>

    </table>

    
</body>
</html>