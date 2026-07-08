# Administración Municipal

## Inicio rápido

1. Crear la base de datos y cargar el esquema:
   ```bash
   mysql -u root -p -e "CREATE DATABASE municipio CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
   mysql -u root -p municipio < "base de datos/schema.sql"
   ```
2. Ajustar las variables de entorno si la conexión no es la predeterminada:
   ```bash
   export DB_HOST=127.0.0.1
   export DB_NAME=municipio
   export DB_USER=root
   export DB_PASS=""
   ```
3. Iniciar el servidor PHP:
   ```bash
   php -S 0.0.0.0:8000 -t .
   ```
4. Abrir `http://localhost:8000` (muestra primero el login).

## Usuario inicial (super user)

- **RUT:** `9.999.999-9`
- **Contraseña:** `SuperUser123!`

> Este usuario se inserta al ejecutar el esquema SQL incluido en `base de datos/schema.sql`.

## Uso con XAMPP

Si el proyecto está copiado en:

```text
/Applications/XAMPP/xamppfiles/htdocs/muni
```

la ruta que debe abrirse en el navegador es:

```text
http://localhost/muni/auth-2-sign-in.php
```

No se debe abrir esta ruta:

```text
http://localhost/Applications/XAMPP/xamppfiles/htdocs/muni/auth-2-sign-in.php
```

Esa URL mezcla una ruta del disco (`/Applications/XAMPP/xamppfiles/htdocs`) con una ruta web. Apache intenta buscar una carpeta pública llamada `Applications` dentro de `htdocs` y responde `Error 404` antes de que PHP cargue el proyecto, por lo que la aplicación no puede redirigir ese error desde `bootstrap.php`.

Para evitar que el navegador conserve la URL incorrecta:

1. Escribir manualmente `http://localhost/muni/auth-2-sign-in.php` en la barra del navegador.
2. Borrar el autocompletado/historial de la URL incorrecta si el navegador la vuelve a sugerir.
3. Verificar que la carpeta del proyecto se llame exactamente `muni` y esté directamente dentro de `htdocs`.
