<?php

/**
 * Archivo de demostración con ejemplos de variables, constantes, arrays y estructuras de control.
 */

// Variables y constantes
$name = 'Miguel'; // Variable de tipo string
$isDev = true; // Variable de tipo boolean
$age = 78; // Variable de tipo integer

define('LOGO_URL', 'https://cdn.freebiesupply.com/logos/large/2x/php-1-logo-svg-vector.svg');

$output = "Hola $name, con una edad de $age. 😝";// Concatenación de strings con emoji
$outputAge = match (true) {
  $age < 2    => "Eres un bebé, $name 👶",
  $age < 10   => "Eres un niño, $name 👦",
  $age < 18   => "Eres un adolescente, $name 👨‍🎓",
  $age === 18 => "Eres mayor de edad, $name 🍺",
  $age < 40   => "Eres un adulto joven, $name 👨‍💼",
  $age < 60   => "Eres un adulto viejo, $name 👴",
  default     => "Hueles más a madera que a fruta, $name 👴",
};

// Array asociativo
$person = [
  "name" => "Miguel",
  "age" => 78,
  "isDev" => true,
  "languages" => ["PHP", "JavaScript", "Python"],
];
$person["name"] = "pheralb"; // Modificar un elemento del array
$person["languages"][] = "Java"; // Añadir un elemento a un array dentro de un array asociativo
?>

<ul>
  <?php foreach ($bestLanguages as $key => $language) : ?>
      <li><?= $key . " " . $language ?></li>
  <?php endforeach; ?>
</ul>

<h2><?= $outputAge ?></h2>

<img src="<?= LOGO_URL ?>" alt="PHP Logo" width="200">
<h1>
  <?= $output ?>
</h1>