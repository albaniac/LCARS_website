<?php

$main = 'main.html';
$resume = 'resume.html';
$music = 'music.html';
$ship = 'ship.html';
$parser = 'parser.php';

/* Very basic security measure to ensure that
 * the page variable has been passed, enabling you to
 * ward off very basic mischief using htmlentities()
 */
if(isset($_GET['page'])){
	$page = htmlentities($_GET['page']);
}else{
	$page = NULL;
}

//Top half of the html page
include 'top.php';

//start php switching here	
switch($page){
	case 'main';
	include $main;
	break;
	
	case 'resume':
	include $resume;
	break;
					
	case 'music':
	include $music;
	break;
	
	case 'ship':
	include $ship;
	break;
	
	case 'parser':
	include $parser;
	break;

	// Default page in case no variable is passed
	default:
	include $main;
	break;
}		

// Bottom half of the html page
include 'bottom.html'; 

?>
