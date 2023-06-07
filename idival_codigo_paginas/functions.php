<?php
/**
 * Idival functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Idival
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
if ( ! function_exists( 'idival_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function idival_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Idival, use a find and replace
		 * to change 'idival' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'idival', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary', 'idival' ),
				'lateral-menu' => esc_html__( 'Lateral', 'idival' ),
				'presentacion-menu' => esc_html__( 'Presentacion', 'idival' ),
				'talento-menu' => esc_html__( 'Talento', 'idival' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'idival_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'idival_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function idival_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'idival_content_width', 640 );
}
add_action( 'after_setup_theme', 'idival_content_width', 0 );

/**
 * Customizer options
 */

function idival_customizer_settings($wp_customize) {

	$wp_customize->add_section('idival_options', array(
		'title' => 'Idival',
		'description' => 'Opciones específicas para el tema Idival',
		'priority' => 120,
	));
	// add a setting for background color
	$wp_customize->add_setting('idival_background_color', array(
		'default'     => '#ffffff',
		'transport'   => 'refresh',
	) );
	// Add a control select background color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idival_background_color',
	array(
	'label' => 'Color de fondo',
	'section' => 'idival_options',
	'settings' => 'idival_background_color',
	) ) );

	// add a setting for the header text color
	$wp_customize->add_setting('idival_header_text_color', array(
		'default'     => '#000000',
		'transport'   => 'refresh',
	) );
	// Add a control select header text color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idival_header_text_color',
	array(
	'label' => 'Color de los encabezados',
	'section' => 'idival_options',
	'settings' => 'idival_header_text_color',
	) ) );

	// add a setting for text color
	$wp_customize->add_setting('idival_text_color', array(
		'default'     => '#000000',
		'transport'   => 'refresh',
	) );
	// Add a control select text color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idival_text_color',
	array(
	'label' => 'Color del texto',
	'section' => 'idival_options',
	'settings' => 'idival_text_color',
	) ) );

	// Add a control select header text color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idival_header_text_color',
	array(
	'label' => 'Color de los encabezados',
	'section' => 'idival_options',
	'settings' => 'idival_header_text_color',
	) ) );

	// add a setting for link color
	$wp_customize->add_setting('idival_link_color', array(
		'default'     => '#000000',
		'transport'   => 'refresh',
	) );
	// Add a control select link color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idival_link_color',
	array(
	'label' => 'Color de los enlaces',
	'section' => 'idival_options',
	'settings' => 'idival_link_color',
	) ) );

	$wp_customize->add_setting( 'idival_custom_script' );
	$wp_customize->add_control( 'idival_custom_script', array(
	'type' => 'textarea',
	'id'=> 'idival_custom_script',
	'label' => 'Javascript personalizado',
	'section' => 'idival_options'
	) );
	// add a setting for front page video
	$wp_customize->add_setting('idival_front_page_video');
	//Add a control for front page vídeo
	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'idival_front_page_video', array(
		'section' => 'idival_options',
		'label' => 'Vídeo para la página de inicio',
		'mime_type' => 'video'
	)));

	// add a setting for main sections background color
	$wp_customize->add_setting('idival_main_section_background', array(
		'default'     => '#000000',
		'transport'   => 'refresh',
	) );
	// Add a control select main sections background color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idival_main_section_background',
	array(
	'label' => 'Color de fondo de las secciones principales en el home',
	'section' => 'idival_options',
	'settings' => 'idival_main_section_background',
	) ) );

	// add a setting for main sections text color
	$wp_customize->add_setting('idival_main_section_text_color', array(
		'default'     => '#000000',
		'transport'   => 'refresh',
	) );
	// Add a control select main sections text color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'idival_main_section_text_color',
	array(
	'label' => 'Color de texto de las secciones principales en el home',
	'section' => 'idival_options',
	'settings' => 'idival_main_section_text_color',
	) ) );

	// add a setting for Default list image
	$wp_customize->add_setting('idival_default_list_image');
	//Add a control for Default list image
	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'idival_default_list_image', array(
		'section' => 'idival_options',
		'label' => 'Imagen por defecto para los listados de noticias',
		'mime_type' => 'image'
	)));

	// add a setting for Default header image
	$wp_customize->add_setting('idival_default_header_image');
	//Add a control for Default header image
	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'idival_default_header_image', array(
		'section' => 'idival_options',
		'label' => 'Imagen por defecto para las cabeceras de página',
		'mime_type' => 'image'
	)));

	//CheckBox Banner Plenos
	$wp_customize->add_setting( 'idival_show_banner', array(
		'default' => '',
	));

	//add control
	$wp_customize->add_control( 'idival_show_banner_checkbox', array(
				'label' => 'Mostrar banner de plenos en la home page',
				'type'  => 'checkbox', // this indicates the type of control
				'section' => 'idival_options',
				'settings' => 'idival_show_banner'
	));

	//Texto Banner Plenos
	$wp_customize->add_setting( 'idival_show_banner_text', array(
		'default' => '',
	));

	//add control
	$wp_customize->add_control( 'idival_show_banner_text', array(
				'label' => 'Texto a mostrar en el banner de plenos en la home page',
				'type'  => 'text', // this indicates the type of control
				'section' => 'idival_options',
				'settings' => 'idival_show_banner_text'
	));

	$wp_customize->add_section('idival_page_idival_options', array(
		'title' => 'Page-idival',
		'description' => 'Opciones específicas para la Page-idival',
		'priority' => 110,
	));

	//Imagen banner page-idival
	$wp_customize->add_setting('idival_show_page_idival_banner');

	//add control
	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'idival_default_page_idival_banner', array(
		'label' => 'Imagen por defecto para la cabecera de la Página Idival',
		'mime_type' => 'image',
		'section' => 'idival_page_idival_options',
		'settings' => 'idival_show_page_idival_banner'
	)));
}
add_action('customize_register', 'idival_customizer_settings');

