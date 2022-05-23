<?php
setcookie("prava", $user['prava'], time()-3600,"/");
setcookie("name", $user['name'], time()-3600,"/");
header('location: ../index.php');
 ?>