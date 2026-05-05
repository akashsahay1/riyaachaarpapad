/* ============================================================
   Riya Achaar & Papad — Frontend (style.js)
   jQuery only. No vanilla document.querySelector / addEventListener / fetch.
   ============================================================ */

$(function () {

    var THEMES = ['theme-tulsi', 'theme-mela', 'theme-garhwa', 'theme-mirchi'];
    var THEME_LABELS = {
        'theme-tulsi':  'Tulsi Leaf',
        'theme-mela':   'Festive Mela',
        'theme-garhwa': 'Forest Garhwa',
        'theme-mirchi': 'Mustard Mirchi'
    };

    // Theme switcher — cycles all four green-red palettes for the demo.
    $('#rp-theme-toggle').on('click', function () {
        var $body = $('body');
        var current = $body.attr('data-theme') || THEMES[0];
        var next = THEMES[(THEMES.indexOf(current) + 1) % THEMES.length];
        $body.removeClass(THEMES.join(' ')).addClass(next).attr('data-theme', next);
        rpToast('Theme: ' + (THEME_LABELS[next] || next));
    });

    // Wishlist toggle (delegated so dynamically added cards work later)
    $(document).on('click', '.rp-wish-btn', function (e) {
        e.preventDefault();
        var $btn = $(this);
        $btn.toggleClass('is-active');
        var on = $btn.hasClass('is-active');
        var $i = $btn.find('i');
        if (on) { $i.removeClass('bi-heart').addClass('bi-heart-fill'); }
        else    { $i.removeClass('bi-heart-fill').addClass('bi-heart'); }
        rpToast(on ? 'Added to wishlist' : 'Removed from wishlist');
    });

    // Add to cart (mockup) — will POST to /cart/add when controllers are wired.
    $(document).on('click', '.rp-add-btn', function (e) {
        e.preventDefault();
        var slug = $(this).data('slug');
        var $count = $('#rp-cart-count');
        var n = parseInt($count.text(), 10) || 0;
        $count.text(n + 1);
        rpToast('Added to cart');
        // Real implementation:
        // $.ajax({ url:'/cart/add', method:'POST', data:{ slug:slug, quantity:1, _token: $('meta[name=csrf-token]').attr('content') } })
        //  .done(function(res){ $count.text(res.cart_count); rpToast('Added to cart'); })
        //  .fail(function(){ rpToast('Could not add to cart', true); });
    });

    // Newsletter — demo handler. Real version posts to /newsletter/subscribe.
    $('#rp-newsletter-form').on('submit', function (e) {
        e.preventDefault();
        var $form = $(this);
        var email = $form.find('input[type=email]').val();
        if (!email) { return; }
        rpModal('Subscribed!', 'Thanks for joining the Riya kitchen list. We\'ll email you when new flavours arrive.');
        $form[0].reset();
    });

    // ---------- Public helpers (no alert/confirm/prompt anywhere) ----------

    function rpToast(message, isError) {
        var $t = $('<div class="rp-toast"></div>').text(message);
        if (isError) { $t.addClass('is-error'); }
        $('#rp-toast-region').append($t);
        setTimeout(function () { $t.fadeOut(250, function () { $(this).remove(); }); }, 2200);
    }
    window.rpToast = rpToast;

    function rpModal(title, body) {
        $('#rp-modal-title').text(title);
        $('#rp-modal-body').html(body);
        var modalEl = $('#rp-modal').get(0);
        if (window.bootstrap && modalEl) {
            window.bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }
    }
    window.rpModal = rpModal;

});
