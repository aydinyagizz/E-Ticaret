
<?php 

session_start();

// session silme işlemi
session_destroy();
header("Location:index.php?durum=exit");


 ?>