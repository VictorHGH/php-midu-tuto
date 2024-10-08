<?php

declare(strict_types=1);

require_once "consts.php";
require_once "functions.php";
require_once "classes/NextMovie.php";

$next_movie = NextMovie::fetch_and_create_movie(API_URL);
$next_movie_data = $next_movie->get_data();

?>

<!DOCTYPE html>
<html lang="es">

<?php render_template("head", $next_movie_data); ?>
<?php render_template("styles", $next_movie_data); ?>

<body>
	<?php render_template("main", array_merge(
		$next_movie_data,
		["until_message" => $next_movie->get_until_message()],
	)); ?>
</body>

</html>
