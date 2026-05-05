# Riya Achaar & Papad — Development Documentation

> Brand: **Riya**  
> Owner: **Tiriya Kisan Farmer Producer Company Limited, Garhwa** (Self-Help Group / FPC)  
> Compliance: **FSSAI registered**, **GST registered**  
> Goal: A professional, Flipkart-style e-commerce web app to take a thriving local pickle/papad business pan-India.

---

## 1. Project Context

Tiriya Kisan FPC is a women-led Self-Help Group in Garhwa (Jharkhand) producing traditional, hand-made food products under the brand name **Riya**.

**Product range (initial catalog):**
- Pickles (achaar): lemon, green chilli, garlic, mushroom, mango, mixed
- Bari / chunks: soya bari, urid bari
- Papads (assorted)
- Future: chutneys, masalas, seasonal specials

The SHG is already getting strong **local** demand and now wants to:
1. Establish a credible online brand presence.
2. Reach customers across India.
3. Increase per-order value through variant-based packaging (100g – 1000g).
4. Process online payments and ship pan-India.

---

## 2. Goals & Success Criteria

| Goal | Success Metric |
|------|----------------|
| Professional, trust-worthy storefront | FSSAI / GST badges visible, SSL, fast page load (< 2s LCP) |
| Flipkart-style discovery | Landing = product grid, filters, categories, search |
| Variant-driven sales | Each product sold in 100/200/300/400/500/1000 g packs with regular & sale price |
| Easy admin for non-technical operator | One-screen dashboard, simple add/edit product flow |
| Multiple sign-in options | Email + Google + Facebook |
| Pan-India delivery | Pincode-based shipping check, courier-ready order data |

---

## 3. Tech Stack

- **Backend:** Laravel 13 (PHP 8.4) — latest stable; pin the exact minor in `composer.json`
- **Database:** MySQL 8
- **Frontend CSS:** Bootstrap 5 (compulsory)
- **JavaScript:** **jQuery only** (NO vanilla JS anywhere)
- **Auth:** Laravel Breeze (email) + Laravel Socialite (Google, Facebook)
- **Payments:** Razorpay (primary, India-native) — abstracted behind a Gateway interface so PhonePe/Cashfree can be added later
- **Storage:** Local `public/storage` for dev; S3-compatible for prod (recommended)
- **Mail:** SMTP (transactional)
- **Server:** Nginx + PHP-FPM 8.4, Ubuntu LTS

---

## 4. Hard Rules & Guidelines (NON-NEGOTIABLE)

These are project-wide laws. Any PR violating them must be rejected.

### 4.1 JavaScript
- **ONLY jQuery.** No vanilla `document.querySelector`, `addEventListener`, `fetch`, etc.
- All AJAX calls go through `$.ajax`, `$.get`, `$.post`.
- All DOM events bound via `$(...).on('event', handler)`.
- All scripts live in `public/js/` — `style.js` for frontend, `admin.js` for admin.
- **No `alert()`, `confirm()`, `prompt()`** anywhere. Always use **Bootstrap modals** for confirmations, errors, success toasts.

### 4.2 CSS / Styling
- **No inline `style=""` attributes.** Anywhere. Period.
- **No `<style>` tags inside any blade template.**
- Bootstrap 5 is the base framework; custom rules go into:
  - `public/css/style.css` — frontend / customer-facing
  - `public/css/admin.css` — admin panel
- Class-based styling only. Reuse Bootstrap utilities first, then extend in the two CSS files above.

### 4.3 Templating
- **DO NOT use Laravel's `@extends` / `@section` / `@yield` layout system.**
- Use **plain `@include` partials** for header, footer, sidebar, inner header.
- **NEVER mix admin and customer templates.** They live in completely separate folders.
- Folder structure (under `resources/views/`):

