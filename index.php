<?php

declare(strict_types=1);

const API_URL = "https://whenisthenextmcufilm.com/api";

function get_data(string $url): array
{
	$result = file_get_contents($url);
	$data = json_decode($result, true);
	return $data;
}

function get_until_message(int $days, string $title): string
{
	$days = match (true) {
		$days === 0 => "¡$title se estrena hoy!",
		$days === 1 => "¡$title se estrena mañana!",
		$days <= 7 => "¡$title se estrena esta semana!",
		$days <= 30 => "¡$title se estrena este mes!",
		default => "¡$title estrena en $days días!",
	};

	return $days;
}

$data = get_data(API_URL);

$until_message = get_until_message($data["days_until"], $data["title"]);

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>La próxima película de Marvel</title>
	<link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>

<body>
	<main>

		<h1>Próxima película/show de marvel:</h1>

		<section>
			<img src="<?= $data["poster_url"] ?>" width="200" alt="Poster de <?= $data["title"] ?>" />
		</section>

		<hgroup>
			<h2><?= $until_message ?></h2>
			<p>Fecha de estreno: <?= $data["release_date"] ?></p>
			<p>Tipo: <?= $data["type"] ?></p>
			<br />
			<p>La siguinte película de Marvel es: <?= $data["following_production"]["title"] ?></p>
		</hgroup>

	</main>


	<style>
		:root {
			color-scheme: light dark;
		}

		body {
			display: grid;
			place-content: center;
			height: 80vh;
		}

		section {
			display: flex;
			justify-content: center;
		}

		hgroup {
			text-align: center;
		}

		img {
			border-radius: 10px;
			box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
		}

		h1 {
			text-align: center;
			font-size: clamp(1rem, 5vw, 1.5rem);
		}

		h2 {
			font-size: clamp(.8rem, 5vw, 1.2rem);
		}
	</style>

</body>

</html>
