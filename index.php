<form method="get">
	Info:
	<input name="info" type="text" />
	CD hashlog:
	<input name="hash" type="radio" />
	Chatlogs:
	<input name="chatlog" type="radio" />
	<input type="submit" name="submit" value="Check" />
</form>

<?php

if (isset($_GET["submit"]) && isset($_GET["hash"])) {
    $files = glob('cdhash*');
    search_data();
} elseif (isset($_GET["submit"]) && isset($_GET["chatlog"])) {
    $files = glob('chatlog*');
    search_data();
}



function search_data() {
    $search = trim(strtoupper(htmlspecialchars($_GET["info"])), "\t.");

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


?>
