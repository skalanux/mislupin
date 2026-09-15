# Mis Lupins

Sitio histórico de intercambio de revistas (PHP 7.4 + MySQL 5.5), corriendo en Docker.

La app original corría en PHP 5.4 con la extensión `mysql_*` (eliminada en PHP 7).
La migración fue mínima: las funciones `mysql_*` se emulan sobre `mysqli` en
`app/funciones/conectar.php` (sin tocar ninguna query de la app) y los archivos
con etiqueta corta `<?` se cubren activando `short_open_tag` en el arranque.

## Requisitos

- Docker con Compose v2 (o docker-compose v1)
- Arquitectura x86_64 (la imagen `mysql:5.5` no tiene builds ARM)

## Puesta en marcha

1. **Restaurar la base de datos** desde el backup 

   ```sh
   tar xzf backup.tar.gz --strip-components=1 -C . mislupins/db
   ```

2. **Configurar credenciales**:

   ```sh
   cp .env.example .env
   # editar .env con los valores que correspondan
   ```

   El `.env` alimenta tanto a `docker-compose.yml` (creación del usuario de MySQL)
   como a la app PHP (`app/funciones/conectar.php` lee las variables con `getenv`).

3. **Levantar el stack**:

   ```sh
   docker compose up -d --build
   ```

   Nota: `docker-compose.yml` referencia la red externa `proxy` (traefik) y publica el
   puerto 80. Para correr localmente sin traefik, comentar los labels de traefik y
   quitar `proxy` de `networks`.

## Variables de entorno

| Variable         | Uso                                   | Default        |
|------------------|---------------------------------------|----------------|
| `DB_HOST`        | Host de MySQL visto desde la app PHP  | `db`           |
| `DB_NAME`        | Nombre de la base                     | `mislupins`    |
| `DB_USER`        | Usuario de la base                    | `mislupins`    |
| `DB_PASS`        | Password del usuario                  | `mislupins`    |
| `DB_ROOT_PASS`   | Password de root de MySQL             | `mislupinsroot`|

Los defaults reproducen la configuración histórica para que el sitio siga funcionando
sin cambios; en producción, definir valores propios en `.env` (ver `.env.example`).
