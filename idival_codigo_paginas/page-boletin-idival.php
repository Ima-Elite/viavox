<?php
    /**
     * Template Name: Plantilla Boletin
     *
     * Página para mostrar la sección de boletines
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package Idival
     */
    get_header();

    $header_image = 'https://www.idival.org/wp-content/uploads/2022/05/cab-presentacion.jpg';
    if(get_field('imagen_cabecera')) {
        $header_image = get_field('imagen_cabecera')['url'];
    }

    // Get current page for pagination
	$currentPage = 1;
	if($_POST["paged"]) {
		$currentPage = absint($_POST["paged"]);
	}

    $idioma = pll_current_language();

    $title = 'Boletin';
    $download = "Descargar";
    $search = 'No se encontraron resultados';
	$post_action = '/boletin-idival/#posts';
	$category_filter = date('Y');

	$parent = 81;
	if ($idioma == 'en') {
		$parent = 143;
        $title = 'Newsletter';
        $download = "Download";
        $search = 'No results found';
		$category_filter = 'newsletter';
		$post_action = '/en/newsletter/#posts';
	}

    // Get categories
    $args = array(
        'hide_empty' => 0,
        'parent' => $parent,
        'orderby' => 'name',
        'order'   => 'DESC'
    );

    $categories = get_categories($args);

    if($_POST["filtro"]) {
        $category_filter = $_POST["filtro"];
    }

    // Get posts
    $args = [
        'posts_per_page' => 8,
        'paged' => $currentPage,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'category_name' => $category_filter
    ];

    $post_query = new WP_Query($args);
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <img src="<?php echo $header_image; ?>" class="img-fluid w-100 cabecera_pagina" alt="<?php echo $header_image; ?>"/>
            </div>
        </div>
    </div>
    <div id="contenidoIdival">
        <div id="nav-pagina" class="container-fluid">
            <div class="container d-flex justify-content-between">
                <div class="nav-top">
                    <?php idival_breadcrumb(); ?>
                </div>
                <div class="align-self-center">
                    <?php dynamic_sidebar('smartslider_area_1');?>
                </div>
            </div>
        </div>
        <div id="contenido-idival" class="container mt-2">
            <div id="boletin" class="row pt-5">
                <div class="col-md-4 mt-2">
                    <h3><?php echo $title; ?></h3>
                </div>
                <div class="col-md-4 mt-3 d-inline-block" id="posts">
                    <div class="text-center">
                        <span>Filtrar por: </span>
                        <div class="d-inline-block">
                            <form method="post" action="<?php echo $post_action; ?>" name="category_form" id="category_form">
                                <input type="hidden" name="paged" id="paged" value="<?php echo $_POST['paged']; ?>">
                                <div class="arrow">
                                    <select name="filtro" class="form-select round-select colorAzul" id="filtro" >
                                        <?php foreach($categories as $category): ?>
                                        <option value="<?php echo $category->name; ?>" <?php if ($category_filter == $category->name) :?> selected <?php endif; ?>>
                                            <?php echo $category->name; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 m-auto">
            <?php
                $count = 1;
                if ($post_query->have_posts()) :
                    while($post_query->have_posts()) :
                        $post_query->the_post();
                        $category = get_the_category($post)[0];
            ?>
            <?php if($count == 1) : ?>
                <div class="post mt-5 mb-3">
                    <div class="media d-flex flex-row mb-3">
                        <div class="col-5 me-3">
                        <?php if(get_field('imagen')) :
                            $image = get_field('imagen');
                        ?>
                            <img src="<?php echo $image['url']; ?>" alt="" class="me-3 img-fluid pos-thumb d-none d-md-flex" loading="lazy">
                        <?php  elseif (get_post_thumbnail_id( $post )) :
                                the_post_thumbnail( 'medium', array( 'sizes' => '(max-width:300px) 300px, (max-width:150px) 150px' ) );
                        ?>
                        <?php else:  ?>
                            <img src="https://via.placeholder.com/300x150"  class="card-img-top img-fluid img300x150" alt="">
                        <?php endif; ?>
                        </div>
                        <div class="media-body">
                            <h3 class="title mb-3">
                                <?php the_title(); ?>
                            </h3>
                            <a href="<?php the_permalink(); ?>" class="more-link enlaceAzul">
                            <?php echo $download; ?> &rarr;
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-5">
                        <ul class="post-list">
                <?php $count++; ?>
                <?php else : ?>
                        <li>
                            <a href="<?php echo esc_url(the_field('url_'));?>" class="text-decoration-none colorAzul">
                                <?php the_title(); ?>
                            </a>
                        </li>
                <?php
                    endif;
                    endwhile;
                ?>
                        </ul>
                    </div>
                </div>
            <?php
                // Get number of pages
				$pagination = paginate_links(array(
					'type'  => 'array',
					'total' => $post_query->max_num_pages
				));

                wp_reset_postdata();
            ?>
            <?php else :?>
            <div class="row mt-5 mb-3">
                <h4 class="text-center"><?php echo $search; ?></h4>
            </div>
            <?php endif; ?>

            </div>
            <div class="row mt-5 mb-3">
                <nav aria-label="post navigation">
                    <ul id="pagination" class="pagination justify-content-center">
                    <?php
                        foreach($pagination as $page) :
                            // get current page
                            $current = false;
                            if (count(explode('current', $page)) > 1) {
                                $current = true;
                            }

                            // replace clases
                            $page = str_replace('page-numbers', 'page-link', $page);
                            $page = str_replace('current', '', $page);
                            $page = str_replace('Siguiente', '', $page);
                            $page = str_replace('Anterior', '', $page);
                    ?>
                        <li class="page-item <?php if ($current) : ?> active <?php endif; ?>">
                            <?php echo $page; ?>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

<?php
    get_footer();
?>