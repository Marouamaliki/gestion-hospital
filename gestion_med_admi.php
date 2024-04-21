<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>interface administration</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6660d3f5a2.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="interface_home.css">


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
</nav>
<div class="container-fluid">
    <div class="col-mod-12">
        <div class="row">
            <div class="col-md-2" style="margin: left -30px;">

            <!--Sidenav-->
            <div class="list-group bg-info" style="height:9Ovh;">
                <a href="interface_admi.php" class="list-group-item list-group-item-action bg-info text-center text-white"style="background-color: #0e5add !important;" >Table de Bords</a><br>
                <a href="gestion_admi.php" class="list-group-item list-group-item-action bg-info text-center text-white" style="background-color: #0e5add !important;" >Administrateur</a><br>
                <a href="gestion_med_admi.php" class="list-group-item list-group-item-action bg-info text-center text-white" style="background-color: #0e5add !important;" >Medecins</a><br>
                <a href="gestion_pat_admi.php" class="list-group-item list-group-item-action bg-info text-center text-white" style="background-color: #0e5add !important ;">Patient</a><br>
                <a href="logout.php" class="list-group-item list-group-item-action bg-info text-center text-white" style="background-color: #0e5add !important ;">logout</a><br>

            </div>
            <!--ends-->
            </div>
             <div class="col-md-10">
                <h4 class="my-2">Table de Bords Administrateur</h4>
                <div class="col-md-12 my-1">
                    <div class="row">
                        <div class="col-md-3 bg-success mx-2" style="height: 130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h5 class="my-2 text-white" styles="front-size:30px;">
                                                    
                                        </h5>
                                        <a href="afficher_med.php">
                                        <h5 class="text-white">Afficher</h5>
                                        <h5 class="text-white">Medecins</h5>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                     <a hef="afficher_pat.php"> <i class="fa-solid fa-user-tie fa-3x my-4"></i></a> 

                                        </i>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3 bg-info mx-2" style="height: 130px;">
                        <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h5 class="my-2 text-white" styles="front-size:30px;">
                                        <a href="ajouter_med.php">
                                        </h5>
                                        <h5 class="text-white">Ajouter</h5>
                                        <h5 class="text-white">Medecins</h5>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                     <a hef="#"><i class="fa-solid fa-stethoscope  fa-3x my-4 "></i></a> 

                                        </i>
                                    </div>
                                </div>

                            </div>
                    
                    </div>
                                
                        <div class="col-md-3 bg-warning mx-2" style="height: 130px;">
                        <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h5 class="my-2 text-white" styles="front-size:30px;">
                                        
                                        </h5>
                                        <a href="supprimer_med.php">
                                        <h5 class="text-white">Supprimer/Modifier</h5>
                                        <h5 class="text-white">Medecins</h5></a>
                                    </div>
                                    <div class="col-md-3">
                                     <a hef="#"><i class="fa-solid fa-bed-pulse fa-3x my-4  "></i></a></i>
                                    </div>
                                </div>

                            </div>
                            </div>
                          
                            </div>
                        </div>

                    </div>
                </div>




             </div>

        </div>

    </div>

</div>

    
</body>
</html>