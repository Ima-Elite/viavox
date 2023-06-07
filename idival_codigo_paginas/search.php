<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package idival
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
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <main id="primary" class="site-main">
                <?php
						if ( have_posts() ) :

							if ( is_home() && ! is_front_page() ) :
				?>

                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>

                <?php
							else :
								$idioma = pll_current_language();
								if($idioma == 'es'){
				?>
									<div id="documentacion" class="mt-3 mb-4">
										<h3>Resultados de la búsqueda : <span class="enlaceAzul">«<?php echo get_query_var('s'); ?>»</span></h3>
									</div>
				<?php						
								}else{
				?>			
									<div id="documentacion" class="mt-3 mb-4">
										<h3>Search results : <span class="enlaceAzul">«<?php echo get_query_var('s'); ?>»</span></h3>
									</div>
				<?php
								}
				?>
<!-- 								<div id="documentacion" class="mt-3 mb-4">
									<h3>Resultados de la búsqueda : <span class="enlaceAzul">«<?php //echo get_query_var('s'); ?>»</span></h3>
								</div> -->
				<?php
							endif;

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', 'search' );

							endwhile;

							// Get number of pages
							$pagination = paginate_links(array(
								'type'  => 'array'
							));

				?>

								<div class="row mt-5 mb-3">
									<nav aria-label="post navigation">
										<ul class="pagination justify-content-center">
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
				<?php
						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
				?>

            </main><!-- #main -->
        </div>
        <div class="col-lg-4">
            <?php //get_sidebar();?>
        </div>
    </div>
</div>

<?php

get_footer();
?>