//añadiendo imagen customizable de la pagina page-idival.php
function wp_page_idival(){
	$wp_customize->add_section('idival_page_idival', array(
		'title' => 'Página Idival',
	));
	$wp_customize->add_setting('idival_show_page_idival_banner');
	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'idival_default_page_idival_banner', array(
		'section' => 'idival_page_idival_options',
		'label' => 'Imagen por defecto para la cabecera de la Página Idival',
		'mime_type' => 'image',
	)));

}
//add_action('customize_register','wp_page_idival');


// function theme_support(){
// 	//adds dynamic title tag suport
// 	add_theme_support('title_tag');

// 	/**
// 	 * Add support for core custom logo.
// 	 *
// 	 * @link https://codex.wordpress.org/Theme_Logo
// 	 *
// 	 * PROBLEMA: NO FUNCIONA EL TAMAÑO
// 	 *
// 	 */
// 	add_theme_support(
// 		'custom-logo',
// 		array(
// 			'width'       => 200,
// 			'flex-height' => true,
// 		));

// 	/*
// 		* Enable support for Post Thumbnails on posts and pages.
// 		*
// 		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
// 		*/
// 	add_theme_support( 'post-thumbnails' );

// 	// This theme uses wp_nav_menu() in one location.
// 	register_nav_menus(
// 		array(
// 			'primary-menu' => esc_html__( 'Primary', 'idival' ),
// 			'lateral-menu' => esc_html__( 'Lateral', 'idival' )
// 		)
// 	);


// 	/*
// 		* Switch default core markup for search form, comment form, and comments
// 		* to output valid HTML5.
// 		*/
// 	add_theme_support(
// 		'html5',
// 		array(
// 			'search-form',
// 			'comment-form',
// 			'comment-list',
// 			'gallery',
// 			'caption',
// 			'style',
// 			'script',
// 		)
// 	);


// }
// add_action('after_setup_theme', 'theme_support');

//Quitar parrafos automaticos de wordpress
//remove_filter( 'the_content', 'wpautop' );

/**AÑADIR FILTRO*/
// Parameters as separate arguments
add_query_arg( $param1, $old_query_or_uri );

// Parameters as array of key => value pairs
add_query_arg(
    array(
        'name' => 'value'
    ),
    $old_query_or_uri
);
//Añadir filtros
function add_query_vars_filter( $vars ){
	$vars[] = "name";
	return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );
/**FIN AÑADIR FILTRO*/

//Busqueda de contenido idival
function idival_content($type, $s = null, $cat = null, $tag_id = null, $tag = null, $meta = null, $meta_key = null, $orderby = null, $order = null, $posts_per_page = null, $offset = null)
{
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$args = array(
        'post_type' => $type,
		's' => $s,
		'cat' => pll_get_term($cat),
		'tag_id' => pll_get_term($tag_id),
		'tax_query' => $tag,
		'meta_query' => $meta,
		'meta_key' => $meta_key,
		'orderby' => $orderby,
		'order' => $order,
        'posts_per_page' => $posts_per_page,
		'paged' => $paged,
		'offset' => $offset,
        );
	return new WP_Query( $args );
}

