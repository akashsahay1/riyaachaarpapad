<nav class="rp-catnav" aria-label="Categories">
    <div class="container">
        <ul class="rp-catnav-list">
            <li><a href="{{ url('/shop') }}" class="active">All</a></li>
            <li><a href="{{ url('/shop?cat=pickles') }}">Pickles</a></li>
            <li><a href="{{ url('/shop?cat=bari') }}">Bari</a></li>
            <li><a href="{{ url('/shop?cat=papads') }}">Papads</a></li>
            <li><a href="{{ url('/shop?cat=combos') }}">Combos</a></li>
            <li><a href="{{ url('/shop?cat=new') }}">New Arrivals</a></li>
            <li class="ms-auto d-none d-md-block">
                <a href="{{ url('/shop?sort=offers') }}" class="rp-catnav-offer">
                    <i class="bi bi-tag-fill"></i> Today's Offers
                </a>
            </li>
        </ul>
    </div>
</nav>
