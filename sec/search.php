
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
    <title>Search</title>
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
              <a class="nav-link active ms-4" aria-current="page" href="../tajarib.php">Home</a>
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
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled ms-3">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<section class="bg-secondary text-light p-5">
  <div class="container">
    <div class="d-md-flex justify-content-between align-items-center">
      <h3 class="mb-3 mb-md-0">Choose With what do you want to search</h3>
      <form action="" method="GET">
          <div class="input-group news-input">
          <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control" placeholder="Enter Email">
          <!-- <select name="" id="" class="form-control">
            <option selected disabled value="">Choose Here</option>
            <option value="<?php $items['matricule'] ?>">With Name</option>
            <option value="<?php $items['nom'] ?>">With Matrecul</option>
            <option value="<?php $items['prénom'] ?>">With </option>
            <option value="<?php $items['département'] ?>">With </option>
          </select> -->
          <button type="submit" name="submit" class="btn btn-dark btn-lg" >Search</button>
        </form>
          </div>
        </div>
      </div>
    </section>

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
      <!-- <th scope="col">matricule</th>
      <th scope="col">nom</th>
      <th scope="col">prénom</th>
      <th scope="col">département</th> -->
    </tr>
  </thead>
  <tbody>
<?php
 include 'conn.php'; 
 $conn = mysqli_connect('localhost', 'root', '', 'mysqle');

if(isset($_GET['submit']))
{
  @$searc = $_GET['search'];
  
  $query ="SELECT * FROM employe WHERE CONCAT(matricule ,nom ,prénom ,département ) LIKE '%$searc%'";
  @$run =mysqli_query($conn, $query);
  
  if (mysqli_num_rows($run) > 0) {
    while($row = mysqli_fetch_assoc($run))
    {
      ?>
<tr>
<th class="pl-4" scope="row"><?php echo $row['matricule'] ?></th>
        <td><?php echo $row['nom'] ?></td>
        <td><?php echo $row['prénom'] ?></td>
        <td><?php echo $row['date'] ?></td>
        <td><?php echo $row['département'] ?></td>
        <td><?php echo $row['salaire'] ?></td>
        <td><?php echo $row['fonction'] ?></td>
        <td><img src="<?php echo $row['photo'] ?>" width="90px"></td>


</tr>
<?php
}   
}else{
  ?>
<tr><td colspan="4">
there is nothing with this address
</td></tr>
<?php
    }
  }
  ?>
  </tbody>
  </table>


</body>
</html>