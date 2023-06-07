<?php
    get_header();
?>
<!--Contenido Página Principal-->
<!--Carousel-->
<div id="carousel">
    <?php
    $idioma = pll_current_language();
    if($idioma == 'es'){
        echo do_shortcode('[smartslider3 slider="2"]');
    }elseif($idioma == 'en'){
        echo do_shortcode('[smartslider3 slider="5"]');
    }
    ?>
</div>
<!-- FIN Carousel-->
<div id="contenidoHome" class="container">
    <?php
        $args = [
            'posts_per_page' => 5,
            'post_type' => 'post',
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
            'cat' => 49
        ];
        $post_query = new WP_Query($args);
    ?>
    <!--Slide de Posts-->
    <div class="post-carousel row my-5">
    <?php
            if ($post_query->have_posts()):
                $cont = 1;
                while($post_query->have_posts()):
                    $post_query->the_post();
                        ?>
                    <div>
                        <div class="row g-0">
                            <div class="col-md-5 mw-100 p-3">
                                <?php
                                    if(has_post_thumbnail()){
                                        the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid']);
                                    }else{
                                ?>
                                        <img src="https://via.placeholder.com/1400x800" class="img-fluid" alt="">
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <?php
                                    the_title('<h2 class="card-title align-text-top">','</h2>');
                                    ?>
                                    <?php
                                    if(has_excerpt()){
                                        the_excerpt();
                                        if($idioma == 'es'){?>
                                            <a href="<?php echo esc_url(get_the_permalink());?>">
                                                <div class="col-md-3 me-md-0 me-2 text-center pt-2 float-start">MÁS INFORMACIÓN</div>
                                                <div class="col-md-3 me-md-0 me-2 text-center pt-2 float-start"><img src="/wp-content/uploads/2022/05/flecha-1.png" class="img-fluid my-auto"></div>
                                            </a><?php
                                        }elseif($idioma == 'en'){?>
                                            <a href="<?php echo esc_url(get_the_permalink());?>">
                                                <div class="col-md-3 me-md-0 me-2 text-center pt-2 float-start">MORE INFORMATION</div>
                                                <div class="col-md-3 me-md-0 me-2 text-center pt-2 float-start"><img src="/wp-content/uploads/2022/05/flecha-1.png" class="img-fluid my-auto"></div>
                                            </a><?php
                                        }
                                        ?>
                                        <div></div>
                                        <?php
                                    }else{
                                        //limite de caracteres
                                        $limit = 50;
                                        ?>
                                        <p><?php
                                        echo wp_trim_words(get_the_content(), $limit,'...');
                                        if($idioma == 'es'){?>
                                            <a href="<?php echo esc_url(get_the_permalink());?>">
                                                <div class="col-md-3 me-md-0 me-2 text-center pt-2 float-start">MÁS INFORMACIÓN</div>
                                                <div class="col-md-3 me-md-0 me-2 text-center pt-2 float-start"><img src="/wp-content/uploads/2022/05/flecha-1.png" class="img-fluid my-auto"></div>
                                            </a><?php
                                        }elseif($idioma == 'en'){?>
                                            <a href="<?php echo esc_url(get_the_permalink());?>">
                                                <div class="col-md-3 me-md-0 me-2 text-center pt-2 float-start">MORE INFORMATION</div>
                                                <div class="col-md-3 me-md-0 me-2 text-center pt-2 float-start"><img src="/wp-content/uploads/2022/05/flecha-1.png" class="img-fluid my-auto"></div>
                                            </a><?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
                endwhile;
            endif;
            wp_reset_postdata();
        ?>
    </div>
    <!--FIN Slide de Posts-->
    <!--Posts-->
    <div class="row my-5">
        <div class="col-12">
            <div class="home-news-title text-center row">
                <?php if($idioma == 'es') : ?>
                <h3 class="separator">Actualidad</h3>
                <?php elseif($idioma == 'en'): ?>
                <h3 class="separator">Present</h3>
                <?php endif;?>
            </div>
        </div>
    </div>
    <div class="row mt-5 mb-3">
        <?php
            //Muestra los últimos dos post publicados
            $args = [
                'posts_per_page' => 2, /* how many post you need to display */
                'offset' => 0,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => 'post', /* your post type name */
                'post_status' => 'publish',
                'cat' => 20
            ];
            $post_query = new WP_Query($args);
            if ($post_query->have_posts()):
                $cont = 1;
                while($post_query->have_posts() and $cont<3):
                    $post_query->the_post();
                    $idioma = pll_current_language();
                    if($cont%2 == 0){
                        $cont++;
                        ?>
                        <div class="actualidad justify-content-center col-md-6 ">
                        <?php
                    }else{
                        $cont++;
                        ?>
                        <div id="actualidadfirst" class="actualidad justify-content-center col-md-6 border-end">
                            <?php
                    }

                    ?>
                        <a href="<?php echo esc_url(get_the_permalink());?>">
                        <?php
                        if(has_post_thumbnail()){
                            the_post_thumbnail('medium',['class' => 'img-fluid ']);
                        }else{
                            ?>
                            <img src="https://via.placeholder.com/600x600"  class="card-img-top img-fluid" alt="">
                            <?php
                        }
                        ?>
                        </a>
                        <div class="card-body">
                            <?php
                                the_category('<p class="card-title">','</p>');
                            ?>
                            <a href="<?php echo esc_url(get_the_permalink());?>">
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </div>
                    </div>
        <?php
                endwhile;
            endif;
            wp_reset_postdata();
        ?>
    </div>
    <!--FIN Posts-->
    <!--Post Especiales-->
    <?php
    /*
	$query = comillas_content(
			'post',
			null,
			'475',
			null,
			null,
			null,
			null,
			'publish_date',
			'DESC',
			'-1',
			null,
	);*/
    $args = [
        'posts_per_page' => 8, /* how many post you need to display */
        'offset'         => 0,
        'meta_key'       => 'orden',
	    'orderby'        => 'meta_value',
        'order'          => 'ASC',
        'post_type'      => 'post', /* your post type name */
        'post_status'    => 'publish',
        'cat'            => 51
    ];
    $post_query = new WP_Query($args);
        if ( $post_query->have_posts() ) :
    ?>
		<div class="container mt-5">
			<div class="row mb-4 px-2">
				<?php
				while ( $post_query->have_posts() ) : $post_query->the_post();
                    $url = esc_url(get_the_permalink());
                    /* if (empty($url)) {
                        $url = esc_url(the_field('url_');
                    } */
                ?>
					<div class="col-lg-3 mb-3 px-2">
						<div class="border rounded-3 shadow-sm">
							<div class="home-especial-image">
								<a href="<?php echo $url; ?>">
									<img class="img-fluid w-100" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium');?>" alt="<?php the_title(); ?>">
								</a>
							</div>
							<div class="home-especial-title p-3 d-flex text-start">
								<a href="<?php echo $url;?>">
                                    <h3 class="font-weight-normal"><?php the_title(); ?></h3>
                                </a>
							</div>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
		<?php
	endif;
    ?>
    <!--FIN Post Especiales-->
</div>
<!--FIN Página Principal-->
<?php
    get_footer();
?>