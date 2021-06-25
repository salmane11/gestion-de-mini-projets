<!DOCTYPE html>
<html>
    <head>
        <title>Visualiser les utilisateurs</title>
        <link rel="stylesheet" href="miniprojet.css"/>
    </head>
    <body>
        <h1>encadrants</h1>
        <?php include "bd.php";?>
        <?php
            $sql = "SELECT * FROM encadrant";
            $result = $conn->query($sql);
        ?>
            <table><tr><td> id_encadrant: </td><td> nom: </td><td> prenom: </td><td>mail</td><td>mot de passe:  </td><td>supprimer  </td></tr>
        <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
        ?>
                    <tr><td><?php echo $row["id_encadrant"]?></td><td><?php echo $row["nom"]?></td><td> 
                    <?php echo $row["prenom"]?></td><td><?php echo $row["mail"]?></td><td><?php echo $row["password"]?></td><td><button onclick='remove_encadrant(<?php echo $row["id_encadrant"]?>)'>X</button></td></tr>
        <?php
                }
                echo"</table>";
            } else {
                echo "0 encadrants";
            }
        ?><br>
        <h1>etudiants inscrits </h1>
        <?php
            $sql = "SELECT * FROM etudiant where confirmation=1";
            $result = $conn->query($sql);
        ?>
            <table>
                <tr>
                    <td> id_etudiant: </td>
                    <td> id_encadrant: </td>
                    <td> nom: </td><td> prenom: </td>
                    <td>mail</td><td>mot de passe:  </td>
                    <td>supprimer  </td>
                </tr>
        <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
        ?>
                    <tr>
                        <td><?php echo  $row["id_etudiant"]?></td>
                        <td><?php echo  $row["id_encadrant"]?></td>
                        <td><?php echo  $row["nom"]?></td>
                        <td><?php echo  $row["prenom"]?></td>
                        <td> <?php echo  $row["mail"]?></td>
                        <td><?php echo  $row["password"]?></td>
                        <td><button onclick='remove_student(<?php echo $row["id_etudiant"]?>)'>X</button></td>
                    </tr>
        <?php
                }
                echo"</table>";
            } else {
                echo "0 etudiant inscrit";
            }
            $conn->close();
        ?>
        <script>
            function remove_student(id) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    document.getElementById(id+"id").innerHTML =
                    this.responseText;
                  }
                };
                xhttp.open("GET", "delete.php?q="+id, true);
                xhttp.send();
            }
            function remove_encadrant(id) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    document.getElementById(id+"id").innerHTML =
                    this.responseText;
                  }
                };
                xhttp.open("GET", "removee.php?q="+id, true);
                xhttp.send();
            }
        </script>
    </body>
</html>