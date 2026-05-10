# Static HTML mockup

Pure HTML / CSS / jQuery preview of the homepage — no Laravel needed.

## How to view

1. Clone the repo and switch to this branch:
   ```
   git clone -b claude/laravel-pickle-shop-app-FYDz6 https://github.com/akashsahay1/riyaachaarpapad.git
   cd riyaachaarpapad/mockup
   ```
2. Double-click `index.html` (or open it in any browser).
   - Bootstrap, Bootstrap Icons and jQuery load from CDN.
   - Product / category / hero photos load from **LoremFlickr** (real Creative Commons photos from Flickr, fetched by keyword). First load can take 1–3 seconds while LoremFlickr resolves the keywords; reload is instant.

## What to look at

- **Header** (sticky) with FSSAI/GST trust strip + Flipkart-style search.
- **Category nav** (Pickles / Bari / Papads / Combos / New Arrivals).
- **Hero carousel** — 3 themed slides with real photos and brand-colored gradient overlays.
- **Category tiles** — round, 6-up.
- **Bestsellers grid** + **New Arrivals** — Flipkart-style cards (weight pill, sale price, % off, wishlist, Add).
- **Trust band** — Flaticon-style flat **inline SVG icons** (FSSAI shield, GST receipt, hand-made house, delivery truck) with circular soft-color backgrounds.
- **SVG blob decorations** — organic circular shapes in the corners of several sections (green / red / yellow), drawn via CSS masks so they automatically pick up the active theme color.
- **Story band** — SHG context with green check-tick mini icons.
- **Testimonials**.
- **Footer** with FSSAI/GST badges and newsletter.

## Theme demo — vibrant green-red palettes

The four palettes are now noticeably **brighter and more vibrant**. Click the **palette button** at the right end of the header to cycle:

1. **Tulsi Leaf** (default) — lime green + chilli red
2. **Festive Mela** — emerald + rose
3. **Forest Garhwa** — teal-green + tomato
4. **Mustard Mirchi** — leaf-green + warm red

A toast at the bottom-right names the active theme.

## Image swap for production

LoremFlickr is great for mockups but you'll want hand-picked images for production:

1. Pick photos on **Pexels** (https://www.pexels.com) or **Pixabay** (https://pixabay.com).
2. Download and place them in `public/images/products/` (or upload via the future admin panel).
3. In `mockup/index.html`, replace each `https://loremflickr.com/...` URL with the new local path or Pexels CDN URL.
4. For Pexels CDN you can hot-link directly, e.g.
   `https://images.pexels.com/photos/{ID}/pexels-photo-{ID}.jpeg?auto=compress&cs=tinysrgb&w=600`.

## Files

```
mockup/
├── index.html        # full home page (header + sections + footer inlined)
├── css/style.css     # vibrant palette, blob masks, Flaticon-style icons
└── js/style.js       # jQuery: theme switcher, wishlist, add-to-cart, modal/toast
```

The same design is mirrored into the Laravel Blade partials under `resources/views/frontend/` and assets under `public/css/` & `public/js/`.
