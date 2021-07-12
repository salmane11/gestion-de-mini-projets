<?php include 'bd.php';?>
<?php
    $id=$_REQUEST["q"];
    echo $id;
    $sql="DELETE from etudiant where id_etudiant=$id";
    if ($conn->query($sql) === TRUE) {
        echo "etudiant supprime";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();