# Proyecto Laravel con Vue e Inertia

## Descripción

Este proyecto utiliza **Laravel**, **Vue.js** e **Inertia.js** para ofrecer una experiencia moderna y dinámica. Además, se han instalado íconos mediante `npm-design-icon` para mejorar la interfaz de usuario.

## Tecnologías Utilizadas

- **Laravel**: Framework de PHP para el desarrollo del backend.
- **Vue.js**: Framework de JavaScript para el desarrollo del frontend.
- **Inertia.js**: Librería para construir aplicaciones modernas usando Laravel y Vue.
- **npm-design-icon**: Paquete para utilizar íconos de diseño en el proyecto.

## Requisitos

- [PHP](https://www.php.net/) (versión 8.0 o superior)
- [Composer](https://getcomposer.org/) (para gestionar las dependencias de PHP)
- [Node.js](https://nodejs.org/) (para gestionar paquetes de JavaScript y herramientas de construcción)
- [MySQL](https://www.mysql.com/) (o cualquier otro sistema de gestión de bases de datos soportado por Laravel)

## Instalación

1. **Clona el repositorio:**

   ```bash
   git clone https://github.com/tu_usuario/tu_repositorio.git
   cd tu_repositorio
Instala las dependencias de PHP:

bash
Copiar código
composer install
Configura el archivo de entorno:

Copia el archivo .env.example a .env:

bash
Copiar código
cp .env.example .env
Luego, abre el archivo .env y ajusta las configuraciones según tus necesidades, como la conexión a la base de datos.

Genera la clave de aplicación:

bash
Copiar código
php artisan key:generate
Ejecuta las migraciones:

Asegúrate de que tu base de datos esté configurada y ejecuta las migraciones para crear las tablas necesarias:

bash
Copiar código
php artisan migrate
Instala las dependencias de JavaScript:

bash
Copiar código
npm install
Instala npm-design-icon:

bash
Copiar código
npm install npm-design-icon
Compila los assets:

bash
Copiar código
npm run dev
Uso
Para iniciar el servidor de desarrollo, usa el siguiente comando:

bash
Copiar código
php artisan serve
Luego, abre tu navegador y accede a http://localhost:8000.
