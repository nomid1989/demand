# Help

## Requirements
- ### For Linux|Mac
    - Docker
    - Make
    - ## How to init
        - copy `.env.example` to `.env`
        - change the line `SPA_AUTH` in the `docker-compose.yml` file to the `name of your application`
        - make `up`
        - ./sail `composer install`
        - ./sail `artisan key:generate`
        - ./sail `artisan migrate`

    - ## How to run
        - make `up`
    - ## How to down
        - make `down`
