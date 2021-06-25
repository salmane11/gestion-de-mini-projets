<?php include 'bd.php';?>
<?php
    $id=$_REQUEST["q"];
    $sql="UPDATE etudiant SET confirmation=1 where id_etudiant=$id";
    if ($conn->query($sql) === TRUE) {
        echo "etudiant confirme";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();