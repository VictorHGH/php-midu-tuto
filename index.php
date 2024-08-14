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

?>

<main>
	<h2>La próxima película de Marvel</h2>
</main>

<style>
	:root {
		color-scheme: light dark;
	}

	body {
		display: grid;
		place-content: center;
	}
</style>
