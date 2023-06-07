<?php
    /**
     * Template Name: Plantilla Noticias
     *
     * Página para mostrar la sección de noticias
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

    $title = 'Noticias';
    $first_filter = 'Todo';
    $search = 'No se encontraron resultados';
	$post_action = '/noticias/#posts';
	$category_filter = 'noticias';

    $parent = 75;
	if ($idioma == 'en') {
		$parent = 304;
        $title = 'News';
        $first_filter = 'All';
        $search = 'No results found';
		$category_filter = 'news';
		$post_action = '/en/news/#posts';
	}

    // Get categories
    $args = array(
        'hide_empty' => 0,
        'parent' => $parent,
        'orderby' => 'name',
        'order'   => 'ASC'
    );

    $categories = get_categories($args);

    if($_POST["filtro"]) {
        $category_filter = $_POST["filtro"];
    }

    $default_images = array(
        'https://www.idival.org/wp-content/uploads/2022/08/default-01.jpg',
        'https://www.idival.org/wp-content/uploads/2022/08/default-02.jpg',
        'https://www.idival.org/wp-content/uploads/2022/08/default-03.jpg',
        'https://www.idival.org/wp-content/uploads/2022/08/default-04.jpg',
        'https://www.idival.org/wp-content/uploads/2022/08/default-05.jpg',
        'https://www.idival.org/wp-content/uploads/2022/08/default-06.jpg'
    );
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
            <div id="documentacion" class="row pt-5">
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
                                        <option value=''><?php echo  $first_filter; ?></option>
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
            <!-- cards posts -->
            <?php
                if ($currentPage == 1):
                    $count = 1;

                    $postPerPage = 8;
                    if ($currentPage > 1) {
                        $postPerPage = 16;
                    }

                    // Get posts
                    $args = [
                        'posts_per_page' => $postPerPage,
                        'paged' => $currentPage,
                        'orderby' => 'post_date',
                        'order' => 'DESC',
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'category_name' => $category_filter
                    ];

                    $post_query = new WP_Query($args);

                    if ($post_query->have_posts()) :
                        while($post_query->have_posts()) :
                            $post_query->the_post();
                            $url = get_permalink($post);
                            $title = get_the_title($post);
                            $category = get_the_category($post)[0];
            ?>
            <?php if($count == 1) : ?>
            <!-- Cards of posts -->
            <div class="row mt-5 mb-3">
            <?php
                endif;
                if($count % 4 == 0) :
                    $count++;
            ?>
                <div class="col-lg-3 mb-3 px-2">
            <?php
                else :
                    $count++;
            ?>
                <div class="col-lg-3 mb-3 px-2 border-end">
            <?php endif; ?>
                    <a href="<?php echo $url;?>">
                    <?php if(get_field('imagen')) :
                            $image = get_field('imagen');
                    ?>
                        <img class="card-img-top img-fluid" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <?php  elseif (get_post_thumbnail_id( $post )) :
                            the_post_thumbnail( 'medium', array( 'sizes' => '(max-width:300px) 300px, (max-width:150px) 150px' ) );
                    ?>
                    <?php else:
                        $default = random_int(0, 5);
                    ?>
                        <img src="<?php echo $default_images[$default]; ?>"  class="card-img-top img-fluid" alt="">
                    <?php endif; ?>
                    </a>
                    <div class="card-body px-2">
                        <div class="date-category d-flex justify-content-between">
                            <span class="date">
                                <?php the_date(); ?>
                            </span>
                            <span class="colorAzul"><?php echo($category->name); ?></span>
                        </div>
                        <a href="<?php echo $url;?>" class="colorNegro">
                            <h5><?php echo $title; ?></h5>
                            <p><?php the_field('descripcion'); ?></p>
                        </a>
                    </div>
                </div>
            <?php
                        endwhile;
                    endif;
                endif;
                wp_reset_postdata();

                if ($currentPage == 0):
            ?>
            </div>
            <div class="row mt-5 mb-3">
                <span class="separator"></span>
            </div>
            <?php endif; ?>
            <!-- More posts -->
            <div class="row mt-5 mb-3">
                <ul class="post-list">
                <?php
                    $postPerPage = 8;
                    if ($currentPage > 1) {
                        $postPerPage = 16;
                    } else {
                        $currentPage = 2;
                    }

                    // Get posts
                    $args = [
                        'posts_per_page' => $postPerPage,
                        'paged' => $currentPage,
                        'orderby' => 'post_date',
                        'order' => 'DESC',
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'category_name' => $category_filter
                    ];

                    $post_query = new WP_Query($args);

                    if ($post_query->have_posts()) :
                        while($post_query->have_posts()) :
                            $post_query->the_post();
                            $url = get_permalink($post);
                            $title = get_the_title($post);
                            $category = get_the_category($post)[0];
                ?>
                     <li>
                        <a href="<?php echo $url; ?>" class="colorNegro">
                            <?php echo $title; ?>
                        </a> - <span class="colorAzul"><?php echo $category->name; ?> <span>
                    </li>
                    <span class="separator mt-2"></span>
                <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();

                    if ($postPerPage == 8) {
                        $currentPage = 0;
                    }

                    $args['paged'] = $currentPage;
                    $args['post_per_page'] = 16;

                    $post_query = new WP_Query($args);

                    // Get number of pages
                    $pagination = paginate_links(array(
                        'type'  => 'array',
                        'total' => $post_query->max_num_pages
                    ));
                    wp_reset_postdata();
                ?>
                </ul>
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
							if(count(explode('current', $page)) >= 3){
								// replace clases
								$page = str_replace('page-numbers', 'page-link', $page);
								$page = str_replace('current', '', $page);
								$page = str_replace('Siguiente', '', $page);
								$page = str_replace('Anterior', '', $page);
							}else{
								// replace clases
								$page = str_replace('page-numbers', 'page-link', $page);
								$page = str_replace('current', '', $page);
								$page = str_replace('Siguiente', '', $page);
								$page = str_replace('Anterior', '', $page);
							}
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