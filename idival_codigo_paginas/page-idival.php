<?php
    get_header();
?>
<!--Contenido Página Idival-->
<!--Imagen cabecera-->
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
        ?><img id="imagen-cabecera-img" src="<?php wp_get_attachment_url(get_theme_mod('idival_show_page_idival_banner'))?>" alt="" class="img-fluid"><?php
    }
    ?>
</div>
<div id="contenidoIdival">
    <!--Navegador interno-->
    <div id="nav-pagina" class="container-fluid">
        <div class="container">
            <ul id="menu-idival">
            <?php
            if($idioma == 'es'){
                ?>
                <li class="activo"><a href="#presentacion" alt="">Presentación</a></li>
                <li><a href="#mision" alt="">Misión</a></li>
                <li><a href="#vision" alt="">Visión</a></li>
                <li><a href="#valores" alt="">Valores</a></li>
                <li><a href="#organizacion" alt="">Organización</a></li>
                <?php
            }elseif($idioma == 'en'){
                ?>
                <!--traduccion momentanea-->
                <li class="activo"><a href="#presentacion" alt="">Presentation</a></li></a>
                <li><a href="#mision" alt="">Mission</a></li></a>
                <li><a href="#vision" alt="">Vision</a></li></a>
                <li><a href="#valores" alt="">Values</a></li></a>
                <li><a href="#organizacion" alt="">Organization</a></li></a>
                <?php
            }
            ?>
            </ul>
        </div>
    </div>
    <!--FIN Navegadore interno-->
    <!--Contenido-->
    <div id="contenido-idival" class="container mt-5">
        <!--Presentacion-->
        <div id="presentacion" class="row justify-content-center pt-5">
            <div class="col-md-8 mt-2">
                Gracias al impulso de sus Instituciones fundadoras, <strong><a href="http://saludcantabria.es/" alt="Consejería de Sanidad del
                Gobierno de Cantabria" target="_blank" class="negrita-subrayado">Consejería de Sanidad del
                Gobierno de Cantabria</a></strong> y <strong><a href="https://web.unican.es/" alt="Universidad de Cantabria" class="negrita-subrayado" target="_blank">Universidad de Cantabria,</a></strong> IDIVAL promueve y desarrolla
                la investigación y la innovación en el entorno biosanitario de Cantabria que tiene como
                epicentro al <strong><a href="http://www.humv.es/" alt="Hospital Universitario
                Marqués de Valdecilla" class="negrita-subrayado" target="_blank">Hospital Universitario Marqués de Valdecilla</a></strong> , con vocación de buscar
                soluciones a los problemas de salud y de contribuir al desarrollo científico, docente,
                social y económico.
            </div>
            <div id="video" class="row border mt-5 px-0">
                <div id="bloqueVideo" class="col-md-6 mb-2">
                    <div id="textoVideo" class="col-md-8">
                        <h3 class="d-flex column px-1">La base del progreso de nuestra sociedad está en el talento de las personas</h3>
                        <a id="enlacevideo" href="https://www.youtube.com/watch?v=lHgAyIq6fKM" alt="" target="_blank"><div id="vervideo" class="d-flex column mt-3 justify-content-center align-items-center mx-md-0 mx-auto">VER VÍDEO</div></a>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                <a id="enlacevideo" href="https://www.youtube.com/watch?v=lHgAyIq6fKM" alt="" target="_blank"><img src="/wp-content/uploads/2022/05/vid-presentacion.jpg" alt="" class="img-fluid" style="float: right;"></a>
                </div>
                <!--img src="https://via.placeholder.com/1280x390" alt="" class="img-fluid"-->
            </div>
        </div>
        <!--FIN Presentacion-->
        <!--Mision-->
        <div id="mision" class="row justify-content-center">
            <div class="row mt-5 mb-3">
                <div class="col-12">
                    <div class="home-news-title text-center row">
                        <h3 class="separator">Mision</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <p>Ser un centro de investigación de vanguardia con un alto componente traslacional que pongaa
                disposición de la sociedad innovaciones de valor en la prevención, el diagnóstico y el tratamiento
                personalizado de las enfermedades.</p>
                <p>Desarrollar una investigación e innovación biomédica aplicada de excelencia orientada a la
                traslación y transferencia del conocimiento, mejorando la calidad de vida de la ciudadanía mediante
                el abordaje de los problemas de salud de la poblaciónatravés de la prevención, el diagnóstico y el
                tratamiento personalizado de los pacientes..</p>
            </div>
        </div>
        <!--Fin Mision-->
        <!--Vision-->
        
        <div id="vision" class="row justify-content-center">
            <div class="row mt-5 mb-3">
                <div class="col-12">
                    <div class="home-news-title text-center row">
                        <h3 class="separator">Vision</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <p>"Actuar como eje vertebrador de la investigación e innovación en salud en Cantabria, favoreciendo
                el desarrollo económico de la regiónyla creación de empleo de alta cualificación a través de la
                colaboración con agentes del entorno, posicionándose como centro de referencia a nivel
                internacional en investigación de excelencia en sus áreas priorizadas.".</p>
                <p>"Ser la institución de referencia de la investigación e innovación aplicada en salud en Cantabria,
                actuando como palanca de desarrollo económico regional en colaboración con los agentes del
                entorno, y posicionándose como agente clave en salud digital y medicina personalizada, así como
                centro de investigación traslacional de vanguardia a nivel nacional e internacional y un polo tractor
                para la captación de talento.".</p>
            </div>
        </div>
        <!--FIN Vision-->
        <!--Valores-->
        <div id="valores" class="row justify-content-center">
            <div class="row mt-5 mb-3">
                <div class="col-12">
                    <div class="home-news-title text-center row">
                        <h3 class="separator">Valores</h3>
                    </div>
                </div>
            </div>
            <div id="valoresgrupo" class="mb-5">
                <div id="valorestop" class="d-lg-flex justify-content-evenly">
                    <div class="d-flex align-items-start flex-column">
                        <div class="border-bottom valores">
                            <img src="/wp-content/uploads/2022/05/triangle.png" alt="" class="triangle img-fluid me-2">
                            Excelencia científica
                        </div>
                        <div class="border-bottom valores">
                            <img src="/wp-content/uploads/2022/05/triangle.png" alt="" class="triangle img-fluid me-2">
                            Atracción de talento
                        </div>
                    </div>
                    <div class="d-flex align-items-start flex-column">
                        <div class="border-bottom valores">
                            <img src="/wp-content/uploads/2022/05/triangle.png" alt="" class="triangle img-fluid me-2">
                            Transparencia y comunicación proactiva
                        </div>
                        <div class="border-bottom valores">
                            <img src="/wp-content/uploads/2022/05/triangle.png" alt="" class="triangle img-fluid me-2">
                            Sostenibilidad
                        </div>
                    </div>
                    <div class="d-flex align-items-start flex-column">
                        <div class="border-bottom valores">
                            <img src="/wp-content/uploads/2022/05/triangle.png" alt="" class="triangle img-fluid me-2">
                            Responsabilidad con la sociedad
                        </div>
                        <div class="border-bottom valores">
                            <img src="/wp-content/uploads/2022/05/triangle.png" alt="" class="triangle img-fluid me-2">
                            Especialización
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <p>Valdecilla ya es un centro de generación de conocimiento y tractor socioeconómico para nuestra
                región. El <strong> <a href="http://www.humv.es/" alt="Hospital Universitario 
                Marqués de Valdecilla" class="negrita-subrayado" target="_blank">Hospital Universitario Marqués de Valdecilla</a></strong>  y su Instituto de Investigación Sanitaria,
                IDIVAL, trabajan para ser uno de los referentes en investigación, traslación y cogeneración de
                riqueza en nuestra región. En el año 2014 IDIVAL se constituye como fundación y remodela su
                estructura organizativa.</p>
            </div>
            <div id="destacadoGris" class="col-md-10">
                <div id="destacadoGrisMovil" class="container">
                    <div  class="col-md-10 mx-auto">
                    <strong><p>En Marzo de 2015 IDIVAL fue acreditado por el <a href="https://www.isciii.es/Paginas/Inicio.aspx" alt="Instituto de Salud Carlos III" class="negrita-subrayado" target="_blank">Instituto de Salud Carlos III</a> y reacreditado
                    en el año 2020 como Instituto de Investigación Sanitaria, siendo actualmente uno de los 32
                    Institutos de Investigación Sanitaria acreditados en nuestro país</p></strong> 
                    </div>
                    
                </div>
            </div>
            <div class="col-md-8">
                <p>IDIVAL cuenta con su propio edificio situado en la parte superior de la finca Valdecilla. Este edificio
                cuenta con unos 3000 m2 de espacios de investigación dedicados a laboratorios y servicios
                generales. Además cuenta con espacios en la Facultad de Medicina de la Universidad de Cantabria
                y en el Hospital Universitario Marqués de Valdecilla. Específicamente la Unidad de Ensayos
                Clínicos situada en el Hospital Universitario Marqués de Valdecilla constituye una referencia en
                investigación clínica para nuestra región.</p>
                <p>La apuesta de IDIVAL actual pasa -de la mano de sus profesionales- por fomentar el talento, la
                internacionalización y de esta manera potenciar las capacidades del <strong> <a href="http://www.humv.es/" alt="Hospital Universitario
                Marqués de Valdecilla" class="negrita-subrayado" target="_blank">Hospital Universitario
                Marqués de Valdecilla</a></strong>  como centro asistencial puntero con gran capacidad de dinamización
                socioeconómica de nuestra región.</p>
            </div>
        </div>
        <!--FIN Valores-->
        <!--Organizacion-->
        <div id="organizacion" class="row justify-content-center">
            <div class="row mt-5 mb-3">
                <div class="col-12">
                    <div class="home-news-title text-center row">
                        <h3 class="separator">Organización</h3>
                    </div>
                </div>
            </div>
            <img src="/wp-content/uploads/2022/05/organigrama.jpg" alt="">
        </div>
    </div>
</div>

<!--FIN Contenido-->
<?php
    get_footer();
?>