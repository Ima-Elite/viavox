<?php

// Get the current language
$lang = pll_current_language();

$give   = 'Colabora';
$title  = 'Tu ayuda es <u>muy importante</u>';
$slogan = 'Con tu ayuda queremos poner en marcha un programa de atracción de investigadores que vengan a Valdecilla a contribuir a los avances que desarrollamos en nuestro entorno.';


$terms   = 'Nota legal';
$cookies = 'Política de Cookies';
$privacy = 'Política de Privacidad';

$phone    = 'Tel';
$building = 'Edificio';

$page_terms   = 'nota-legal';
$page_cookies = 'politica-de-cookies';
$page_privacy = 'politica-privacidad';

if ($lang == 'en') {
    $give   = 'Give';
    $title  = 'Your help is <u>essential</u>';
    $slogan = 'Your help allows us to attract research talent to Valdecilla environment and do better. You can help us become better.';

    $terms   = 'Terms';
    $cookies = 'Cookies law';
    $privacy = 'Privacy';

    $phone    = 'Phone';
    $building = 'Building';

    $page_terms   = 'terms';
    $page_cookies = 'cookies-law';
    $page_privacy = 'privacy';
}


?>

<div class="container mt-5 home-especial-container">
    <div class="row">
        <?php
        /*Shortcut copiado de la pagina de arandadeduero2021*/
        //echo do_shortcode('[ajax_load_more id="9318154416" loading_style="infinite skype" container_type="div" css_classes="container" post_type="especial" posts_per_page="12" orderby="meta_value_num" custom_args="limit:24" scroll_distance="-50" button_label="Cargar más"]');
        ?>
    </div>
</div>
<!--footer-logos top-->
<div id="footer-logos-top">
    <div class="footer-logo text-center">
        <a href="https://www.cantabria.es/" rel="external" target="_blank"><img src="/wp-content/uploads/2022/04/01-gobespana.png" alt="" class="img-fluid"></a>
        <a href="https://www.scsalud.es/" rel="external" target="_blank"><img src="/wp-content/uploads/2022/04/02-scs.png" alt="" class="img-fluid"></a>
        <a href="http://www.humv.es/" rel="external" target="_blank"><img src="/wp-content/uploads/2022/04/03-valdecilla.png" alt="" class="img-fluid"></a>
        <a href="https://web.unican.es/" rel="external" target="_blank"><img src="/wp-content/uploads/2022/04/04-uc.png" alt="" class="img-fluid"></a>
        <a href="https://www.idival.org/documentacion/?paged=&filtro=Documentaci%C3%B3n+HRS4R"><img src="/wp-content/uploads/2022/04/05-hr.png" alt="" class="img-fluid"></a>
        <a href="https://www.aei.gob.es/" rel="external" target="_blank"><img src="/wp-content/uploads/2022/04/06-aei.png" alt="" class="img-fluid"></a>
        <a href="https://eatris.eu/" rel="external" target="_blank"><img src="/wp-content/uploads/2022/04/07-eatris.png" alt="" class="img-fluid"></a>
        <a href="https://www.fecyt.es/" rel="external" target="_blank"><img src="wp-content/uploads/2023/04/mcin-fecyt-web-scaled.jpg" alt="" style="max-height: 75px !important;" class="img-fluid"></a>
        <a href="https://cohortecantabria.com/" rel="external" target="_blank"><img src="/wp-content/uploads/2022/04/09-cohorte.png" alt="" class="img-fluid"></a>
    </div>
	<div class="footer-logo text-center">
		<a href="#"><img src="/wp-content/uploads/2023/02/emcan01.jpg" alt="" class="img-fluid me-5" style="max-width:200px !important;"></a>
		<a href="#"><img src="/wp-content/uploads/2023/02/ES-Financiado-por-la-Union-Europea_POS.jpg" alt="" class="img-fluid me-5" style="max-width:250px !important;"></a>
		<a href="#"><img src="/wp-content/uploads/2023/02/ES-Financiado-por-la-Union-Europea-POS_1.jpg" alt="" class="img-fluid" style="max-width:300px !important;"></a>
		<a href="#"><img src="/wp-content/uploads/2023/02/Logo-PRTR-dos-li╠uneas_COLOR.jpg" alt="" class="img-fluid" style="max-width:250px !important;"></a>
		<a href="https://starval.org/"><img src="/wp-content/uploads/2023/04/logoDefinitivo.png" alt="" class="img-fluid" style="max-width:250px !important;"></a>
		<a href="https://mindsmaster.org/"><img src="/wp-content/uploads/2023/04/logoCompleto_minds.png" alt="" class="img-fluid" style="max-width:250px !important;height: 120px;margin-bottom: 20px;"></a>
	</div>
