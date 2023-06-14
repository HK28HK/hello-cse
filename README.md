# Installation

## Prerequisite

-   Composer
-   Docker (optional)

## Composer

Install dependencies

```
composer install
```

## Sail

Run the container

```
composer sail

# OR
./vendor/bin/sail up -d
```

## Database

Install the database

```
composer fresh

# OR
./vendor/bin/sail artisan migrate:fresh --seed
```

## File system

Make storage the directory public

```
./vendor/bin/sail artisan storage:link
```
