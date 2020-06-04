## PRODUCTION:
- url:

## PREVIEW:
- url: 

## DEVELOPMENT:
- url: velmas19lite.test

## BITBUCKET:

## INSTALACIÓN PROYECTO:
- Laravel 6.14.0 (php artisan -V)
- composer install
- npm install
- Instalación dependencias UI:
		composer require laravel/ui --dev
- Instalación Bootstrap:
		php artisan ui bootstrap
- Instalar Datatables para usar junto a Bootstrap:
		npm i datatables --save
- Instalar Yajra Laravel Datatables
		composer require yajra/laravel-datatables-oracle:"~9.0"
		https://github.com/yajra/laravel-datatables

- Extender Auth y Session a API Controllers:
		En config/auth.php:
		'guards' => [
	        'web' => [
	            'driver' => 'session',
	            'provider' => 'users',
	        ],

	        'api' => [
	            'driver' => ['token', 'session'],
	            'provider' => 'users',
	            'hash' => false,
	        ],
	    ],

	    En app/Http/Kernel.php:
	    'api' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Session\Middleware\StartSession::class,
            'throttle:60,1',
            'bindings',
        ],

        
## Cart Library:
https://github.com/Crinsane/LaravelShoppingcart

## PDF Library:
https://github.com/barryvdh/laravel-dompdf

¡ATENCIÓN! a partir de la versión 4.0 no se incluye el archivo caffeinated/shinobi/src/Middleware/UserHasPermission.php, por lo que se crea manualmente y se copia el contenido de versiones anteriores.  Actúa como middleware en el archivo de rutas web.php

## IDIOMAS:
Se definen en el archivo config/locale.php

## CONSTANTES:
En el archivo config/constants.php se definen constantes personalizadas.

## NOTAS:
- 07-10-2019: desde la versión 5.8 desaparece por defecto el fichero app/Helpers/helpers.php, por lo que hay que crearlo manualmente incorporándolo en el fichero composer.json:

	"autoload": {
        "files": [
            "app/Helpers/helpers.php"
        ]
    },

	A continuación se ejecuta en consola: composer dump-autoload

- 16-12-2019: validaciones personalizadas (nif,...) en App/Providers/AppServiceProvider.php

- 03-12-2020: en el archivo .env se modifica CACHE_DRIVER=file por CACHE_DRIVER=array

- 27-01-2020: en config/database.php se modifica en el objeto 'mysql' el parámetro 'strict' de true a false. De este modo logramos que funcionen las sentencias groupBy en las consultas mysql.

		
## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
