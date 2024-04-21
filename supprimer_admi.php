<?php 
require_once("database.php");
session_start();
if(isset($_GET['deleteid'])){
    //le paramètre "deletid" est présent dans l'URL
    $id=$_GET['deleteid'];
    //execution de la requete pour supprimer un etudiant de la table students
    $delete_std=mysqli_query($conn,"DELETE FROM `admini` where `user_id`=$id ");

    if($delete_std){
        //on doit aussi le supprimer de la table users
        $delete_user=mysqli_query($conn,"DELETE FROM `users` where `id`=$id ");
        if($delete_user){//rederiger vers gerer_etd.php après cette opération
            header("location:supprimer_admi.php");
        }
     }

}
$sql="SELECT * FROM `admini`" ;
$result=mysqli_query($conn,$sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher Administrateur</title>
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
    <h1>Gérer les données des Administrateur:</h1>
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
                Date de Naissance:
            </td>
            
           
            <td>
                Operation

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
             
                $date_naissace=$row['date_naissance'];
                
           
                //afficher ses résultats
                echo '<tr>
                <td>'.$matricule.'</td>
                <td>'.$nom.'</td>
                <td>'.$prenom.'</td>
                <td>'.$email.'</td>
                <td>'.$numero_telephone.'</td>
                
                <td>'.$date_naissace.'</td>
               
                <td>
                <button style="background-color:#33a0ff;
                color: #ffffff;cursor: pointer;">
                <a href="modifier_admi.php? updateid= '.$matricule.'">Modifier</a></button>
                
                <button style="background-color:#33a0ff;
                color: #ffffff;
                cursor: pointer;"><a href="supprimer_admi.php? deleteid= '.$user_id.'">Supprimer</a></button>
                </td>
                </tr>';
                
            }}
         
        
        
        ?>

    </table>

    
</body>
</html>