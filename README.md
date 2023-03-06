# Landing Legalchain

Landing de una aplicación PWA.

**DEMO** &#x279c; [https://legalchain-demo.netlify.app/](https://legalchain-demo.netlify.app/)

## Preparar Entorno

- Instalar LAMP (Apache, MySql, PHP) en el entorno del servidor.
  1. En Windows puede instalar [XAMPP](https://www.apachefriends.org/es/index.html)
  2. En Linux puede seguir esta guía: [Instalar LAMP en entorno Linux](https://gist.github.com/EdixonAlberto/0c95d228896c1893cfbcd6d237475aaf)

- Clonar este repositorio en la ruta [C:/xampp/htdocs](C:\xampp\htdocs) (Windows) o [/var/www/html](/var/www/html) (Linux)

- Crear desde apache un virtual host en la ruta `${SERVER_ROOT}/wp-landing-legalchain`, se comparte un código de ejemplo en [httpd-vhost-example.conf](./docs/httpd-vhost-example.conf)

- Modificar el host del servidor para agregar el nuevo dominio `legalchain.com`
```sh
127.0.0.1     legalchain.com
```

- Iniciar `phpMyAdmin` para restaurar la base de datos importando el siguiente archivo [legalchain_db.sql](./docs/legalchain_db.sql)

- Ingresar desde el navegador a la ruta [http://legalchain.com/wp-admin](http://legalchain.com/wp-admin) para iniciar sesión en el CMS con las siguientes credenciales:
```sh
# Usuario:    admin
# Contraseña: Rhi3lFj6rJk(kHzYet
```

## Editar Landing (Desarrollo)

1. Usar WordPress

Ir a la sección `Páginas` y usar el editor de `Elementor` en  WordPress para editar la página.

## Visualización

![template](./docs/template.png)
