<?php 
require_once("database.php");
session_start();
$msg='';
$sql="SELECT * FROM `dossier_medicale`" ;
$result=mysqli_query($conn,$sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dossier medicale</title>
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
                <a class="a1"  href="gestion_pat_admi.php"><li class="text-white" >Retourner</li></a>
            </ul>
        </div>
</nav>
    <!--création d'une table pour afficher et gerer les infos des etudiants-->
    <h1>Afficher le dossier medicale:</h1>
    <table>
        <tr>
            <td>
                matricule:
            </td>
    
            
            <td>
                nom:
            </td>
            
            <td>
                Prenom:
            </td>
            
            
            <td>
                Maladies:
            </td>
            
            <td>
                Allergies 
            </td>
            <td>
                Operation 
            </td>
            <td>
                Traitement 
            </td>
            <td>
                medicaments 
            </td>

            <td>
                user_id:
            </td>
        </tr>

        <?php 
         if($result){//if it's true
            while($row=mysqli_fetch_assoc($result)){//recupère résultats de la ressource de résultats sous forme de tableau associatif
                $matricule=$row['num_DM'];
                $nom=$row['nom'];
                $prenom=$row['prenom'];
                $maladies=$row['maladies'];
                $allergies=$row['allergies'];
                $operation=$row['operation'];
                $traitement=$row['traitement'];
                $medicaments=$row['medicaments'];
                $user_id=$row['id_user'];
            
           
                //afficher ses résultats
                echo '<tr>
                <td>'.$matricule.'</td>
                <td>'.$nom.'</td>
                <td>'.$prenom.'</td>
                <td>'.$maladies.'</td>
                <td>'.$allergies.'</td>
                <td>'.$operation.'</td>
                <td>'.$traitement.'</td>
                <td>'.$medicaments.'</td>
                <td>'.$user_id.'</td>
              
                </tr>';
                
            }}
         
        
        
        ?>

    </table>

    
</body>
</html>