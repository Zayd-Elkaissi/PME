<?php

@include 'conn.php';

$matricule = $_GET['matricule'];
$sql = "SELECT * FROM employe where matricule= '$matricule'";
$result = mysqli_query($conn, $sql);
$us = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>mysqlAndPhp</title>
  </head>
  
  <body>
    
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../tajarib.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">Edit</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" >
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          
        </div></div>
      </nav>
      
      
      <!-- Body -->
      <div class="card bg-dark text-white p-2 m-2 text-center">
        <h1 class="card-title">&#128578;</h1>
        <h2 class=" text-muted"> &#9829; Edit &#9829; </h2>
        <!-- return data -->
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="text" name="matricule" value="<?php echo $us['matricule']; ?>" placeholder="Matricule" class="col-3 m-2">
          <input type="text" name="nom" value="<?php echo $us['nom']; ?>"  placeholder="Nom" class="col-3 m-2">
    <input type="text" name="prénom" value="<?php echo $us['prénom']; ?>"  placeholder="Prénom" class="col-3 m-2">
    <input type="date" name="date" value="<?php echo $us['date']; ?>"  placeholder="Date" class="col-3 m-2 text-center text-muted">
    <input type="text" name="département"value="<?php echo $us['département']; ?>"  placeholder="Département" class="col-3 m-2">
          <input type="number" name="salaire" value="<?php echo $us['salaire']; ?>"  placeholder="Salaire" placeholder="salaire" class="col-3 m-2">
          <input type="text" name="fonction" value="<?php echo $us['fonction']; ?>"  placeholder="Fonction" class="col-3 m-2">
          <input type="file" name="photo" value="<?php echo $us['photo']; ?>"><br>
          <button type="submit" name="update" value="Update" class="btn btn-outline-info col-4 btn btn-center m-2">Update</button>
        </form>
      </div>
      
      <!--  call update -->

<?php 
@$matricule = $_POST["matricule"];
@$nom = $_POST["nom"];
@$prénom = $_POST["prénom"];
@$date = $_POST["date"];
@$département = $_POST["département"];
@$salaire = $_POST["salaire"];
@$fonction = $_POST["fonction"];
@$photo = $_FILES['photo']['name'];

 if (isset($_POST['update'])) {

$coc = "UPDATE employe SET matricule='$matricule',nom='$nom',prénom='$prénom',date='$date',département='$département',salaire='$salaire',fonction='$fonction',photo='$photo' WHERE matricule='$matricule'";

                    @$rut = (mysqli_query($conn, $coc)); 
                    if ($rut) { 
                      move_uploaded_file($_FILES['photo']['tmp_name'], "$photo"); }
                     header('Location: ../tajarib.php');
 }
                 ?>
 </body>

</html>