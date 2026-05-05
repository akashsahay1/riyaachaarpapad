{{-- Top utility bar --}}
<div class="rp-topbar">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">
        <div class="rp-topbar-left">
            <span class="me-3"><i class="bi bi-truck"></i> Free shipping above &#8377;499</span>
            <span class="d-none d-md-inline">FSSAI Lic. {{ config('app.fssai_license_no', '12345678901234') }}</span>
        </div>
        <div class="rp-topbar-right">
            <span class="d-none d-md-inline me-3">GSTIN {{ config('app.gst_no', '20ABCDE1234F1Z5') }}</span>
            <a href="{{ url('/account/orders') }}" class="rp-topbar-link me-3">Track Order</a>
            <a href="{{ url('/contact') }}" class="rp-topbar-link">Help</a>
        </div>
    </div>
</div>

{{-- Main header --}}
<header class="rp-header">
    <div class="container">
        <div class="row align-items-center g-3">
            <div class="col-6 col-lg-2">
                <a href="{{ url('/') }}" class="rp-logo">
                    <span class="rp-logo-mark">R</span>
                    <span class="rp-logo-text">
                        <strong>Riya</strong>
                        <small>Achaar &amp; Papad</small>
                    </span>
                </a>
            </div>
            <div class="col-12 col-lg-6 order-3 order-lg-2">
                <form action="{{ url('/shop') }}" method="GET" class="rp-search" role="search">
                    <input type="search" name="q" class="form-control rp-search-input" placeholder="Search lemon pickle, mango achaar, soya bari..." aria-label="Search products">
                    <button type="submit" class="btn rp-search-btn"><i class="bi bi-search"></i><span class="d-none d-sm-inline ms-1">Search</span></button>
                </form>
            </div>
            <div class="col-6 col-lg-4 order-2 order-lg-3 text-end">
                <div class="rp-header-actions">
                    <a href="{{ url('/login') }}" class="rp-action-link d-none d-md-inline-flex">
                        <i class="bi bi-person"></i><span>Login</span>
                    </a>
                    <a href="{{ url('/account/wishlist') }}" class="rp-action-link">
                        <i class="bi bi-heart"></i><span class="d-none d-md-inline">Wishlist</span>
                    </a>
                    <a href="{{ url('/cart') }}" class="rp-action-link rp-action-cart">
                        <i class="bi bi-bag"></i><span class="d-none d-md-inline">Cart</span>
                        <span class="rp-cart-badge" id="rp-cart-count">0</span>
                    </a>
                    <button type="button" class="btn rp-theme-pill" id="rp-theme-toggle" title="Switch demo theme" aria-label="Switch demo theme">
                        <i class="bi bi-palette-fill"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
