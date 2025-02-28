<?php

declare(strict_types=1);

/**
 * Clase SuperHero: Representa a un superhéroe con sus atributos y métodos.
 */
class SuperHero
{
    /**
     * Constructor de la clase.
     *
     * @param string $name Nombre del superhéroe.
     * @param array $powers Poderes del superhéroe.
     * @param string $planet Planeta de origen del superhéroe.
     */
    public function __construct(
        private string $name,
        public array $powers,
        public string $planet
    ) {
    }

    /**
     * Genera un mensaje de ataque del superhéroe.
     *
     * @return string Mensaje de ataque.
     */
    public function attack(): string
    {
        return "¡$this->name ataca con sus poderes!";
    }

    /**
     * Obtiene todos los atributos de la clase como un array asociativo.
     *
     * @return array Array con los atributos de la clase.
     */
    public function show_all(): array
    {
        return get_object_vars($this);
    }

    /**
     * Genera una descripción del superhéroe.
     *
     * @return string Descripción del superhéroe.
     */
    public function description(): string
    {
        $powers = implode(", ", $this->powers);

        return "$this->name es un superhéroe que viene de $this->planet y tiene los siguientes poderes: $powers";
    }

    /**
     * Crea una instancia de SuperHero con datos aleatorios.
     *
     * @return SuperHero Instancia de SuperHero con datos aleatorios.
     */
    public static function random(): SuperHero
    {
        $names = ["Thor", "Spiderman", "Wolverine", "Ironman", "Hulk"];
        $powers = [
            ["Superfuerza", "Volar", "Rayos láser"],
            ["Superfuerza", "Super agilidad", "Telarañas"],
            ["Regeneración", "Superfuerza", "Garras de adamantium"],
            ["Superfuerza", "Volar", "Rayos láser"],
            ["Superfuerza", "Super agilidad", "Cambio de tamaño"],
        ];
        $planets = ["Asgard", "HulkWorld", "Krypton", "Tierra"];

        $name = $names[array_rand($names)];
        $power = $powers[array_rand($powers)];
        $planet = $planets[array_rand($planets)];

        return new self($name, $power, $planet);
    }
}

// Crea una instancia de SuperHero con datos aleatorios y muestra su descripción.
$hero = SuperHero::random();
echo $hero->description();