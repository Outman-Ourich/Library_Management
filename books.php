<?php 
require_once('database.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
  
    <title>Livres</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
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

    <div class="search-livre">
        <form action="" method="POST">
            <div class="input-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Saisir le Titre..." name="namebtoSearch" required >
                <button class="button" type="submit">Search</button>
            </div>
        </form>        
            <?php 
            if(isset($_POST['namebtoSearch']))
            {
                $key=$_POST['namebtoSearch'];
                $search="SELECT * FROM livres WHERE Titre LIKE '%$key%'";
                $search_result=mysqli_query($conn, $search);
                if(mysqli_num_rows($search_result)>0)
                {?>
                    <table>
                        <tr>
                        <th>N livre</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Maison d'edition</th>
                        <th>Nbr pages</th>
                        <th>Nbr exemplaires</th>
                        </tr>
                        <tr><?php
                    foreach ($search_result as $items) {
                        ?>
                        <td><?=  $items['Numero']; ?></td>
                        <td><?=  $items['Titre']; ?></td>
                        <td><?=  $items['Auteur']; ?></td>
                        <td><?=  $items['edition']; ?></td>
                        <td><?=  $items['Nbrpages']; ?></td>
                        <td><?=  $items['Nbrexemplaires']; ?></td>
                        </tr>
                        <?php
                    }

                }
                else{
                    ?>
                    <tr>
                        <td>ya pas de livre avec ce titre !<td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>

    <div class="list-livres">
        <div>
            <button  id="modifier-btn" type="button" style="margin-right: 5px;"><i class='bx bxs-book-content'></i> modifier </button>
            <button  id="btn-changes" type="button" style="margin-right: 5px;"><i class='bx bx-book-add'></i> Ajouter </button>
            <button  id="supprimer-btn" type="button" style="margin-right: 5px;"><i class='bx bx-book'></i> supprimer </button>
        </div>
        <script>document.getElementById("btn-changes").addEventListener("click", function() {
        document.querySelector(".popup").style.display = "flex";})
        </script>
        <script>document.getElementById("modifier-btn").addEventListener("click", function() {
        document.querySelector(".popup-md").style.display = "flex";})
        </script>
        <script>document.getElementById("supprimer-btn").addEventListener("click", function() {
        document.querySelector(".popup-sup").style.display = "flex";})
        </script>

        <table>
        <caption style="margin-bottom: 10px;margin-top: 30px;"><h2>La liste des <b>livres</b></h2>  </caption>
        <tr>
            <th>N livre</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Maison d'edition</th>
            <th>Nbr pages</th>
            <th>Nbr exemplaires</th>
        </tr>
        <tr>
            <?php 
            while ($row=mysqli_fetch_assoc($data_book)) {
            ?>
            <td><?php echo $row['Numero']; ?></td>
            <td><?php echo $row['Titre']; ?></td>
            <td><?php echo $row['Auteur']; ?></td>
            <td><?php echo $row['edition']; ?></td>
            <td><?php echo $row['Nbrpages']; ?></td>
            <td><?php echo $row['Nbrexemplaires']; ?></td>
        </tr>
            <?php

            }
            
            ?>
        
        </table>
    </div>
    <div class="popup">
        <div class="popup-content">
            <button class="close"><i class='bx bx-window-close'></i></button>
            <script>document.querySelector(".close").addEventListener("click", function() {
            document.querySelector(".popup").style.display = "none";})
            </script>
            <form action="" method="POST">
                    <div><input type="text"  placeholder="Titre" class="inp-form" name="Titre" required></div>
                    <div><input type="text"  placeholder="Auteur" class="inp-form" name="Auteur" required></div>
                    <div><input type="text"  placeholder="edition" class="inp-form" name="edition" required></div>
                    <div><input type="text"  placeholder="Nombre de pages" class="inp-form" name="Nbrpages" required></div>
                    <div><input type="text"  placeholder="Nombre d'exemplaires" class="inp-form" name="Nbrexemplaires" required></div>
                <div>
                    <button class="button-form" type="submit">Ajouter</button>
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
                <div><input type="text"  placeholder="Numero" class="inp-form" name="NumtoEdit" required></div>
                <div><input type="text"  placeholder="Titre" class="inp-form" name="newTitre" required></div>
                <div><input type="text"  placeholder="Auteur" class="inp-form" name="newAuteur" required></div>
                <div><input type="text"  placeholder="edition" class="inp-form" name="newedition" required></div>
                <div><input type="text"  placeholder="Nombre de pages" class="inp-form" name="newNbrpages" required></div>
                <div><input type="text"  placeholder="Nombre d'exemplaires" class="inp-form" name="newNbrexemplaires" required></div>
              <div>
                <button class="button-form" type="submit" id="edit-btn">Modifier</button>
              </div>
            </form>
        </div>
    </div>
    <div class="popup-sup">
        <div class="popup-content-sup">
            <button class="close-sup"><i class='bx bx-window-close'></i></button>
            <script>document.querySelector(".close-sup").addEventListener("click", function() {
            document.querySelector(".popup-sup").style.display = "none";})
            </script>
            <form action="" method="POST">
                <div><input type="text"  placeholder="Numero" class="inp-form" name="Num-to-delete" required></div>
              <div>
                <button class="button-form" type="submit" id="delet-btn">Supprimer</button>
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