```
resources/views/
├── frontend/
│   ├── pages/
│   │   ├── home.blade.php
│   │   ├── shop.blade.php
│   │   ├── product.blade.php
│   │   ├── cart.blade.php
│   │   ├── checkout.blade.php
│   │   ├── account.blade.php
│   │   ├── about.blade.php
│   │   ├── contact.blade.php
│   │   ├── privacy-policy.blade.php
│   │   ├── terms.blade.php
│   │   └── refund-policy.blade.php
│   └── common/
│       ├── header.blade.php
│       ├── footer.blade.php
│       ├── sidebar.blade.php
│       └── innerheader.blade.php
├── adminpanel/
│   ├── pages/
│   │   ├── dashboard.blade.php
│   │   ├── products/
│   │   │   ├── all.blade.php
│   │   │   ├── add.blade.php
│   │   │   ├── edit.blade.php
│   │   │   └── categories.blade.php
│   │   ├── customers.blade.php
│   │   ├── orders/
│   │   │   ├── confirmed.blade.php
│   │   │   ├── pending.blade.php
│   │   │   ├── completed.blade.php
│   │   │   ├── cancelled.blade.php
│   │   │   └── refunded.blade.php
│   │   ├── transactions/
│   │   │   ├── successful.blade.php
│   │   │   ├── pending.blade.php
│   │   │   ├── cancelled.blade.php
│   │   │   └── refunded.blade.php
│   │   ├── refund-policy.blade.php
│   │   ├── privacy-policy.blade.php
│   │   ├── terms.blade.php
│   │   ├── about.blade.php
│   │   └── contact-details.blade.php
│   └── common/
│       ├── header.blade.php
│       ├── footer.blade.php
│       ├── sidebar.blade.php
│       └── innerheader.blade.php
└── common/
    └── innerheader.blade.php   (only if a partial is shared by both ends)
```

**Page template skeleton — frontend example (`frontend/pages/home.blade.php`):**

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riya — Homemade Pickles & Papads</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('frontend.common.header')
    @include('frontend.common.innerheader')

    <main class="page-home">
        {{-- page content --}}
    </main>

    @include('frontend.common.footer')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/style.js') }}"></script>
</body>
</html>
```

**Admin template skeleton (`adminpanel/pages/dashboard.blade.php`):**

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riya Admin — Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    @include('adminpanel.common.header')
    <div class="admin-shell">
        @include('adminpanel.common.sidebar')
        <section class="admin-content">
            @include('adminpanel.common.innerheader')
            {{-- page content --}}
        </section>
    </div>
    @include('adminpanel.common.footer')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
```

### 4.4 MVC Discipline
- **All DB queries go through Eloquent models.** No raw `DB::select` inside controllers/views.
- Controllers stay thin: they receive a request, call a model/service, return a view or JSON.
- Heavy business logic → `app/Services/`.
- Form validation → `app/Http/Requests/`.
- **No queries inside Blade templates.** Pass data from controller → view as variables.
- **No spaghetti code.** A method does one thing; if a controller method exceeds ~40 lines, refactor.

### 4.5 Naming
- Controllers: `PascalCaseController` (e.g. `ProductController`, `Admin/OrderController`).
- Models: singular `PascalCase` (`Product`, `OrderItem`).
- Tables: plural snake_case (`products`, `order_items`).
- Routes: kebab-case URLs (`/refund-policy`, `/admin/orders/pending`).
- Blade files: kebab-case (`refund-policy.blade.php`).

---

## 5. Application Architecture

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Frontend/
│   │   │   ├── HomeController.php
│   │   │   ├── ShopController.php
│   │   │   ├── ProductController.php
│   │   │   ├── CartController.php
│   │   │   ├── CheckoutController.php
│   │   │   ├── AccountController.php
│   │   │   ├── AuthSocialController.php
│   │   │   └── PageController.php   (about, privacy, terms, refund, contact)
│   │   └── Admin/
│   │       ├── DashboardController.php
│   │       ├── ProductController.php
│   │       ├── CategoryController.php
│   │       ├── CustomerController.php
│   │       ├── OrderController.php
│   │       ├── TransactionController.php
│   │       └── PageController.php
│   ├── Requests/
│   └── Middleware/
│       └── AdminOnly.php
├── Models/
│   ├── User.php
│   ├── Product.php
│   ├── ProductVariant.php
│   ├── ProductImage.php
│   ├── Category.php
│   ├── Cart.php
│   ├── CartItem.php
│   ├── Order.php
│   ├── OrderItem.php
│   ├── Transaction.php
│   ├── Address.php
│   └── Page.php   (refund/privacy/terms/about/contact CMS)
└── Services/
    ├── CartService.php
    ├── OrderService.php
    ├── PaymentGatewayInterface.php
    └── RazorpayGateway.php
