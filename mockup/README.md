# Static HTML mockup

Pure HTML / CSS / jQuery preview of the homepage — no Laravel needed.

## How to view

1. Clone the repo and switch to this branch:
   ```
   git clone -b claude/laravel-pickle-shop-app-FYDz6 https://github.com/akashsahay1/riyaachaarpapad.git
   cd riyaachaarpapad/mockup
   ```
2. Double-click `index.html` (or open it in any browser).
   - Bootstrap, Bootstrap Icons and jQuery load from CDN, so an internet connection is needed for the first view.
   - Product/category images are placeholders from `placehold.co` — swap with real photography later.

## What to look at

- **Header** (sticky) with FSSAI/GST trust strip + Flipkart-style search.
- **Category nav** (Pickles / Bari / Papads / Combos / New Arrivals).
- **Hero carousel** — 3 themed slides (festive / bestseller / SHG story).
- **Category tiles** — round, 6-up.
- **Bestsellers grid** + **New Arrivals** — Flipkart-style cards (weight pill, sale price, % off, wishlist, Add).
- **Trust band** — FSSAI / GST / hand-made / pan-India.
- **Story band** — SHG context.
- **Testimonials**.
- **Footer** with FSSAI/GST badges and newsletter.

## Theme demo — the green-red palettes

Click the small **palette button** at the right end of the header to cycle through four themes:

1. **Tulsi Leaf** (default) — earthy/traditional/premium
2. **Festive Mela** — bright/festive/Flipkart-energetic
3. **Forest Garhwa** — deep forest/heritage
4. **Mustard Mirchi** — warm/kitchen/appetising

A toast at the bottom-right will name the active theme.

## Files

```
mockup/
├── index.html        # full home page (header + sections + footer inlined)
├── css/style.css     # all styles + 4 theme variable blocks
└── js/style.js       # jQuery: theme switcher, wishlist, add-to-cart, modal/toast
```

Once the design is approved, the same markup is already split into proper Blade partials under `resources/views/frontend/` and assets under `public/css/` & `public/js/` for the Laravel build.
