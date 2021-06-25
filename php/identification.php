<!DOCTYPE html>
<html>
    <head>
        <title> identification</title>
        <link rel="stylesheet" href="identification.css" />
        <style>
            p{
                text-align:justify;
            }
        </style>    
    </head>
    <body>
        <h1>Bonjour cher administrateur</h1><br><br>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br><br><br>
            email : <input name="email" type="email" /><br><br>
            mot de passe : <input name="pass" type="password" /><br><br>
            <input type="submit" value="Se connecter"/>
            <input type="reset" value="Annuler"/><br><br><br>
        </form>
        <?php include 'bd.php';?>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $mail=test_input($_POST["email"]);
                $pass=test_input($_POST["pass"]);
                $sql = "SELECT * FROM administrateur where mail='$mail'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        if($row["pass"]===$pass){
                            header("location: accueil.php");
                        }else{
                            echo"<p>mot de passe invalide</p>";
                        }
                    }
                } else {
                    echo "<p>votre email est invalide</p>";
                }
            }
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            $conn->close();
        ?>
        <br><br>
        <footer>
            mail : administrateur@inpt.ac.ma<br>
            phone : 0512345678<br>
            adress : MadinatAlIrfane, Rabat, Rabat-Sale-Kenitra, Maroc<br> 
        </footer>
    </body>
</html>
