# Próximas Películas de Marvel

Este proyecto PHP tiene como objetivo mostrar información sobre la próxima película de Marvel y la siguiente producción en la línea de tiempo del MCU (Universo Cinematográfico de Marvel). Utiliza una API pública para obtener los datos y los muestra en una interfaz web sencilla y fácil de usar.

## Estructura del Proyecto

El proyecto está organizado en los siguientes archivos y carpetas:

* **`index.php`**: Archivo principal que controla el flujo de la aplicación.
* **`consts.php`**: Define la URL de la API de Marvel.
* **`functions.php`**: Contiene funciones útiles para la aplicación, como renderizar templates y obtener datos de la API.
* **`classes/NextMovie.php`**: Define la clase `NextMovie` que maneja los datos de las películas.
* **`templates/head.php`**: Define la cabecera HTML de la página.
* **`templates/main.php`**: Define el contenido principal de la página.
* **`classes.php`**: Define la clase `SuperHero` y un ejemplo de uso.
* **`demo.php`**: Archivo de demostración con ejemplos de PHP básico.

## API de Marvel

El proyecto utiliza la API `https://whenisthenextmcufilm.com/api` para obtener los datos de las próximas películas. Esta API devuelve un objeto JSON con la siguiente estructura:

```json
{
  "days_until": 5,
  "following_production": {
    "days_until": 62,
    "id": 986056,
    "overview": "After finding themselves ensnared in a death trap, seven disillusioned castoffs must embark on a dangerous mission that will force them to confront the darkest corners of their pasts.",
    "poster_url": "[https://image.tmdb.org/t/p/w500/hQYEA4Ty1RlxsToWMYLE2RzSc0N.jpg](https://image.tmdb.org/t/p/w500/hQYEA4Ty1RlxsToWMYLE2RzSc0N.jpg)",
    "release_date": "2025-04-30",
    "title": "Thunderbolts*",
    "type": "Movie"
  },
  "id": 202555,
  "overview": "Matt Murdock, a blind lawyer with heightened abilities, is fighting for justice through his bustling law firm, while former mob boss Wilson Fisk pursues his own political endeavors in New York. When their past identities begin to emerge, both men find themselves on an inevitable collision course.",
  "poster_url": "[https://image.tmdb.org/t/p/w500/9lLuhV703HGCbnz6FxnqCwIwzAZ.jpg](https://image.tmdb.org/t/p/w500/9lLuhV703HGCbnz6FxnqCwIwzAZ.jpg)",
  "release_date": "2025-03-04",
  "title": "Daredevil: Born Again",
  "type": "TV Show"
}
```

* **`days_until`**: Número de días hasta el estreno de la película actual.
* **`following_production`**: Un objeto que contiene información sobre la siguiente producción.
    * **`days_until`**: Número de días hasta el estreno de la siguiente producción.
    * **`id`**: ID de la producción.
    * **`overview`**: Resumen de la producción.
    * **`poster_url`**: URL del póster de la producción.
    * **`release_date`**: Fecha de estreno de la producción.
    * **`title`**: Título de la producción.
    * **`type`**: Tipo de producción (Movie o TV Show).
* **`id`**: ID de la película actual.
* **`overview`**: Resumen de la película actual.
* **`poster_url`**: URL del póster de la película actual.
* **`release_date`**: Fecha de estreno de la película actual.
* **`title`**: Título de la película actual.
* **`type`**: Tipo de producción (Movie o TV Show).

## Cómo Funciona

1.  El archivo `index.php` realiza una petición a la API definida en `consts.php`.
2.  La clase `NextMovie` en `classes/NextMovie.php` procesa la respuesta JSON y crea un objeto con los datos de la película y la siguiente producción.
3.  Los datos se pasan a los templates `head.php` y `main.php` para generar la página web.
4.  Se utiliza Bootstrap para el diseño responsivo y la presentación de los datos.

## Adaptación a Otras APIs

Para adaptar este proyecto a otra API, debes:

1.  Cambiar la URL en `consts.php`.
2.  Modificar la clase `NextMovie` para que coincida con la estructura de datos de la nueva API.
3.  Ajustar los templates para mostrar los datos de la nueva API.
