$(function() { 
	$('.chart').easyPieChart({
        barColor: "#EF7F1A",
        trackColor: "#E1ECF5",
        scaleColor: "#FFFFFF",
        lineWidth: 26,
        size: 230
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
    $(".run-line").marquee({
        duration: 18000,
        startVisible: true,
        duplicated: true
    })
});