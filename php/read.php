<?php include 'bd.php';?>
<?php
    $id_eleve=$id_encadrant=0;
    $nom=$prenom=$mail=$pass="";
    $lignes=file('etudiants.csv');
    if (file_exists("etudiants.csv")){
        foreach($lignes as $ligne){
            $split=explode(',',$ligne);
            $id_eleve=$split[0];
            $id_encadrant=$split[1];
            $nom=$split[2];
            $prenom=$split[3];
            $mail=$split[4];
            $pass=$split[5];
            $sql="INSERT into etudiant values ($id_eleve,$id_encadrant,'$nom','$prenom','$mail','$pass',1)";
            if ($conn->query($sql) === TRUE) {
                echo "eleve bien ajouté";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
    $conn->close();
?>