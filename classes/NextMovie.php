<?php

declare(strict_types=1);

class NextMovie
{
	public function __construct(
		private string $title,
		private int $days_until,
		private string $following_production,
		private string $release_date,
		private string $poster_url,
		private string $overview,
		private string $type
	) {}

	public function get_until_message(): string
	{
		$days = $this->days_until;
		$title = $this->title;

		$days = match (true) {
			$days === 0 => "¡$title se estrena hoy!",
			$days === 1 => "¡$title se estrena mañana!",
			$days <= 7 => "¡$title se estrena esta semana!",
			$days <= 30 => "¡$title se estrena este mes!",
			default => "¡$title estrena en $days días!",
		};

		return $days;
	}

	public static function fetch_and_create_movie(string $api_url): NextMovie
	{
		$result = file_get_contents($api_url);
		$data = json_decode($result, true);

		return new self(
			$data["title"],
			$data["days_until"],
			$data["following_production"]["title"] ?? "Desconocido",
			$data["release_date"],
			$data["poster_url"],
			$data["overview"],
			$data["type"]
		);
	}

	public function get_data()
	{
		return get_object_vars($this);
	}
}
