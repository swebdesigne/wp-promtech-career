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
    $("#newsPhoto").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        dots: false,
        arrows: false,
        autoplay: false
    })
    $("#newsVideo").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        dots: false,
        arrows: false,
        autoplay: false
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
    $(".custom-select").each(function() {
        var $Id = $(this).attr('id');
        $("#"+$Id).select2();
    })
    $(".vacancies-form-search .search-submit").on('click', function() {
        $(".vacancies-form-search").submit();
    })
    $(".news-search-form .search-submit").on('click', function() {
        $(".news-search-form").submit();
    })
    $("#showDetailFilter").on("click", function() {
        $(".search-hidden-block").toggleClass("show");
    })
});
$(".label-tag").on("click", function() {
    var $label = $(this);
    var $id = $label.attr("for");
    console.log($id);
    $label.toggleClass("active")
    if ($label.hasClass("active")) {
        $($id).prop('checked', true);
    } else {
        $($id).prop('checked', false);
    }
})
function closeLogos() {
    $(".hidden-logos").removeClass("show");
    $(".header-logos-close").removeClass("show");
}
function slickPrev(slider) {
    $(slider).slick('slickPrev');
}
function slickNext(slider) {
    $(slider).slick('slickNext');
}