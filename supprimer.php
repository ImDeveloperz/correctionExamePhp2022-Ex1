<?php
//recuperer ISPN from url
$ISBN = $_GET['id'];
// echo $ISBN;
$link = mysqli_connect('localhost', 'root', '', 'bibliotheque');
$sql = "DELETE FROM livre WHERE ISBN='$ISBN'";
$result = mysqli_query($link, $sql);
//rediriget vers livre.php
$message='supression avec Succee';
header('location:livre.php?message='. urlencode($message));

?>