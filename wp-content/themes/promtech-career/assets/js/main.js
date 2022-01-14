$(function() {
    var $nav = $('.small-menu');
    $('.menu-toggle').on('click', function() {
        if(!$nav.hasClass('on')) {
            console.log("123");
            $nav.addClass('on');
        } else {
            console.log("1234");
            $nav.removeClass('on');
        }
    })
    $('.menu-close').on('click', function() {
        $nav.removeClass('on');
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
        autoplay: false,
        adaptiveHeight: true
    })
    $("#newsVideo").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        dots: false,
        arrows: false,
        autoplay: false,
        adaptiveHeight: true
    })
    $("#corporationSlider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        speed: 500,
        dots: false,
        arrows: false,
        autoplay: false,
        adaptiveHeight: true,
        variableWidth: true,
        centerPadding: '0',
        centerMode: true,
        responsive: [
            {
                breakpoint: 576,
                settings: {
                    centerPadding: '0',
                    variableWidth: false,
                }
            }
        ]
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
                $(this).data('easyPieChart').update(100);
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
                            $(this).data('easyPieChart').update(100);
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

    function customSelect(select) {
        select.each(function() {
            var $Id = $(this).attr('id');
            $("#"+$Id).select2();
        })
    }
    customSelect($("#citySelect"));
    customSelect($("#citySearch"));
    customSelect($("#citySelect_2"));
    customSelect($("#companySelect"));
    customSelect($("#directionSelect"));

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
$(".fb-img, .fb-form").fancybox({
    helpers: {
        overlay: {
            locked: false
        }
    },
});

$(document).on("change", ".custom-checkbox", function(){

    if ($(this).is(':checked')) {
        
        $(this).parent().find('label').addClass('active');
    } else {
        $(this).parent().find('label').removeClass('active');
    }
})

$('.nav-item').on('click', function() {
    $txt = $(this).find('a').text().trim();
    $href = $('.text-center > a').attr('href');
    $('.text-center > a').attr('href', "https://server2.webisgroup.ru/promtech-career.ru/vacansii/?direction="+$txt) 
})

$('.career-bottom > button').on('click', function() {
    $txt = $(this).closest('.careers-element-container').find('.career-middle-title > a').text().trim()
    $('input#vacansiya').val($txt)
})

$('.modal-header .icon-close').on('click', function() {
    $('.custom-checkbox').prop('checked', false);
    $('.custom-checkbox').closest('.form-item').find('label').removeClass('active')
})

$('.modal').on('click', function(e) {
    var modal = $(".modal-dialog ");
    if (!modal.is(e.target) && modal.has(e.target).length === 0){
        $(".modal-dialog ").find($('input, textarea, select')).val('');
        $(".modal-dialog ").find($('.custom-input-file__click')).html('Резюме <span class="icon-upload"></span>');
    }
  });

$("#citySelect").on('click', function() {
    $(this).select2();
})

$("#citySelect_2").on('click', function() {
    $(this).select2();
})

function Resume(input) {
    input.on('change', function() {
        if (this.files[0]) // если выбрали файл
        $(this).parent().siblings($('.custom-input-file__click')).text(this.files[0].name + ' загружено');
    })
}

Resume($('#upload-photomodalka'));
Resume($('#upload-photoanketa'));


