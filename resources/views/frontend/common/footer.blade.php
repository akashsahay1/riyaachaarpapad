<footer class="rp-footer">
    <div class="rp-footer-main">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5 class="rp-footer-heading">About Riya</h5>
                    <p class="rp-footer-about">
                        Riya is the brand of <strong>Tiriya Kisan Farmer Producer Company Ltd., Garhwa</strong> — a women-led Self-Help Group making hand-crafted pickles, bari and papads using traditional recipes.
                    </p>
                    <div class="rp-cert-row">
                        <span class="rp-cert">FSSAI<br><small>{{ config('app.fssai_license_no', '12345678901234') }}</small></span>
                        <span class="rp-cert">GSTIN<br><small>{{ config('app.gst_no', '20ABCDE1234F1Z5') }}</small></span>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <h5 class="rp-footer-heading">Shop</h5>
                    <ul class="rp-footer-links">
                        <li><a href="{{ url('/shop?cat=pickles') }}">Pickles</a></li>
                        <li><a href="{{ url('/shop?cat=bari') }}">Bari</a></li>
                        <li><a href="{{ url('/shop?cat=papads') }}">Papads</a></li>
                        <li><a href="{{ url('/shop?cat=combos') }}">Combos</a></li>
                        <li><a href="{{ url('/shop?cat=new') }}">New Arrivals</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-2">
                    <h5 class="rp-footer-heading">Company</h5>
                    <ul class="rp-footer-links">
                        <li><a href="{{ url('/about') }}">About Us</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                        <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ url('/terms') }}">Terms of Service</a></li>
                        <li><a href="{{ url('/refund-policy') }}">Refund Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="rp-footer-heading">Stay in the kitchen</h5>
                    <p class="rp-footer-about">Subscribe for festive offers, new flavours and recipes.</p>
                    <form class="rp-newsletter" id="rp-newsletter-form">
                        <input type="email" class="form-control" placeholder="your@email.com" required>
                        <button type="submit" class="btn rp-newsletter-btn">Subscribe</button>
                    </form>
                    <div class="rp-social">
                        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                        <a href="#" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rp-footer-bottom">
        <div class="container d-flex flex-wrap justify-content-between align-items-center">
            <small>&copy; {{ date('Y') }} Tiriya Kisan FPC Ltd. — Brand: Riya. All rights reserved.</small>
            <small class="rp-payments">Secure payments: UPI · Cards · Net Banking · Razorpay · COD</small>
        </div>
    </div>
</footer>

{{-- Single shared modal: replaces every alert/confirm/prompt site-wide. Triggered via window.rpModal(title, body) in style.js. --}}
<div class="modal fade" id="rp-modal" tabindex="-1" aria-hidden="true" aria-labelledby="rp-modal-title">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rp-modal-title">Notice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="rp-modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn rp-btn-primary" id="rp-modal-ok" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

{{-- Toast region for non-blocking confirmations (added/removed/etc.) --}}
<div class="rp-toast-region" id="rp-toast-region" aria-live="polite" aria-atomic="true"></div>
