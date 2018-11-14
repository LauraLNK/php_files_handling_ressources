<?php include('inc/head.php');


/* le submit */
if(!empty($_POST['submit']))
{
	$file = $_GET['editFile'];
	$open = fopen($file, 'w');
	fwrite($open, $_POST['area']);
	fclose($open);
}

/*Afficher le contenu du fichier dans le texte area*/
if(isset($_GET['editFile']))
{
	$file = $_GET['editFile'];
	$content = file_get_contents($file);
}


/*Supprimer un fichier*/
if(!empty($_GET['deleteFile']))
{
	unlink($_GET['deleteFile']);
}


/*Supprimer un dossier*/
if(!empty($_GET['deleteDir']))
{
	rmdir($_GET['deleteDir']);
}
	
include ('functions.php');


lister('files');


?>

<form action="" method="post">
	<textarea name="area" style="width: 1000px; height: 200px; display: block; margin: auto;"> <?php if(isset($_GET['editFile'])) {echo $content;} ?> </textarea>
	<input style="width: 100px; height: 30px; display: block; margin: auto; margin-top: 5px;" type="submit" value="submit" name="submit">
</form>



<?php

include('inc/foot.php');

?>
