# Profile Web Prof Noor

Aplikasi **Academic Profile Management System** untuk membangun website
profil profesional seorang profesor dengan pendekatan modern berbasis:

- Laravel 12
- Inertia.js 2
- React 19
- TypeScript
- Tailwind CSS 4
- MySQL
- Laravel Filament 4 (Admin Panel)

## Overview

Project ini dikembangkan sebagai platform digital untuk mengelola dan
menampilkan informasi akademik profesor secara profesional, meliputi:

- Profil akademik
- Riwayat penelitian
- Publikasi ilmiah
- Mata kuliah
- Program pengabdian masyarakat
- Konten akademik melalui dashboard administrator

Arsitektur menggunakan pendekatan **Laravel Domain Driven Structure**
dengan pemisahan modul berdasarkan domain bisnis.

## Technology Stack

### Backend

- Laravel 12
- PHP 8.2+
- MySQL Database
- Laravel Eloquent ORM
- Laravel Routing
- Laravel Controllers

### Frontend

- React 19
- Inertia.js
- TypeScript
- Tailwind CSS
- Vite

### Administration

- Laravel Filament 4
- Filament Resources
- Dashboard Management

## Project Architecture

profile-web-profnoor
│
├── app
│ │
│ ├── Domains
│ │ │
│ │ ├── Profile
│ │ │ ├── Actions
│ │ │ │ └── UpsertProfileAction.php
│ │ │ ├── Controllers
│ │ │ │ └── ProfileController.php
│ │ │ ├── Models
│ │ │ │ └── Profile.php
│ │ │ ├── Requests
│ │ │ │ └── StoreProfileRequest.php
│ │ │ ├── Resources
│ │ │ │ └── ProfileResource.php
│ │ │ └── Services
│ │ │ └── ProfileService.php
│ │ │
│ │ ├── Research
│ │ │ ├── Actions
│ │ │ ├── Controllers
│ │ │ ├── Models
│ │ │ ├── Requests
│ │ │ ├── Resources
│ │ │ └── Services
│ │ │
│ │ ├── Course
│ │ │ ├── Actions
│ │ │ ├── Controllers
│ │ │ ├── Models
│ │ │ ├── Requests
│ │ │ ├── Resources
│ │ │ └── Services
│ │ │
│ │ ├── Outreach
│ │ │ ├── Actions
│ │ │ ├── Controllers
│ │ │ ├── Models
│ │ │ ├── Requests
│ │ │ ├── Resources
│ │ │ └── Services
│ │ │
│ │ ├── CMS
│ │ │ ├── Actions
│ │ │ ├── Controllers
│ │ │ ├── Models
│ │ │ ├── Requests
│ │ │ ├── Resources
│ │ │ └── Services
│ │ │
│ │ ├── Media
│ │ ├── Actions
│ │ ├── Controllers
│ │ ├── Models
│ │ ├── Requests
│ │ ├── Resources
│ │ └── Services
│ │
│ └── Providers
│
│
├── bootstrap
│
│
├── config
│ ├── app.php
│ ├── auth.php
│ ├── database.php
│ ├── filament-admin.php
│ ├── filesystems.php
│ ├── inertia.php
│ └── queue.php
│
│
├── database
│ │
│ ├── migrations
│ │ ├── create_users_table.php
│ │ ├── create_profiles_table.php
│ │ ├── create_research_and_publications_tables.php
│ │ ├── create_courses_table.php
│ │ ├── create_outreach_programs_table.php
│ │ ├── create_media_consultations_and_content_tables.php
│ │ └── create_settings_table.php
│ │
│ ├── factories
│ │ └── ProfileFactory.php
│ │
│ └── seeders
│ └── DatabaseSeeder.php
│
│
├── public
│ ├── build
│ ├── images
│ └── favicon
│
│
├── resources
│ │
│ ├── css
│ │ └── app.css
│ │
│ ├── images
│ │
│ └── js
│ │
│ ├── Components
│ │ └── UI
│ │ ├── Button.tsx
│ │ ├── Card.tsx
│ │ ├── Badge.tsx
│ │ ├── Modal.tsx
│ │ └── ListingCard.tsx
│ │
│ ├── Features
│ │ │
│ │ ├── Profile
│ │ │ ├── components
│ │ │ │ ├── Hero.tsx
│ │ │ │ ├── Biography.tsx
│ │ │ │ └── SectionHeading.tsx
│ │ │ └── types.ts
│ │ │
│ │ ├── Research
│ │ │ ├── components
│ │ │ │ ├── ResearchCard.tsx
│ │ │ │ ├── ResearchList.tsx
│ │ │ │ └── ResearchSection.tsx
│ │ │ ├── services
│ │ │ └── types.ts
│ │ │
│ │ ├── Courses
│ │ │ ├── components
│ │ │ │ ├── CourseCard.tsx
│ │ │ │ ├── CourseList.tsx
│ │ │ │ └── CoursesSection.tsx
│ │ │ ├── services
│ │ │ └── types.ts
│ │ │
│ │ ├── Outreach
│ │ │ ├── components
│ │ │ │ ├── OutreachCard.tsx
│ │ │ │ ├── OutreachList.tsx
│ │ │ │ └── OutreachSection.tsx
│ │ │ └── services
│ │ │
│ │ └── CMS
│ │ ├── components
│ │ ├── services
│ │ └── types.ts
│ │
│ ├── Layouts
│ │ ├── Navbar.tsx
│ │ ├── Footer.tsx
│ │ ├── PageLayout.tsx
│ │ └── FeaturePageLayout.tsx
│ │
│ ├── Pages
│ │ ├── HomePage.tsx
│ │ ├── ResearchPage.tsx
│ │ ├── ResearchDetailPage.tsx
│ │ ├── CoursesPage.tsx
│ │ └── OutreachPage.tsx
│ │
│ ├── hooks
│ │
│ ├── data
│ │ └── mocks
│ │
│ └── app.tsx
│
│
├── routes
│ ├── web.php
│ ├── api.php
│ ├── admin.php
│ └── console.php
│
│
├── storage
│
├── tests
│
├── vendor
│
├── package.json
├── composer.json
├── vite.config.ts
├── tailwind.config.js
├── tsconfig.json
└── README.md

