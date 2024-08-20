<?php

declare(strict_types=1);

class SuperHero
{
	// constructor
	public function __construct(
		private string $name,
		private array $powers,
		private string $planet
	) {}

	public function attack()
	{
		return "¡$this->name ataca con sus poderes!\n";
	}

	public function description()
	{
		$powers = implode(", ", $this->powers);
		return "$this->name es un superhéroe del planeta: $this->planet y tiene los siguientes poderes: $powers.\n";
	}

	public static function random()
	{
		$names = ["Thor", "Spiderman", "Ironman", "Wolverine", "Hulk"];
		$powers = [
			["Rayos", "Volar", "Fuerza"],
			["Telarañas", "Agilidad", "Sentido arácnido"],
			["Dinero", "Tecnología", "Inteligencia"],
			["Garras", "Regeneración", "Sentidos agudos"],
			["Fuerza", "Resistencia", "Golpes"],
		];
		$planets = ["Tierra", "Asgard", "Xandar", "Sakaar", "Jotunheim"];

		$name = $names[array_rand($names)];
		$power = $powers[array_rand($powers)];
		$planet = $planets[array_rand($planets)];

		return new self($name, $power, $planet);
		/* echo "El superhéroe elegido es: $name, que viene de $planet y tiene los siguientes poderes: " . implode(", ", $power) . "\n"; */
	}
}

$hero = SuperHero::random();
echo $hero->description();
