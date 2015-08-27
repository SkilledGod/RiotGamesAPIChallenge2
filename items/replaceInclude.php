<?php
$resource = opendir("generated");
echo "<pre>";
while ($file = readdir($resource)) {
    if (endsWith($file, ".php")) {
        $contents = file_get_contents("generated/" .$file);
        $contents = str_replace("include(dirname(__DIR__) .\"/Item.php\");", "include_once(dirname(__DIR__) .\"/Item.php\");", $contents);
        echo $file .'<br>' .$contents .'<br>';
        file_put_contents("generated/" .$file, $contents);
// //         echo $file .'<br>';
    }
}
echo "</pre>";
function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}
?>