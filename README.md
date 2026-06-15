# 💎 ALBA Joyería - E-commerce Web

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)

El presente repositorio corresponde al trabajo integrador que se realiza para la materia **"Taller de Programación I"** de la carrera de Licenciatura en Sistemas de la **Universidad Nacional del Nordeste (UNNE)**.

Joyería ALBA consiste en una tienda virtual (e-commerce) dedicada a la comercialización de joyas de diseño, que cuenta con un showroom en la ciudad de Corrientes. Está desarrollada en **PHP** utilizando el framework **Laravel** y el entorno de desarrollo local **Laravel Herd**.

---

## ✨ Características del Sistema

### 👤 Módulo Cliente (Frontend)
- **Catálogo de Joyas:** Visualización de productos con filtros de búsqueda por categoría y precio.
- **Carrito de Compras y Checkout:** Gestión completa del proceso de selección y compra de joyas.
- **Panel de Usuario (Mi Cuenta):**
  - Edición de información personal y seguridad (gestión de contraseñas).
  - Historial de pedidos con detalle desplegable de las joyas adquiridas en cada compra.
  - Lista de deseos para guardar las piezas favoritas.
- **Contacto:** Formulario para enviar consultas directamente a la administración.

### 🛡️ Módulo Administrador (Panel de Control)
- **Dashboard Interactivo:** Resumen en tiempo real de la actividad comercial con gráficos (Chart.js) que muestran ventas por categoría, pedidos pendientes, ticket medio y cotización estática de metales.
- **Gestión de Productos:** ABM (Alta, Baja y Modificación) de joyas, control de stock mínimo y categorías.
- **Gestión de Pedidos:** Listado de órdenes, visualización de detalles y actualización rápida de estados de envío.
- **Gestión de Usuarios y Roles:** Administración integral de las cuentas registradas en el sistema.
- **Bandeja de Consultas:** Lectura, gestión y seguimiento de los mensajes enviados por visitantes y clientes.

---

## 🛠️ Tecnologías Utilizadas

- **Backend:** PHP / Framework Laravel
- **Frontend:** HTML5, CSS3, Blade Templating, JavaScript, Bootstrap 5.
- **Gráficos:** Chart.js para el panel estadístico.
- **Base de Datos:** Estructurada a través de migraciones y seeders propios de Laravel.

---

## 🚀 Instalación y Configuración Local

Para clonar y ejecutar este proyecto en un entorno local, es necesario contar con **Git**, **Composer**, **Node.js** y un entorno como **Laravel Herd** o XAMPP.

1. **Clonar el repositorio:**
   ```bash
   git clone [https://github.com/le4guilar/proyecto_integrador_joyeria.git](https://github.com/le4guilar/proyecto_integrador_joyeria.git)
   cd proyecto_integrador_joyeria

2. **Instalar dependencias:**
    ```bash
        composer install
        npm install

3. **Configurar las variables de entorno:**
    Duplicá el archivo .env.example y renombralo a .env.
        Configurá las credenciales de tu base de datos local dentro de este nuevo archivo.

4. **Generar la clave de la aplicación:**
    ```bash
        php artisan key:generate

5. **Migrar y poblar la base de datos:**
    ```bash
        php artisan migrate --seed

6. **Compilar los assets del frontend:**
    ```bash
        npm run dev

7. **Levantar el servidor local (Si no usás Herd):**
    ```bash
        php artisan serve

👥 Desarrolladores

    Aguilar, Leandro Martin

    Demetri, Luciana Itati

Facultad de Ciencias Exactas y Naturales y Agrimensura (FaCENA) - UNNE.
