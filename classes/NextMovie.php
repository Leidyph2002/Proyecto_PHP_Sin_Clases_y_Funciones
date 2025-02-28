<?php

declare(strict_types=1);

/**
 * Clase NextMovie: Representa la información de una próxima película de Marvel.
 */
class NextMovie
{
    /**
     * Constructor de la clase.
     *
     * @param string $title Título de la película.
     * @param int $days_until Días hasta el estreno.
     * @param string $following_production Título de la siguiente producción.
     * @param string $release_date Fecha de estreno de la película.
     * @param string $poster_url URL del póster de la película.
     * @param string $overview Resumen de la película.
     * @param ?string $next_poster URL del póster de la siguiente película (v2).
     * @param ?int $next_days Días hasta el estreno de la siguiente película (v2).
     * @param ?string $next_release Fecha de estreno de la siguiente película (v2).
     * @param ?string $next_overview Resumen de la siguiente película (v2).
     */
    public function __construct(
        private string $title,
        private int $days_until,
        private string $following_production,
        private string $release_date,
        private string $poster_url,
        private string $overview,
        private ?string $next_poster = null,
        private ?int $next_days = null,
        private ?string $next_release = null,
        private ?string $next_overview = null
    ) {
    }

    /**
     * Genera un mensaje basado en los días hasta el estreno.
     *
     * @return string Mensaje con los días hasta el estreno.
     */
    public function get_until_message(): string
    {
        $days = $this->days_until;

        return match (true) {
            $days === 0     => "¡Hoy se estrena! 🥳",
            $days === 1     => "Mañana se estrena 🚀",
            $days < 7       => "Esta semana se estrena 🫢",
            $days < 30      => "Este mes se estrena... 🗓️",
            default         => "$days días hasta el estreno 🗓️",
        };
    }

    /**
     * Obtiene los datos de la API y crea una instancia de NextMovie.
     *
     * @param string $api_url URL de la API.
     * @return NextMovie Instancia de NextMovie con los datos de la API.
     */
    public static function fetch_and_create_movie(string $api_url): NextMovie
    {
        $result = file_get_contents($api_url);
        $data = json_decode($result, true);

        return new self(
            $data["title"],
            $data["days_until"],
            $data["following_production"]['title'] ?? "Desconocido",
            $data["release_date"],
            $data["poster_url"],
            $data["overview"],
            $data["following_production"]['poster_url'] ?? null,
            $data["following_production"]['days_until'] ?? null,
            $data["following_production"]['release_date'] ?? null,
            $data["following_production"]['overview'] ?? null
        );
    }

    /**
     * Obtiene todos los atributos de la clase como un array asociativo.
     *
     * @return array Array con los atributos de la clase.
     */
    public function get_data(): array
    {
        return get_object_vars($this);
    }

    /**
     * Obtiene los días hasta el estreno de la siguiente película.
     *
     * @return ?int Días hasta el estreno de la siguiente película (o null si no hay datos).
     */
    public function get_next_days(): ?int
    {
        return $this->next_days;
    }

    /**
     * Obtiene la fecha de estreno de la siguiente película.
     *
     * @return ?string Fecha de estreno de la siguiente película (o null si no hay datos).
     */
    public function get_next_release(): ?string
    {
        return $this->next_release;
    }

    /**
     * Obtiene el resumen de la siguiente película.
     *
     * @return ?string Resumen de la siguiente película (o null si no hay datos).
     */
    public function get_next_overview(): ?string
    {
        return $this->next_overview;
    }
}