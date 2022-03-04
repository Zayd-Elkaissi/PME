<?php 

@$matricule = $_POST["matricule"];
@$nom = $_POST["nom"];
@$prénom = $_POST["prénom"];
@$date = $_POST["date"];
@$département = $_POST["département"];
@$salaire = $_POST["salaire"];
@$fonction = $_POST["fonction"];
// @$photo = $_POST["photo"];
@$photo = $_FILES['photo']['name'];
if (isset($_POST['submit'])) {
    $coc = "INSERT INTO employe(matricule, nom, prénom, date, département, salaire, fonction, photo )
                VALUES ('$matricule', '$nom' , ' $prénom' , '$date' , ' $département' , ' $salaire ' , '$fonction' , '$photo')";
                
                if (empty($matricule)) {
                    echo "Entrer xihaja";
                    }elseif(empty($nom)){
                        echo 'votre nom svp';
                    }elseif(empty($prénom)) {
                        echo 'votre prénom svp ';
                    }elseif(empty($date)) {
                        echo 'votre date svp ';
                    }elseif (empty($département)) {
                        echo 'votre département svp ';
                    }elseif (empty($salaire)){
                        echo 'votre salaire svp ';
                    }elseif (empty($fonction)){
                        echo 'votre fonction svp ';
                    }elseif (empty($photo)){
                        echo 'votre photo svp ';
                 }else{
                     header('Location: tajarib.php');
                     $lawa = (mysqli_query($conn, $coc));
                     if ($lawa) { 
                     move_uploaded_file($_FILES['photo']['tmp_name'], "$photo"); }
                    }
                     
                     
                    }