<!DOCTYPE html>
<html>
    <head>
        <title>Ajouter un administrateur</title>
        <link rel="stylesheet" href="ajouterAdmin.css"/>
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
        </div><br><br><br>
        <h1>pour ajouter un nouveau administrateur, veuillez remplire ce formulaire :</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br>
            id : <input name="id" type="number" /><br><br>
            nom : <input name="name" type="text" /><br><br>
            prenom : <input name="prenom" type="text" /><br><br>
            email : <input name="mail" type="text" /><br><br>
            password : <input name="pass" type="text" /><br><br>
            <input type="submit" value="Valider"/>
            <input type="reset" value="Annuler"/><br><br>
            <a href="accueil.php">Retour à l'accueil</a><br><br>
        </form>
        <?php
            $server="localhost";
            $user="root";
            $password="";
            $db="miniprojet";
            $id=0;
            $nom=$prenom="";
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $id=test_input($_POST["id"]);
                $nom=test_input($_POST["name"]);
                $prenom=test_input($_POST["prenom"]);
                $mail=test_input($_POST["mail"]);
                $pass=test_input($_POST["pass"]);
                $conn=new mysqli($server,$user,$password,$db);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql="INSERT into administrateur values ($id,'$nom','$prenom','$mail','$pass')";
                if ($conn->query($sql) === TRUE) {
                    echo "administrateur bien inscrit";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
                $conn->close();
            }
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>    
        <br><br>
        <footer>
            mail : administrateur@inpt.ac.ma<br>
            phone : 0512345678<br>
            adress : MadinatAlIrfane, Rabat, Rabat-Sale-Kenitra, Maroc<br> 
        </footer>
    </body>
</html>
