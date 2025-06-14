(function ($) {
    "use strict";
    var HT = {};
    var documentReady = $(document);

    HT.switchery = function () {
        $(".js-switch").each(function () {
            new Switchery(this, { color: "#1AB394" });
        });
    };

    documentReady.ready(function () {
        HT.switchery();
    });
})(jQuery);
