# Reto 3.1 – Proyecto colaborativo en Git

## Descripción
Este proyecto corresponde al **Reto 3.1** de la asignatura, cuyo objetivo es trabajar de forma colaborativa utilizando **Git y GitHub**, aplicando un flujo de trabajo profesional basado en ramas, commits y pull requests.

El proyecto está desarrollado con **Laravel** e implementa un CRUD completo (Create, Read, Update, Delete).

---

## Tecnologías utilizadas
- PHP 8.x
- Laravel
- MySQL
- Git / GitHub
- Node.js y Vite

---

## Requisitos previos
Para ejecutar el proyecto es necesario tener instalado:
- PHP
- Composer
- Node.js
- MySQL
- XAMPP o entorno similar

---

## Instalación y ejecución del proyecto

1. Clonar el repositorio:
```bash
git clone https://github.com/Temabiceps/Laravel_Reto.git

```
2. Acceder a la carpeta del proyecto:
```bash
cd Laravel_Reto

```
3. Instalar dependencias de PHP:
```bash
composer install

```
4. Crear el archivo de entorno:
```bash
cp .env.example .env

```
5. Generar la clave de la aplicación:
```bash
php artisan key:generate

```
6. Configurar la base de datos en el archivo .env.

7. Crear la base de datos y ejecutar las migraciones:
```bash
php artisan migrate

```
8. Instalar dependencias de frontend:
```bash
npm install

```
9. Ejecutar el proyecto:
```bash
php artisan serve
npm run dev

```
## Flujo de trabajo colaborativo
El proyecto se ha desarrollado siguiendo un flujo de trabajo basado en:
- Rama main para la versión estable
- Rama dev para el desarrollo
- Uso de commits descriptivos
- Creación de Pull Requests para integrar cambios

## Autor
- Artem Kukushkin DAW









