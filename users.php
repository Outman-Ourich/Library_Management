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

    <?php  if($message!="")
    {
      echo "<style>.error{display:block;}</style>";
      echo "<style>.popup{display:flex;}</style>";
    } ?>

    <title>Usagers</title>
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
    <main>
        <div class="container list">
            <div class="search-users">
                    <form action="" method="POST">
                        <div class="input-box">
                            <i class="uil uil-search"></i>
                            <input type="text" placeholder="Saisir le nom..."name="nametoSearch" required >
                            <button class="button" type="submit">Search</button>
                        </div>
                    </form>
                    
                    
                    <?php 
                    if(isset($_POST['nametoSearch']))
                    {
                        $key=$_POST['nametoSearch'];
                        $search="SELECT * FROM usagers WHERE nom ='$key'";
                        $search_result=mysqli_query($conn, $search);
                        if(mysqli_num_rows($search_result)>0)
                        {?>
                            <table>
                                <tr>
                                    <th>id</th>
                                    <th>nom</th>
                                    <th>prenom</th>
                                    <th>adresse</th>
                                    <th>email</th>
                                    <th>statut</th>
                                </tr>
                                <tr><?php
                            foreach ($search_result as $items) {
                                ?>
                                <td><?=  $items['id']; ?></td>
                                <td><?=  $items['nom']; ?></td>
                                <td><?=  $items['prenom']; ?></td>
                                <td><?=  $items['adresse']; ?></td>
                                <td><?=  $items['email']; ?></td>
                                <td><?=  $items['statut']; ?></td>
                                </tr>
                                <?php
                            }

                        }
                        else{
                            ?>
                            <tr>
                                <td>ya personne avec ce nom !<td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>



            <div class="liste-users">
            <div>
                <button  id="modifier-btn" type="button"> <i class='bx bx-user-x'></i> modifier </button>
                <button  id="btn-changes" type="button"> <i class='bx bxs-user-plus'></i> Ajouter </button>
                <button  id="supprimer-btn" type="button"> <i class='bx bx-user-minus'></i> supprimer </button>
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
                    <table class="table-show-user">
                       
                        <caption style="margin-bottom: 10px;margin-top: 30px;"><h2>La liste complète des <b>usagers</b></h2>  </caption>
                    <tr>
                        <th>id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Adresse</th>
                        <th>Email</th>
                        <th>Statut</th>
                    </tr>
                    <tr>
                        <?php 
                        while ($row=mysqli_fetch_assoc($result)) {
                        ?>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nom']; ?></td>
                        <td><?php echo $row['prenom']; ?></td>
                        <td><?php echo $row['adresse']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['statut']; ?></td>
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
                        <p class="error"><?php echo $message; ?></p>
                        <div><input type="text"  placeholder="Nom" class="inp-form" name="nom" required></div>
                        <div><input type="text"  placeholder="prenom" class="inp-form" name="prenom" required></div>
                        <div><input type="text"  placeholder="adresse" class="inp-form" name="adresse" required></div>
                        <div><input type="email"  placeholder="email" class="inp-form" name="email" required></div>
                        <div class="input-radio">
                            <label for="">Etudiant</label>
                            <input type="radio"   value="Etudiant"  name="status">
                            <label for="">Enseignant</label>
                            <input type="radio"   value="Enseignant" name="status">
                        </div>
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
                        <div><input type="text"  placeholder="Id-user" class="inp-form" name="IdtoEdit" required></div>
                        <div><input type="text"  placeholder="Nom" class="inp-form" name="newnom" required></div>
                        <div><input type="text"  placeholder="prenom" class="inp-form" name="newprenom" required></div>
                        <div><input type="text"  placeholder="adresse" class="inp-form" name="newadresse" required></div>
                        <div><input type="email"  placeholder="email" class="inp-form" name="newemail" required></div>
                        <div class="input-radio">
                            <label for="">Etudiant</label>
                            <input type="radio"   value="Etudiant"  name="newstatut">
                            <label for="">Enseignant</label>
                            <input type="radio"   value="Enseignant" name="newstatut">
                        </div>
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
                        <div><input type="text"  placeholder="Id-user" class="inp-form" name="Id-todelete" required></div>
                        <div>
                            <button class="button-form" type="submit" id="delet-btn">Supprimer</button>
                        </div>
                    </form>
                </div>  
            </div>

        </div>

    </main>
</body> 
</html>
<?php
   
    mysqli_close($conn);
?>