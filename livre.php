<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <?php
    if($_GET['message']){
        echo "<p style='color: green;'>".$_GET['message']."</p>";
    }
    ?>
    <fieldset>
        <legend>Ajouter Un livre</legend>
        ISBN
        <input type="text" name="ISBN" ><br>
        titre
        <input type="text" name="titre" ><br>
        auteur
        <input type="text" name="auteur" ><br>
        date
        <input type="date" name="date" ><br>
        <input type="submit" value="Envoyer">
    </fieldset>
</form>
   Liste des livre
   <table border="1">
    <tr>
        <th>ISBN</th>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Date</th>
        <th colspan="2">Action</th>
        <!-- <th><a href=''>Modifier</a></th>
        <th><a href=''>Supprimer</a></th> -->
    </tr>
    
        
</body>
</html>
<?php
$link = mysqli_connect('localhost', 'root','','bibliotheque');
if(isset($_POST['ISBN']) && isset($_POST['titre']) && isset($_POST['auteur']) && isset($_POST['date'])  )
{
$ISBN=$_POST['ISBN'];
$titre=$_POST['titre'];
$auteur=$_POST['auteur'];
$date=$_POST['date'];

$sql="INSERT INTO livre (ISBN,titre,auteur,date_edition) VALUES ('$ISBN','$titre','$auteur','$date')";
$result=mysqli_query($link,$sql);

}
Recuperer($link);
//recuperer les valeur from livre
function Recuperer($link){
    $sql="select * from livre";
    $result=mysqli_query($link,$sql);
    $data=array();
    while($row=mysqli_fetch_assoc($result))
    {
        $data[]=$row;
    }
    foreach ($data as $value) {
        // code to be executed;
        echo "<tr>";
        echo "<td>".$value['ISBN']."</td>";
        echo "<td>".$value['titre']."</td>";
        echo "<td>".$value['auteur']."</td>";
        echo "<td>".$value['date_edition']."</td>";
        echo "<td><a href='modifier.php?id=".$value['ISBN']."'>Modifier</a></td>";
        echo "<td><a href='supprimer.php?id=".$value['ISBN']."'>Supprimer</a></td>";
        echo "</tr>";

      }
    echo "</table>";

}

?>