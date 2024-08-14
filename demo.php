<?php
$name = "Victor";
$isDev = true;
$age = 70;

$isOld = $age > 70;

define('LOGO_URL', 'https://cdn.freebiesupply.com/logos/large/2x/php-1-logo-svg-vector.svg');

$output = "Hola $name, con una edad de $age.";
?>

<?php
if ($isOld) {
	echo "<h2>Eres viejo</h2>";
} else {
	echo "<h2>Eres joven, felicidades.</h2>";
}
?>

<?php

$outputAge = match (true) {
	$age < 2 => "Eres un bebé",
	$age < 12 => "Eres un niño",
	$age < 18 => "Eres un adolescente",
	$age === 18 => "Eres mayor de edad",
	$age < 40 => "Eres un adulto joven",
	$age < 60 => "Eres un adulto viejo",
	default => "Hueles más a madera que a fruta, $name XD.",
};

$bestLanguages = ["PHP", "JavaScript", "Python", 1, 2];
$bestLanguages[3] = "Java";
$bestLanguages[] = "TypeScript";

$person = [
	"name" => "Victor",
	"age" => 70,
	"isDev" => true,
	"languages" => ["PHP", "JavaScript", "Python"],
];

$person["languages"][] = "Java";

?>

<?= $outputAge, $person["languages"][0] ?>

<ul>
	<?php foreach ($bestLanguages as $key => $language) : ?>
		<li><?= "$key. $language" ?></li>
	<?php endforeach; ?>
</ul>


<img src="<?= LOGO_URL ?>" alt="PHP Logo" width="200">
<h1>
	<?= $output ?>
</h1>



















<style>
	:root {
		color-scheme: light dark;
	}

	body {
		display: grid;
		place-content: center;
	}
</style>
