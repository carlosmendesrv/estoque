<div align="center">
    <h1>P000</h1>
    <a href=""><img src="https://img.shields.io/static/v1?label=PHP&message=8.0&color=1f6feb" alt="PHP Version"></a>
    <a href=""><img src="https://img.shields.io/static/v1?label=Laravel&message=8.54&color=1f6feb" alt="Laravel Version"></a>
    <a href="https://spatie.be/docs/laravel-permission/v5/introduction"><img src="https://img.shields.io/static/v1?label=Spatie Permissions&message=5.1&color=1f6feb" alt="Permissions Version"></a>
    <a href="https://spatie.be/docs/laravel-activitylog/v4/introduction"><img src="https://img.shields.io/static/v1?label=Activitylog&message=4.2&color=1f6feb" alt="Activitylog Version"></a>
</div>
 a
## About
In this project [Spatie Permissions](https://spatie.be/docs/laravel-permission/v5/introduction) is used as default ACL and [Activitylog](https://spatie.be/docs/laravel-activitylog/v4/introduction) for register logs.

### Pratices
* **Use UUID** on primary and foreign keys
* Command **make:source**, this command create everything you need for develop
* Command **setup**, will be populated your database
* Keep **Setup** command updated

## API
For API development **JWT** [(Firebase)](https://github.com/firebase/php-jwt) is used for authentication and [Swagger](https://github.com/DarkaOnLine/L5-Swagger) for documentation.

#### SETUP
* Set APP_GUARD value to "api"
* Use api.php to register routes

## WEB
For WEB development the native laravel ecosystem is used. The [recaptcha](https://laravel-recaptcha-docs.biscolab.com/docs/intro) is already set.

#### SETUP
* Set APP_GUARD value to "web"
* Use web.php to register routes
# estoque

### PEDIDO

# Status
P - Pendente
F - Fechado
C - Cancelado
