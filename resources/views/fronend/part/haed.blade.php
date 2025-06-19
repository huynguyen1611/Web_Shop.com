<script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-PHWVB3KB');
</script>
<base href="{{ env('APP_URL') }}">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1,user-scalable=0">
<meta name="robots" content="index,follow" />
<meta name="csrf-token" content="Xfr5lp9XK1sYxpsrmjxgg4ld9G6jfGjzC2U1W1ce">
<meta http-equiv="refresh" content="1800" />
<link rel="icon" href="{{ asset('frontend/img/logo2.png') }}" type="image/png,image/jpeg,image/webp" sizes="30x30">
<title>Siêu thị mua sắm online đa dạng mặt hàng</title>
<meta name="description"
    content="Hàng ngàn thương hiệu nổi tiếng uy tín chất lượng được lựa chọn kĩ càng để khách hàng yên tâm mua sắm. Chúng tôi có chương trình bảo hành cam kết và các chương trình khuyến mại đặc biệt" />
<meta name="keyword" content="Siêu thị mua sắm Vạn Phát home" />
<link rel="canonical" href="https://laptop.themedemo.site/" />
<meta property="og:locale" content="vi_VN" />
<meta property="og:title" content="Siêu thị mua sắm online đa dạng mặt hàng" />
<meta property="og:type" content="website" />
<meta property="og:image" content="/userfiles/image/commit/logo%20website%2016x16-02.jpg" />
<meta property="og:url" content="https://laptop.themedemo.site/" />
<meta property="og:description"
    content="Hàng ngàn thương hiệu nổi tiếng uy tín chất lượng được lựa chọn kĩ càng để khách hàng yên tâm mua sắm. Chúng tôi có chương trình bảo hành cam kết và các chương trình khuyến mại đặc biệt" />
<meta property="og:site_name" content="" />
<meta property="fb:admins" content="" />
<meta property="fb:app_id" content="" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="Siêu thị mua sắm online đa dạng mặt hàng" />
<meta name="twitter:description"
    content="Hàng ngàn thương hiệu nổi tiếng uy tín chất lượng được lựa chọn kĩ càng để khách hàng yên tâm mua sắm. Chúng tôi có chương trình bảo hành cam kết và các chương trình khuyến mại đặc biệt" />
<meta name="twitter:image" content="/userfiles/image/commit/logo%20website%2016x16-02.jpg" />

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<!-- <link href="backend/css/bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="{{ asset('frontend/css/toastr.min.css') }}">

<link rel="stylesheet" href="{{ asset('frontend/css/uikit.modify.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/library.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/style2.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
<script src="{{ asset('frontend/js/jquery.js') }}"></script>
<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.0.8/css/line.css">
<!-- Font Awesome 4 (nếu dùng mã Unicode như \f09a) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

<link href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" rel="stylesheet">

<script type="text/javascript" class="flasher-js">
    (function() {
        var rootScript = 'https://cdn.jsdelivr.net/npm/@flasher/flasher@1.3.2/dist/flasher.min.js';
        var FLASHER_FLASH_BAG_PLACE_HOLDER = {};
        var options = mergeOptions([], FLASHER_FLASH_BAG_PLACE_HOLDER);

        function mergeOptions(first, second) {
            return {
                context: merge(first.context || {}, second.context || {}),
                envelopes: merge(first.envelopes || [], second.envelopes || []),
                options: merge(first.options || {}, second.options || {}),
                scripts: merge(first.scripts || [], second.scripts || []),
                styles: merge(first.styles || [], second.styles || []),
            };
        }

        function merge(first, second) {
            if (Array.isArray(first) && Array.isArray(second)) {
                return first.concat(second).filter(function(item, index, array) {
                    return array.indexOf(item) === index;
                });
            }

            return Object.assign({}, first, second);
        }

        function renderOptions(options) {
            if (!window.hasOwnProperty('flasher')) {
                console.error('Flasher is not loaded');
                return;
            }

            requestAnimationFrame(function() {
                window.flasher.render(options);
            });
        }

        function render(options) {
            if ('loading' !== document.readyState) {
                renderOptions(options);

                return;
            }

            document.addEventListener('DOMContentLoaded', function() {
                renderOptions(options);
            });
        }

        if (1 === document.querySelectorAll('script.flasher-js').length) {
            document.addEventListener('flasher:render', function(event) {
                render(event.detail);
            });


        }

        if (window.hasOwnProperty('flasher') || !rootScript || document.querySelector('script[src="' + rootScript +
                '"]')) {
            render(options);
        } else {
            var tag = document.createElement('script');
            tag.setAttribute('src', rootScript);
            tag.setAttribute('type', 'text/javascript');
            tag.onload = function() {
                render(options);
            };

            document.head.appendChild(tag);
        }
    })();
</script>
