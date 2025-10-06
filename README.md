<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# CRUD de Laravel

Proyecto desarrollado como práctica de laboratorio para construir un **CRUD (Create, Read, Update, Delete)** completo en **Laravel 12**, utilizando **XAMPP**, **MySQL**, y **Blade** para las vistas.  
El sistema permite registrar, listar, editar y eliminar productos, con los campos:
**nombre, descripción, precio y stock**, sin incluir timestamps automáticos.


## Requisitos Previos
![PHP](https://img.shields.io/badge/PHP-8.2-blue?logo=php)
![Composer](https://img.shields.io/badge/Composer-latest-orange?logo=composer)
![Laravel](https://img.shields.io/badge/Laravel-12.x-red?logo=laravel)
![MySQL](https://img.shields.io/badge/MySQL-8.0-blue?logo=mysql)
![Node.js](https://img.shields.io/badge/Node.js-18-green?logo=nodedotjs)
![VS Code](https://img.shields.io/badge/Editor-VS%20Code-blue?logo=visualstudiocode)

- PHP ≥ 8.2  
- Composer última versión estable.  
- Laravel Installer o `composer create-project`.  
- Servidor local: **XAMPP** (Apache + MySQL).  
- Node.js y npm para compilar recursos.  
- Editor de código: **Visual Studio Code** recomendado.


## Comandos de Instalación y Flujo de Trabajo

#### 1. Crear el proyecto Laravel
- **Ejecutamos los comandos para crear el proyecto nuevo:**
  ```bash
  composer create-project laravel/laravel crudlab
  cd crudlab
#### 2. Configurar el entorno
- **Edita el archivo `.env` con los datos de tu base de datos local:**
  ```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=crud_rapido
  DB_USERNAME=root
  DB_PASSWORD=
#### 3. Ejecutar migraciones
- **Ejecutamos el comando para las migraciones:**
  ```bash
  php artisan migrate

#### 4. Iniciar el servidor
- **Ejecutamos el comando para activar el servidor:**
   ```bash
  php artisan serve

## Estructura MVC del Proyecto
Laravel sigue el patrón Modelo–Vista–Controlador (MVC), que organiza el código de forma limpia y escalable:
- **Modelo `app/Models/Product.php` Define la estructura del producto y los campos permitidos:**
  ```bash
  protected $fillable = ['name','description','price','stock'];
  public $timestamps = false;
- **Controlador `app/Http/Controllers/ProductController.php` Gestiona las operaciones CRUD sobre la base de datos:**
  ```bash
  Product::orderBy('id', 'asc')->paginate(10);
- **Vistas `resources/views/products/`:**
  - index.blade.php: Lista los productos.
  - create.blade.php: Formulario para registrar un nuevo producto.
  - edit.blade.php: Formulario para editar un producto existente.
  - show.blade.php: Vista de detalles de un producto.
- **Rutas `routes/web.php`:**
  ```bash
  use App\Http\Controllers\ProductController;
  Route::resource('products', ProductController::class);
  
## Base de Datos
  - Migración: `create_products_table.php`
    ```bash
    public function up(): void
    {
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('description');
        $table->double('price', 8, 2);
        $table->integer('stock');
        // Sin timestamps
    });
    }
### Ejemplo de tabla `products`

| id | name           | description                            | price | stock |
|----|----------------|----------------------------------------|--------|--------|
| 1  | Salsa Picante  | Salsa cremosa con especias             | 3.99   | 5      |
| 2  | Ketchup        | Tradicional de tomate                  | 2.75   | 8      |
| 3  | Mayonesa Light | Ideal para ensaladas y comidas ligeras | 4.50   | 12     |

## Dificultades y Soluciones
- **Error:** SQLSTATE[42S22]: Unknown column 'created_at'
  - **Causa:** Se eliminaron los timestamps de la migración.
  - **Solución:** Se añadió public $timestamps = false al modelo.
    
- **Error:** Field 'name' doesn't have a default value
  - **Causa:** Faltaba el campo “name” en los formularios.
  - **Solución:** Se añadió el input name en create.blade.php y edit.blade.php.

- **Error:** Aparecía @csr visible en la página.
  - **Causa:** Error de escritura del token CSRF.
  - **Solución:** Se corrigió por @csrf.

- **Error:** Productos aparecían en orden descendente.
  - **Solución:** Se cambió orderByDesc('id') por orderBy('id', 'asc').

## Resulta Final
- Pantalla principal del CRUD
  <img width="1920" height="1080" alt="Image" src="https://github.com/user-attachments/assets/f213c994-d4f4-4d9b-b1d6-65453e9c54e6" />
- Formulario de registro
  <img width="1920" height="1080" alt="Image" src="https://github.com/user-attachments/assets/6b3eeb15-f942-4097-bda1-b0eebe76b7bc" />
- Alerta SweetAlert2
  <img width="1920" height="1080" alt="Image" src="https://github.com/user-attachments/assets/579c4abd-c05c-4cf3-9049-c2627551801c" />

## Referencias
[1] [Documentación oficial de Laravel](https://laravel.com/docs)  
[2] [Laravel Blade Templates](https://laravel.com/docs/10.x/blade)  
[3] [Laravel Eloquent ORM](https://laravel.com/docs/10.x/eloquent)  
[4] [SweetAlert2 Docs](https://sweetalert2.github.io/)  
[5] [Laracasts – Laravel CRUD Series](https://laracasts.com/)  

---
Este laboratorio ha sido desarrollado por la estudiante de la Universidad Tecnológica de Panamá:  
**Nombre:** Abigail Koo  
**Correo:** abigail.koo@utp.ac.pa  
**Curso:** Ingeniería Web  
**Instructor:** Ing. Irina Fong <br>
**Fecha de Ejecución:** 5 de Octubre de 2025
