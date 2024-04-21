<?php
require_once("database.php");
session_start();

$msg = ''; 

if (isset($_POST['submit'])) {
        
        $id_patient = $_POST['id_patient'];
        $date_rev = $_POST['date_rev'];
        $time_rev = $_POST['time_rev'];
        $nom_patient=$_POST['nom_pat'];
        $service=$_POST['service'];
        $user_id=$_POST['user_id'];
    
        
        
        $availability_query = "SELECT * FROM rendez_vous WHERE date_rev = '$date_rev' AND time_rev = '$time_rev'";
        $result = mysqli_query($conn, $availability_query);
    
        if (mysqli_num_rows($result) > 0) {
            $msg = "La date et l'heure sélectionnées ne sont pas disponibles. Veuillez choisir une autre date/heure.";
        } else {
           
            $insert_query = "INSERT INTO `rendez_vous`(`date_rev`, `time_rev`, `nom_pat`, `id_patient`, `service`, `user_id`) 
                            VALUES ('$date_rev', '$time_rev', '$nom_patient', '$id_patient', '$service','$user_id')";
            if (mysqli_query($conn, $insert_query)) {
                $msg = "Réservation effectuée avec succès!";
            } else {
                $msg = "Erreur lors de la réservation: " . mysqli_error($conn);
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rendez-vous</title>
    <link rel="stylesheet" href="rendez-vous.css">

</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Reservation</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6660d3f5a2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="afficher_pat.css">
    <link rel="stylesheet" href="ajouter_pat.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Make a Reservation</h2>
        <form method="POST" id="reservationForm">
            
            <label for="id_patient">id du patient :</label>
            <input type="text" id="name" name="id_patient" required>

            <label for="date_rev">Date:</label>
            <input type="date" id="date" name="date_rev" required>

            <label for="time_rev">Time:</label>
            <input type="time" id="date" name="time_rev" required>

            <label for="nom_pat">Nom du Patient:</label>
            <input type="text" id="date" name="nom_pat" required>

            <label for="user_id">id_user:</label>
            <input type="text" id="date" name="user_id" required>

            <label for="service">Department:</label>
            <select id="department" name="service" required>
            <option value="Cardiology">Cardiologie</option>
            <option value="Orthopedics">Pédiatrie</option>
            <option value="Gastroenterology">otorhinolaryngologie</option>
            <option value="Cardiology">Obstétrique et Gynécologie</option>
            <option value="Orthopedics">Médecine Générale</option>
            <option value="Gastroenterology">Gastro-entérologie</option>
            </select>
            <input class="q" type="submit" name="submit" value="reserver">
            <br> <br>
            <a class="a1" style="color:#0e5add"  href="interface_patient.php">Retourner</a>

        </form>
    </div>

    
</body>
</html>