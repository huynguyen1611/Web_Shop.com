(function ($) {
    "use strict";
    var HT = {}; // Khai bĂ¡o lĂ  1 Ä‘á»‘i tÆ°á»£ng
    var timer;
    var $carousel = $(".owl-slide");
    var _token = $('meta[name="csrf-token"]').attr("content");

    HT.swiperOption = (setting) => {
        // console.log(setting);
        let option = {};
        if (setting.animation.length) {
            option.effect = setting.animation;
        }
        if (setting.arrow === "accept") {
            option.navigation = {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            };
        }
        if (setting.autoplay === "accept") {
            option.autoplay = {
                delay: 50000,
                disableOnInteraction: false,
            };
        }
        if (setting.navigate === "dots") {
            option.pagination = {
                el: ".swiper-pagination",
            };
        }
        return option;
    };

    /* MAIN VARIABLE */
    HT.swiper = () => {
        if ($(".panel-slide").length) {
            let setting = JSON.parse($(".panel-slide").attr("data-setting"));
            let option = HT.swiperOption(setting);
            var swiper = new Swiper(".panel-slide .swiper-container", option);
        }
    };

    HT.carousel = () => {
        $carousel.each(function () {
            let _this = $(this);
            let option = _this.find(".owl-carousel").attr("data-owl");
            let owlInit = atob(option);
            owlInit = JSON.parse(owlInit);
            _this.find(".owl-carousel").owlCarousel(owlInit);
        });
    };

    HT.bestSeller = () => {
        var swiper = new Swiper(".panel-besterseller .swiper-container", {
            loop: false,
            pagination: {
                el: ".swiper-pagination",
            },
            spaceBetween: 20,
            slidesPerView: 1,
            breakpoints: {
                415: {
                    slidesPerView: 1,
                },
                500: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                1280: {
                    slidesPerView: 5,
                },
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    };

    HT.swiperCategory = () => {
        var swiper = new Swiper(".panel-category .swiper-container", {
            loop: false,
            pagination: {
                el: ".swiper-pagination",
            },
            spaceBetween: 20,
            slidesPerView: 3,
            breakpoints: {
                415: {
                    slidesPerView: 3,
                },
                500: {
                    slidesPerView: 3,
                },
                768: {
                    slidesPerView: 6,
                },
                1280: {
                    slidesPerView: 10,
                },
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    };

    HT.swiperBestSeller = () => {
        var swiper = new Swiper(".panel-bestseller .swiper-container", {
            loop: false,
            pagination: {
                el: ".swiper-pagination",
            },
            spaceBetween: 20,
            slidesPerView: 2,
            breakpoints: {
                415: {
                    slidesPerView: 1,
                },
                500: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                1280: {
                    slidesPerView: 4,
                },
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    };

    HT.swiperProject = () => {
        var swiper = new Swiper(".panel-project .swiper-container", {
            loop: false,
            pagination: {
                el: ".swiper-pagination",
            },
            spaceBetween: 20,
            slidesPerView: 1,
            breakpoints: {
                415: {
                    slidesPerView: 1,
                },
                500: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 1,
                },
                1280: {
                    slidesPerView: 3,
                },
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    };

    HT.swiperVideo = () => {
        var swiper = new Swiper(".panel-video .swiper-container", {
            loop: false,
            pagination: {
                el: ".swiper-pagination",
            },
            spaceBetween: 20,
            slidesPerView: 2,
            breakpoints: {
                415: {
                    slidesPerView: 1,
                },
                500: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 2,
                },
                1280: {
                    slidesPerView: 4,
                },
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    };

    HT.wow = () => {
        var wow = new WOW({
            boxClass: "wow", // animated element css class (default is wow)
            animateClass: "animated", // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: true, // trigger animations on mobile devices (default is true)
            live: true, // act on asynchronously loaded content (default is true)
            callback: function (box) {
                // the callback is fired every time an animation is started
                // the argument that is passed in is the DOM node being animated
            },
            scrollContainer: null, // optional scroll container selector, otherwise use window,
            resetAnimation: true, // reset animation on end (default is true)
        });
        wow.init();
    }; // arrow function

    HT.niceSelect = () => {
        if ($(".nice-select").length) {
            $(".nice-select").niceSelect();
        }
    };

    HT.select2 = () => {
        if ($(".setupSelect2").length) {
            $(".setupSelect2").select2();
        }
    };

    HT.openPreviewVideo = () => {
        $(".choose-video").on("click", function (e) {
            e.preventDefault();
            let _this = $(this);
            let option = {
                id: _this.attr("data-id"),
            };
            $.ajax({
                url: "ajax/post/video",
                type: "GET",
                data: option,
                dataType: "json",
                beforeSend: function () {},
                success: function (res) {
                    $(".video-preview .video-play").html(res.html);
                    $(".video-preview video").attr("autoplay", "autoplay");
                    $(".video-preview iframe").attr("src", function (i, val) {
                        return (
                            val +
                            (val.indexOf("?") !== -1 ? "&" : "?") +
                            "autoplay=1"
                        );
                    });
                },
            });
        });
    };

    HT.loadDistribution = () => {
        $(document).on("click", ".agency-item", function () {
            let _this = $(this);

            $(".agency-item").removeClass("active");
            _this.addClass("active");

            $.ajax({
                url: "ajax/distribution/getMap",
                type: "GET",
                data: {
                    id: _this.attr("data-id"),
                },
                dataType: "json",
                success: function (res) {
                    $(".agency-map").html(res);
                },
            });
        });
    };

    HT.activeWarranty = () => {
        $(".active-warranty").on("click", function (e) {
            e.preventDefault();

            let _this = $(this);
            let option = {
                product_id: _this.attr("data-product-id"),
                construct_id: _this.attr("data-construction-id"),
                warranty: _this.attr("data-warranty"),
                _token: _token,
            };
            let parentRow = _this.closest("tr");

            $.ajax({
                url: "customer/warranty/active",
                type: "POST",
                data: option,
                dataType: "json",
                success: function (res) {
                    let startDate = new Date(res.startDate);
                    let endDate = new Date(res.endDate);
                    let formattedStartDate = new Intl.DateTimeFormat("en-GB", {
                        day: "numeric",
                        month: "numeric",
                        year: "numeric",
                    }).format(startDate);
                    let formattedEndDate = new Intl.DateTimeFormat("en-GB", {
                        day: "numeric",
                        month: "numeric",
                        year: "numeric",
                    }).format(endDate);

                    console.log(formattedStartDate, formattedEndDate);
                    if (res.flag === true) {
                        alert("KĂ­ch hoáº¡t báº£o hĂ nh thĂ nh cĂ´ng");
                        parentRow.find("td.startDate").text(formattedStartDate);
                        parentRow.find("td.endDate").text(formattedEndDate);

                        _this.parent().html("").text("ÄĂ£ kĂ­ch hoáº¡t");
                    }
                },
            });
        });
    };

    HT.showAgencyInformation = () => {
        $(".showAgency").click(function (e) {
            e.preventDefault();

            let _this = $(this);
            let agency = _this.attr("data-agency");
            agency = JSON.parse(agency);

            let field = ["name", "email", "phone", "address", "code"];

            field.forEach(function (fieldName) {
                $(".popup-agency-" + fieldName).html(agency[fieldName]);
            });

            var modal = UIkit.modal("#agency-popup");
            if (modal.isActive()) {
                modal.hide();
            } else {
                modal.show();
            }
        });
    };

    HT.showContact = () => {
        let isShown = false;

        $(document).on("click", ".bottom-support-online", function () {
            if (isShown) {
                $(this).removeClass("show");
                isShown = false;
            } else {
                $(this).addClass("show");
                isShown = true;
            }
        });
    };

    HT.showFakeOrder = () => {
        let randomData = [
            {
                img: "http://vphome24.com/frontend/resources/img/ao-thun-nam-trung-nien-pixi-10-500x500.jpg",
                name: "Pháº¡m Thanh TĂ¹ng - BĂ¬nh DÆ°Æ¡ng",
                hour: "35 phĂºt trÆ°á»›c",
                message:
                    "Shop Æ¡i cĂ³ miá»…n phĂ­ ship tá»›i Cao Báº±ng khĂ´ng áº¡?",
            },
            {
                img: "http://vphome24.com/frontend/resources/img/ao-thun-nam-trung-nien-pixi-10-500x500.jpg",
                name: "Nguyá»…n VÄƒn A - HĂ  Ná»™i",
                hour: "1 giá» trÆ°á»›c",
                message: "CĂ³ thá»ƒ giao hĂ ng tá»›i Háº£i PhĂ²ng khĂ´ng?",
            },
            {
                img: "http://vphome24.com/frontend/resources/img/ao-thun-nam-trung-nien-pixi-10-500x500.jpg",
                name: "Tráº§n Thá»‹ B - TP.HCM",
                hour: "2 giá» trÆ°á»›c",
                message: "Sáº£n pháº©m nĂ y cĂ³ sáºµn size L khĂ´ng?",
            },
            {
                img: "http://vphome24.com/frontend/resources/img/ao-thun-nam-trung-nien-pixi-10-500x500.jpg",
                name: "LĂª VÄƒn C - ÄĂ  Náºµng",
                hour: "3 giá» trÆ°á»›c",
                message: "Em muá»‘n Ä‘áº·t mua sáº£n pháº©m nĂ y.",
            },
            {
                img: "http://vphome24.com/frontend/resources/img/ao-thun-nam-trung-nien-pixi-10-500x500.jpg",
                name: "Pháº¡m Thá»‹ D - HĂ  TÄ©nh",
                hour: "4 giá» trÆ°á»›c",
                message: "CĂ³ mĂ u sáº¯c khĂ¡c khĂ´ng áº¡?",
            },
            {
                img: "http://vphome24.com/frontend/resources/img/ao-thun-nam-trung-nien-pixi-10-500x500.jpg",
                name: "HoĂ ng VÄƒn E - Nghá»‡ An",
                hour: "5 giá» trÆ°á»›c",
                message: "Shop cĂ³ chÆ°Æ¡ng trĂ¬nh giáº£m giĂ¡ khĂ´ng áº¡?",
            },
            {
                img: "http://vphome24.com/frontend/resources/img/ao-thun-nam-trung-nien-pixi-10-500x500.jpg",
                name: "Nguyá»…n VÄƒn F - Quáº£ng Ninh",
                hour: "6 giá» trÆ°á»›c",
                message: "CĂ³ thá»ƒ Ä‘á»•i size khĂ´ng áº¡?",
            },
            {
                img: "http://vphome24.com/frontend/resources/img/ao-thun-nam-trung-nien-pixi-10-500x500.jpg",
                name: "Tráº§n Thá»‹ G - Háº£i PhĂ²ng",
                hour: "7 giá» trÆ°á»›c",
                message: "Shop cĂ³ há»— trá»£ thanh toĂ¡n qua Zalo khĂ´ng áº¡?",
            },
            {
                img: "http://vphome24.com/frontend/resources/img/ao-thun-nam-trung-nien-pixi-10-500x500.jpg",
                name: "LĂª VÄƒn H - VÅ©ng TĂ u",
                hour: "8 giá» trÆ°á»›c",
                message: "CĂ³ thá»ƒ há»§y Ä‘Æ¡n hĂ ng Ä‘Æ°á»£c khĂ´ng áº¡?",
            },
            {
                img: "http://vphome24.com/frontend/resources/img/ao-thun-nam-trung-nien-pixi-10-500x500.jpg",
                name: "Nguyá»…n Thá»‹ I - Nha Trang",
                hour: "9 giá» trÆ°á»›c",
                message: "Sáº£n pháº©m nĂ y cĂ²n hĂ ng khĂ´ng áº¡?",
            },
        ];

        let randomIndex = Math.floor(Math.random() * randomData.length);

        let data = randomData[randomIndex];

        let $html = "";

        $html += `<div class="noti-ava"><img src="${data.img}"></div><div class="noti-info"><div class="noti-title">${data.name}</div><div class="noti-des">Vá»«a bĂ¬nh luáº­n ${data.message}- <span class="noti-time">${data.hour}</span></div></div>`;

        $("#noti").html($html).css("bottom", "20px").fadeIn();

        setTimeout(() => {
            $("#noti").fadeOut(); // Hiá»‡u á»©ng fadeOut
        }, 5000);

        // Chá» 30 giĂ¢y trÆ°á»›c khi hiá»ƒn thá»‹ dá»¯ liá»‡u má»›i
        setTimeout(HT.showFakeOrder, 30000);
    };

    HT.removePagination = () => {
        $(".filter-content").on("slide", function () {
            $(".uk-flex .pagination").hide();
        });
    };

    HT.wrapTable = () => {
        var width = $(window).width();
        if (width < 600) {
            $("table").wrap('<div class="uk-overflow-container"></div>');
        }
    };

    $(document).ready(function () {
        HT.removePagination();
        HT.showContact();
        HT.wow();
        HT.swiperCategory();
        HT.swiperBestSeller();
        // HT.swiperIntro()
        HT.bestSeller();
        HT.swiperProject();
        HT.swiperVideo();

        /* CORE JS */
        HT.swiper();
        HT.niceSelect();
        HT.carousel();

        HT.select2();

        HT.loadDistribution();

        HT.openPreviewVideo();

        HT.activeWarranty();

        HT.showFakeOrder();

        HT.showAgencyInformation();
        HT.wrapTable();
    });
})(jQuery);

addCommas = (nStr) => {
    nStr = String(nStr);
    nStr = nStr.replace(/\./gi, "");
    let str = "";
    for (let i = nStr.length; i > 0; i -= 3) {
        let a = i - 3 < 0 ? 0 : i - 3;
        str = nStr.slice(a, i) + "." + str;
    }
    str = str.slice(0, str.length - 1);
    return str;
};
