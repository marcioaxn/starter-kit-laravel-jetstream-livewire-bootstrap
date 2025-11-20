<p align="center">
  <a href="https://laravel.com" target="_blank" rel="noopener noreferrer">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="320" alt="Laravel">
  </a>
</p>

# Base Project - Laravel 12 + Jetstream (Livewire) + Bootstrap 5

Opinionated starter kit for Laravel applications with Jetstream/Livewire authentication, Bootstrap 5-based interface, and ready-to-use tooling for local development.

## Core Stack
- Backend: Laravel 12, Jetstream, Livewire 3, Sanctum, Spatie HTML
- Frontend: Bootstrap 5.3 (SCSS via Vite), Bootstrap Icons, Alpine.js, Alpine Mask, Sortable.js
- Tooling: Vite, Axios, Concurrently, Pest/PHPUnit
- Database: PostgreSQL with UUID primary keys (`users`, `sessions`, `personal_access_tokens`)

## Prerequisites
- PHP 8.2+
- Composer 2.x
- Node.js 20 LTS (npm 10+) - also works with Node 18, but we recommend 20.x for new environments
- PostgreSQL 13+ database (adjust `.env` according to your environment)

## Getting Started
```bash
# Clone and access the project
git clone <your-fork-or-repo> base-project
cd base-project

# PHP dependencies
composer install

# .env file and application key
cp .env.example .env
php artisan key:generate

# Adjust .env for your database and run migrations
php artisan migrate --seed

# Frontend dependencies and initial build
npm install
npm run build   # or npm run dev for HMR mode
```

> Tip: The `php artisan migrate --seed` command creates the default user (`user_adm@user_adm.com` / `1352@765@1452`) and populates 25 demo leads. For storage resources (avatars, etc.), run `php artisan storage:link`.

## Useful Commands
- `php artisan serve` - local HTTP server
- `npm run dev` - Vite with hot reload
- `npm run build` - production build
- `composer run dev` - supervisor that starts `php artisan serve`, `queue:listen`, and `npm run dev` in parallel
- `composer test` - test suite (Pest) **(optional automated execution; not a requirement of this starter kit)**

## Frontend Structure
- `resources/scss/app.scss` - Bootstrap entry point and utility styles
- `resources/js/bootstrap.js` - Axios initialization and Bootstrap bundle
- `resources/js/app.js` - main JS loading point
- `vite.config.js` - compiles `app.scss` and `app.js` via Laravel Vite Plugin

## Adapted Jetstream + Livewire
- Navigation, dropdowns, forms, and modals rewritten with Bootstrap classes
- Reusable components (`x-form-section`, `x-action-section`, `x-modal`, `x-banner`, buttons, etc.) with no Tailwind remnants
- Profile pages, API tokens, terms, and privacy policy already migrated to Bootstrap
- Ready-to-use Leads CRUD (Livewire + Bootstrap) with reactive filters, CSV export, and create/edit/delete modals

## Suggested Next Steps
1. Review `.env` for email, queues, and cache (Redis, if desired)
2. Run `php artisan storage:link` to enable avatar uploads
3. Adjust seeders/factories according to your project domain (keeping the default user if useful)
4. Configure deployment/CI according to your pipeline (no requirement to run automated suites)
5. If you opt for automated testing, enable it manually (not executed by default in this starter kit)

## Why Use UUID as Primary Key?
- Reduces predictability: prevents sequential IDs from exposing data volume or allowing simple enumeration
- Facilitates multi-tenant integration: data can be merged between environments without collision risk
- Supports distributed workloads: each instance can generate keys locally without additional coordination
- Sessions and personal access tokens use the same format, simplifying caches/queues and audits

## License
Project distributed under the [MIT](LICENSE) license.  
Author: Marcio Alessandro Xavier Neto.  
This Starter Kit was produced with AI assistance (Codex GPT-5).