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
1.**Instala las dependencias de PHP:**
```bash
composer install
```
3.**Instala las dependencias de JavaScript:**
```bash
npm install
```
4.**Instala npm-design-icon:**
```bash
npm install npm-design-icon
```
5.**Para iniciar el servidor de desarrollo, usa el siguiente comando:**
```bash
npm run dev
php artisan serve
```
## Estructura del Proyecto
- [Controladores](app/Http/Controllers)(Contiene los controladores para el perfil, publicaces y encuestas del proyecto)
- [Layouts](resources/js/Layouts)(Contiene los layouts del foro)
- [Pages](resources/js/Pages)(Contiene las paginas principales que se muestran en el foro)
- [Pics](public/pics)(Contiene las imagenes para los logos del foro)
- [Routes](routes/web.php)(Contiene las rutas principales del foro)
- [Layouts](resources/js/Layouts)(Contiene los layouts del foro)