```

Routes are split into two files:
- `routes/web.php` → frontend
- `routes/admin.php` → admin (loaded with prefix `/admin` and `AdminOnly` middleware)

---

## 6. Database Schema (key tables)

### users
| column | type | notes |
|---|---|---|
| id | bigint pk | |
| name | string | |
| email | string unique | |
| password | string nullable | nullable for social-only accounts |
| provider | enum('email','google','facebook') | |
| provider_id | string nullable | |
| avatar | string nullable | |
| phone | string nullable | |
| role | enum('admin','customer') | default customer |
| email_verified_at, timestamps | | |

### categories
`id, name, slug, image, description, status, sort_order, timestamps`

### products
`id, category_id, name, slug, short_description, description, hero_image, status, is_featured, fssai_no, gst_inclusive (bool), timestamps`

### product_variants  ← **the variations**
| column | type | notes |
|---|---|---|
| id | bigint pk | |
| product_id | fk → products | |
| weight_grams | smallint | 100, 200, 300, 400, 500, 1000 |
| sku | string unique | e.g. `LEMON-PICKLE-500G` |
| regular_price | decimal(10,2) | |
| sale_price | decimal(10,2) nullable | |
| stock | int | |
| is_default | bool | one variant per product is default |
| timestamps | | |

### product_images
`id, product_id, path, alt_text, sort_order`

### addresses
`id, user_id, full_name, phone, line1, line2, city, state, pincode, country, is_default`

### orders
`id, order_no (RIYA-YYYYMMDD-XXXX), user_id, status (enum: pending, confirmed, completed, cancelled, refunded), subtotal, shipping_fee, discount, gst_amount, total, shipping_address_id, billing_address_id, placed_at, confirmed_at, completed_at, cancelled_at, refunded_at, notes, timestamps`

### order_items
`id, order_id, product_id, product_variant_id, product_name (snapshot), weight_grams (snapshot), unit_price (snapshot), quantity, line_total`

### transactions
`id, order_id, gateway (razorpay/cod), gateway_txn_id, amount, status (enum: pending, successful, cancelled, refunded), payload (json), timestamps`

### pages (CMS)
`id, slug (refund-policy, privacy-policy, terms, about, contact), title, body_html, updated_by, timestamps`

---

## 7. Product Variations Logic

Every product has at least **one** `product_variants` row. UI flow:

**Admin → Add Product:**
1. Fill product master fields (name, category, hero image, description).
2. Below master form, repeatable variant rows: weight (100/200/300/400/500/1000), regular price, sale price, stock, default checkbox.
3. At least one variant is required; exactly one must be marked default.
4. SKU auto-generated as `{slug-uppercase}-{weight}G` but editable.

**Frontend → Product Page:**
1. Page loads default variant pre-selected.
2. Weight pills (Bootstrap `btn-group`) let customer switch — jQuery updates price, sale badge, stock state, and Add-to-Cart payload.
3. Add to Cart sends `product_id` + `variant_id` + `quantity` via `$.ajax`.

---

## 8. Authentication

- **Email/Password:** Laravel Breeze (Blade stack), but the auth views must be re-skinned into our `frontend/pages/` folder structure (don't keep Breeze's own layout).
- **Google & Facebook:** Laravel Socialite.
  - `GET /auth/{provider}/redirect` → `AuthSocialController@redirect`
  - `GET /auth/{provider}/callback` → `AuthSocialController@callback`
  - On callback: find or create user by `provider` + `provider_id`; if email matches an existing email user, link the account.
- **Admin login** is on a separate URL `/admin/login` and only `role = admin` users can pass `AdminOnly` middleware.
- All login/register errors render inside a Bootstrap modal — never inline `alert()`.

---

## 9. Frontend Design — Flipkart-Style Storefront

### 9.1 Landing Page = Shop Page
The homepage IS the product grid. Above-the-fold layout, top to bottom:

1. **Top utility bar** — "Free shipping above ₹499 | FSSAI Lic. No. XXXXXX | GSTIN XXXXX" — instant trust.
2. **Header** — logo (Riya), search bar (centered, prominent), account, cart count.
3. **Inner header** — horizontal category strip (Pickles | Bari | Papads | Combos | New Arrivals).
4. **Hero carousel** — 3 slides max: festive offer, bestseller pickle, story of the SHG.
5. **Category tiles** — 4–6 round tiles with photo + label.
6. **"Bestsellers" product grid** — Flipkart-style cards (image, name, weight pill, ₹sale ₹~~regular~~, %off badge, Add).
7. **"New from the kitchen"** — second product strip.
8. **Trust band** — FSSAI badge, GST badge, "Made by women SHG", "Hand-made", "No preservatives".
9. **Customer testimonials carousel.**
10. **Footer** — links, newsletter, social, address.

### 9.2 Product Single Page (Beautiful, info-rich)

Two-column layout:

- **Left:** image gallery (main image + thumbnails, jQuery zoom on hover).
- **Right:**
  - Product name, short tagline ("Sun-dried, hand-pounded, mustard-oil base")
  - Price block (sale price big, regular struck-through, % off)
  - **Weight selector pills:** 100g · 200g · 300g · 400g · 500g · 1000g
  - Quantity stepper, **Add to Cart** + **Buy Now**
  - Pincode delivery check
  - Trust seals row (FSSAI, GST, Hygienically packed, COD available)
  - Tabs below: Description | Ingredients | Storage | Shelf Life | FSSAI Lic.
  - Reviews & ratings
  - "From the same kitchen" related products row

### 9.3 Color Palette — 3–4 Green-Red Demo Themes

All themes share Bootstrap as the base; the difference is a color override block in `style.css` (CSS custom properties scoped under a body class). Switch theme by toggling that body class — easy demo for the aunt.

| Theme | Body class | Primary (green) | Accent (red) | Surface | Mood |
|------|------------|-----------------|--------------|---------|------|
| **Theme 1 — Tulsi Leaf** | `theme-tulsi` | `#1f7a3a` | `#c0392b` | `#fffaf2` | Earthy, traditional, premium |
| **Theme 2 — Festive Mela** | `theme-mela` | `#2e8b57` | `#e74c3c` | `#fff7e6` | Bright, festive, Flipkart-energetic |
| **Theme 3 — Forest Garhwa** | `theme-garhwa` | `#0f5132` | `#a4161a` | `#f8f5ec` | Deep, forest, heritage |
| **Theme 4 — Mustard Mirchi** | `theme-mirchi` | `#3a7d44` | `#d62828` | `#fff3cd` | Warm, kitchen, appetising |

