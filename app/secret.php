<?php
session_start();
if (!isset($_SESSION['admin'])) die ('вы не авторизованы');
echo "добро пожаловать, {$_SESSION['admin']}";


?>
<ul>
    <li><a href="sess1.php"> sess1 </a></li>
    <li><a href="secret.php"> secret </a></li>
</ul>
<a href= "secret.php?do=exit"> Logout </a>





