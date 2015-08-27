<?php
function getArrayAsString($array) {
	$string = "array(";
	foreach ($array as $key => $value) {
		$string .= '"' .$key .'"=> ' .$value .",";
	}
	$string .= ")";
	return $string;
}

$template = '<?php
include("../Item.php");
class {className} extends Item {
	function __construct() {
		parent::__construct({id}, "{name}", {stats}, "{picture}", "{description}");
	}

	function applyEffect($champion) {}
	function applyEffectEnemy($enemy) {}
}
?>';

$items = json_decode(file_get_contents("../item.json"), true);

foreach ($items['data'] as $id => $item) {
	// TODO change to one regex
	$className = str_replace(" ", "_", $item['name']);
	$className = str_replace("(", "", $className);
	$className = str_replace(")", "", $className);
	$className = str_replace("'", "", $className);
	$className = str_replace(":", "", $className);

	$name = $item['name'];	
	$stats = getArrayAsString($item['stats']);
	$picture = $item['image']['full'];
	$description = $item['description'];
	$itemClass = str_replace("{name}", $name, $template);
	$itemClass = str_replace("{className}", $className, $itemClass);
	$itemClass = str_replace("{stats}", $stats, $itemClass);
	$itemClass = str_replace("{description}", $description, $itemClass);
	$itemClass = str_replace("{picture}", $picture, $itemClass);
	$itemClass = str_replace("{id}", $id, $itemClass);

	file_put_contents("generated/" .$className .".php", $itemClass);
}
?>
