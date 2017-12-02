<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/index.css">
</head>
<body>
	<h1>
 	Mon Blog
 </h1>

 <h3>
 Les Billets
</h3>
<?php 
require('connection/connection.php');
$requete = $bdd->query('SELECT id,titre,contenu,DATE_FORMAT(date_creation,\'%d/%m/%y à %H:%i \') AS date FROM billets
	 ');
	while ($data = $requete->fetch()) {
		 ?>
<div class="news">
	<h3>
		<?php 
         echo $data['titre'].' le '.$data['date'];
		 ?>
	</h3>
	<p>
		<?php 
         echo $data['contenu'].'<br>';
		 ?>
		 <a href="commentaires.php?billet=<?php echo $data['id'];?>">Commentaires</a>
	</p>
</div>
<?php

}
$requete ->closeCursor();

?>
</body>
</html>

