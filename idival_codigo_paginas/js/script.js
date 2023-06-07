jQuery(document).ready(function($){
    var navegador = $('#navegador');

    var colaboraButton = $('#colaboraButton');
    var previousScroll = 0;

    var menu = $('a.nav-link');
    var btMenu = $('#btMenu');

    //desplegar y ocultar menu lateral
    var nav2 = $('#nav2');
    $(btMenu).click(function(event){
        $(nav2).show(500).fadeIn()
    });

    //Boton cierre menu lateral
    $("#closenav2Bttn").click(function (event) {
        $(nav2).hide(500);
        $(nav2).find('ul.sub-menu').hide();
    })

    $('.menu-idival li').click(function(i){
        $('.menu-idival li').each(
            function(){
                $(this).removeClass("activo");
            }
        );
        $(this).addClass("activo");
    });

    $(window).scroll(function(event){
        var scroll = $(this).scrollTop();
        if (scroll > previousScroll & scroll > 0){
            navegador.removeClass('bg-transparent');
            navegador.addClass('bg-white');

            menu.removeClass('navbar-white');
            navegador.addClass('navbar-light');

            /*Se le da altura al menú sticky*/
            navegador.addClass('navegadorStickyAltura');

            colaboraButton.removeClass('nav-button-white');
            colaboraButton.addClass('nav-button-black');

            $('#btMenu').removeClass('text-light');

            $('#navButtonDrch').hide();

            $('#head-navbar').removeClass('d-lg-block');

            $('#megamenulogo').addClass('d-none');

            $('#sticky-logo').removeClass('d-none');
            $('#navButtonDrchSticky').removeClass('d-none');

            $('#megamenulogo').removeClass('d-block');

            $('#colabora').addClass('colabora-black donate-r');
            $('#colabora').removeClass('colabora-white donate');

            $('#search-lang-content').removeClass('color-light flex-column');
            $('#search-lang-content').addClass('flex-row-reverse');

        } else if(scroll == 0){
            navegador.removeClass('bg-white');
            navegador.addClass('bg-transparent');
            navegador.removeClass('navbar-light');

            /*Se le quita altura al menú sticky*/
            navegador.removeClass('navegadorStickyAltura');

            menu.addClass('navbar-white');

            colaboraButton.removeClass('nav-button-black');
            colaboraButton.addClass('nav-button-white');

            $('#btMenu').addClass('text-light');

            $('#head-navbar').addClass('d-lg-block');

            $('#navButtonDrch').show();

            $('#megamenulogo').removeClass('d-none');

            $('#colabora').addClass('colabora-white donate');
            $('#colabora').removeClass('colabora-black donate-r');

            $('#search-lang-content').addClass('color-light flex-column');
            $('#search-lang-content').removeClass('flex-row-reverse');

            $('#sticky-logo').addClass('d-none');
        }
        previousScroll = scroll;
    });


    //Post Carousel
    $('.post-carousel').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 8000
    });

    //eventos onclick menu lateral
    $("#menu-lateral .menu-item-has-children a").on("click", function () { showLateralMenu($(this)) });

    function showLateralMenu(element) {
        if (element.closest('li').children('ul.sub-menu').is(":visible")) {
            element.closest('li').removeClass('active');
            element.closest('li').find('ul.sub-menu').hide();
        } else {
            element.closest('li').addClass('active');
            element.closest('li').children('ul.sub-menu').show();
        }
    }

    // $("#filtro").on("change", function () {
    //     $('#paged').val(1)
    //     $("#category_form").submit();
    // });
	
// 	$(".category-filter").on("click", function () {
//         $('#paged').val(1)
//         $("#category_form").submit();
//     });

    // $('.page-link ').on("click", function (e){
    //     e.preventDefault();

    //     if ($("#category_form").length) {
    //         let paged = e.target.innerText

    //         $('#paged').val(paged)

    //         $("#category_form").submit();
    //     }
    //     else {
    //         window.location.href = e.target.href
    //     }
    // })

    // $('.page-link ').on("click", function (e){
    //     e.preventDefault();

    //     if ($("#category_form").length) {
    //         let paged = e.target.innerText

    //         $('#paged').val(paged)

    //         $("#category_form").submit();
    //     }
    //     else {
    //         window.location.href = e.target.href
    //     }
    // })

    $(".toggle").click(function(e){
        e.preventDefault();
        $(this).toggleClass("active");

        const container = e.target.closest('.elementor-widget-container')
        const readMore = container.querySelector('.overview-collapsible')

        $(readMore).toggleClass("reading-more");

        if($(this).hasClass("active")) {
            $(this).text("Leer menos");
        }
        else {
            $(this).text("Leer más");
        }
    });
});

// Set active last element on breadcrumbs
const categories = document.querySelectorAll('.idival-breadcrumb > li')
const lastAnchor = document.querySelector('.idival-breadcrumb > .last-anchor')
if (categories.length > 0 ) {
    const anchorElement = categories[categories.length - 1].querySelector('a')
    if (lastAnchor != null) {
        anchorElement.classList.remove('activo')
        lastAnchor.classList.add('activo')
    } else if (anchorElement == null) {
        categories[categories.length - 1].classList.add('activo')
    } else if (!anchorElement.classList.contains('activo')) {
        anchorElement.classList.add('activo')
    }
}