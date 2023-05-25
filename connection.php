
<?php
 $link = mysqli_connect('localhost', 'root','','bibliotheque');
 if (!$link) {
     die('Could not connect: ' . mysqli_error($link));
 }
 echo 'Connected successfully';

 ?>