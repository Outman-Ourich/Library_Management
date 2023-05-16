<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_password ="";
    $db_name="library";
    $conn= "";

    try{
        $conn = mysqli_connect( $db_server, $db_user,  $db_password, $db_name);
    }
    catch(mysqli_sql_exception){
        echo"could not connect";
    }
     
    

$nom=$_POST['nom'] ?? "";
$prenom=$_POST['prenom'] ?? "";
$email=$_POST['email'] ?? "";
$adresse=$_POST['adresse'] ?? "";
$statut=$_POST['status'] ?? "";



$num=$_POST['IdtoEdit'] ?? "";
$newNom=$_POST['newnom'] ?? "";
$newPrenom=$_POST['newprenom'] ?? "";
$newAdresse=$_POST['newadresse'] ?? "";
$newEmail=$_POST['newemail'] ?? "";
$newStatut=$_POST['newstatut'] ?? "";
$num=$_POST['IdtoEdit'] ?? "";


$IdToDelete=$_POST['Id-todelete'] ?? "";


$message="";
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    //inserer les donnees dans la table usagers
    if(!empty($nom) && !empty($prenom) && !empty($email) && !empty($adresse) && !empty($statut))
    {
        $search="SELECT COUNT(*) AS userinscrit FROM usagers WHERE nom = '$nom' AND prenom='$prenom'";
        $r=mysqli_query($conn, $search);
        $userinscrit=$r->fetch_assoc()["userinscrit"];
        if($userinscrit==0)
        {
            $sql="INSERT INTO usagers (nom, prenom, email, adresse, statut) VALUES ('$nom', '$prenom', '$email','$adresse' , '$statut')";
            mysqli_query($conn, $sql);
        }
        else
        {
            $message="la personne est deja inscrit !!";
        }
    
    }
     //supprimer les donnees dans la table usagers
    if(!empty($IdToDelete))
    {
        $sqldelete="DELETE FROM usagers WHERE id = '$IdToDelete' ";
        mysqli_query($conn, $sqldelete);
    
    }
     //modifier les donnees dans la table usagers
    if(!empty($num) && !empty($newNom) && !empty($newPrenom) && !empty($newAdresse) && !empty($newEmail) && !empty($newStatut))
    {
        $sqlupdate="UPDATE  usagers SET nom='$newNom', prenom='$newPrenom', email='$newEmail', adresse='$newAdresse', statut='$newStatut'  WHERE id='$num'";
        mysqli_query($conn, $sqlupdate);
    
    }

}

// Aficher les donnees
$sqlsel="SELECT * FROM usagers";
$result=mysqli_query($conn, $sqlsel);




/////////////////////////////////////////////////////////////////////////////////////////////////////////



$Titre=$_POST['Titre'] ?? "";
$Auteur=$_POST['Auteur'] ?? "";
$edition=$_POST['edition'] ?? "";
$Nbrpages=$_POST['Nbrpages'] ?? "";
$Nbrexemplaires=$_POST['Nbrexemplaires'] ?? "";


$num=$_POST['NumtoEdit'] ?? "";
$newTitre=$_POST['newTitre'] ?? "";
$newAuteur=$_POST['newAuteur'] ?? "";
$newedition=$_POST['newedition'] ?? "";
$newNbrpages=$_POST['newNbrpages'] ?? "";
$newNbrexemplaires=$_POST['newNbrexemplaires'] ?? "";

$NumbooktoDelete=$_POST['Num-to-delete'] ?? "";


if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    //inserer les donnees dans la table livres
    if(!empty($Titre) && !empty($Auteur) && !empty($Nbrpages) && !empty($Nbrexemplaires))
    {
        $sql="INSERT INTO livres (Titre, Auteur, edition, Nbrpages, Nbrexemplaires) VALUES ( '$Titre', '$Auteur', '$edition', '$Nbrpages', '$Nbrexemplaires')";
        mysqli_query($conn, $sql);
    
    }
    //supprimer les donnees dans la table livres
    if(!empty($NumbooktoDelete))
    {
        $sql="DELETE FROM livres WHERE Numero = '$NumbooktoDelete' ";
        mysqli_query($conn, $sql);
    
    }
    //modifier les donnees dans la table livres
    if(!empty($num) && !empty($newTitre) && !empty($newAuteur) && !empty($newedition) && !empty($newNbrpages) && !empty($newNbrexemplaires))
    {
        $sqlupdate="UPDATE  livres SET Titre='$newTitre', Auteur='$newAuteur', edition='$newedition', Nbrpages='$newNbrpages', Nbrexemplaires='$newNbrexemplaires' WHERE Numero='$num'";
        mysqli_query($conn, $sqlupdate);
    
    }


}

// Aficher les donnees

$sqlsel="SELECT * FROM livres";
$data_book=mysqli_query($conn, $sqlsel);


?>