Each theme defines:
```css
.theme-tulsi {
    --rp-primary: #1f7a3a;
    --rp-primary-dark: #14532d;
    --rp-accent: #c0392b;
    --rp-accent-dark: #922b21;
    --rp-surface: #fffaf2;
    --rp-text: #1c1c1c;
    --rp-muted: #6c757d;
}
```
Buttons, badges, links, hovers all reference `var(--rp-primary)` / `var(--rp-accent)` so a single class swap re-skins the entire site.

---

## 10. Suggestions for Better Product Showcasing

1. **Lifestyle photography** — show pickle in a glass jar with a roti/paratha, not just the pouch. Hire a 1-day local shoot.
2. **Origin story chip** — "Hand-made by SHG women of Garhwa" sticker on every product card.
3. **FSSAI & GST badges** — display license numbers in the footer and on every product page; this dramatically increases trust for food on the internet.
4. **Combo packs** — "Achaar Trio (Lemon + Mango + Mirchi 200g each)" — bigger AOV than singles.
5. **Subscription nudge** — "Get 500g every month, save 10%" (phase 2).
6. **Recipe content** — short "How to use" cards under each pickle (3-line recipes). Drives time-on-page and SEO.
7. **Festival landing pages** — Diwali/Holi/Rakhi gift hampers with custom URLs.
8. **Reviews with photos** — incentivise photo reviews with a ₹50 coupon.
9. **Pincode-aware CTAs** — "Delivers to 822114 in 4 days · COD available".
10. **Sticky mobile Add-to-Cart bar** on the product page (most traffic will be mobile).
11. **Trust band above footer** — FSSAI logo, GST logo, "100% homemade", "No preservatives", "Cash on Delivery".
12. **Schema.org Product markup** — rich snippets in Google with price + rating.

---

## 11. Admin Panel Scope

| Section | Sub-screens | Notes |
|---------|-------------|-------|
| Dashboard | Today's orders, revenue, low-stock variants, recent customers | Cards + simple Chart.js (loaded via jQuery init) |
| Products | All Products, Add New, Edit, Categories (Add/Edit) | Variant-row UI as in §7 |
| Customers | List, view, order history per customer | |
| Orders | Confirmed, Pending, Completed, Cancelled, Refunded | Each in its own tab/page; status transitions logged |
| Transactions | Successful, Pending, Cancelled, Refunded | Read-only ledger + manual refund trigger |
| Pages (CMS) | Refund Policy, Privacy Policy, Terms, About Us, Contact Details | Single editor (TinyMCE / Summernote initialised via jQuery) per page |

All tables use server-side pagination. All confirmations (delete, refund, cancel) → Bootstrap modal.

---

## 12. Order & Transaction Workflow

```
Cart → Checkout → Payment
                    │
     ┌──────────────┼───────────────┐
     ▼              ▼               ▼
 Razorpay       COD             Failed
  success                          │
     │              │              ▼
     ▼              ▼          order=cancelled
 order=confirmed   order=pending
     │              │
     └──────┬───────┘
            ▼
  admin marks shipped → completed
            │
            └─ refund flow → refunded (order + transaction both)
```

