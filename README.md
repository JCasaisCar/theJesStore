# TheJesStore 📱

> "Todo para tu móvil, en un clic y sin complicaciones"

Tienda online moderna desarrollada con Laravel 11, especializada en accesorios y componentes móviles con una experiencia de usuario intuitiva y rápida.

## 🚀 Tecnologías utilizadas

- **Backend:** Laravel 11 con Laravel Fortify
- **Frontend:** Blade Templates + Tailwind CSS + JavaScript
- **Base de datos:** MySQL/MariaDB
- **Autenticación:** Laravel Fortify (Sesiones nativas de Laravel)
- **Pasarelas de pago:** Stripe + PayPal
- **Emailing:** Gmail SMTP
- **Gestión de archivos:** Laravel Filesystem (almacenamiento público)
- **Sesiones:** Base de datos
- **Idioma:** Español (es) con fallback a español

## ⚙️ Requisitos previos

Asegúrate de tener instalado:

- **PHP 8.1+** (recomendado PHP 8.2)
- **Composer** (gestor de dependencias PHP)
- **Node.js 18+** y **npm** (para assets frontend)
- **MySQL 8.0+** o **MariaDB 10.3+**
- **Servidor web:** Apache o Nginx
- **Extensiones PHP necesarias:**
  - `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`
  - `ctype`, `json`, `fileinfo`, `gd`, `zip`
- **Cuenta Gmail** con contraseña de aplicación habilitada

## 🛠️ Instalación paso a paso

### 1. Clonar el repositorio
```bash
git clone https://github.com/JCasaisCar/theJesStore.git
cd theJesStore
```

### 2. Instalar dependencias
```bash
# Dependencias PHP
composer install

# Dependencias frontend
npm install
```

### 3. Configurar el entorno
```bash
# Copiar archivo de configuración
cp .env.example .env
```

**Edita el archivo `.env` con la siguiente configuración:**

```env
# Aplicación
APP_NAME=TheJesStore
APP_ENV=local
APP_KEY=base64:kwe2iwXWmzRWg/uoY0/WeKbOjO903S7Ngc4f85ugmKc=
APP_DEBUG=true
APP_URL=http://localhost:8000

# Idioma
APP_LOCALE=es
APP_FALLBACK_LOCALE=es

# Base de datos
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=theJesStore
DB_USERNAME=root
DB_PASSWORD=

# Sesiones (base de datos)
SESSION_DRIVER=database
SESSION_LIFETIME=120

# Sistema de archivos
FILESYSTEM_DISK=public

# Cola de trabajos
QUEUE_CONNECTION=database

# Cache
CACHE_STORE=database

# Email (Gmail SMTP)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=thejesstoremail@gmail.com
MAIL_PASSWORD=ypewobrqxlruszpd
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=thejesstoremail@gmail.com
MAIL_FROM_NAME="TheJesStore"

# Stripe (modo prueba)
STRIPE_KEY=pk_test_51RJl3ZCINKmEpQIMOcs6hT8tBhpJDSrWFgtR0n0RmvMEZlIBYo1aDlJqqZ7zQ1epLW8ZansKLfhefHOgZq3JBmmi00BSfGRLyC
STRIPE_SECRET=sk_test_51RJl3ZCINKmEpQIMi7HwXah7ja6nWJA1NFubFaEuIqyAbdls1f9jCY7whTp9WdwCM8dtzzTZVLKTzXohWVab6Oa900Gctf5MtM

# PayPal (modo sandbox)
PAYPAL_MODE=sandbox
PAYPAL_CLIENT_ID=AeDbUTbmNMWVq10GeverUDSXAoy5OqSNHZ5KvnNiQdVp8R5vFk9vcOOVHg86U-d8ztj7H-4CMYevJo2V
PAYPAL_SECRET=EEDojuiKEo_WcgJek3dmKvZyhQVsMz4tpcHenXGgleapzcivNhuGuEx3aBgcJn8HwJHAiaK3_CfDH0HS
PAYPAL_CURRENCY=EUR
```

### 4. Generar clave de aplicación
```bash
php artisan key:generate
```

### 5. Preparar la base de datos
```bash
# Crear las tablas y poblar con datos de prueba
php artisan migrate:fresh --seed

# Crear enlace simbólico para almacenamiento público
php artisan storage:link
```

