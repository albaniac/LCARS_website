<?php

include_once 'functions.inc.php';

	// Checks if the form was submitted
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
		// Checks if the file was uploaded without any errors
		if(isset($_FILES['file'])
		&& is_uploaded_file($_FILES['file']['tmp_name'])
		&& $_FILES['file']['error']==UPLOAD_ERR_OK){
		
			// Checks if the file is a text file
			if($_FILES['file']['type']=='text/plain'){
			
				// Give you some info about your email		
				$upload = "<b>Upload:</b> " . $_FILES["file"]["name"] . "<br />";
				$type = "<b>Type:</b> " . $_FILES["file"]["type"] . "<br />";
	 			$size = "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
 				$storage = "<b>Stored in:</b> " . $_FILES["file"]["tmp_name"];
  
  			// Structure the order of output for the info, also easy to change up.
				$info= $upload.$type.$size.$storage;

				// Opening the file into one single string
				$content = file_get_contents($_FILES['file']['tmp_name']);

				// Seperating the email into 2 workable sections - header and content
				$halves = explode('boundary=', $content, 2);

				// Processing functions
				$headers = parse_headers($halves[0]);
				$content = parse_body($halves[1]);
				
?>
	<p class="priority">Priority 1 message from Starfleet</p>
	<div class="header"><p><?php echo $headers; ?></p></div>
	<div class="info"><p><?php echo $info; ?></p></div>
	<div class="content"><p><?php echo $content; ?></p></div>				
<?php	
			}
			else{
				echo '<p class="error">Uploaded file was not a text file.</p>'	;
			}
		}
		else{
			echo '<p class="error">No file uploaded!</p>';
		}
	}
	else{
		include 'upload.html'; 
	} ?>

			

