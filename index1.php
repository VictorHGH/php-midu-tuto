<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
# Inicializar una nueva sesión de cURL; ch = CURL handle
$ch = curl_init(API_URL);
// Indica que queremos recibir el resultado de la petición y no mostrarla en la pantalla:
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/*
Ejecutar la petición y guardamos
el resultado
*/
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);

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
			<h2><?= $data["title"] ?> se estrena en <?= $data["days_until"] ?> días.</h2>
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
