<?php
require('connection/connection.php');
$request = $bdd->prepare('INSERT INTO commentaires (id_billet,auteur,commentaire,date_commentaires) VALUES(?,?,?,NOW()');
$request->execute(array($_POST['auteur'],$_POST['commentaires']));
header('Location:commentaires.php?billet='.$_GET['billet']);
 ?>
