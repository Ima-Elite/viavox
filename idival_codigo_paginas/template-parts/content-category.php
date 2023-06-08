    <?php
        $idioma = pll_current_language();

        $read_more = "Leer más";
        if ($idioma == "en") {
            $read_more = "Read more";
        }
    ?>
    <div class="post mb-5">
        <div class="media">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="me-3 img-fluid pos-thumb d-none d-md-flex">
            <div class="media-body">
                <h3 class="title mb-3">
                    <?php the_title(); ?>
                </h3>
                <div class="content-header mb-3">
                    <span class="date">
                        <i class="fa-solid fa-calendar-days"></i>
                        <?php the_date(); ?>
                    </span>
                    <?php if (has_tag()) : ?>
                        <span class="tag ms-2"> <i class="fa-solid fa-tags"></i>
                        <?php
                            the_tags(
                                '<span class="tag">'
                                , '</span><span class="tag">'
                                , '</span>'
                            );
                        ?>
                        </span>
                    <?php endif; ?>
                    <?php if (has_category()) : ?>
                        <span class="category ms-2"> <i class="fa-solid fa-tags"></i>
                        <?php
                            the_category();
                        ?>
                        </span>
                    <?php endif; ?>
                    <div class="intro mt-3">
                        <?php
                        the_excerpt();
                        ?>
                    </div>
                </div>
                <a href="<?php the_permalink(); ?>" class="more-link enlaceAzul">
                <?php echo $read_more; ?> &rarr;
                </a>
            </div>
        </div>
    </div>