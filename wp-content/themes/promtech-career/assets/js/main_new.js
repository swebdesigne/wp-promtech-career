$(".about__slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    autoplay: false,
    dots: true
})

$(function() {
    $('#show_more_job').on('click', function(e) {
        e.preventDefault();
        var dir =  $("input[name='dir']").val()
        var count_items = $('.items').length
        $.ajax({
            url: dir + '/ajax.php',
            data: {'action':'moreJob', 'count_items':count_items, 'search':location.search.replace('?', '')},
            beforeSend: function() {
                $('.items').eq(count_items - 1).after(
                    '<div class="col-12 col-md-6 col-lg-4" id="spinner" style="display: flex; justify-content: center; align-items: center; min-height: 200px">'
                    + '<div class="spinner-grow text-warning" style="width: 3rem; height: 3rem;" role="status">'
                    +   '<span class="sr-only">Loading...</span>'
                    + '</div>'
                    + '</div>'
                    );

            },
            success: function(response) {
                $("#spinner").remove();
                $('.items').eq(count_items - 1).after(response);
            },
            error: function() {
                console.log("Server don`t response!!!")
            }
        })
    })

    $('#show_more_internship').on('click', function(e) {
        e.preventDefault();
        var dir =  $("input[name='dir']").val()
        var count_items = $('.items').length
        $.ajax({
            url: dir + '/ajax.php',
            data: {'action':'moreInternship', 'count_items':count_items, 'search':location.search.replace('?', '')},
            beforeSend: function() {
                $('.items').eq(count_items - 1).after(
                    '<div class="col-12 col-md-6 col-lg-4" id="spinner" style="display: flex; justify-content: center; align-items: center; min-height: 200px">'
                    + '<div class="spinner-grow text-warning" style="width: 3rem; height: 3rem;" role="status">'
                    +   '<span class="sr-only">Loading...</span>'
                    + '</div>'
                    + '</div>'
                    );

            },
            success: function(response) {
                $("#spinner").remove();
                $('.items').eq(count_items - 1).after(response);
            },
            error: function() {
                console.log("Server don`t response!!!")
            }
        })
    })

    $('#show_more_news').on('click', function(e) {
        e.preventDefault();
        var dir =  $("input[name='dir']").val()
        var count_items = $('.news-list__item').length
        $.ajax({
            url: dir + '/ajax.php',
            data: {'action':'moreNews', 'count_items':count_items, 'search':location.search.replace('?', '')},
            beforeSend: function() {
                $('.news-list__item').eq(count_items - 1).after(
                    '<div class="col-12 col-md-6 col-lg-4" id="spinner" style="display: flex; justify-content: center; align-items: center; min-height: 200px">'
                    + '<div class="spinner-grow text-warning" style="width: 3rem; height: 3rem;" role="status">'
                    +   '<span class="sr-only">Loading...</span>'
                    + '</div>'
                    + '</div>'
                    );
                    
                },
            success: function(response) {
                $("#spinner").remove();
                $('.news-list__item').eq(count_items - 1).after(response);
            },
            error: function() {
                console.log("Server don`t response!!!")
            }
        })
    })
    
})