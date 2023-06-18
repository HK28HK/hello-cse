# HelloCSE × HOARAU Killian

# Installation

## Prerequisite

-   Composer
-   Docker (running)
-   Npm

## Composer

Install dependencies

```
composer install
```

## Quick installation

> For the seak of this demo only, the next command will run sail up, run migrations, create a storage link and run npm build.

```
composer demo
```

---

## Or manual installation

### Sail

Run the container

```
composer sail

# OR
./vendor/bin/sail up -d
```

### Database

Install the database

```
composer fresh

# OR
./vendor/bin/sail artisan migrate:fresh --seed
```

### File system

Make storage the directory public

```
./vendor/bin/sail artisan storage:link
```

### Front

Build the front

```
npm run build
```

# Work informations

**Time spent:** ~ 8 hours

**Technologies used:**

-   Laravel 9
-   SCSS
-   Vue 3
-   Inertia

**Hardest point:** Fundamental difference in responsive

**Could be improved:**

-   Improve Backoffice design
-   Add authentification
-   Setup a better SCSS/CSS base
-   Add Transitions

<!-- **Requests to chatGPT** : 0 -->
