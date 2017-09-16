jQuery(document).ready(function($) {
    $('.header-wrapper .menu').slicknav({
        allowParentLinks :true,
        duration: 1000,
        prependTo: '.header-wrapper .responsive-slick-menu'
    });
    /*featured slider*/
    jQuery('.feature-slider ').show().owlCarousel({
        navigation : true, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
    });
    
    jQuery('.menu-item-has-children > a').click(function(){
        var at_this = jQuery(this);
        if( at_this.hasClass('at-clicked')){
            return true;
        };
        var at_width = jQuery(window).width();
        if( at_width > 992 && at_width <= 1230 ){
            at_this.addClass('at-clicked');
            return false;
        }
    });
    //for menu
     $('.header-wrapper #site-navigation .menu-main-menu-container').addClass('clearfix');

    // MASSONRY Without jquery
    $(window).load(function(){
        var $masonry_boxes = $( '.masonry-start' );
        $masonry_boxes.hide();

        var $container = $( '#masonry-loop' );
        $container.imagesLoaded( function(){
            $masonry_boxes.fadeIn( 'slow' );
            $container.masonry({
                itemSelector : '.masonry-post'
            });
        });
        $(window).resize(function () {
            $container.masonry('bindResize')
        });

        /*sticky menu*/
        var menu_sticky_height = $('#masthead').height() - $('#site-navigation').height() - $('.main-navigation.trends').height();
        var main_navigation_width =$('#page').width();
        $(window).scroll(function(){
            if ( $(this).scrollTop() > menu_sticky_height) {
                $('.weblog-enable-sticky-menu').css({"position": "fixed", "top": "0","right": "0","left": "0","z-index":'999',"background":"rgba(255, 255, 255, 0.9)"});
                $('.weblog-enable-sticky-menu .header-main-menu').css('margin','0 auto');
            }
            else {
                $('.weblog-enable-sticky-menu').removeAttr( 'style' );
                $('.weblog-enable-sticky-menu .header-main-menu').removeAttr( 'style' );
            }
            if ( $(this).scrollTop() > menu_sticky_height) {
                $('.sm-up-container').show();
            }
            else {
                $('.sm-up-container').hide();
            }
        });

        //Sickey Sidebar
        if($('body').hasClass('at-sticky-sidebar')){
            if($('body').hasClass('both-sidebar')){
                $('#primary-wrap, #secondary-right, #secondary-left').theiaStickySidebar();
            }
            else{
                $('.secondary-sidebar, #primary').theiaStickySidebar();
            }
        }
    });

    /*new pagination style*/
    var paged = parseInt(weblog_ajax.paged) + 1;
    var max_num_pages = parseInt(weblog_ajax.max_num_pages);
    var next_posts = weblog_ajax.next_posts;

    $(document).on( 'click', '.show-more', function( event ) {
        event.preventDefault();
        var show_more = $(this);
        var click = show_more.attr('data-click');

        if( (paged-1) >= max_num_pages){
            show_more.html(weblog_ajax.no_more_posts)
        }

        if( click == 0 || (paged-1) >= max_num_pages){
            return false;
        }
        show_more.html('<i class="fa fa-spinner fa-spin fa-fw"></i>');
        show_more.attr("data-click", 0);
        var page = parseInt( show_more.attr('data-number') );


        $('#weblog-temp-post').load(next_posts + ' article.post', function() {
            /*http://stackoverflow.com/questions/17780515/append-ajax-items-to-masonry-with-infinite-scroll*/
            paged++;/*next page number*/
            next_posts = next_posts.replace(/(\/?)page(\/|d=)[0-9]+/, '$1page$2'+ paged);

            var html = $('#weblog-temp-post').html();
            $('#weblog-temp-post').html('');

            // Make jQuery object from HTML string
            var $moreBlocks = $( html ).filter('article.masonry-post');

            // Append new blocks to container
            $('#masonry-loop').append( $moreBlocks ).imagesLoaded(function(){
                // Have Masonry position new blocks
                $('#masonry-loop').masonry( 'appended', $moreBlocks );
            });
            show_more.attr("data-number", page+1);
            show_more.attr("data-click", 1);
            show_more.html(weblog_ajax.show_more)
        });
        return false;
    });
});