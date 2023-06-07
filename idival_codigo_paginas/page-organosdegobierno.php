<?php
    get_header();
?>
<!--Contenido Página Idival-->
<!--Imagen cabecera-->
<div id="imagen-cabecera" class="container-fluid">
    <?php
    //CAMBIAR 
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
<div id="contenidoIdival" class="container">
    <!--patronato-->
    <div id="patronato" class="row justify-content-center">
        <div class="row mt-5 mb-3">
            <div class="col-12">
                <div class="home-news-title text-center row">
                    <h3 class="separator">Patronato</h3>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <p>De acuerdo con los estatutos del IDIVAL publicados en el Boletín Oficial de Cantabria de 13 de Enero de
                2014,
                el Patronato es el máximo órgano de gobierno del IDIVAL y cuenta con el mayor nivel de representación
                encontrándose
                presidido por el <a href="http://saludcantabria.es/index.php?page=localiza-rapidamente-2" alt="Universidad de Cantabria" class="negrita-subrayado" target="_blank">Consejero de Sanidad</a>. Entre sus funciones se encuentran la aprobación del presupuesto
                anual
                y del
                plan estratégico del Instituto así como el nombramiento de los directores y de los miembros de los
                órganos
                asesores.</p>
        </div>
    </div>
    <!--Fin patronato-->
    <!--comisiondelegada-->

    <div id="comisiondelegada" class="row justify-content-center">
        <div class="row mt-5 mb-3">
            <div class="col-12">
                <div class="home-news-title text-center row">
                    <h3 class="separator">Comisión delegada</h3>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <p>La Comisión Delegada tiene como Presidente al Gerente del Hospital Universitario Marqués de Valdecilla.
                Entre sus funciones están realizar un seguimiento periódico de las tareas de dirección y de gestión del
                centro,
                realizar el seguimiento de los convenios y acuerdos suscritos por la Fundación y facilitar las tareas de
                dirección
                y gestión de la Fundación, especialmente en lo relativo a sus relaciones con las entidades fundadoras
            </p>
        </div>
    </div>
    <!--FIN comisiondelegada-->
    <!--Valores-->
    <div id="direccion" class="row justify-content-center">
        <div class="row mt-5 mb-3">
            <div class="col-12">
                <div class="home-news-title text-center row">
                    <h3 class="separator">Dirección</h3>
                </div>
            </div>
        </div>
        <!--CAMBIAR-->
        <div class="col-md-8">
            <strong>DIRECTOR CIENTÍFICO</strong>
            <h3>Marcos Lopez Hoyos</h3>
            <div class="row">
                <div class="col-2">
                    <img src="/wp-content/uploads/2022/05/MarcosLopez.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-10">
                    <p>El Director Científico actúa como máximo representante y portavoz de la Fundación, en materia
                        científica,
                        dirige, planifica y lidera la política científica de la Fundación, elabora el plan científico
                        del Instituto
                        y
                        coordina su desarrollo. En la actualidad, el director científico de IDIVAL es el Dr. Marcos
                        Lopez Hoyos,
                        Jefe
                        del Servicio de Inmunología del Hospital Universitario Marqués de Valdecilla.</p>
                </div>
            </div>
        </div>
    </div>
    <!--FIN direccion-->
</div>
<!--FIN Contenido-->
<?php
    get_footer();
?>