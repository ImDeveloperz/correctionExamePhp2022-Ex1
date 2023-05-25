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
    <fieldset>
        <legend>Ajouter Un livre</legend>
        titre
        <input type="text" name="titre" ><br>
        auteur
        <input type="text" name="auteur" ><br>
        date
        <input type="date" name="date" ><br>
        <input type="submit" value="Modifier">
    </fieldset>
</form>       
</body>
</html>
<?php
if(isset($_POST['titre']) && isset($_POST['auteur']) && isset($_POST['date'])  )
{
//recuperer ISPN from url
$ISBN = $_GET['id'];
// echo $ISBN;
$titre=$_POST['titre'];
$auteur=$_POST['auteur'];
$date=$_POST['date'];
$link = mysqli_connect('localhost', 'root','','bibliotheque');
$sql = "UPDATE livre SET  titre='$titre', auteur='$auteur', date_edition='$date' WHERE ISBN='$ISBN'";
$result = mysqli_query($link,$sql);
//rediriget vers livre.php
$message='modifier avec succee';
header('location:livre.php?message=' . urlencode($message));
}
?>