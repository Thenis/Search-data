<form method="get">
	Info:
	<input name="info" type="text" />
	CD hashlog:
	<input name="hash" type="radio" />
	Chatlogs:
	<input name="beu" type="checkbox" />
	BASED EU
	<input name="bna" type="checkbox" />
	BASED NA
	<input type="submit" name="submit" value="Check" />
</form>
<?php
if (isset($_GET["submit"]) && isset($_GET["beu"])) {//EU directory
    
        if (isset($_GET["hash"])) {
                $files = glob('cdhash*');
                 search_input($files);
                 
}       elseif (isset($_GET["chatlog"])) {
                $files = glob('chatlog*');
                search_input($files);
    }
}
elseif (isset($_GET["submit"]) && isset($_GET["bna"])) {// NA directory
	            
	        if (isset($_GET["hash"])) {
                $files = glob('cdhash*');
                 search_input($files);
                 
}       elseif (isset($_GET["chatlog"])) {
                $files = glob('chatlog*');
                search_input($files);
    }
}


function search_input($files) {
    
    if (isset($_GET["info"])) {
    $search = trim(strtoupper(htmlspecialchars(($_GET["info"]))), "\t.");
    $found = false; 
    foreach ($files as $file) {
        foreach (file($file) as $lines => $line) {

            if (strpos(strtoupper($line), $search) !== false) {
                $found = true;
                echo $line . "<br />";
            }
        }
    }
    if (!$found) {
        echo 'No match found';
        }
    }
}
?>
