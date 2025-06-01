# 🍺 Cervecería INTI 🍺

[![Estado](https://img.shields.io/badge/Estado-En%20Desarrollo-yellow)](https://github.com/username/Inti)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)](https://www.php.net/)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat&logo=html5&logoColor=white)](https://developer.mozilla.org/es/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat&logo=css3&logoColor=white)](https://developer.mozilla.org/es/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black)](https://developer.mozilla.org/es/docs/Web/JavaScript)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=flat&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![jQuery](https://img.shields.io/badge/jQuery-0769AD?style=flat&logo=jquery&logoColor=white)](https://jquery.com/)
[![Licencia](https://img.shields.io/badge/Licencia-MIT-blue.svg)](LICENSE)

## 📋 Descripción del Proyecto

**Cervecería INTI** es una plataforma web completa para una cervecería artesanal que integra funcionalidades de e-commerce. El sitio permite a los usuarios explorar la variedad de productos de la cervecería, conocer sobre el proceso de elaboración, realizar compras en línea y gestionar sus cuentas de usuario. Para los administradores, ofrece un panel de control completo para gestionar productos, inventario, usuarios y ventas.

Esta aplicación web está desarrollada con PHP en el backend utilizando un patrón de diseño de plantillas, y con HTML, CSS y JavaScript para el frontend, aprovechando bibliotecas populares como Bootstrap y jQuery para ofrecer una experiencia de usuario atractiva y responsive.

## 🚀 Objetivos del Proyecto

- **Comercio Electrónico**: Implementar un sistema completo de e-commerce con catálogo de productos, carrito de compras y proceso de pago seguro para la venta de cervezas artesanales.
  
- **Experiencia de Usuario**: Desarrollar una interfaz atractiva, intuitiva y responsive que brinde una excelente experiencia a los usuarios en diferentes dispositivos.
  
- **Gestión de Contenidos**: Proporcionar un sistema de administración que permita actualizar fácilmente los productos, información de la cervecería y gestionar pedidos sin necesidad de conocimientos técnicos.
  
- **Optimización SEO**: Implementar mejores prácticas de SEO para mejorar la visibilidad del sitio en los motores de búsqueda y aumentar el tráfico orgánico.
  
- **Escalabilidad**: Crear una arquitectura modular y escalable que permita añadir nuevas funcionalidades en el futuro sin necesidad de reestructurar el proyecto.

## 📁 Estructura del Proyecto

```
Inti/
│
├── .vscode/                  # Configuración de Visual Studio Code
├── Acciones/                 # Controladores y lógica de negocio
│   ├── AccionesAdmin.php     # Funciones para administración
│   ├── AccionesProductos.php # Gestión de productos
│   └── Rest.php              # API REST
│
├── Paginas/                  # Vistas y páginas del sitio
│   ├── Compras.php           # Página de compras
│   ├── Contacto.php          # Página de contacto
│   ├── Cuenta.php            # Gestión de cuenta de usuario
│   ├── Logeo.php             # Inicio de sesión
│   ├── Nosotros.php          # Información sobre la cervecería
│   ├── Productos.php         # Catálogo de productos
│   ├── Tienda.php            # Tienda en línea
│   └── ...                   # Otras páginas
│
├── Patrones/                 # Implementación de patrones de diseño
│   └── Template/             # Patrón de plantillas
│
├── Recursos/                 # Recursos estáticos
│   ├── CSS/                  # Hojas de estilo
│   ├── Imagenes/             # Imágenes y multimedia
│   └── JS/                   # Scripts de JavaScript
│
├── vendor/                   # Dependencias de terceros
│
├── Admin.php                 # Punto de entrada para administración
└── index.php                 # Punto de entrada principal
```

## 💻 Tecnologías Utilizadas

- **Backend**:
  - PHP 7.4+
  - Patrón de diseño Template

- **Frontend**:
  - HTML5
  - CSS3
  - JavaScript
  - Bootstrap 4
  - jQuery
  - Font Awesome
  - LineIcons
  - Owl Carousel
  - Google Fonts

- **Herramientas de Desarrollo**:
  - Visual Studio Code
  - Git y GitHub para control de versiones

## ⚙️ Instalación

1. Clona este repositorio:
   ```bash
   git clone https://github.com/Dallex-MT/Inti.git
   ```

2. Navega al directorio del proyecto:
   ```bash
   cd Inti
   ```

3. Configura un servidor web local (como Apache) y asegúrate de que PHP esté instalado y configurado correctamente.

4. Si estás utilizando XAMPP, WAMP o similar, coloca el proyecto en el directorio adecuado (por ejemplo, `htdocs` para XAMPP):
   ```bash
   # Para XAMPP (Windows)
   xcopy /E /I Inti C:\xampp\htdocs\Inti
   
   # Para XAMPP (Linux/Mac)
   cp -R Inti /opt/lampp/htdocs/
   ```

5. Importa la base de datos (si existe un archivo SQL):
   ```bash
   # Suponiendo que tienes MySQL instalado
   mysql -u usuario -p nombre_base_de_datos < ruta/al/archivo.sql
   ```

6. Configura los parámetros de conexión a la base de datos (si es necesario) en el archivo de configuración correspondiente.

## 🔍 Uso

Para visualizar y trabajar con el proyecto localmente:

1. Inicia tu servidor web local (Apache, etc.)

2. Abre tu navegador y navega a la URL local:
   ```
   http://localhost/Inti/
   ```

3. Para acceder al panel de administración:
   ```
   http://localhost/Inti/Admin.php
   ```

4. Explora las diferentes secciones del sitio:
   - Catálogo de productos
   - Tienda en línea
   - Información sobre la cervecería
   - Cuenta de usuario

## 🤝 Cómo Contribuir

Si deseas contribuir a este proyecto, sigue estos pasos:

1. Haz un Fork del repositorio
   
2. Crea una rama para tu funcionalidad:
   ```bash
   git checkout -b feature/nueva-funcionalidad
   ```

3. Realiza tus cambios y asegúrate de seguir las convenciones de código del proyecto

4. Haz commit de tus cambios:
   ```bash
   git commit -m "Añadir: nueva funcionalidad para XYZ"
   ```

5. Sube los cambios a tu repositorio:
   ```bash
   git push origin feature/nueva-funcionalidad
   ```

6. Crea un Pull Request en GitHub

7. Espera la revisión y aprobación de tus cambios

## 📝 Historial de Cambios

- **v1.1.0** (25/05/2025):
  - Implementación del carrito de compras
  - Mejoras en la interfaz de usuario
  - Optimización de rendimiento
  - Corrección de errores menores

- **v1.0.0** (15/04/2025):
  - Lanzamiento inicial
  - Catálogo de productos básico
  - Sistema de autenticación de usuarios
  - Panel de administración

## 📄 Licencia

Este proyecto está bajo la Licencia MIT - consulta el archivo [LICENSE](LICENSE) para más detalles.

## 👨‍💻 Créditos

Desarrollado con ❤️ por DXM y el equipo de Cervecería INTI.

---

⭐️ **Nota**: Este proyecto ha sido desarrollado con fines educativos y como demostración de habilidades en desarrollo web. No es un sitio comercial real. ⭐️

