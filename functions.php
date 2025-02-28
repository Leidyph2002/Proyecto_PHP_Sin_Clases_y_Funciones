<?php

declare(strict_types=1); // <- a nivel de archivo y arriba del todo

/**
 * Renderiza un template PHP con los datos proporcionados.
 *
 * @param string $template Nombre del template a renderizar.
 * @param array $data Datos a pasar al template.
 */
function render_template(string $template, array $data = [])
{
    extract($data);
    require "templates/$template.php";
}

/**
 * Obtiene los datos de una URL y los decodifica como un array asociativo.
 *
 * @param string $url URL de la API.
 * @return array Datos de la API como un array asociativo.
 */
function get_data(string $url): array
{
    $result = file_get_contents($url);
    $data = json_decode($result, true);
    return $data;
}

/**
 * Genera un mensaje basado en los días hasta un evento.
 *
 * @param int $days Días hasta el evento.
 * @return string Mensaje con los días hasta el evento.
 */
function get_until_message(int $days): string
{
    return match (true) {
        $days === 0     => "¡Hoy se estrena! ",
        $days === 1     => "Mañana se estrena ",
        $days < 7       => "Esta semana se estrena 🫢",
        $days < 30      => "Este mes se estrena... ️",
        default         => "$days días hasta el estreno ️",
    };
}