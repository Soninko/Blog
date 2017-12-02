<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/index.css">
</head>
<body>
	<a href="index.php">Retour vers la liste des billets</a>

  <h3>Commentaires</h3>
<?php 
require('connection/connection.php');
$request = $bdd->prepare('SELECT id_billet,auteur,commentaire,DATE_FORMAT(date_commentaires,\'%d/%m/%y à %H:%i\') AS date FROM commentaires WHERE id_billet = ?');
$request->execute(array($_GET['billet']));
while ($data = $request->fetch()) {
?>
<h3>
<?php
echo $data['auteur'].' à publié un commentaire le : '.$data['date']; 
?>
</h3>
<br>
<p>
	<?php 
  echo $data['commentaire'];
 ?>
 <?php 
 }
 ?>
</p>
<form action="commentaires_post.php" method="post">
	<label for="auteur">
		Auteur :
	</label>
	<input type="text" name="auteur" id="auteur" required>
	<br>
	<br>
	<label for="commentaires">
		Commentaires :
	</label>
	<br>
	<br>
	<textarea name = "commentaires" id="commentaires" required>
		
	</textarea>
	<br>
	<br>
	<input type="submit" value="Envoyer">

</form>
</body>
</html>
