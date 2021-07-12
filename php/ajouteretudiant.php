<!DOCTYPE html>
<html>
    <head>
        <title>Ajouter un etudiant</title>
        <link rel="stylesheet" href="ajouteretudiant.css"/>   
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
        <h1>pour ajouter un ensemble d'etudiant veuillez charger votre fichier ici :</h1>
        <form enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br>
            Fichier : <input name="userfile" type="file" /><br><br>
            <input type="submit" value="Valider"/>
            <input type="reset" value="Annuler"/><br><br>
            <a href="accueil.php">Retour à l'accueil</a><br><br>
        </form>  
        <?php include 'bd.php';?>
        <?php
            $id_eleve=$id_encadrant=$n=0;
            $nom=$prenom=$mail=$pass="";
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $lignes=file($_FILES['userfile']['tmp_name']);
                if (file_exists($_FILES['userfile']['tmp_name'])){
                    foreach($lignes as $ligne){
                        $split=explode(',',$ligne);
                        $id_eleve=$split[0];
                        $id_encadrant=$split[1];
                        $nom=$split[2];
                        $prenom=$split[3];
                        $mail=$split[4];
                        $pass=$split[5];
                        $sql="INSERT into etudiant values ($id_eleve,$id_encadrant,'$nom','$prenom','$mail','$pass',0)";
                        if ($conn->query($sql) === TRUE) {
                            $n++;
                        } else {
                            echo "Error updating record: " . $conn->error;
                        } 
                    }echo $n." eleves ajoutés";
                }
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