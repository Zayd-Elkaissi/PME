

<?php include 'conn.php';

@$matricule = $_GET['delete'];
$delete= "DELETE FROM employe WHERE matricule= '$matricule' ";
$result = mysqli_query($conn, $delete);
header('Location: ../tajarib.php');


?>