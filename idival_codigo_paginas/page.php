<?php
    get_header();
?>
<div id="imagen-cabecera" class="container-fluid">
    <?php
    $header_image = wp_get_attachment_url( get_theme_mod('idival_show_page_idival_banner'));
    if(!$header_image) {
        $header_image = "https://via.placeholder.com/1280x680";
        
    }
    $idioma = pll_current_language();
    if($idioma == 'es'){
        //https://via.placeholder.com/1280x680
        ?><img id="imagen-cabecera-img" src="<?php echo $header_image ?>" alt="" class="img-fluid"><?php
    }elseif($idioma == 'en'){
        ?><img id="imagen-cabecera-img"
        src="<?php wp_get_attachment_url(get_theme_mod('idival_show_page_idival_banner'))?>" alt="" class="img-fluid"><?php
    }
    ?>
</div>
<div id="contenidoIdival">
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
<?php
    get_footer();
?>