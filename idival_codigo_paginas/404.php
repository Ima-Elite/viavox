<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
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
<main id="site-content">

	<div class="section-inner thin error404-content">

		<?php $idioma = pll_current_language();
			if($idioma == "es"){ ?>
			<h1 class="entry-title"><?php _e( 'Página no encontrada', 'twentytwenty' ); ?></h1>
			<div class="intro-text"><p><?php _e( 'La página que estabas buscando no se pudo encontrar. Podría haber sido eliminada, renombrada o no haber existido en primer lugar.', 'twentytwenty' ); ?></p></div>
		<?php }elseif($idioma == "en"){ ?>
			<h1 class="entry-title"><?php _e( 'Page Not Found', 'twentytwenty' ); ?></h1>
		<div class="intro-text"><p><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'twentytwenty' ); ?></p></div>
		<?php } ?> 
		<?php
		get_search_form(
			array(
				'aria_label' => __( '404 not found', 'twentytwenty' ),
			)
		);
		?>

	</div><!-- .section-inner -->

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