</div>
<!--FIN footer-logos top-->
<div id="footer-logos-bottom">
    <!--footer-logos-bottom-->
    <div class="footer-logo text-center">
        <a href="https://www.isciii.es/Paginas/Inicio.aspx" rel="external" target="_blank"><img src="/wp-content/uploads/2022/04/02-01-isc.png" alt="" class="img-fluid"></a>
        <a href="https://www.sanidad.gob.es/" rel="external" target="_blank"><img src="/wp-content/uploads/2022/04/02-02-ms.png" alt="" class="img-fluid"></a>
        <a href="https://ec.europa.eu/esf/home.jsp?langId=es" rel="external" target="_blank"><img src="/wp-content/uploads/2022/04/02-03-EU1.png" alt="" class="img-fluid"></a>
        <a href="https://www.europarl.europa.eu/factsheets/es/sheet/95/el-fondo-europeo-de-desarrollo-regional-feder-" rel="external" target="_blank"><img src="/wp-content/uploads/2022/04/02-04-EU2.png" alt="" class="img-fluid"></a>
    </div>
</div>
<!--FIN footer-logos-bottom-->
<div id="footer-principio" class="mt-3">
    <!--footer-principio-->
    <strong class="text-center">
        <h3 class="text-center" id="footerPrincipioH5"><?php echo $title; ?></h3>
    </strong>
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto mb-4 d-flex align-items-center">
                <div class="row d-flex align-items-center">
                    <div class="col-md-7 float-md-start">
                        <p class="colabora-description"><?php echo $slogan; ?></p>
                    </div>
                    <div class="col-md-1 float-md-start text-center">
                        <img id="flecha-colabora" src="/wp-content/uploads/2022/05/flecha-1.png" class="img-fluid my-auto">
                    </div>
                    <a href="<?php echo "/colabora"; ?>" class="btn col-md-4 d-flex justify-content-center">
                        <div class="d-flex  float-md-start colabora-btn-bg-blue-footer align-items-center justify-content-center">
                            <?php echo $give; ?>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--FIN footer-principio-->

<div id="footer-final">
    <!--Iconos de redes-->
    <div id="footer-social-icons" class="d-flex justify-content-center">
        <div class="icon">
            <a href="https://es.linkedin.com/company/idival-instituto-de-investigaci%C3%B3n-valdecilla" rel="external" target="_blank">
                <i class="fa-brands fa-linkedin fa-2x"> </i>
            </a>
        </div>
        <div class="icon">
            <a href="https://www.instagram.com/idivaldecilla/?hl=es" rel="external" target="_blank">
                <i class="fa-brands fa-instagram-square fa-2x"></i>
            </a>
        </div>
        <div class="icon">
            <a href="https://www.youtube.com/channel/UCeJx3mrDRIhmW8Bc8HGjw0w" rel="external" target="_blank">
                <i class="fa-brands fa-youtube-square fa-2x"></i>
            </a>
        </div>
        <div class="icon">
            <a href="https://twitter.com/idivaldecilla?lang=es" rel="external" target="_blank">
                <i class="fa-brands fa-twitter-square fa-2x"></i>
            </a>
        </div>
    </div>
    <div id="footer-text" class="my-2">
        <h6>Accesos</h6>
        


<div class="d-flex flex-wrap justify-content-center">
    <a href="https://aplicacionesidival.idival.org/ifundanet" class="acceso-btn d-flex m-1 " target="_blank">
        <div class="d-flex accesos-btn-bg-blue-footer align-items-center justify-content-center">
            INTRANET </div>
    </a>

    <a href="https://mail.idival.org/" class="acceso-btn  d-flex m-1" target="_blank">
        <div
            class="d-flex  float-md-start col-sm-12 accesos-btn-bg-blue-footer align-items-center justify-content-center">
            WEBMAIL IDIVAL </div>
    </a><a href="https://fichaje.idival.org" class="acceso-btn  d-flex m-1" target="_blank">
        <div class="d-flex  float-md-start accesos-btn-bg-blue-footer align-items-center justify-content-center">
            FICHAJE </div>
    </a>
</div>
        
        
    </div>
    <div id="footer-text">
        &copy;
        <span class="textoPie"><small>Copyright 2022 IDIVAL</small></span><span class="sep"> | </span>
        <span class="textoPie">
            <a class="text-white" href="<?php echo get_site_url() . '/' . $page_terms; ?>/"><small><?php echo $terms; ?></small></a>
        </span>
        <span class="sep"> | </span>
        <span class="textoPie">
            <a class="text-white" href="<?php echo get_site_url() . '/' . $page_privacy; ?>/"><small><?php echo $privacy; ?></small></a>
        </span>
        <span class="sep"> | </span>
        <span class="textoPie">
            <a class="text-white" href="<?php echo get_site_url() . '/' . $page_cookies; ?>/"><small><?php echo $cookies; ?></small></a>
        </span>
    </div>
    <div class="textoPie"><small>INSTITUTO DE INVESTIGACIÓN MARQUÉS DE VALDECILLA - <?php echo $building; ?> IDIVAL,
            Avenida Cardenal Herrera Oria s/n,</small></div>
    <div class="textoPie"><small>39011 Santander (CANTABRIA) - <?php echo $phone; ?>.:942 31 55 15</small></div>
</div>
<!--footer-final-->
<?php
wp_footer();
?>
</body>

</html>