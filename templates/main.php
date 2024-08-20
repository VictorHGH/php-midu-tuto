<main>

	<h1>Próxima película/serie de marvel:</h1>

	<section>
		<img src="<?= $poster_url ?>" width="200" alt="Poster de <?= $title ?>" />
	</section>

	<hgroup>
		<h2><?= $until_message ?></h2>
		<p>Fecha de estreno: <?= $release_date ?></p>
		<p>Tipo: <?= $type ?></p>
		<br />
		<p>La siguinte película de Marvel es: <?= $following_production ?></p>
	</hgroup>

</main>
