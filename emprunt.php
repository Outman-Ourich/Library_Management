
<?php

require_once('database.php');


$nom=$_POST['nom_emp'] ?? "";
$prenom=$_POST['prenom_emp'] ?? "";
$titre=$_POST['titre_emp'] ?? "";
// $date=$_POST['date_emp'] ?? "";

$nom_r=$_POST['nom_retour'] ?? "";
$prenom_r=$_POST['prenom_retour'] ?? "";
$titre_r=$_POST['titre_retour'] ?? "";
// $datereturn=$_POST['return_emp'] ?? "";

$message = "";
$messagesucces = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($nom) && !empty($prenom) && !empty($titre) ) {
        $requete = "SELECT COUNT(*) AS nbEmprunts FROM emprunt WHERE Nom_usager = '$nom' AND Date_retoure IS NULL";
        $resultat = mysqli_query($conn, $requete);
        $nbEmprunts = $resultat->fetch_assoc()["nbEmprunts"];
        $nomexist = "SELECT nom FROM usagers WHERE nom = '$nom'";
        $resultnomexiste=mysqli_query($conn, $nomexist);
        
        if ($nbEmprunts >= 5)
        {
                $message="La personne a déjà emprunté 5 livres!!";
            
        }
        else if (mysqli_num_rows($resultnomexiste)==0) 
        {
                $message="La personne n'est pas inscrit dans la biblio";
            
        }
        else{
            $sql = "INSERT INTO emprunt (Nom_usager, Prenom_usager, Titre_livre) VALUES ('$nom', '$prenom', '$titre')";
            mysqli_query($conn, $sql);
            $messagesucces="L'emprunt a ete ajouter avec succes";
        }
            
    }
    if (!empty($nom_r) && !empty($prenom_r) && !empty($titre_r)) 
    {
        $sql = "UPDATE emprunt SET Date_retoure=NOW()  WHERE Nom_usager='$nom_r' AND Prenom_usager = '$prenom_r' AND Titre_livre='$titre_r' ";
        mysqli_query($conn, $sql);
    }
}




$sqlsel = "SELECT * FROM emprunt WHERE Date_retoure IS NULL";
$result_now=mysqli_query($conn, $sqlsel);

$sqlH = "SELECT * FROM emprunt WHERE Date_retoure IS NOT NULL";
$result_Historic=mysqli_query($conn, $sqlH);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    

    <?php  if($message!="")
    {
      echo "<style>.error{display:block;}</style>";
      echo "<style>.popup{display:flex;}</style>";
    } ?>
    <?php  if($messagesucces!="")
    {
      echo "<style>.succes{display:block;}</style>";
      echo "<style>.popup{display:flex;}</style>";
    } ?>

    <title>Emprunt</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    
</head>
<body>
    <nav>
        <div class="nav-header">
            <a href="home.php"><i class='bx bx-library' style="margin-right: 5px;"></i>Library Management</a>
        </div>
        <ul class="nav-links">
            <li ><a href="users.php" class="center"><i class='bx bxs-user-detail'style="margin-right: 5px;" ></i>Users</a></li>
            <li ><a href="books.php"  class="center"><i class='bx bx-book' style="margin-right: 5px;" ></i>Books</a></li>
            <li ><a href="emprunt.php" class="center"><i class='bx bx-book-add' style="margin-right: 5px;" ></i>Emprunt</a></li>
        </ul>
    </nav>
    