//FIN búsqueda de contenido idival

//registra estilos
function register_styles(){
	$version = wp_get_theme()->get('Version');
	wp_enqueue_style('bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', array(), 5.1, 'all');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), $version, 'all');
	wp_enqueue_style('normalize', get_template_directory_uri() .'/assets/css/normalize.css', array(), 1.0, 'all');
	wp_enqueue_style('slick-css', get_template_directory_uri() .'/assets/css/slick.css', array(), 1.8, 'all');
	wp_enqueue_style('slick-theme-css', get_template_directory_uri() .'/assets/css/slick-theme.css', array('slick-css'), 1.8, 'all');
}
add_action('wp_enqueue_scripts', 'register_styles');

function include_jQuery() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', false, '1.9.1');
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'include_jQuery');

//registra scripts
function register_scripts(){
	$version = wp_get_theme()->get('Version');
	//wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), 3.6, false);
	wp_register_script('custom_script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), $version, true);
	wp_enqueue_script('custom_script');
	wp_enqueue_script('bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array(), 5.1, true);
	wp_enqueue_script('fontawesome', '//kit.fontawesome.com/43ff2a520e.js', array(), 1.0, true);
	wp_enqueue_script('slick', get_template_directory_uri() .'/assets/js/slick.min.js', array('jquery'), 1.8, true);

	wp_enqueue_script(
		'flatpickr-locale'
		, "https://npmcdn.com/flatpickr/dist/l10n/es.js"
		, array('flatpickr')
		, '4'
		, true
	);
}
add_action('wp_enqueue_scripts', 'register_scripts');

// Breadcrumbs
function idival_breadcrumb() {
	global $post;
	echo '<ul id="idival-breadcrumb" class="idival-breadcrumb">';
	if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'IDIVAL';
        echo '</a></li>';
        if (is_category() || is_single()) {
            echo '<li class="category">';
            the_category(' </li><li> ');
            if (is_single()) {
                echo '</li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li>';
                }
                echo $output;
                echo '<a class="last-anchor" ref="'.$anc.'" title="'.$title.'"> '.$title.'</a>';
            } else {
                echo '<li><a class="activo" href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title().'</a></li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}

function get_list_posts ($attribs) {
	$args = shortcode_atts( array(
		'number' => 0,
		'category' => '',
	), $attribs );


	$posts_args = array(
        'numberposts' => $args['number'],
        'category'    => $args['category']
    );

	$lastposts = get_posts($posts_args);

	$list = '';
	if ( $lastposts ) {
		$list = '<ul class="post-list">';
		foreach ( $lastposts as $post ) {
			$url = get_permalink($post->ID);
			$title = get_the_title($post->ID);

			$list .= '<li><a href="' . $url . '" class="colorNegro">' . $title . '</a></li>';
			$list .= '<span class="separator mt-2"></span>';
		}
		$list .= '</ul>';
	}

	echo $list;
}

add_shortcode( 'listposts', 'get_list_posts' );

// Posts slider
function get_slider_posts ($attribs) {
	$sc_args = shortcode_atts( array(
		'lang' => 'es',
	), $attribs );

	$args = [
		'posts_per_page' => 5,
		'post_type' => 'post',
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
		'cat' => 49
	];

	$post_query = new WP_Query($args);

	$more_information = 'Más información';
	if ($sc_args['lang'] == 'en') {
		$more_information = 'More information';
	}

	$html = '';
	if ($post_query->have_posts()) {
		while($post_query->have_posts()) {
			$post_query->the_post();

			$img = <<<HTML
	<img src="https://via.placeholder.com/1400x800" class="img-fluid" alt="">
HTML;
			if (has_post_thumbnail()) {
				$img = get_the_post_thumbnail($post_query->ID, 'post-thumbnail', ['class' => 'img-fluid']);
			}

			$limit = 50;
			$excerpt = wp_trim_words(get_the_content(), $limit,'...');
			if(has_excerpt()) {
				$excerpt = get_the_excerpt();
			}

			$url = esc_url(get_the_permalink());
			$title = get_the_title();

			$html .= <<<HTML
				<div>
					<div class="row g-0">
						<div class="col-md-5 mw-100 p-3">
							$img
						</div>
						<div class="col-md-7">
							<div class="card-body">
								<h2 class="card-title align-text-top">
									$title
								</h2>
								<p>$excerpt</p>
								<a href="$url">
									<div class="col-md-3 me-md-0 me-2 text-center pt-2 float-start">
										$more_information
									</div>
									<div class="col-md-3 me-md-0 me-2 text-center pt-2 float-start">
										<img src="/wp-content/uploads/2022/05/flecha-1.png" class="img-fluid my-auto">
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
HTML;
		}
	}

	wp_reset_postdata();


	return <<<HTML
		<!--Slide de Posts-->
		<div class="post-carousel row my-5">
			$html
		</div>
    	<!--FIN Slide de Posts-->
HTML;

}

add_shortcode( 'sliderposts', 'get_slider_posts' );

// Posts news
function get_news_posts () {
	//Muestra los últimos dos post publicados
	$args = [
		'posts_per_page' => 4, /* how many post you need to display */
		'offset' => 0,
		'orderby' => 'post_date',
		'order' => 'DESC',
		'post_type' => 'post', /* your post type name */
		'post_status' => 'publish',
		'cat' => 20
	];

	$html = "";
	$count = 1;
	$border_end = 'border-end';

	$post_query = new WP_Query($args);

	if ($post_query->have_posts()) {
		while($post_query->have_posts()) {
			$border_end = 'border-end';
			$post_query->the_post();

			if ($count % 2 == 0) {
				$border_end = '';
			}

			$count++;

			$img = <<<HTML
	<img src="https://via.placeholder.com/600x600"  class="card-img-top img-fluid" alt="">
HTML;
			if (has_post_thumbnail()) {
				$img = get_the_post_thumbnail($post_query->ID, 'post-thumbnail', ['class' => 'img-fluid']);
			}

			$category = get_the_category_list('<p class="card-title">','</p>');

			$url = esc_url(get_the_permalink());
			$title = get_the_title();

			$html .= <<<HTML
				<div class="actualidad justify-content-center col-md-6 $border_end">
					<a href="$url">
						$img
					</a>
					<div class="card-body">
						<a href="$url">
							<h3>$title</h3>
						</a>
					</div>
				</div>
HTML;
		}
	}

	wp_reset_postdata();

	return <<<HTML
		<div class="row mt-5 mb-3">
			$html
		</div>
HTML;
}

add_shortcode( 'postsnews', 'get_news_posts' );

function get_special_posts($attribs) {
	$sc_args = shortcode_atts( array(
		'lang' => 'es',
	), $attribs );

	$args = [
        'posts_per_page' => 8, /* how many post you need to display */
        'offset'         => 0,
        'meta_key'       => 'orden',
	    'orderby'        => 'meta_value',
        'order'          => 'ASC',
        'post_type'      => 'post', /* your post type name */
        'post_status'    => 'publish',
        'cat'            => 51
    ];

	$html = '';
	$more_information = 'Más información';
	if ($sc_args['lang'] == 'en') {
		$more_information = 'More information';
	}

	$post_query = new WP_Query($args);
	if ($post_query->have_posts()) {
		while($post_query->have_posts()) {
			$post_query->the_post();

			$title = get_the_title();
			$url = esc_url(get_the_permalink());

			$limit = 50;
			$excerpt = wp_trim_words(get_the_content(), $limit,'...');
			if(has_excerpt()) {
				$excerpt = get_the_excerpt();
			}

			$img = get_the_post_thumbnail($post_query->ID, 'full', ['class' => 'img-fluid']);

			$html .= <<<HTML
				<div class="col-lg-3 mb-4">
					<div class="card">
						<figure class="card__thumb">
							$img
							<figcaption class="card__caption">
								<h3 class="card__title" style="text-align: center;">
									$title
								</h3>
								<a class="card__snippet card__button" href="$url">
									$excerpt
								</a>
							</figcaption>
						</figure>
					</div>
				</div>
HTML;
		}
	}

	wp_reset_postdata();

	return <<<HTML
		<div class="container mt-5">
			<div class="row mb-4 px-2">
				$html
			</div>
		</div>
HTML;
}

add_shortcode( 'specialposts', 'get_special_posts' );

?>