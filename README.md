## Comandos usados por Nikita

composer create-project laravel/laravel PracticaNikita
Este comando crea un proyecto de Laravel en una carpeta llamada �PracticaNikita �

php artisan install:api
Este comando instala y configura una API en el proyecto.

php artisan make:migration create_alumno_table
Crear una migration que tendr� el objetivo de crear la tabla alumno

php artisan migrate
Ejecuta todos los archivos de la carpeta migrations para crear todas las tablas

php artisan migrate:rollback
Para deshacer los cambios del comando �php artisan migrate�

php artisan make:seeder AlumnoSeeder
Crear un seeder que tendr� el objetivo de rellenar la tabla alumno con datos

php artisan db:seed --class=AlumnoSeeder
Ejecuta el seeder �AlumnoSeeder� y rellena la tabla indicada dentro de el con los datos indicados dentro de el

php artisan make:controller AlumnoController --resource
Crear un controller que gestionar� solicitudes HTTP y procesar� operaciones del sistema, el -resource pone los m�todos predefinidos

php artisan make:middleware ValidateId
Crear un middleware que tendr� el objetivo de validar el id ingresado

php artisan serve
Para arrancar la API
