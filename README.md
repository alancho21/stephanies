# ☕ Stephanies - Sistema Integral de Gestión para Cafetería

Plataforma web Full-Stack desarrollada en **PHP con el framework Laravel**, diseñada para digitalizar y optimizar las operaciones de una cafetería local. El sistema maneja múltiples perfiles de usuario, permitiendo un control preciso desde la toma de órdenes hasta la preparación y cobro.

### 🚀 Características y Módulos Principales
- **Sistema de Roles:** Acceso y vistas diferenciadas para **Administradores**, **Cajeros** y **Chefs**, controlados mediante Middlewares.
- **Gestión de Órdenes (POS):** Módulo para que los cajeros ingresen pedidos, calculen totales y registren ventas.
- **Módulo de Cocina (Chefs):** Interfaz dedicada para que el personal de cocina visualice los pedidos pendientes en tiempo real y cambie sus estados.
- **Control de Inventario:** Gestión de productos, categorías y control de stock integrado con el módulo de ventas.
- **Arquitectura de Base de Datos:** Base de datos relacional robusta (MySQL), construida mediante `Migrations`, con relaciones complejas entre Usuarios, Órdenes, Detalles de Órdenes y Productos.

### 🧑‍💻 Mi Aportación (Desarrollo)
En este proyecto apliqué mis conocimientos de arquitectura MVC para:
- Diseñar y ejecutar las migraciones y relaciones (Eloquent ORM) de la base de datos.
- Desarrollar los controladores (`Controllers`) con la lógica de negocio para cada perfil.
- Construir interfaces dinámicas de usuario utilizando el motor de plantillas **Blade** y estilos CSS personalizados (`cssStyles`).
- Implementar validaciones de seguridad mediante `FormRequests`.

### 🛠️ Stack Tecnológico
- **Backend:** PHP 8, Laravel Framework.
- **Base de Datos:** MySQL, Eloquent ORM.
- **Frontend:** Laravel Blade, CSS3, JavaScript.
- **Herramientas:** Composer, Vite.
