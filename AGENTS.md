# academic-profile

Laravel + Inertia.js + React + TypeScript + Tailwind CSS application.

## Project Structure

- `app/Domains/` - Backend domain modules with models, services, actions,
  controllers, requests, and resources.
- `resources/js/Pages/` - Inertia page entrypoints.
- `resources/js/Features/` - Domain-oriented React features.
- `resources/js/Components/` - Shared React UI components.
- `resources/js/Layouts/` - Shared page layouts.
- `resources/css/app.css` - Global CSS and Tailwind CSS v4 import.
- `resources/views/app.blade.php` - Inertia root Blade view.
- `routes/` - Public web, admin, API, and console routes.
- `database/` - Migrations, factories, seeders, and SQLite database.
- `public/assets/` - Static design assets.

## Development

Install and initialize the project with:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
pnpm install
```

Run the Laravel, queue, and Vite processes with `composer dev`.

## Verification

- Frontend typecheck: `pnpm exec tsc --noEmit`
- Frontend build: `pnpm build`
- Backend tests: `php artisan test`
- PHP formatting: `vendor/bin/pint`
- Frontend formatting: `pnpm format`

## Conventions

- Keep backend business logic inside the corresponding `app/Domains` module.
- Keep Inertia page components thin and compose UI from `Features`, `Layouts`,
  and `Components`.
- Access backend data through domain services and pass it to React through
  Inertia props.
- Use the `@/` alias for imports rooted at `resources/js`.
- Export React components as default exports.