<div class="container list">
    <div class="liste-users">
       
        <div>
            <button  id="emprunt-btn" type="button" ><i class='bx bx-caret-up-square' style="margin-right: 5px;"></i>Emprunter </button>
            <button  id="retour-btn" type="button" ><i class='bx bx-caret-down-square' style="margin-right: 5px;"></i>Rendre le livre </button>
        </div>
        <script>document.getElementById("emprunt-btn").addEventListener("click", function() {
        document.querySelector(".popup").style.display = "flex";})
        </script>
        <script>document.getElementById("retour-btn").addEventListener("click", function() {
        document.querySelector(".popup-md").style.display = "flex";})
        </script>
        <table>
        <caption style="margin-bottom: 10px;margin-top: 30px;"><h2>La liste actuel des <b>emprunts</b></h2>  </caption>
        <tr>
            <th>Num emprunt</th>
            <th>nom</th>
            <th>prenom</th>
            <th>Titre livre</th>
            <th>Date d'emprunt</th>
            <th>Date de retour</th>
        </tr>
        <tr>
            <?php 
            while ($row=mysqli_fetch_assoc($result_now)) {
            ?>
            <td><?php echo $row['N_emp']; ?></td>
            <td><?php echo $row['Nom_usager']; ?></td>
            <td><?php echo $row['Prenom_usager']; ?></td>
            <td><?php echo $row['Titre_livre']; ?></td>
            <td><?php echo $row['Date_emp']; ?></td>
            <td><?php echo $row['Date_retoure']; ?></td>
            
            
        </tr>
            <?php

            }
            
            ?>
        
        </table>
    </div>
    <div class="liste-users">
            <table>
            <caption style="margin-bottom: 10px;margin-top: 30px;"><h2><i class='bx bx-history' style="margin-right: 5px;"></i>L'historique des  <b>emprunts</b></h2>  </caption>
            <tr>
                <th>Num emprunt</th>
                <th>nom</th>
                <th>prenom</th>
                <th>Titre livre</th>
                <th>Date d'emprunt</th>
                <th>Date de retour</th>
            </tr>
            <tr>
                <?php 
                while ($row=mysqli_fetch_assoc($result_Historic)) {
                ?>
                <td><?php echo $row['N_emp']; ?></td>
                <td><?php echo $row['Nom_usager']; ?></td>
                <td><?php echo $row['Prenom_usager']; ?></td>
                <td><?php echo $row['Titre_livre']; ?></td>
                <td><?php echo $row['Date_emp']; ?></td>
                <td><?php echo $row['Date_retoure']; ?></td>
                
               
            </tr>
                <?php

                }
                
                ?>
            
            </table>
    </div>
    <div>
  
    </div>
    <div class="popup" >
        <div class="popup-content">
            <button class="close"><i class='bx bx-window-close'></i></button>
            <script>
                document.querySelector(".close").addEventListener("click", function() {
                    document.querySelector(".popup").style.display = "none";
                });
            </script>
            <form action="" method="POST">
                <p class="error"><?php echo $message; ?></p>
                <p class="succes"><?php echo $messagesucces; ?></p>
                <div><input type="text" placeholder="Nom usager" class="inp-form" name="nom_emp" required></div>
                <div><input type="text" placeholder="Prénom usager" class="inp-form" name="prenom_emp" required></div>
                <div><input type="text" placeholder="Titre du livre" class="inp-form" name="titre_emp" required></div>
                <div>
                    <input class="btn-emprunt" type="submit" value="Emprunter"></input>
                </div>
            </form>
        </div>
    </div>
    
    <div class="popup-md">
        <div class="popup-content-md">
            <button class="close-md"><i class='bx bx-window-close'></i></button>
            <script>document.querySelector(".close-md").addEventListener("click", function() {
            document.querySelector(".popup-md").style.display = "none";})
            </script>
            <form action="" method="POST">
                    <div><input type="text"  placeholder="Nom usager" class="inp-form" name="nom_retour" required></div>
                    <div><input type="text"  placeholder="prenom usager" class="inp-form" name="prenom_retour" required></div>
                    <div><input type="text"  placeholder="Titre du livre" class="inp-form" name="titre_retour" required></div>
                    <!-- <div><input type="Date"   class="inp-form" name="return_emp" required></div> -->
                    <div>
                        <button class="btn-emprunt" type="submit">rendre</button>
                    </div>
                </form>
        </div>
    </div>
    
</div> 
</body>

</html>

<?php
   
    mysqli_close($conn);
?>