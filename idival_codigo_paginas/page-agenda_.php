<?php
/**
 * Template Name: Plantilla Agenda
 * Template Post Type: post
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Comillas
 */


// Nuevo
get_header();
// $header_image = wp_get_attachment_url( get_theme_mod('aranda_de_duero_default_header_image'));
$header_image = 'https://www.idival.org/wp-content/uploads/2022/08/encab_act_agenda.jpg';
if(get_field('imagen_cabecera')) {
	$header_image = get_field('imagen_cabecera')['url'];
}

?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>
  <style>
	.event a {
	    background-color: #003eff !important;
	    color: #ffffff !important;
	}
  </style>

  <script>
	var defaultDate = null;
	var events = [];
	var eventDates = {};

	<?php
		$query = idival_content(
			'post',
			$s,
			'69',
			null,
			null,
			array(
				// 'meta_query' => array(
				// 	'relation' => 'AND',
				// 	array(
				// 		'key' => 'fecha',
				// 		'value' => $fecha,
				// 		'compare' => '='
				// 	),
				// 	// array(
				// 	//     'relation' => 'AND',
				// 	//     array(
				// 	//         'key' => 'fecha_de_inicio',
				// 	//         'value' => $fecha,
				// 	//         'compare' => '>='
				// 	//     ),
				// 	//     array(
				// 	//         'key' => 'fecha_de_fin',
				// 	//         'value' => $fecha,
				// 	//         'compare' => '<='
				// 	//     ),
				// 	// ),
				// )
			),
			'fecha',
			'meta_value_num',
			'ASC',
			'-1',
			null,
		);

		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();

					$string = get_field('fecha');
				?>
				events.push("<?php echo $string; ?>");
				<?php
			endwhile;

		endif;
		if($_GET['fecha'] != '') :
	?>
			defaultDate = "<?php echo $_GET['fecha'] ?>";
	<?php
		endif;
  	?>
  </script>
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
	<div class="container mt-4">
		<div class="row">
				<header class="entry-header ml-3 mb-4">
		            <h1 class="entry-title"><?php _e('Agenda', 'idival');?></h1>
                </header>
				<div class="col-lg-3 pt-4 d-none d-lg-block">
					<input class="flatpickr flatpickr-input events d-none" type="text" readonly="readonly">
				</div>
				<div class="col-lg-9 pt-4">
				<main id="primary" class="site-main">
                    <!-- <form method="get" class="mb-4">
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <input type="text" class="form-control" id="text" name="text" placeholder="<?php _e('Evento', 'idival')?>" value=<?php echo $_GET['text']?>>
                            </div>
                            <div class="form-group col-lg-3">
                                <input type="text" class="form-control" name="fecha_de_inicio" id="fecha_de_inicio" value="<?php echo $fecha_de_inicio?>"/>
                            </div>
                            <div class="form-group col-lg-3">
                                <input type="text" class="form-control" name="fecha_de_fin" id="fecha_de_fin" value="<?php echo $fecha_de_fin?>"/>
                            </div>
                            <div class="form-group col-lg-2">
                                <button type="submit" class="btn btn-primary btn-block"><?php _e('Buscar', 'idival')?></button>
                            </div>
                        </div>
                    </form> -->

                    <?php

                        $s=null;
                        if($_GET['text'] != ''){
                            $s = $_GET['text'];
                        }

                        $meta_query = array();
						// 	//$fecha_hoy = date('Ymd');
						

                        if($_GET['fecha']!='')
                        {
                            $fecha = $_GET['fecha'];
                            $aux_fech = explode('-', $fecha);
							$fecha = $aux_fech[0] . $aux_fech[1] . $aux_fech[2];

							$query = idival_content(
								'post',
								$s,
								'69',
								null,
								null,
								array(
									'meta_query' => array(
										'relation' => 'AND',
										array(
											'key' => 'fecha',
											'value' => $fecha,
											'compare' => '='
										),
										// array(
										//     'relation' => 'AND',
										//     array(
										//         'key' => 'fecha_de_inicio',
										//         'value' => $fecha,
										//         'compare' => '>='
										//     ),
										//     array(
										//         'key' => 'fecha_de_fin',
										//         'value' => $fecha,
										//         'compare' => '<='
										//     ),
										// ),
									)
								),
								'fecha',
								'meta_value_num',
								'ASC',
								'-1',
								null,
							);
                        } else {
							$query = idival_content(
								'post',
								$s,
								'69',
								null,
								null,
								array(
									// 	//'meta_query' => array(
									// 	//	'relation' => 'AND',
									// 	//	array(
									// 	//		'key' => 'fecha',
									// 	//		'value' => $fecha_hoy,
									// 	//		'compare' => '>='
									// 	//),
									// 	// array(
									// 	//     'relation' => 'AND',
									// 	//     array(
									// 	//         'key' => 'fecha_de_inicio',
									// 	//         'value' => $fecha,
									// 	//         'compare' => '>='
									// 	//     ),
									// 	//     array(
									// 	//         'key' => 'fecha_de_fin',
									// 	//         'value' => $fecha,
									// 	//         'compare' => '<='
									// 	//     ),
									// 	// ),
									// )
								),
								'fecha',
								'meta_value_num',
								'ASC',
								'-1',
								null,
							);
						}



                    ?>
                    <?php //var_dump($query);?>
                    <?php if ( $query->have_posts() ) : ?>


                <!-- the loop -->
                    <?php $count = 0; ?>
                    <div class="row">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="col-lg-4">
                            <div class="agenda-listado border rounded mb-4">
                                <div class="agenda-listado-imagen">
                                    <?php
                                        if(get_the_post_thumbnail_url(get_the_ID(),'medium')!= "") :
                                    ?>
                                        <a href="<?php echo the_permalink(get_the_ID());?>"> <img class="img-fluid w-100" title="<?php the_title();?>" alt="<?php the_title();?>" src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium');?>"></a>
                                    <?php
                                        else:
                                    ?>
                                        <a href="<?php echo the_permalink(get_the_ID());?>"><img class="img-fluid w-100" title="<?php the_title();?>" alt="<?php the_title();?>" src="<?php echo wp_get_attachment_url( get_theme_mod('comillas_default_list_image')); ?>"></a>
                                    <?php
                                        endif;
                                    ?>
                                </div>
                                <div class="agenda-listado-texto p-3">
                                    <h2 class="h6 font-weight-bold"><a class="text-dark" href="<?php echo the_permalink(get_the_ID());?>"><?php the_title();?></a></h2>
                                    <div class="home-calendar-dates my-2 small">
											<?php
												if(get_field('fecha')){
													?>
													<strong><?php _e('Fecha', 'idival') ?>: </strong><?php echo get_field('fecha')?>
													<?php
												}
											?>
										</div>

                                </div>
                                <div class="agenda-listado-botones p-3">
                                    <div class="favorites-wrapper mb-3">
                                        <?php //the_favorites_button();?>
                                    </div>
                                    <a class="btn btn-primary text-white" href="<?php echo the_permalink(get_the_ID());?>"><?php _e('Ver más', 'comillas');?></a>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>

                <!-- end of the loop -->


        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <div class="row">
            <div class="col text-center">
                <p><?php _e("No se encontraron resultados.", "comillas")?></p>
            </div>
        </div>
    <?php endif;?>
    <?php if ($query->max_num_pages  > 1) { // check if the max number of pages is greater than 1  ?>
                    <nav class="prev-next-posts d-flex justify-content-between my-3">
                        <div class="prev-posts-link ">
                            <?php echo get_next_posts_link( _e('Eventos anteriores', 'comillas'), $query->max_num_pages ); // display older posts link ?>
                        </div>
                        <div class="next-posts-link">
                            <?php echo get_previous_posts_link( _e('Eventos posteriores', 'comillas') ); // display newer posts link ?>
                        </div>
                    </nav>
                <?php } ?>

				</main><!-- #main -->

		</div>
	</div>
	</div>
</div>
	<script>
		const pickr = document.querySelector('.events')

		if (pickr !== null) {
			flatpickr.localize(flatpickr.l10ns.es);

			var options = {
				inline: true,
				altFormat: "d-m-Y",
				dateFormat: "d-m-Y",
				onDayCreate: function(dObj, dStr, fp, dayElem) {
					pckrDate = dayElem.dateObj.toLocaleDateString('en-GB')

					if (events.includes(pckrDate)) {
						dayElem.innerHTML += "<span class='event'></span>";
					}
				},
				onChange: function(selectedDates, dateStr, instance) {
					clearTimeout

					window.location.href = `/category/agenda?fecha=${searchDate}`
				},
			}

			if (defaultDate !== null) {
				var strDate = defaultDate.split('-')
				strDate = `${strDate[2]}-${strDate[1]}-${strDate[0]}`

				options.defaultDate = strDate
			}

			flatpickr('.events', options);
		}
	</script>
<?php

get_footer();
