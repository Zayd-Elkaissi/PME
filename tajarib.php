<?php

include './sec/conn.php';

?>
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./sec/style.css">
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
              <a class="nav-link active ms-4" aria-current="page" href="tajarib.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ms-3" href="#">Edit</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle ms-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
          <a class="nav-link disabled ms-3">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- main -->
<div class="card bg-dark text-white p-2 m-2 text-center">
  <h1 class="card-title">&#128578;</h1>
  <h2 id="emailHelp" class=" text-muted"> &#9830; Add &#9830; </h2>
  
  <?php include './sec/form.php'; 
  // include './sec/upload.php';
  $conn = mysqli_connect('localhost', 'root', '', 'mysqle');?> 
  
  <form action="" method="POST" enctype="multipart/form-data" class="">
    <input type="text" name="matricule" value="<?php echo $matricule ?>" placeholder="Matricule" class="col-3 m-2">
    <input type="text" name="nom" value="<?php echo $nom ?>" placeholder="Nom" class="col-3 m-2">
    <input type="text" name="prénom" value="<?php echo $prénom ?>"  placeholder="Prénom" class="col-3 m-2">
    <input type="date" name="date" value="<?php echo $date ?>"  placeholder="Date" class="col-3 m-2 text-center text-muted">
    <input type="text" name="département" value="<?php echo $département ?>"  placeholder="Département" class="col-3 m-2">
    <input type="number" name="salaire" value="<?php echo $salaire ?>"  placeholder="Salaire" placeholder="salaire" class="col-3 m-2">
    <input type="text" name="fonction" value="<?php echo $fonction ?>"  placeholder="Fonction" class="col-3 m-2">
    <input type="file" name="photo" value="<?php echo $photo ?>" class="form-controle"><br>
    <button type="submit" name="submit" value="send" class="btn btn-outline-info col-4 btn btn-center m-2">Send</button>
    <a href="./sec/search.php"  class="btn btn-outline-success">Search</a>
  </form>
</div>

<!-- table  -->
<table class="table table-striped p-2" method_exists="POST">
  <thead class="container-flued">
    <tr >
      <th scope="col">matricule</th>
      <th scope="col">nom</th>
      <th scope="col">prénom</th>
      <th scope="col">date</th>
      <th scope="col">département</th>
      <th scope="col">salaire</th>
      <th scope="col">fonction</th>
      <th scope="col">photo</th>
      <th scope="col">Opération</th>
    </tr>
  </thead>
  <?php
        $sql = 'SELECT * FROM employe';
        $result = mysqli_query($conn , $sql);
        while($us = mysqli_fetch_assoc($result)){
          ?>
    <tbody>
      <tr>
        <th class="pl-4" scope="row"><?php echo $us['matricule'] ?></th>
        <td><?php echo $us['nom'] ?></td>
        <td><?php echo $us['prénom'] ?></td>
        <td><?php echo $us['date'] ?></td>
        <td><?php echo $us['département'] ?></td>
        <td><?php echo $us['salaire'] ?></td>
        <td><?php echo $us['fonction'] ?></td>
        <td><img src=" <?php echo $us['photo'] ?>" width="90px"></td>
        <td><a href="./sec/edit.php?matricule=<?php echo $us['matricule']?>" class="btn btn-info icon">edit</a> 
          <a href="./sec/suprim.php?delete=<?php echo $us['matricule']?>" class="btn btn-danger" onclick="submet()">supprimer</a>
    </td>
      </tr>
    </tbody>
    <?php  } ?>
  </table>
  <script>
    function submet(){
      return confirm('are you sure your want to delete this record');
      
    }
  </script>
</body>
     </html>
     


