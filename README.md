<div align="center">
  <h1>🚀 Configuración de Proyecto Laravel con SQL Server</h1>
  <p>Guía completa para configurar un proyecto Laravel con SQL Server como base de datos</p>
</div>

## 🔧 1. Configuración Inicial

### Prerrequisitos
<div style="background: #f5f5f5; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
  <ul>
    <li>PHP ≥ 8.1</li>
    <li>Composer</li>
    <li>SQL Server instalado (local o remoto)</li>
    <li>SQL Server Driver para PHP</li>
    <li>Git instalado</li>
  </ul>
</div>

### Pasos de Instalación

<table>
  <tr>
    <th width="30%">Paso</th>
    <th>Comando/Configuración</th>
  </tr>
  <tr>
    <td>1. Instalar extensión SQL Server</td>
    <td>
      <div style="background: #e8f4f8; padding: 10px; border-radius: 5px; font-family: monospace;">
        # Ubuntu/Debian<br>
        sudo apt-get install php-sqlsrv<br><br>
        # Windows<br>
        pecl install sqlsrv pdo_sqlsrv
      </div>
      <p>Agregar a php.ini:</p>
      <div style="background: #e8f4f8; padding: 10px; border-radius: 5px; font-family: monospace;">
        extension=sqlsrv<br>
        extension=pdo_sqlsrv
      </div>
    </td>
  </tr>
  <tr>
    <td>2. Crear proyecto Laravel</td>
    <td>
      <div style="background: #e8f4f8; padding: 10px; border-radius: 5px; font-family: monospace;">
        composer create-project laravel/laravel nombre-proyecto<br>
        cd nombre-proyecto
      </div>
    </td>
  </tr>
  <tr>
    <td>3. Configurar .env</td>
    <td>
      <div style="background: #e8f4f8; padding: 10px; border-radius: 5px; font-family: monospace;">
        DB_CONNECTION=sqlsrv<br>
        DB_HOST=tu_servidor_sql<br>
        DB_PORT=1433<br>
        DB_DATABASE=nombre_bd<br>
        DB_USERNAME=tu_usuario<br>
        DB_PASSWORD=tu_contraseña
      </div>
    </td>
  </tr>
  <tr>
    <td>4. Instalar controlador ODBC (Windows)</td>
    <td>
      <a href="https://learn.microsoft.com/en-us/sql/connect/odbc/download-odbc-driver-for-sql-server" target="_blank">Descargar ODBC Driver</a>
    </td>
  </tr>
  <tr>
    <td>5. Instalar paquete Laravel SQLSRV</td>
    <td>
      <div style="background: #e8f4f8; padding: 10px; border-radius: 5px; font-family: monospace;">
        composer require doctrine/dbal
      </div>
    </td>
  </tr>
</table>

## 🚀 2. Ejecutar el Proyecto

<div style="background: #f0f8f0; padding: 15px; border-radius: 8px; margin: 20px 0;">
  <h3>Migraciones y base de datos</h3>
  <div style="background: #e8f4e8; padding: 10px; border-radius: 5px; font-family: monospace; margin: 10px 0;">
    php artisan migrate
  </div>
  
  <h3>Servidor de desarrollo</h3>
  <div style="background: #e8f4e8; padding: 10px; border-radius: 5px; font-family: monospace; margin: 10px 0;">
    php artisan serve
  </div>
  <p>🔗 Abre: <a href="http://localhost:8000" target="_blank">http://localhost:8000</a></p>
</div>

<div style="margin-top: 40px; padding: 15px; background: #f5f5f5; border-radius: 8px;">
  <h2>📌 Notas Importantes</h2>
  <ul>
    <li>Verifica que el servicio SQL Server esté corriendo</li>
    <li>Revisa configuración de firewall (puerto 1433)</li>
    <li>Para problemas de conexión usa: <code>telnet IP 1433</code></li>
  </ul>
</div>


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

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

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
