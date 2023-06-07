<?php
    get_header();
    // $header_image = wp_get_attachment_url( get_theme_mod('aranda_de_duero_default_header_image'));
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
    <div id="postcontent" cl;>
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
        <div class="container-fluid">
            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <?php
                            if(have_posts()) {
                                the_post();

                                the_title('<h1 class="my-5">','</h1>');

                                get_template_part('template-parts/content', 'article');
                              } else {
                        ?>
                            <h3>Página sin Post</h3>
                        <?php } ?>
                    </div>
                    <div class="col-md-8 mx-auto mt-5">
                        <div class="nav-post mb-3">
                            <?php
                                the_post_navigation(
                                    array(
                                        'prev_text' => '<span class="nav-subtitle">' . esc_html__( '', 'idival' ) . '</span> <span class="nav-title btn-news float-start">' . esc_html__("Noticia anterior") . '</span>',
                                        'next_text' => '<span class="nav-subtitle">' . esc_html__( '', 'idival' ) . '</span> <span class="nav-title btn-news float-end">' . esc_html__("Noticia posterior") . '</span>',
                                    )
                                );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    get_footer();
?>