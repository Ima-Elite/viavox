<?php
    /**
     * Template Name: Category
     *
     * Página para mostrar category details
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
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-12 p-0">
			<img src="<?php echo $header_image; ?>" class="img-fluid w-100 cabecera_pagina" alt="<?php echo $header_image; ?>"/>
		</div>
	</div>
</div>
<div class="container-fluid" id="category-content">
    <div id="nav-pagina">
		<div class="container d-flex justify-content-between">
			<div class="nav-top">
				<?php idival_breadcrumb(); ?>
			</div>
			<div class="align-self-center">
				<?php dynamic_sidebar('smartslider_area_1');?>
			</div>
		</div>
	</div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
            <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();

                        get_template_part('template-parts/content', 'category');
                    }

                    // Get number of pages
                    $pagination = paginate_links(array(
                        'type'  => 'array'
                    ));
                } else {
                    get_template_part( 'template-parts/content', 'none' );
                }
            ?>
                <div class="row mt-5 mb-3">
                    <nav aria-label="post navigation">
                        <ul id="search" class="pagination justify-content-center">
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
    </div>
</div>
<?php
    get_footer();
?>