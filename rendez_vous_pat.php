<?php 
require_once("database.php");
session_start();
if(isset($_GET['deleteid'])){
    //le paramètre "deletid" est présent dans l'URL
    $id=$_GET['deleteid'];
    //execution de la requete pour supprimer un etudiant de la table students
    $delete_rdv=mysqli_query($conn,"DELETE FROM `rendez_vous` where `user_id`=$id ");

    if($delete_){
        //on doit aussi le supprimer de la table users
        $delete_user=mysqli_query($conn,"DELETE FROM `users` where `id`=$id ");
        if($delete_user){//rederiger vers gerer_etd.php après cette opération
            header("location:supprimer_pat.php");
        }
     }

}
$sql="SELECT * FROM `rendez_vous`" ;
$result=mysqli_query($conn,$sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion rendez-vous</title>
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
    <h1>Gérer les rendez-vous des Patients:</h1>
    <table>
        <tr>
            <td>
                id:
            </td>
            
            <td>
            Date de reservation:
            </td>
            
            <td>
            temps de reservation:
            </td>
            
            
            <td>
                nom patient:
            </td>
            
            <td>
               id du patient:
            </td>

            <td>
               service:
            </td>
            <td>
                user_id:
            </td>

            
        </tr>

        <?php 
         if($result){//if it's true
            while($row=mysqli_fetch_assoc($result)){//recupère résultats de la ressource de résultats sous forme de tableau associatif
                $matricule=$row['id'];
                $date_rev=$row['date_rev'];
                $time_rev=$row['time_rev'];
                $nom=$row['nom_pat'];
                $id_pat=$row['id_patient'];
                $service=$row['service'];
                $user_id=$row['user_id'];
           
                //afficher ses résultats
                echo '<tr>
                <td>'.$matricule.'</td>
                <td>'.$date_rev.'</td>
                <td>'.$time_rev.'</td>
                <td>'.$nom.'</td>
                <td>'.$id_pat.'</td>
                <td>'.$service.'</td>
                <td>'.$user_id.'</td>
                <td>
                <button style="background-color:#33a0ff;
                color: #ffffff;cursor: pointer;">
                <a href="update_rv.php? updateid= '.$matricule.'">Modifier</a></button>
                
                <button style="background-color:#33a0ff;
                color: #ffffff;
                cursor: pointer;"><a href=".php? deleteid= '.$user_id.'">Supprimer</a></button>
                </td>
                </tr>';
                
            }}
         
        
        
        ?>

    </table>

    
</body>
</html>