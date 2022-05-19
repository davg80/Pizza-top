# Pizza-top


## API PLATFORM
## Install de l'application

```
symfony new app-pizza
```

## Directory
```
cd app-pizza
```

## Install api platform
```
symfony composer require api
```

##  Server
```
symfony serve
```

## Localhost
```
http://127.0.0.1:8000/api/
```

## dependencies:
```
composer require orm
composer require migrations
composer require --dev make
composer require --dev orm-fixtures
composer require fakerphp/faker
composer require --dev test
```

## Script composer.json drop and create database, migrate migrations and load fixtures
```
composer prepare
```

## Server Symfony
```
cd api-pizza
symfony serve

```

# FRONT APP

## Install vue CLI
```
npm install -g @vue/cli
```

## new project
```
vue create app-pizza
cd app-pizza
```

## Server Vuejs
```
npm run serve

```

## Dependencies Vuejs
```
npm add vue-router vuex
npm install axios --save

```

## Format error eslint
```
npm run format

```

