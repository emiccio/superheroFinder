## Ambiente de desarrollo local

* Clonar el repositorio

```sh
    git clone https://github.com/emiccio/superheroFinder.git
```

* Para correr localmente, se necesita crear la base de datos

```sh
    Renombrar el archivo .env.example a .env
    Configurar el archivo .env con los valores correctos para la conexcion con la BD
```



```sh
    composer install -n
    composer dump-autoload
    php artisan key:generate
    php artisan cache:clear
    php artisan config:clear
    php artisan config:cache
    php artisan view:clear
    php artisan migrate
```

## Endpoits disponibles

- Para llenar la BD con la informacion proporcionada en el csv
```
    GET /api/superhero
``` 


```json
    - Ejemplo de respuesta
    {
        "success": true,
        "message": "Updated the list of Superheroes."
    }
```


- Buscador de super heroes
```
    GET /api/superhero

    - Ejemplo
    GET /api/superhero?name=A-Bomb
```

```
    Parametros disponibles para utilizar en la consulta

    | Parameter     | Type     |
    | ---------     | -------- |
    | `id`          | `number` |
    | `name`        | `string` |
    | `fullname`    | `string` |
    | `strength`    | `number` |
    | `speed`       | `number` |
    | `durability`  | `number` |
    | `power`       | `number` |
    | `combat`      | `number` |
    | `race`        | `string` |
    | `height0`     | `string` |
    | `height1`     | `string` |
    | `weight0`     | `string` |
    | `weight1`     | `string` |
    | `eyecolor`    | `string` |
    | `haircolor`   | `string` |
    | `publisher`   | `string` |

```

```json
    - Ejemplo de respuesta
    {
        "success": true,
        "message": "Superheros found: 1",
        "data": {
            "superheros": {
                "current_page": 1,
                "data": [
                    {
                        "id": 1,
                        "external_id": 1,
                        "name": "A-Bomb",
                        "fullName": "Richard Milhouse Jones",
                        "strength": 100,
                        "speed": 17,
                        "durability": 80,
                        "power": 24,
                        "combat": 64,
                        "race": "Human",
                        "height_0": "6'8",
                        "height_1": "203 cm",
                        "weight_0": "980 lb",
                        "weight_1": "441 kg",
                        "eyeColor": "Yellow",
                        "hairColor": "No Hair",
                        "publisher": "Marvel Comics",
                        "created_at": "2022-12-27T23:00:54.000000Z",
                        "updated_at": "2022-12-27T23:00:54.000000Z"
                    }
                ],
                "first_page_url": "http://localhost:8000/api/superhero?page=1",
                "from": 1,
                "last_page": 1,
                "last_page_url": "http://localhost:8000/api/superhero?page=1",
                "next_page_url": null,
                "path": "http://localhost:8000/api/superhero",
                "per_page": 7,
                "prev_page_url": null,
                "to": 1,
                "total": 1
            }
        }
    }
```
