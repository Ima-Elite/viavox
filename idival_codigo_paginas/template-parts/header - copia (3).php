<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package serveridival.loc
 */

    $lang = pll_current_language();

    $url = get_site_url();

    $donate_text = 'Colabora';
    $donate_url  = $url . '/colabora/';
    if($lang == 'en') {
        $donate_text = 'Give';
        $donate_url = $url . '/en/give/';
    }
?>
<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
        wp_body_open();
    ?>
    <div class="container-fluid">
        <header>
            <nav id="navegador" class="navbar fixed-top navbar-expand-xl header-navbar border-bottom-custom bg-transparent p-0">
                <div class="container">
                    <div class="menu-mobile">
                        <a id="btMenu" class="icon-menu-mobile pe-auto text-light">
                            <i class="fa-solid fa-bars icon-list2 "></i>
                        </a>
                    </div>
                    <div id="megamenulogo">
                        <?php the_custom_logo(); ?>
                    </div>
                    <div id="sticky-logo" class="d-none">
                        <a href="<?php echo $url; ?>" class="custom-logo-link" rel="home" aria-current="page">
                        <img src="<?php echo $url; ?>/wp-content/uploads/2022/05/logo-sticky.png" alt="idival_logo"></a>
                    </div>
                    <div id="head-navbar" class="navbar nav-text-white p-0 d-none d-lg-block">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary-menu',
                                    'menu_id'        => 'principal-es',
                                )
                            );
                        ?>
                    </div>
                    <div id="search-lang-content" class="d-flex flex-column color-light align-items-center">
                        <div class="idival-search d-flex flex-row">
                            <form role="search" method="get" class="search-form m-0" action="<?php //echo $url; ?>">
                                <input type="search" class="search-field" placeholder="<?php _e('Buscar...'); ?>" value="" name="s">
                                <button type="submit" class="btn btn-outline-dark btn-search py-0">
                                    <i class="fas fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                            <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location'  => 'idioma',
                                        'menu'            => 'language',
                                        'menu_class'      => 'px-2 py-0 m-0',
                                        'container_class' => 'menu-language-container',
                                        'before'          => '<i class="fa-solid fa-globe me-1"></i>'
                                    )
                                );
                            ?>
                        </div>
                        <a href="<?php echo $donate_url; ?>" id="colabora" class="colabora-white nav-button-white donate">
                            <?php echo $donate_text; ?>
                        </a>
                    </div>
                </div>
            </nav>
            <script>
                // Add header links
                const menuItems = document.querySelectorAll('.menu > li');

                for (let i = 0, l = menuItems.length; i < l; i++) {
                    const anchor = menuItems[i].querySelector('a')

                    const subMenu = menuItems[i].querySelector('.sub-menu')

                    if (subMenu !== null) {
                        const subMenuContent = document.createElement('div')

                        subMenuContent.classList.add('sub-menu-container')

                        const title = document.createElement('h4')
                        const copyAnchor = anchor.cloneNode(true)

                        title.append(copyAnchor)
                        subMenuContent.append(title)

                        const subMenu = menuItems[i].querySelector('.sub-menu')

                        subMenuContent.append(subMenu)

                        menuItems[i].append(subMenuContent)
                    }
                }
            </script>
        </header>
    </div>

    <div id="nav2Container">
        <nav id="nav2">
            <div id="closenav2Bttn">
                <p>X</p>
            </div>
            <p class="text-center" id="left-menu-logo">
                <img src="/wp-content/uploads/2022/05/logo-sticky.png" alt="idival_logo" />
            </p>
            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-lateral',
                        'menu'           => 'lateral-es',
                        'menu_id'        => 'menu-lateral'
                    )
                );
            ?>
        </nav>
    </div>