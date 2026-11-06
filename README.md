# Blog

A Laravel 13 blog project based on the structure and functionality of the
[teacher's reference project](https://github.com/Kasparsu/ta24ablog).

## Local setup

Requirements: PHP 8.3 or later, Composer, Node.js, npm, and Docker Compose.

```bash
docker compose up -d
composer setup
php artisan serve
```

MariaDB is available on `127.0.0.1:33062`. The local database credentials are
configured in `.env.example`.

## Authentication

Laravel Breeze's Blade stack provides registration at `/register`, login at
`/login`, and logout from the authenticated navigation. Authenticated users are
sent to `/dashboard`; email verification is required to access it.
