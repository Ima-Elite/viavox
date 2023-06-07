<?php
	/**
	 * Template Name: Plantilla Documentación
	 *
	 * Página para mostrar la sección documentación
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

	$idioma = pll_current_language();

	$parent = 53;
	if ($idioma == 'en') {
		$parent = 121;
		$download = "Download";
		$category_filter = 'Action Plans';
		// $post_action = '/en/documentation/#posts';
	}

	// Get current page for pagination
	if($_POST["paged"] || $_GET["paged"]) {
		$currentPage = absint($_POST["paged"]);
	}else{
		$currentPage = 1;
	}

	$download = "Descargar";
	// $post_action = '/documentacion/#posts';
	if($_GET["filtro"] && $_GET["filtro"] != "") {
		$category_filter = $_GET["filtro"];
	}else if($_GET["page_category_form"] && $_GET["page_category_form"] != ""){
		$category_filter = $_GET["page_category_form"];
	}else if($_POST["page_category_form"] && $_POST["page_category_form"] != ""){
		$category_filter = $_POST["page_category_form"];
	}else if($_POST["filtro"] && $_POST["filtro"] != ""){
		$category_filter = $_POST["filtro"];
	}else if($idioma == "en"){
		$category_filter = 'Action Plans';
	}else{
		$category_filter = 'Memorias de Actividad';
	}

	// $idioma = pll_current_language();

	// $parent = 53;
	// if ($idioma == 'en') {
	// 	$parent = 121;
	// 	$download = "Download";
	// 	$category_filter = 'Action Plans';
	// 	// $post_action = '/en/documentation/#posts';
	// }

	if(isset($_GET["category_form"])){
		$category_filter = $_GET["category_form"];
	}
	
	// Get categories
	$args = array(
		'hide_empty' => 0,
		'parent' => $parent,
		'orderby' => 'name',
		'order'   => 'ASC',
	);

	$categories = get_categories($args);

// 	if($_POST["category_form"]) {
// 		$category_filter = $_POST["category_form"];
// 	}

	

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
<div id="documentacion" class="row pt-5">
				<div class="col-md-4 mt-2">
					<h3>Archivos y documentación</h3>
					<h3>IDIVAL</h3>
				</div>
				<div class="col-md-8 mt-3 d-inline-block" id="posts">
					<!-- <div class="text-center"> -->
						<!-- <span>Filtrar por: </span> -->
						<div class="d-inline-block" style="width : 100%;">
							<form method="GET" action="<?php echo $post_action; ?>" name="category_form" id="category_form">
								<!-- <div class="arrow"> -->
									<input type="hidden" name="paged" id="paged" value="<?php echo $_POST['paged']; ?>">
									<!-- <select name="filtro" class="form-select round-select colorAzul" id="filtro" > -->
									<div class="row mt-2">
										<?php 
										$filter_categories_count = 1;
										$row_closed = true;
										foreach($categories as $category): ?>
											<?php
											if($filter_categories_count == 2):?>
												<button name="filtro" class="category-filter <?php if ($category_filter == $category->name) :?> button-documentation-selected <?php else: ?> button-documentation <?php endif; ?> col-3 me-2" value="<?php echo $category->name;?>">
													<?php echo $category->name; ?>
												</button>
											<?php
											elseif($filter_categories_count % 2 == 0 && $filter_categories_count % 3 != 0):?>
												<div class="row mt-2">
													<button name="filtro" class="category-filter <?php if ($category_filter == $category->name) :?> button-documentation-selected <?php else: ?> button-documentation <?php endif; ?> col-3 me-2" value="<?php echo $category->name;?>">
														<?php echo $category->name; ?>
													</button>
												<?php $row_closed = false;?>
											<?php elseif($filter_categories_count % 7 == 0): ?>
												<div class="row mt-2">
													<button name="filtro" class="category-filter <?php if ($category_filter == $category->name) :?> button-documentation-selected <?php else: ?> button-documentation <?php endif; ?> col-3 me-2" value="<?php echo $category->name;?>">
														<?php echo $category->name; ?>
													</button>
												<?php $row_closed = false;?>
											<?php elseif($filter_categories_count % 3 != 0): ?>
													<button name="filtro" class="category-filter <?php if ($category_filter == $category->name) :?> button-documentation-selected <?php else: ?> button-documentation <?php endif; ?> col-3 me-2" value="<?php echo $category->name;?>">
														<?php echo $category->name; ?>
													</button>
											<?php else: ?>	
													<button name="filtro" class="category-filter <?php if ($category_filter == $category->name) :?> button-documentation-selected <?php else: ?> button-documentation <?php endif; ?> col-3 me-2" value="<?php echo $category->name;?>">
														<?php echo $category->name; ?>
													</button>
												</div>
												<?php $row_closed = true;?>
										<?php endif;
											$filter_categories_count++;
										endforeach; 
										if($row_closed == false): 
											echo "</div>";
										endif;
										?>
										
									<!-- </select> -->
								<!-- </div> -->
							</form>
						</div>
					<!-- </div> -->
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
<!-- 					<div class="col-5"> -->
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
<!-- 					</div> -->
				</div>
			<?php
				// Get number of pages
				$pagination = paginate_links(array(
					'type'  => 'array',
					'total' => $post_query->max_num_pages,
					'format' => '?paged=%#%&filtro=' . $category_filter,
				));

				//wp_reset_postdata();
			?>
			<?php else :?>
			<div class="row mt-5 mb-3">
				<h4 class="text-center"><?php echo $search; ?></h4>
			</div>
			<?php endif; ?>
			</div>
			<div class="row mt-5 mb-3">
				<nav aria-label="post navigation">
				<form method="GET" action="<?php echo $post_action; ?>" name="page_category_form" id="page_category_form">
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
					</form>
				</nav>
			</div>
		</div>
	</div>

<?php
	get_footer();
?>