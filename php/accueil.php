<!DOCTYPE html>
<html>
    <head>
        <title> Accueil </title>
        <link rel="stylesheet" type="text/css" href="accueil.css" />
        <style>
            .droite{
                border-style:solid;
                border-radius:5px;
                width:50px;
                font-size:30px;
                position:absolute;
                right:25%;
            }
            .gauche{
                border-style:solid;
                border-radius:5px;
                width:50px;
                font-size:30px;
                position:absolute;
                left:20%;
            }
        </style>
    </head>
    <body>
        <div class="upper">
            <img  alt="INPT" id="logo" src="inpt.png">
            <div class="search">
                Chercher : <input type="search" />
            </div>
            <div class="bottons">
                <a href="" >Messagerie</a> 
                <a href="identification.php">Se Deconnecter</a>
            </div>
        </div><br><br><br><br><br><br>
        <div class="left">
            <br><br><br>
            <a href="confirmerinscription.php">Confirmer une inscription</a><br><br><br><br>
            <a href="visualiserutilisateurs.php">Visualiser les utilisateurs</a><br><br><br><br>
            <a href="miniprojet.php">Visualiser les mini-projets</a><br><br><br><br>
            <a href="ajouterAdmin.php">Ajouter un nouveau administrateur</a>
        </div>
        <div class="right">
        <?php include 'bd.php';?>
            <table cellpadding="60">
                <tr>
                    <td>
                        <h>nombre totale d'utilisateurs</h>
                        <?php 
                            $sql1="SELECT COUNT(*) as total from encadrant";
                            $result = $conn->query($sql1);
                            $encadrant=0;
                            $etudiant=0;
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $encadrant=$row["total"];
                                }
                            }
                            $sql2="SELECT COUNT(*) as totale from etudiant where confirmation=1";
                            $result2 = $conn->query($sql2);
                            if ($result2->num_rows > 0) {
                                while($row = $result2->fetch_assoc()) {
                                    $etudiant=$row["totale"];
                                }
                            }
                            echo "<p class='gauche'>".$etudiant+$encadrant."</p>";
                        ?><br><br><br><br>
                        
                    </td>
                    <td>
                        <h>nombre totale d'encadrants</h>
                        <?php 
                            $sql1="SELECT COUNT(*) as total from encadrant";
                            $result = $conn->query($sql1);
                            
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<p class='droite'>".$row["total"]."</p>";
                                }
                            }
                        ?><br><br><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h>nombre d'etudiants inscrits</h>
                        <?php 
                            $sql1="SELECT COUNT(*) as total from etudiant where confirmation=1";
                            $result = $conn->query($sql1);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<p class='gauche'>".$row["total"]."</p>";
                                }
                            }
                        ?>
                    </td>
                    <td>
                        <h>nombre d'etudiants non confirmes</h>
                        <?php 
                            $sql1="SELECT COUNT(*) as total from etudiant where confirmation=0";
                            $result = $conn->query($sql1);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<p class='droite'>".$row["total"]."</p>";
                                }
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <footer>
            mail : administrateur@inpt.ac.ma<br>
            phone : 0512345678<br>
            adress : MadinatAlIrfane, Rabat, Rabat-Sale-Kenitra, Maroc<br> 
        </footer>
    </body>
</html>