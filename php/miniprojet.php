<!DOCTYPE html>
<html>
    <head>
        <title>miniprojets</title>
        <link rel="stylesheet" href="miniprojet.css"/>
    </head>
    <body>
        <h1>mini-projets</h1>
        <?php include "bd.php";?>
        <?php
            $sql = "SELECT * FROM projet";
            $result = $conn->query($sql);
            echo "<table><tr><td> id_projet: </td><td> id_etudiant: </td><td> id_encadrant: </td><td> Description: </td><td>date: </td><td>affectation:  </td></tr>";
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>". $row["id_projet"]. "</td><td>". $row["id_etudiant"]. "</td><td>". $row["id_encadrant"]. "</td><td> 
                    ". $row["description"]. "</td><td> ".$row["date"]."</td><td>". $row["affectation"]. "</td></tr>";
                }
                echo"</table>";
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>

    </body>
</html>