## Implemented Features

## 1. Academic Profile Management

Implemented profile management system:

- Data profesor
- Informasi akademik
- Profil utama website
- Landing page profesional

Route:

    GET /

## 2. Research and Publication Module

Research module manages:

- Research projects
- Scientific publications
- Research detail page
- SEO-friendly slug URL

Routes:

    GET /riset
    GET /riset/{slug}

Components:

- Research listing page
- Research detail page

## 3. Course Management

Academic teaching module:

- List mata kuliah
- Detail informasi pembelajaran
- Course presentation page

Route:

    GET /mata-kuliah

## 4. Community Service Module

Pengabdian module:

- Community service programs
- Academic contribution documentation

Route:

    GET /pengabdian

## 5. Admin Panel

Using Laravel Filament:

Administrator can manage:

- Profile data
- Research data
- Publications
- Courses
- Outreach programs
- Website settings

## Database Design

Main tables:

- profiles
- research_and_publications
- courses
- outreach_programs
- settings
- users

Database migration is structured for scalable academic content
management.

## Development Setup

Install dependencies:

```bash
composer install

pnpm install
```

Configure environment:

```bash
cp .env.example .env

php artisan key:generate
```

Run migration:

```bash
php artisan migrate
```

Start development:

```bash
composer dev
```

or:

```bash
php artisan serve
pnpm dev
```

## Commit Convention

Recommended Git convention:

    feat:
    new functionality

    fix:
    bug fixing

    refactor:
    code improvement

    style:
    UI changes

    docs:
    documentation update

    chore:
    configuration changes

## Current Development Status

Completed:

- Laravel + Inertia + React integration
- TypeScript frontend structure
- Tailwind styling system
- Domain-based backend organization
- Academic profile page
- Research module
- Course module
- Outreach module
- Filament admin foundation
- Database migration structure

## Future Development

Potential improvements:

- Authentication and role management
- Media library management
- Publication DOI integration
- Google Scholar synchronization
- SEO optimization
- Website analytics dashboard
- Multi-language support

## License

MIT License
