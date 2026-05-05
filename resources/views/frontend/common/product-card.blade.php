@php
    $discount = (!empty($p['reg']) && !empty($p['sale']) && $p['reg'] > $p['sale'])
        ? (int) round((($p['reg'] - $p['sale']) / $p['reg']) * 100)
        : 0;
@endphp
<article class="rp-product-card">
    <a href="{{ url('/product/' . $p['slug']) }}" class="rp-product-link">
        <div class="rp-product-img">
            <img src="{{ $p['img'] }}" alt="{{ $p['name'] }}" loading="lazy">
            @if(!empty($p['tag']))<span class="rp-product-tag">{{ $p['tag'] }}</span>@endif
        </div>
        <div class="rp-product-body">
            <h3 class="rp-product-name">{{ $p['name'] }}</h3>
            <div class="rp-product-meta">
                <span class="rp-product-weight">{{ $p['weight'] }}</span>
                <span class="rp-product-rating"><i class="bi bi-star-fill"></i> {{ $p['rating'] }} <small>({{ $p['reviews'] }})</small></span>
            </div>
            <div class="rp-product-price">
                <span class="rp-price-sale">&#8377;{{ $p['sale'] }}</span>
                <span class="rp-price-reg">&#8377;{{ $p['reg'] }}</span>
                @if($discount > 0)<span class="rp-price-off">{{ $discount }}% off</span>@endif
            </div>
        </div>
    </a>
    <div class="rp-product-actions">
        <button type="button" class="rp-wish-btn" aria-label="Add to wishlist" data-slug="{{ $p['slug'] }}">
            <i class="bi bi-heart"></i>
        </button>
        <button type="button" class="rp-add-btn" data-slug="{{ $p['slug'] }}">
            <i class="bi bi-bag-plus"></i> Add
        </button>
    </div>
</article>
