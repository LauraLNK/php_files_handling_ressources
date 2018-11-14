<?php

function lister($dir)
{
	$dossiers = scandir($dir);
/*	scandir = liste ce qu'il y a dans files*/
	
	foreach ($dossiers as $dossier)
	{
		if ($dossier != '.' and $dossier != '..' and (is_dir($dir . DIRECTORY_SEPARATOR .  $dossier)))
		{
			echo '<p style="color: blueviolet">' . $dir . DIRECTORY_SEPARATOR . $dossier . ' ' . '<a href="index.php?deleteDir='.$dir . DIRECTORY_SEPARATOR . $dossier .'" style="color: #8f0000">Delete</a></p>';
			lister($dir . DIRECTORY_SEPARATOR . $dossier);
		}elseif(!is_dir($dir . DIRECTORY_SEPARATOR . $dossier))
		{
			echo '<p style="color: #2a9fd6; margin-left: 50px; display: inline;">' . $dossier . ' </p>';
			if(strpos($dossier, 'jpg'))
			{
				echo '<a href="index.php?deleteFile='.$dir . DIRECTORY_SEPARATOR . $dossier .'" style="color: #8f0000">Delete</a><br>';
			}else{
				echo '<a href="index.php?editFile='. $dir . DIRECTORY_SEPARATOR . $dossier . '" style="color: #77b300">Edit</a> <a href="index.php?deleteFile='.$dir . DIRECTORY_SEPARATOR . $dossier .'" style="color: #8f0000">Delete</a><br>';
			}
		}
		
	}
	
}