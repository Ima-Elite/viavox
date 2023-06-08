<header class="content-header mb-4">
    <div class="mb-3">
        <span class="date">
            <i class="fa-solid fa-calendar-days"></i>
            <?php
            if(get_field('fecha')!=false){
                setlocale(LC_ALL,"es_ES");
                $string_date = get_field('fecha');
                //$string = "24/11/2014";
                $final_date = DateTime::createFromFormat("d/m/Y", $string_date);
                echo strftime("%d/%m/%y",$final_date->getTimestamp());
                //the_date();
            }else{
                the_date();
            }?>
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
    </div>
    <div class="featured-image my-3">
        <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('full-size', ['class' => 'img-fluid', 'title' => 'Feature image']);
            }
        ?>
    </div>
</header>
<div class="content-text mb-3">
<?php
    the_content();
?>
</div>