### 6. Compilar assets frontend
```bash
# Modo desarrollo (con watch)
npm run dev

# Modo producción
npm run build
```

### 7. Iniciar el servidor
```bash
php artisan serve
```

🎉 **¡Listo!** Accede a la aplicación en: **http://localhost:8000**

## 👥 Usuarios de prueba

El sistema incluye datos de ejemplo con los siguientes roles:

- **👤 Usuario regular** (`user`): Compra productos, gestiona carrito y wishlist
- **👑 Administrador** (`admin`): Control total del sistema

*Consulta los seeders en `database/seeders/` para credenciales específicas*

## 🎯 Funcionalidades principales

### 🔐 Autenticación y usuarios
- Sistema de registro e inicio de sesión con **Laravel Fortify**
- Gestión de sesiones nativas de Laravel
- Perfiles de usuario con imagen personalizable
- Sistema de roles dinámico (user, artist, admin)
- Recuperación de contraseña por email

### 🛒 Comercio electrónico
- Catálogo de productos con imágenes múltiples
- Sistema de filtros avanzado (categoría, marca, modelo, compatibilidad)
- Carrito de compras persistente
- Lista de deseos (wishlist)
- Gestión completa de pedidos
- Historial de compras

### 💳 Pagos
- Integración con **Stripe** (tarjetas de crédito/débito)
- Integración con **PayPal** (cuenta PayPal y tarjetas)
- Procesamiento seguro en modo sandbox/producción
- Soporte para múltiples monedas

### 🎨 Panel de artista
- Subida y gestión de obras artísticas
- Portfolio personal personalizable
- Estadísticas de ventas y visualizaciones

### 📧 Sistema de notificaciones
- Envío de emails transaccionales
- Confirmaciones de pedido
- Notificaciones de estado de envío
- Comunicaciones promocionales

## 📁 Estructura del proyecto

```
theJesStore/
├── app/
│   ├── Http/Controllers/     # Controladores
│   ├── Models/              # Modelos Eloquent
│   ├── Providers/           # Proveedores de servicios
│   └── ...
├── database/
│   ├── migrations/          # Migraciones de BD
│   ├── seeders/            # Datos de prueba
│   └── factories/          # Factories para testing
├── public/
│   ├── storage/            # Archivos públicos (imágenes)
│   └── assets/             # Assets compilados
├── resources/
│   ├── views/              # Plantillas Blade
│   ├── css/               # Estilos Tailwind
│   └── js/                # JavaScript
├── routes/
│   ├── web.php            # Rutas web
│   └── api.php            # API endpoints
├── storage/
│   ├── app/public/        # Almacenamiento de archivos
│   └── logs/              # Logs de aplicación
├── .env                   # Configuración de entorno
├── composer.json          # Dependencias PHP
├── package.json           # Dependencias frontend
└── tailwind.config.js     # Configuración Tailwind
```

## 🔧 Comandos útiles

```bash
# Limpiar cache de aplicación
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Ejecutar migraciones
php artisan migrate
php artisan migrate:rollback

# Ejecutar seeders
php artisan db:seed
php artisan db:seed --class=UserSeeder

# Generar nuevos componentes
php artisan make:controller ProductController
php artisan make:model Product -m
php artisan make:seeder ProductSeeder

# Compilar assets
npm run dev          # Desarrollo con watch
npm run build        # Producción
npm run hot          # Hot reload
```

## 🚀 Despliegue en producción

1. **Configurar el entorno de producción:**
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://tudominio.com
   ```

2. **Optimizar la aplicación:**
   ```bash
   composer install --no-dev --optimize-autoloader
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   npm run build
   ```

3. **Configurar las claves de producción de Stripe y PayPal**

4. **Configurar el servidor web y SSL**

## 🐛 Solución de problemas comunes

**Error de permisos en storage:**
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

**Problemas con Tailwind CSS:**
```bash
npm run build
php artisan view:clear
```

**Error en migraciones:**
```bash
php artisan migrate:fresh --seed
```

## 📞 Contacto y soporte

- **👨‍💻 Desarrollador:** JCasaisCar
- **📧 Email:** jesuscasacarrillo@gmail.com
- **🐙 GitHub:** [github.com/JCasaisCar](https://github.com/JCasaisCar)
