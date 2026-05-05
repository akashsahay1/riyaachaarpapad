<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riya — Homemade Pickles, Bari & Papads from Garhwa</title>
    <meta name="description" content="Hand-crafted lemon pickle, mango pickle, mushroom pickle, soya bari and papads — made by women SHG in Garhwa, Jharkhand. FSSAI & GST registered. Pan-India delivery.">

    {{-- Bootstrap 5 + icons via CDN for the mockup phase. Production will use local public/css/bootstrap.min.css. --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="theme-tulsi" data-theme="theme-tulsi">

    @include('frontend.common.header')
    @include('frontend.common.innerheader')

    {{-- Demo data lives in this single @php block; once HomeController is wired, swap to $bestsellers / $newArrivals passed from the controller. --}}
    @php
        $bestsellers = [
            ['slug'=>'lemon-pickle',    'name'=>'Lemon Pickle',         'tag'=>'Bestseller','img'=>'https://placehold.co/600x600/2e8b57/ffffff?text=Lemon+Achaar',  'sale'=>199,'reg'=>249,'rating'=>4.7,'reviews'=>312,'weight'=>'500g'],
            ['slug'=>'mango-pickle',    'name'=>'Mango Pickle',         'tag'=>'New',       'img'=>'https://placehold.co/600x600/e67e22/ffffff?text=Mango+Achaar',  'sale'=>189,'reg'=>229,'rating'=>4.6,'reviews'=>208,'weight'=>'500g'],
            ['slug'=>'mirchi-pickle',   'name'=>'Green Chilli Pickle',  'tag'=>'Spicy',     'img'=>'https://placehold.co/600x600/c0392b/ffffff?text=Mirchi+Achaar', 'sale'=>179,'reg'=>219,'rating'=>4.5,'reviews'=>164,'weight'=>'500g'],
            ['slug'=>'garlic-pickle',   'name'=>'Garlic Pickle',        'tag'=>'Limited',   'img'=>'https://placehold.co/600x600/8e44ad/ffffff?text=Garlic+Achaar', 'sale'=>219,'reg'=>269,'rating'=>4.8,'reviews'=>97, 'weight'=>'500g'],
            ['slug'=>'mushroom-pickle', 'name'=>'Mushroom Pickle',      'tag'=>'Premium',   'img'=>'https://placehold.co/600x600/5d4037/ffffff?text=Mushroom',     'sale'=>299,'reg'=>349,'rating'=>4.9,'reviews'=>54, 'weight'=>'300g'],
        ];
        $newArrivals = [
            ['slug'=>'soya-bari',     'name'=>'Soya Bari',         'tag'=>'Protein',     'img'=>'https://placehold.co/600x600/d4a017/ffffff?text=Soya+Bari',    'sale'=>129,'reg'=>149,'rating'=>4.6,'reviews'=>78, 'weight'=>'200g'],
            ['slug'=>'urid-bari',     'name'=>'Urid Bari',         'tag'=>'Traditional', 'img'=>'https://placehold.co/600x600/a0522d/ffffff?text=Urid+Bari',    'sale'=>139,'reg'=>169,'rating'=>4.7,'reviews'=>62, 'weight'=>'200g'],
            ['slug'=>'masala-papad',  'name'=>'Masala Papad',      'tag'=>'Crispy',      'img'=>'https://placehold.co/600x600/d35400/ffffff?text=Masala+Papad', 'sale'=>99, 'reg'=>119,'rating'=>4.5,'reviews'=>41, 'weight'=>'200g'],
            ['slug'=>'urid-papad',    'name'=>'Urid Papad',        'tag'=>'Classic',     'img'=>'https://placehold.co/600x600/8b6f47/ffffff?text=Urid+Papad',   'sale'=>89, 'reg'=>109,'rating'=>4.4,'reviews'=>33, 'weight'=>'200g'],
            ['slug'=>'achaar-trio',   'name'=>'Achaar Trio Combo', 'tag'=>'Combo',       'img'=>'https://placehold.co/600x600/1f7a3a/ffffff?text=Trio+Combo',   'sale'=>499,'reg'=>649,'rating'=>4.8,'reviews'=>121,'weight'=>'600g'],
        ];
    @endphp

    <main class="page-home">

        {{-- HERO --}}
        <section class="rp-hero">
            <div class="container">
                <div id="rp-hero-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#rp-hero-carousel" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#rp-hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#rp-hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active rp-hero-slide rp-hero-slide-1">
                            <div class="rp-hero-card">
                                <span class="rp-hero-eyebrow">Festive special</span>
                                <h1 class="rp-hero-title">Sun-cooked. Hand-pounded.<br>Ready to meet your thali.</h1>
                                <p class="rp-hero-sub">Lemon, mango, mirchi, garlic — six flavours in our signature mustard-oil base.</p>
                                <a href="{{ url('/shop?cat=pickles') }}" class="btn rp-btn-primary btn-lg">Shop pickles</a>
                            </div>
                        </div>
                        <div class="carousel-item rp-hero-slide rp-hero-slide-2">
                            <div class="rp-hero-card">
                                <span class="rp-hero-eyebrow rp-hero-eyebrow-accent">Bestseller</span>
                                <h1 class="rp-hero-title">Garhwa's favourite Lemon Achaar — now pan-India.</h1>
                                <p class="rp-hero-sub">From 100g pocket-packs to a full 1kg jar. Free shipping above ₹499.</p>
                                <a href="{{ url('/product/lemon-pickle') }}" class="btn rp-btn-primary btn-lg">Buy now</a>
                            </div>
                        </div>
                        <div class="carousel-item rp-hero-slide rp-hero-slide-3">
                            <div class="rp-hero-card">
                                <span class="rp-hero-eyebrow">Made by women</span>
                                <h1 class="rp-hero-title">Every jar supports a Self-Help Group.</h1>
                                <p class="rp-hero-sub">Tiriya Kisan FPC, Garhwa — FSSAI &amp; GST registered, 100% homemade.</p>
                                <a href="{{ url('/about') }}" class="btn rp-btn-primary btn-lg">Our story</a>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#rp-hero-carousel" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></button>
                    <button class="carousel-control-next" type="button" data-bs-target="#rp-hero-carousel" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></button>
                </div>
            </div>
        </section>

        {{-- CATEGORY TILES --}}
        <section class="rp-section rp-categories">
            <div class="container">
                <div class="rp-section-head">
                    <h2 class="rp-section-title">Shop by category</h2>
                </div>
                <div class="row g-3 g-md-4 row-cols-3 row-cols-md-6 text-center">
                    @foreach([
                        ['cat'=>'lemon-pickle','label'=>'Lemon',   'img'=>'https://placehold.co/200x200/2e8b57/ffffff?text=Lemon'],
                        ['cat'=>'mango-pickle','label'=>'Mango',   'img'=>'https://placehold.co/200x200/e67e22/ffffff?text=Mango'],
                        ['cat'=>'mirchi-pickle','label'=>'Mirchi', 'img'=>'https://placehold.co/200x200/c0392b/ffffff?text=Mirchi'],
                        ['cat'=>'garlic-pickle','label'=>'Garlic', 'img'=>'https://placehold.co/200x200/8e44ad/ffffff?text=Garlic'],
                        ['cat'=>'bari',         'label'=>'Bari',   'img'=>'https://placehold.co/200x200/d4a017/ffffff?text=Bari'],
                        ['cat'=>'papads',       'label'=>'Papads', 'img'=>'https://placehold.co/200x200/1f7a3a/ffffff?text=Papads'],
                    ] as $c)
                    <div class="col">
                        <a href="{{ url('/shop?cat=' . $c['cat']) }}" class="rp-cat-tile">
                            <span class="rp-cat-tile-img"><img src="{{ $c['img'] }}" alt="{{ $c['label'] }}"></span>
                            <span class="rp-cat-tile-label">{{ $c['label'] }}</span>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- BESTSELLERS --}}
        <section class="rp-section rp-bestsellers">
            <div class="container">
                <div class="rp-section-head">
                    <h2 class="rp-section-title">Bestsellers from the kitchen</h2>
                    <a href="{{ url('/shop') }}" class="rp-section-link">View all <i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="row g-3 row-cols-2 row-cols-md-3 row-cols-lg-5">
                    @foreach($bestsellers as $p)
                        <div class="col">
                            @include('frontend.common.product-card', ['p' => $p])
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- TRUST BAND --}}
        <section class="rp-trustband">
            <div class="container">
                <div class="row g-3 g-md-0 text-center">
                    <div class="col-6 col-md-3 rp-trust-item"><i class="bi bi-shield-check"></i><span><strong>FSSAI</strong> registered</span></div>
                    <div class="col-6 col-md-3 rp-trust-item"><i class="bi bi-receipt"></i><span><strong>GST</strong> registered</span></div>
                    <div class="col-6 col-md-3 rp-trust-item"><i class="bi bi-house-heart"></i><span><strong>100%</strong> hand-made</span></div>
                    <div class="col-6 col-md-3 rp-trust-item"><i class="bi bi-truck"></i><span><strong>Pan-India</strong> delivery</span></div>
                </div>
            </div>
        </section>

        {{-- NEW ARRIVALS --}}
        <section class="rp-section rp-newarrivals">
            <div class="container">
                <div class="rp-section-head">
                    <h2 class="rp-section-title">New from the kitchen</h2>
                    <a href="{{ url('/shop?cat=new') }}" class="rp-section-link">See more <i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="row g-3 row-cols-2 row-cols-md-3 row-cols-lg-5">
                    @foreach($newArrivals as $p)
                        <div class="col">
                            @include('frontend.common.product-card', ['p' => $p])
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- STORYBAND --}}
        <section class="rp-storyband">
            <div class="container">
                <div class="row align-items-center g-4">
                    <div class="col-md-5">
                        <img src="https://placehold.co/700x500/14532d/ffffff?text=SHG+Women+of+Garhwa" alt="SHG women of Garhwa preparing pickles" class="rp-storyband-img">
                    </div>
                    <div class="col-md-7">
                        <span class="rp-eyebrow">Our story</span>
                        <h2 class="rp-storyband-title">From the kitchens of Garhwa to your dining table</h2>
                        <p>Riya is the brand of <strong>Tiriya Kisan Farmer Producer Company Ltd.</strong> — a Self-Help Group of women farmers from Garhwa, Jharkhand. Every jar you buy supports a household in rural India.</p>
                        <ul class="rp-storyband-points">
                            <li><i class="bi bi-check2-circle"></i> Cold-pressed mustard oil base</li>
                            <li><i class="bi bi-check2-circle"></i> No preservatives, no artificial colours</li>
                            <li><i class="bi bi-check2-circle"></i> Slow sun-cured, the way grandma made it</li>
                        </ul>
                        <a href="{{ url('/about') }}" class="btn rp-btn-outline">Read our story</a>
                    </div>
                </div>
            </div>
        </section>

        {{-- TESTIMONIALS --}}
        <section class="rp-section rp-testimonials">
            <div class="container">
                <div class="rp-section-head">
                    <h2 class="rp-section-title">What our customers say</h2>
                </div>
                <div class="row g-4 row-cols-1 row-cols-md-3">
                    <div class="col">
                        <article class="rp-testimonial">
                            <div class="rp-stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                            <p>"The lemon achaar reminds me of my dadi's recipe. Packaging was leak-proof and arrived in 4 days to Bengaluru."</p>
                            <footer>— Anjali R., Bengaluru</footer>
                        </article>
                    </div>
                    <div class="col">
                        <article class="rp-testimonial">
                            <div class="rp-stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                            <p>"Soya bari is the best I've had outside home. My kids finished the 200g pack in two days."</p>
                            <footer>— Priya S., Pune</footer>
                        </article>
                    </div>
                    <div class="col">
                        <article class="rp-testimonial">
                            <div class="rp-stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i></div>
                            <p>"Love that the brand supports women SHGs. The garlic pickle is fiery and full of flavour."</p>
                            <footer>— Rohit M., Delhi</footer>
                        </article>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('frontend.common.footer')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/style.js') }}"></script>
</body>
</html>
