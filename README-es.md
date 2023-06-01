[You can find an english version of this readme here](./README.md)

Compara inmuebles plugin
==
Colaboradores: 
* [Brandon Vadillo](https://github.com/BrandonVG)
* [Marco Aspeitia](https://github.com/marcoAspeitia31)

Etiquetas: Inmuebles, plugin

Licencia: [GPLv2 o posterior](http://www.gnu.org/licenses/gpl-2.0.html)

## Descripción

Plugin complementario del [tema de Compara inmuebles](https://github.com/BrandonVadilloDev/Compara-inmuebles-theme), Agrega tipos de posts personalizados para las propiedades y utiliza CMB2 para añadir metaboxes con información adicional sobre las propiedades.

Además, agrega una sección de opciones de tema para personalizar algunos elementos en el frontend, como logotipos, información de contacto, ubicación y código para integrar el boletín de noticias de MailChimp.

## Instalación 

### Requisitos 
- [PHP 5.6 como mínimo](https://www.php.net/downloads.php)
- [WordPress 5.0 como mínimo](https://wordpress.org/download/)
- [Clave de API de Google Maps](https://developers.google.com/maps/documentation/javascript/get-api-key?hl=es)
- [CMB2 Field Type: Font Awesome Icon Selector](https://github.com/serkanalgur/cmb2-field-faiconselect)

### Inicio rápido

1. Descarga este repositorio.
2. Descomprime el contenido en el directorio `/wp-content/plugins`o, en el panel de administración, ve a Plugins y haz clic en el botón "Añadir nuevo".
1. Activa el complemento a través del menú 'Plugins' en WordPress.
1. Coloca la clave de API de Google Maps en el archivo `wp-config.php` como `DEFINE('PW_GOOGLE_API_KEY', 'API KEY')`

## Características
-   Agrega un tipo de post personalizado para los inmuebles.
-   Agrega un tipo de post personalizado para los testimonios.
-   Utiliza CMB2 para añadir metaboxes personalizados a los inmuebles.
-   Utiliza CMB2 para añadir opciones de tema personalizadas.
-   Agrega nuevas taxonomías para los inmuebles.
-   Utiliza CMB2 para añadir metaboxes personalizados a una taxonomía.
-   Agrega widgets para mostrar inmuebles y taxonomías.


## Créditos
* Basado en Wordpress plugin Boilerplate Generator https://wppb.me/.
