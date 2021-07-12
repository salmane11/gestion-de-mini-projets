<?php include 'bd.php';?>
<?php
    $id=$_REQUEST["q"];
    echo $id;
    $sql="DELETE from encadrant where id_encadrant=$id";
    if ($conn->query($sql) === TRUE) {
        echo "encadrant supprime";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
?>