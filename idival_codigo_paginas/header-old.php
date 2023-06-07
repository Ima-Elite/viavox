<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package serveridival.loc
 */

?>
<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
        <?php
            wp_body_open();
        ?>
    <div class="container-fluid">
        <header>
        <!--Navegador semiacabado-->
        <nav class="navbar fixed-top navbar-expand-xl header-navbar border-bottom-custom bg-transparent" id="navegador">
            <div class="container">
                <div class="menu2 me-2 my-auto">
                    <a id="btMenu" class="bt-menu pe-auto text-light"><i class="fa-solid fa-bars icon-list2 "></i></a>
                </div>
                <div id="megamenulogo" class="my-auto mx-auto d-block">
                    <?php
                        the_custom_logo();
                    ?>
                </div>
                <div id="sticky-logo" class="d-none me-auto" >
			<a href="https://www.idival.org/" class="custom-logo-link" rel="home" aria-current="page"><img src="/wp-content/uploads/2022/05/logo-sticky.png" alt="idival_logo" /></a>
		</div>
		<a href="<?php $idioma = pll_current_language();
			if($idioma == 'es'){?>
				https://www.idival.org/colabora/ <?php
			}elseif($idioma == 'en'){?>
				https://www.idival.org/en/give/<?php
			}
			?>" id="colabora"
			class="colabora-blue">
				<div class="d-none colabora-border-blue ms-auto me-4 nav-button-blue" id="colaboraButtonSticky">
				<?php
					if($idioma == 'es'){?>
						Colabora<?php
					}elseif($idioma == 'en'){?>
						Give<?php
					}
						?>
				</div>
		</a>

		<div id="navButtonDrchSticky" class="d-none">
			<!--div class="row"-->
				<div class="idival-search-sticky d-inline-block float-start">
					<span class="text-dark">
						<form role="search" method="get" class="search-form" action="<?php echo home_url('/');?>">
							<label>
								<span class="screen-reader-text">Buscar:</span>
								<input type="search" class="search-field border-0" placeholder="Buscar …" value="" name="s">
							</label>
							<i class="fas fa-search"></i>
							<input type="submit" class="search-submit" value="Buscar">
						</form>
					</span>
				</div>
					<?php

						wp_nav_menu(
							array(
								'theme_location' => 'idioma',
								'menu'        => 'language',
								'menu_class' => 'mb-0 ps-0',
								'container_class' => 'menu-language-container d-inline-block ',
								'before' => '<i class="fa-solid fa-globe me-1"></i>'
							)
						);
					?>
			<!--/div-->
		</div>
                <div class="collapse navbar-collapse nav-text-white align-self-start align-items-end" id="navbarNav">
                    <div id="site-navigation" class="main-navigation ms-4 pe-0">
                    <?php
						wp_nav_menu(
							array(
								//'theme_location' => 'menu-1',
								'theme_location' => 'primary-menu',
								'menu_id'        => 'principal-es',
							)
						);
					?>
                    </div>
                    <div id="navButtonDrch" class="text-end ps-5 pt-2 col-4">
                        <!--div class="row"-->
			    <div class="idival-search d-inline-block">
					<span class="text-white">
						<form role="search" method="get" class="search-form" action="<?php echo home_url(); ?>">
							<label>
								<span class="screen-reader-text">Buscar:</span>
								<input type="search" class="search-field border-0" placeholder="Buscar …" value="" name="s">
							</label>
							<input type="submit" class="search-submit" value="Buscar">
						</form>
						<i class="fas fa-search"></i>
					</span>


				</div>

				<?php

					wp_nav_menu(
						array(
							'theme_location' => 'idioma',
							'menu'        => 'language',
							'menu_class' => 'ps-0',
							'container_class' => 'menu-language-container d-inline-block',
							'before' => '<i class="fa-solid fa-globe me-1"></i>'
						)
					);
				?>
                        <!--/div-->
                        <div class="ps-1">
							<a href="<?php $idioma = pll_current_language();
								if($idioma == 'es'){?>
									https://www.idival.org/colabora/ <?php
								}elseif($idioma == 'en'){?>
									https://www.idival.org/en/give/<?php
								}
								?>" id="colabora"
								class="colabora-white">
								<div class="nav-button-white" id="colaboraButton">
									<?php
									if($idioma == 'es'){?>
										Colabora<?php
									}elseif($idioma == 'en'){?>
										Give<?php
									}
									?>
								</div>
							</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        </header>
</div>

        <div id="nav2Container">
            <nav id="nav2">
		<div id="closenav2Bttn"><p>X</p></div>

		<p class="text-center" id="left-menu-logo">
			<img src="/wp-content/uploads/2022/05/logo-sticky.png" alt="idival_logo" />
		</p>
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-lateral',
			    'menu'        => 'lateral-es',
			    'menu_id' => 'menu-lateral'
                        )
                    );
                ?>
            </nav>
        </div>