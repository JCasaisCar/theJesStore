# TheJesStore

> "Todo para tu móvil, en un clic y sin complicaciones".

Tienda online desarrollada con Laravel 11, pensada para ofrecer accesorios y componentes móviles con una experiencia de usuario intuitiva y rápida.

## 🚀 Tecnologías utilizadas

* **Backend:** Laravel 11
* **Frontend:** Blade + Tailwind CSS + JavaScript
* **Base de datos:** MySQL/MariaDB
* **Control de autenticación:** Keycloak (OAuth2)
* **Pasarela de pagos:** Stripe
* **Emailing:** Gmail SMTP
* **Gestión de imágenes:** Almacenamiento público con Laravel Filesystem

## ⚙️ Requisitos previos

Asegúrate de tener instalado:

* PHP 8.x
* Composer
* Node.js y npm
* MySQL/MariaDB
* Apache o Nginx
* Extensiones PHP: pdo_mysql, mbstring, openssl, tokenizer, xml, ctype, json, fileinfo
* Cuenta Gmail habilitada para aplicaciones externas (SMTP)

## 🛠️ Instalación del proyecto

### 1. Clonar el repositorio

```
git clone https://github.com/JCasaisCar/theJesStore.git
cd theJesStore
```

### 2. Instalar dependencias del backend y frontend

```
composer install
npm install
```

### 3. Configurar el entorno

Copia el archivo de entorno:

```
cp .env.example .env
```

Modifica las siguientes variables en el archivo .env:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=theJesStore
DB_USERNAME=root
DB_PASSWORD=

FILESYSTEM_DISK=public

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=thejesstoremail@gmail.com
MAIL_PASSWORD=keesradquwrffxve
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=thejesstoremail@gmail.com
MAIL_FROM_NAME="TheJesStore"
```

### 4. Generar la clave de la aplicación

```
php artisan key:generate
```

### 5. Encender el servidor MySQL (XAMPP, Laragon, etc.)

### 6. Migrar y poblar la base de datos

```
php artisan migrate:fresh
php artisan db:seed
```

### 7. Compilar assets (Tailwind + JS)

```
npm run dev
```

### 8. Iniciar el servidor de desarrollo

```
php artisan serve
```

Accede desde http://127.0.0.1:8000

## 🧪 Datos de prueba

Usuarios de ejemplo (ver seeders para más detalles).
Los roles disponibles son: user, artist, admin.

## 🧩 Funcionalidades clave

* Registro e inicio de sesión vía Keycloak
* Perfil de usuario con imagen y roles dinámicos
* Sistema de roles (user, artist, admin)
* Gestión de productos, carrito, wishlist y pedidos
* Filtros por categoría, marca, modelo y compatibilidad
* Pasarela de pago con Stripe
* Envío de correos SMTP
* Panel de artista para subir obras
* Backend RESTful protegido con JWT

## 📂 Estructura del proyecto

```
├── app/             # Lógica de Laravel
├── database/
│   ├── migrations/
│   ├── seeders/
├── public/
│   ├── assets/      # Imágenes, logos, etc.
├── resources/
│   ├── views/       # Vistas Blade
├── routes/
│   ├── web.php
├── .env
└── package.json
```

## 📬 Contacto

📧 jesuscasacarrillo@gmail.com
👤 Desarrollado por JCasaisCar