Order status values match exactly the admin sidebar: **pending, confirmed, completed, cancelled, refunded**. Transaction status: **pending, successful, cancelled, refunded**. Every status change writes a row in an `order_status_logs` table for audit.

---

## 13. Security & Compliance

- CSRF on every POST form (Laravel default; never disable).
- All file uploads validated (mime + size + dimensions).
- Passwords hashed with bcrypt (Laravel default).
- Razorpay webhook signature verified.
- FSSAI license number and GSTIN stored in `.env` and rendered from a config helper.
- HTTPS-only in production; HSTS enabled in Nginx.
- Rate-limit auth endpoints (`throttle:6,1`).
- No sensitive data in logs.

---

## 14. Performance

- Eager-load relationships on listing pages (`Product::with('defaultVariant','heroImage','category')`).
- Image variants generated at upload (Intervention Image): `thumb 300×300`, `card 600×600`, `zoom 1200×1200`.
- WebP delivery with JPEG fallback.
- Cache home-page product grid for 5 minutes.
- Minify `style.css` / `style.js` / `admin.css` / `admin.js` for production.

---

## 15. Asset Pipeline

```
public/
├── css/
│   ├── bootstrap.min.css
│   ├── style.css     ← all frontend custom CSS
│   └── admin.css     ← all admin custom CSS
├── js/
│   ├── jquery.min.js
│   ├── bootstrap.bundle.min.js
│   ├── style.js      ← frontend jQuery
│   └── admin.js      ← admin jQuery
├── images/           ← static brand assets (logo, FSSAI, GST)
└── storage/          ← symlink to product uploads
```

No Vite/Mix is required for Phase 1 — just keep the CSS/JS files small and version them via `?v={{ config('app.asset_version') }}`.

---

## 16. Environment & Deployment

`.env` keys to add:
```
APP_NAME="Riya Achaar & Papad"
APP_URL=https://riyaachaarpapad.com

DB_*

GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=

FACEBOOK_CLIENT_ID=
FACEBOOK_CLIENT_SECRET=
FACEBOOK_REDIRECT_URI=

RAZORPAY_KEY=
RAZORPAY_SECRET=
RAZORPAY_WEBHOOK_SECRET=

FSSAI_LICENSE_NO=
GST_NO=
COMPANY_LEGAL_NAME="Tiriya Kisan Farmer Producer Company Limited"
BRAND_NAME="Riya"
SUPPORT_EMAIL=
SUPPORT_PHONE=
```

Deployment recipe (high level):
1. Provision Ubuntu LTS + Nginx + PHP 8.4 + MySQL 8.
2. Clone repo, `composer install --no-dev`, `php artisan migrate --force`, `php artisan storage:link`, `php artisan config:cache`, `php artisan route:cache`.
3. Set up SSL via Let's Encrypt.
4. Daily DB backup cron + weekly off-server copy.

---

## 17. Roadmap / Milestones

| Phase | Deliverable | Est. |
|-------|-------------|------|
| **0. Setup** | Laravel 13 boilerplate, branch, folder structure per §4.3, Bootstrap + jQuery wired | 1 day |
| **1. Auth** | Email + Google + Facebook login, customer & admin roles | 2 days |
| **2. Catalog** | Categories, products, variants, images, admin CRUD | 4 days |
| **3. Storefront** | Home/shop, product page, 4 green-red themes, search, category filter | 4 days |
| **4. Cart & Checkout** | Cart, address, Razorpay + COD, order placement | 3 days |
| **5. Admin Operations** | Orders (5 tabs), Transactions (4 tabs), Customers, CMS pages | 3 days |
| **6. Polish** | Reviews, pincode check, SEO meta, schema.org, performance pass | 2 days |
| **7. Launch** | Production deploy, FSSAI/GST badges, analytics, sitemap, GSC/GA4 | 1 day |

---

## 18. Definition of Done (per feature)

A feature is "done" only when **all** are true:
- [ ] Follows every rule in §4 (no vanilla JS, no inline CSS, no `<style>` in templates, no `@extends`, MVC respected).
- [ ] Works on mobile (≤ 360px) and desktop.
- [ ] All confirmations & errors are Bootstrap modals — zero `alert/confirm/prompt`.
- [ ] Admin views live under `adminpanel/`, customer views under `frontend/` — never crossed.
- [ ] Form has server-side validation via FormRequest.
- [ ] No Eloquent calls inside Blade templates.
- [ ] Lighthouse mobile score ≥ 85 on the affected page.
- [ ] Tested by placing a real test order end-to-end after the change.

---

_Last updated: 2026-05-05_
