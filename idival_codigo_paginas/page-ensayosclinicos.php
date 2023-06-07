<?php
/**
 * Template Name: Plantilla Ensayos Clínicos
 *
 * Página para mostrar la sección ensayos clínicos
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
<div id="contenidoEnsayosClinicos">
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
    <div id="contenido-ensayos-clinicos" class="container mt-2">
    <?php get_template_part( 'template-parts/content', 'page' ); ?>
    </div>
</div>
<?php
    get_footer();
?>