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
$header_image = 'https://www.idival.org/wp-content/uploads/2022/08/encab_act_agenda.jpg';
if(get_field('imagen_cabecera')) {
	$header_image = get_field('imagen_cabecera')['url'];
}
// // Get current page for pagination
//     $currentPage = 1;
//     if($_POST["paged"]) {
//         $currentPage = absint($_POST["paged"]);
//     }


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
			'meta_value',
			'DESC',
			'-1',
			null
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
				<div class="col-8 my-4 mx-auto">
					<p>Consulta aquí los acontecimientos y eventos programados relevantes relacionados con la labor que realiza IDIVAL </p>
				</div>
				<div class="decorated">
					<div>
						<h2 class="entry-title my-3"><?php _e('Agenda', 'idival');?></h2>
					</div>
				</div>
			</header>
			<div class="col-lg-3 pt-4 d-none d-lg-block">
				<input class="flatpickr flatpickr-input events d-none" type="text" readonly="readonly">
			</div>
			<div class="col-lg-9 pt-4">
				<main id="primary" class="site-main">
				<?php

					$s=null;
					if($_GET['text'] != ''){
						$s = $_GET['text'];
					}

					$meta_query = array();
					$fecha_hoy = date('Ymd');

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
									)
								)
							),
							'fecha',
							'meta_value',
							'ASC',
							'10',
							null
						);
					} else {
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
										'value' => $fecha_hoy,
										'compare' => '>='
									)
								)
							),
							'fecha',
							'meta_value',
							'ASC',
							'10',
							null
						);
					}


					if ($query->have_posts()) {
						$total_pages = $query->max_num_pages;
						while ($query->have_posts()) {
							$query->the_post();

							get_template_part('template-parts/content', 'category-agenda');
						}

						// Get number of pages
						$pagination = paginate_links(array(
							'type'  => 'array',
							'total' => $total_pages
						));
					} else {
						get_template_part( 'template-parts/content', 'none-agenda' );
					}

					wp_reset_postdata();
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
					var strDate = dateStr.split('-')
					searchDate = `${strDate[2]}-${strDate[1]}-${strDate[0]}`

					window.location.href = `/category/agenda?fecha=${searchDate}`
				},
			}

			if (defaultDate !== null) {
				var strDate = defaultDate.split('-')
				dDate = `${strDate[2]}-${strDate[1]}-${strDate[0]}`

				options.defaultDate = dDate
			}

			flatpickr('.events', options);
		}
	</script>
<?php

get_footer();
