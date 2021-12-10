$(function() {
    var nav = $('.small-menu');
    $('.menu-toggle').on('click', function() {
        if(!nav.hasClass('on')) {
            nav.addClass('on');
        } else {
            nav.removeClass('on');
        }
    })
    $('.menu-close').on('click', function() {
        nav.removeClass('on');
    })

    $("#mainSlider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 5000
    })
	$('.chart').easyPieChart({
        barColor: "#EF7F1A",
        trackColor: "#E1ECF5",
        scaleColor: "#FFFFFF",
        lineWidth: 26,
        size: 230
    })
    if ($("#digitBlock").length > 0) {
        if (window.document.documentMode) {
            $('.chart').each(function() {
                $(this).data('easyPieChart').update(70);
            });
        } else {    
            var options = {
              threshold: 0.7,
            };

            var observer = new IntersectionObserver(function(entries) {
                for (var idx = 0; idx < entries.length; idx++) {
                    var entry = entries[idx];
                    if (entry.isIntersecting) {
                        $('.chart').each(function() {
                            $(this).data('easyPieChart').update(70);
                        });
                    }
                }
            }, options);
            var target = document.querySelector('#digitBlock');
            observer.observe(target);
        }
    }

    $(".run-line").marquee({
        duration: 18000,
        startVisible: true,
        duplicated: true,
    })
    $(".logo-hover").mouseenter(function() {
        if ($(window).width() >= 768) {
            $(".hidden-logos").addClass("show");
            $(".header-logos-close").addClass("show");
        }
    })
    $(".logo-hover").on("click", function() {
        if ($(window).width() < 768) {
            $(".hidden-logos").addClass("show");
            $(".header-logos-close").addClass("show");
        }
    })
    $("#citySelect").select2();
});
function closeLogos() {
    $(".hidden-logos").removeClass("show");
    $(".header-logos-close").removeClass("show");
}