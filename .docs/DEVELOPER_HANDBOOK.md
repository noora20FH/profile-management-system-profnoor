# 📘 Developer Handbook — profile-web-profnoor

**Versi:** 1.0
**Fokus:** Alur file & troubleshooting
**Audience:** Programmer baru yang akan maintenance project ini

---

## Daftar Isi

1. [Cara Baca Handbook Ini](#1-cara-baca-handbook-ini)
2. [Satu Request, dari Browser Sampai Render](#2-satu-request-dari-browser-sampai-render)
3. [Peta File Backend](#3-peta-file-backend)
4. [Peta File Frontend](#4-peta-file-frontend)
5. [Korelasi Backend ↔ Frontend](#5-korelasi-backend--frontend)
6. [Aturan Sinkronisasi Tiga File](#6-aturan-sinkronisasi-tiga-file)
7. [Troubleshooting: Kalau Error X, Cek File Ini](#7-troubleshooting-kalau-error-x-cek-file-ini)
8. [Tiga Alur Spesifik yang Paling Sering Dibutuhkan](#8-tiga-alur-spesifik-yang-paling-sering-dibutuhkan)
9. [Peta Cepat: "Mau Ubah X, Buka File Mana?"](#9-peta-cepat-mau-ubah-x-buka-file-mana)
10. [Struktur File Referensi](#10-struktur-file-referensi)
11. [Konvensi Penamaan](#11-konvensi-penamaan)
12. [Checklist Sebelum Commit](#12-checklist-sebelum-commit)
13. [Test Manual Wajib](#13-test-manual-wajib)

---

## 1. Cara Baca Handbook Ini

Handbook ini menjawab **dua pertanyaan utama**:

1. **"Kalau ada bug di X, file apa saja yang harus saya buka?"**
2. **"Data dari database sampai tampil di layar lewat file apa saja?"**

Yang **tidak** dibahas di sini (bisa menyusul):

- Filosofi Domain Driven Design
- Konfigurasi deployment
- Setup lokal dari nol
- Detail Filament admin
- Detail CMS & Media

---

## 2. Satu Request, dari Browser Sampai Render

```
User buka "/"
    │
    ▼
routes/web.php                          ← 1. Tentukan controller
    │
    ▼
ProfileController::__invoke()           ← 2. Orkestrasi semua service
    │
    ├─→ ProfileService::current()       ← 3. Ambil data profil
    ├─→ ProfileService::metrics()       ←    Ambil 3 metric statis
    ├─→ ResearchService::homepageData() ← 4. Ambil 3 research unggulan
    ├─→ CourseService::homepageData()   ←    3 course unggulan
    ├─→ OutreachService::homepageData() ←    2 outreach unggulan
    └─→ PublicationService::homepageData()
    │
    ▼
Inertia::render('HomePage', $props)     ← 5. Kirim ke React via JSON
    │
    ▼
HomePage.tsx                            ← 6. Root komponen
    │
    ├─→ Hero.tsx              (baca props.profile)
    ├─→ Biography.tsx         (baca props.profile, props.profileMetrics)
    ├─→ ResearchSection.tsx   (baca props.research)
    ├─→ CourseSection.tsx     (baca props.courses)
    ├─→ OutreachSection.tsx   (baca props.outreach)
    └─→ Footer.tsx
```

**Aturan praktis:** tiap langkah punya file terpisah. Kalau ada masalah, tentukan dulu ada di langkah mana.

---

## 3. Peta File Backend

Dari luar ke dalam:

```
routes/web.php
    │ GET "/"             → ProfileController
    │ GET "/mata-kuliah"  → CourseController
    │ GET "/penelitian"   → ResearchController
    │ GET "/pengabdian"   → OutreachController
    ▼
app/Domains/{Domain}/Controllers/{Domain}Controller.php
    │ Inject: {Domain}Service
    │ Panggil: homepageData() atau pageData()
    ▼
app/Domains/{Domain}/Services/{Domain}Service.php   ← ★ JANTUNG LOGIC
    │ Query: Eloquent Model
    │ Transform: mapping DB → array siap frontend
    │ Return: ['landing', 'assets', 'items']
    ▼
app/Domains/{Domain}/Models/{Domain}.php
    │ Definisi $fillable, $casts, relasi
    ▼
database/migrations/create_{domain}_table.php
    │ Skema kolom (is_published, is_featured, sort_order, dll)
```

### File backend yang jarang dibuka (tapi tetap ada)

| File                               | Kapan dibuka                                                              |
| ---------------------------------- | ------------------------------------------------------------------------- |
| `app/Domains/{Domain}/Actions/*`   | Saat ada logic "upsert" / "create dari admin panel"                       |
| `app/Domains/{Domain}/Requests/*`  | Saat ada bug validasi form submit                                         |
| `app/Domains/{Domain}/Resources/*` | **Di project ini umumnya tidak dipakai** — transform dilakukan di Service |

---

## 4. Peta File Frontend

Dari luar ke dalam:

```
resources/js/app.tsx
    │ Setup Inertia + resolve page component
    ▼
resources/js/Pages/HomePage.tsx
    │ Root render, komposisi semua section
    ▼
resources/js/Features/{Domain}/components/{Domain}Section.tsx
    │ Ambil data: const page = use{Domain}()
    │ Potong: page.items.slice(0, page.landing.featuredCount ?? 3)
    ▼
resources/js/Features/{Domain}/components/{Domain}List.tsx
    │ Loop: items.map(item => <{Domain}Card ... />)
    ▼
resources/js/Features/{Domain}/components/{Domain}Card.tsx   ← ★ THIN WRAPPER
    │ Susun eyebrow (mis. "IF101 • 1 2026")
    │ Delegasi ke ListingCard
    ▼
resources/js/Components/UI/ListingCard.tsx                   ← ★ SINGLE SOURCE
    │ Render: image, title, description, action link
    ▼
resources/js/Components/UI/Card.tsx
    │ <article className="listing-card"> ... </article>
```

### File frontend pendukung

| File                                   | Fungsi                                                    |
| -------------------------------------- | --------------------------------------------------------- |
| `resources/js/hooks/useCourses.ts`     | Baca props Inertia `courses` (fallback `page`)            |
| `resources/js/hooks/useResearch.ts`    | Baca props Inertia `research`                             |
| `resources/js/hooks/useOutreach.ts`    | Baca props Inertia `outreach`                             |
| `resources/js/hooks/useListingPage.ts` | Untuk halaman individual (`/mata-kuliah`, dll)            |
| `resources/js/types/common.ts`         | `ListingItem`, `ListingPageData`, `ListingType`           |
| `resources/css/app.css`                | Semua style `.listing-card`, `.courses`, `.green-section` |

---

## 5. Korelasi Backend ↔ Frontend

**Tabel paling penting untuk troubleshooting.** Kalau ada field baru atau bug data, **selalu cek pasangannya**.

| Backend                              | Frontend                                        | Field yang dipertukarkan                          |
| ------------------------------------ | ----------------------------------------------- | ------------------------------------------------- |
| `CourseService::homepageData()`      | `CourseSection.tsx` → `useCourses()`            | `items[].code`, `.term`, `.syllabus_url`          |
| `CourseService::pageData()`          | `CoursesPage.tsx` → `useListingPage('courses')` | sama + `description`, `year`                      |
| `ResearchService::homepageData()`    | `ResearchSection.tsx` → `useResearch()`         | `items[].publication_url`, `.meta`                |
| `ResearchService::pageData()`        | `ResearchPage.tsx`                              | sama                                              |
| `OutreachService::homepageData()`    | `OutreachSection.tsx` → `useOutreach()`         | `items[].impact_url`, `.video_url`, `.category`   |
| `OutreachService::pageData()`        | `OutreachPage.tsx`                              | sama                                              |
| `PublicationService::homepageData()` | (belum ada section khusus)                      | `items[].url`, `.type_label`                      |
| `ProfileService::current()`          | `Hero.tsx`, `Biography.tsx`                     | `name`, `title`, `hero_description`, `photo_path` |
| `ProfileService::metrics()`          | `Biography.tsx` (metrics)                       | `value`, `label`, `detail`                        |

---

## 6. Aturan Sinkronisasi Tiga File

Setiap kali **menambah / mengubah field**, tiga file ini **harus** diubah bersamaan:

```
[ ] Service::transform()          ← sumber data (return array)
[ ] types/common.ts ListingItem   ← kontrak TypeScript
[ ] Components/UI/ListingCard.tsx ← yang merender di UI
```

Kalau salah satu ketinggalan → bug "field undefined" atau "tidak muncul di UI".

**Contoh:**

Menambah field `credits` untuk Course:

1. `CourseService.php` → `'credits' => $course->credits,`
2. `common.ts` → `credits?: number;`
3. `ListingCard.tsx` → `<span>{item.credits} SKS</span>`

---

## 7. Troubleshooting: Kalau Error X, Cek File Ini

### 7.1 Card tidak muncul di homepage

Urutan pengecekan:

```
1. Database → cek is_published = 1, is_featured = 1, sort_order
2. app/Domains/{Domain}/Services/{Domain}Service.php
   → cek method homepageData(): ada where('is_featured')? limit(3)?
3. app/Domains/Profile/Controllers/ProfileController.php
   → cek: "courses" => $courses->homepageData(3)?
4. resources/js/hooks/useCourses.ts
   → cek: props.courses terbaca?
5. resources/js/Features/Course/components/CourseSection.tsx
   → cek: pakai page.items.slice(0, ... ?? 3)?
6. DevTools → Network → Inertia props → "courses.items"
   → kalau kosong = masalah backend
   → kalau ada isi = masalah frontend render
```

### 7.2 Teks card berwarna hitam / tidak terbaca

```
1. resources/css/app.css
   → cek .listing-card { color: var(--white) } sudah ada?
   → cek .listing-card h2, .listing-card h3 { color: var(--white) }?
2. resources/js/Components/UI/ListingCard.tsx
   → cek heading pakai <Heading> (dinamis), bukan <h2> hardcoded
```

### 7.3 Homepage tampil SEMUA item, bukan 3

```
1. resources/js/Features/{Domain}/components/{Domain}Section.tsx
   → cek: page.items.slice(0, page.landing.featuredCount ?? 3)
   → kalau tidak ada ?? 3, slice(0, undefined) = return semua
2. app/Domains/{Domain}/Services/{Domain}Service.php
   → cek homepageData(): return 'featuredCount' => $limit?
```

### 7.4 Jarak card ke tombol CTA terlalu jauh

```
1. resources/css/app.css
   → cek .listing-grid { padding-bottom: 80px } (global, untuk halaman individual)
   → cek .courses .listing-grid,
        .green-section .listing-grid { padding-bottom: 0 } ada?
2. resources/js/Features/{Domain}/components/{Domain}Section.tsx
   → cek section pakai className="courses" atau "green-section"
```

### 7.5 Klik "Hubungi Saya" tidak buka email

```
1. resources/js/Features/Profile/components/Hero.tsx
   → cek href: "#kontak" (bukan "mailto:...")
2. resources/js/Layouts/Footer.tsx
   → cek <footer id="kontak"> sudah ada?
3. resources/css/app.css
   → cek #kontak { scroll-margin-top: 80px } ada?
```

### 7.6 Halaman individual (/mata-kuliah) rusak setelah perubahan homepage

```
1. resources/css/app.css
   → cek selector tidak global: pakai ".courses .listing-grid"
     bukan ".listing-grid" tanpa prefix
2. resources/js/Layouts/FeaturePageLayout.tsx
   → cek type prop: "courses" | "research" | "outreach"
3. resources/js/hooks/useListingPage.ts
   → cek props[type] terisi dari Controller
```

### 7.7 Tambahan field baru tidak muncul di card

```
1. app/Domains/{Domain}/Services/{Domain}Service.php → transform()
   → tambahkan field di return array
2. resources/js/types/common.ts → ListingItem
   → tambahkan field yang sama di type
3. resources/js/Components/UI/ListingCard.tsx
   → render field tersebut di JSX
```

### 7.8 Nomor telepon / email di Footer salah

```
1. Database → tabel profiles → kolom email, phone
2. app/Domains/Profile/Services/ProfileService.php → current()
3. resources/js/Features/Profile/components/* (jika pakai props.profile)
4. resources/js/Layouts/Footer.tsx (jika hardcoded)
```

---

## 8. Tiga Alur Spesifik yang Paling Sering Dibutuhkan

### 8.1 Menambah item unggulan baru di homepage (tanpa ubah kode)

```
Filament admin /admin → Courses
    → is_published = true
    → is_featured = true
    → sort_order = 1, 2, atau 3
    → Save
```

Homepage otomatis update. **Tidak buka file apa pun.**

### 8.2 Mengubah label CTA "Lihat Semua Mata Kuliah"

```
app/Domains/Course/Services/CourseService.php
    → cari 'ctaLabel' => 'Lihat Semua Mata Kuliah'
    → ubah nilai
```

Hanya satu file. Frontend otomatis ikut.

### 8.3 Menambah domain baru (mis. "Book")

**Backend (5 file):**

```
app/Domains/Book/Models/Book.php
app/Domains/Book/Services/BookService.php      ← homepageData() + pageData()
app/Domains/Book/Controllers/BookController.php
database/migrations/create_books_table.php
app/Domains/Profile/Controllers/ProfileController.php
    ← tambah "book" => $books->homepageData(3)
```

**Frontend (5 file):**

```
resources/js/Features/Book/components/BookCard.tsx
resources/js/Features/Book/components/BookList.tsx
resources/js/Features/Book/components/BookSection.tsx
resources/js/hooks/useBook.ts
resources/js/types/common.ts              ← tambah "book" ke ListingType

resources/js/Pages/HomePage.tsx           ← tambah <BookSection />
```

---

## 9. Peta Cepat: "Mau Ubah X, Buka File Mana?"

| Mau ubah                          | Buka file                                            |
| --------------------------------- | ---------------------------------------------------- |
| Jumlah item unggulan homepage     | `ProfileController.php` → argumen `homepageData(N)`  |
| Urutan item homepage              | Filament admin → `sort_order`                        |
| Query data (filter / order)       | `app/Domains/{Domain}/Services/{Domain}Service.php`  |
| Label / CTA section               | `{Domain}Service.php` → array `'landing'`            |
| Warna card                        | `resources/css/app.css` → `.listing-card`            |
| Susunan elemen card               | `resources/js/Components/UI/ListingCard.tsx`         |
| Data apa saja yang muncul di card | `ListingCard.tsx` + `{Domain}Card.tsx` + `common.ts` |
| Struktur halaman individual       | `resources/js/Layouts/FeaturePageLayout.tsx`         |
| Header / Navbar                   | `resources/js/Layouts/Navbar.tsx`                    |
| Footer (email, telepon)           | `resources/js/Layouts/Footer.tsx`                    |
| Hook ambil props Inertia          | `resources/js/hooks/use{Domain}.ts`                  |
| Type shared                       | `resources/js/types/common.ts`                       |
| Route baru                        | `routes/web.php`                                     |

---

## 10. Struktur File Referensi

### Backend

```
app/Domains/{Domain}/
    ├── Controllers/{Domain}Controller.php     ← entry point
    ├── Services/{Domain}Service.php           ← ★ logic & transform
    ├── Models/{Domain}.php                    ← skema Eloquent
    ├── Requests/                              ← validasi (jarang dipakai)
    ├── Resources/                             ← tidak dipakai (transform di Service)
    └── Actions/                               ← operasi tulis (admin panel)
```

### Frontend

```
resources/js/
    ├── Pages/{Name}Page.tsx                   ← root halaman
    ├── Features/{Domain}/components/
    │   ├── {Domain}Section.tsx                ← ★ entry dari HomePage
    │   ├── {Domain}List.tsx                   ← loop items
    │   └── {Domain}Card.tsx                   ← thin wrapper
    ├── Components/UI/
    │   ├── Card.tsx                           ← primitive
    │   └── ListingCard.tsx                    ← ★ single source card UI
    ├── hooks/use{Domain}.ts                   ← baca props Inertia
    ├── types/common.ts                        ← kontrak shared
    └── Layouts/
        ├── Navbar.tsx
        ├── Footer.tsx
        └── FeaturePageLayout.tsx              ← untuk halaman individual
```

### Aturan konvensi

- Folder backend & frontend **sama** (singular PascalCase): `Course`, `Research`, `Outreach`.
- Tidak ada `Courses/` di satu tempat dan `Course/` di tempat lain.

---

## 11. Konvensi Penamaan

| Konteks               | Aturan                  | Contoh                                      |
| --------------------- | ----------------------- | ------------------------------------------- |
| Domain backend        | Singular PascalCase     | `Course`, `Research`, `Outreach`            |
| Folder fitur frontend | Singular PascalCase     | `Course`, `Research`, `Outreach`            |
| Komponen React        | PascalCase              | `CourseSection.tsx`                         |
| Hook                  | camelCase, prefix `use` | `useCourses.ts`                             |
| Service method        | camelCase               | `homepageData()`, `pageData()`              |
| CSS class             | kebab-case, BEM-like    | `.listing-card-body`                        |
| Route                 | kebab-case Indonesia    | `/mata-kuliah`, `/penelitian`               |
| DB column             | snake_case              | `is_published`, `is_featured`, `sort_order` |

---

## 12. Checklist Sebelum Commit

```
[ ] Backend: homepageData() pakai is_published + is_featured + limit
[ ] Backend: transform() dipakai oleh homepageData() DAN pageData()
[ ] Frontend: Section pakai ?? 3 sebelum slice
[ ] Frontend: Card komponen = thin wrapper, bukan markup duplikat
[ ] CSS: .listing-card self-contained (punya color sendiri)
[ ] CSS: Override homepage pakai selector ber-prefix (.courses, .green-section)
[ ] Sinkronisasi 3 file: Service::transform() + common.ts + ListingCard.tsx
[ ] Test manual: /, /mata-kuliah, /penelitian, /pengabdian
[ ] Test DB: kosongkan is_featured → homepage tampil kosong (bukan semua)
```

---

## 13. Test Manual Wajib

| #   | Skenario                                     | Ekspektasi                                          |
| --- | -------------------------------------------- | --------------------------------------------------- |
| 1   | Buka `/`                                     | Muncul 3 course, 3 research, 2 outreach unggulan    |
| 2   | Buka `/mata-kuliah`                          | Muncul SEMUA course, filter tahun berfungsi         |
| 3   | Set `is_featured = false` untuk semua course | Homepage course section kosong (bukan tampil semua) |
| 4   | Klik "Hubungi Saya" di Hero                  | Scroll ke Footer, bukan buka mail client            |
| 5   | Inspect `<h2>` / `<h3>` di card homepage     | Teks berwarna putih                                 |
| 6   | Zoom browser 200%                            | Layout tetap responsif                              |
| 7   | Buka `/penelitian` setelah ubah CSS homepage | Halaman individual TIDAK rusak                      |

---

## Lampiran A — Ringkasan Alur dalam Satu Baris

```
DB → Model → Service::transform() → Inertia props
   → use{Domain}() hook → {Domain}Section → {Domain}List
   → {Domain}Card (thin) → ListingCard → Card → CSS .listing-card
```

Hafalkan baris ini, dan Anda sudah paham 80% project.

---

## Lampiran B — File yang Paling Sering Dibuka (Cheat Sheet)

1. `app/Domains/{Domain}/Services/{Domain}Service.php` — query & transform
2. `app/Domains/Profile/Controllers/ProfileController.php` — orkestrasi homepage
3. `resources/js/Components/UI/ListingCard.tsx` — UI card
4. `resources/js/types/common.ts` — kontrak TypeScript
5. `resources/css/app.css` — semua styling
6. `resources/js/Features/{Domain}/components/{Domain}Section.tsx` — entry section
7. `resources/js/hooks/use{Domain}.ts` — baca props Inertia

---

**Handbook ini hidup.** Kalau Anda menemukan file yang belum terdaftar di peta, tambahkan. Kalau alur berubah, update dokumen ini di commit yang sama.
