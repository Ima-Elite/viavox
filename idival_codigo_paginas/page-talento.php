<?php
/**
 * Template Name: Plantilla Talento
 *
 * Página para mostrar la sección talento
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
<div id="contenidoIdival">
	<div id="nav-pagina" class="container-fluid">
		<div class="container d-flex justify-content-between">
			<div>
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'talento-menu',
						'menu'        => 'menu-talento-es',
						'menu_id'        => 'menu-talento',
						'menu_class'	=> 'menu-idival'
					)
				);
			?>
			</div>
			<div class="align-self-center">
				<?php dynamic_sidebar('smartslider_area_1'); ?>
			</div>
		</div>
	</div>
	<div id="contenido-idival" class="container mt-5">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</div>
</div>

<?php

get_footer();
?>