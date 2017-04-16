<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title><?=lang('seo_title');?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <meta name="description" content="<?=lang('seo_description');?>">
    <meta name="keywords" content="<?=lang('seo_keywords');?>">
    <meta name="author" content="<?=lang('seo_title');?>">

    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:100,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:900,800,700,600,500,400,300' rel='stylesheet' type='text/css'>

    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>media/css/libs/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>media/css/libs/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>media/css/libs/owl.carousel.css">
    
    <!-- MAIN STYLE -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>media/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>media/css/custom.css">

    <!--[if lt IE 9]>
        <script src="<?=base_url();?>media/http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="<?=base_url();?>media/http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', '<?=lang('analytics');?>']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  
      })();

    </script>
    
</head>

<!--[if IE 9]> <body class="ie9 lt-ie10 onepage" data-spy="scroll"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body class="onepage" data-spy="scroll"> <!--<![endif]-->


    <!-- PRELOADER -->
    <div class="preloader">
        <div class="item">
            <div class="item-child"></div>
        </div>
        <div class="item">
            <div class="item-child"></div>
        </div>
    </div>
    <!-- END / PRELOADER -->

    <!-- WRAPPER -->
    <div class="wrapper">


        <!-- SEARCH BOX -->
        <div class="search-box">
            <form method="GET">
                <input type="text" class="s" value="Ingresa tu búsqueda y presiona enter">
                <span class="search-box-close">×</span>
            </form>
        </div>
        <!-- END / SEARCH BOX -->

        <!-- HEADER PAGE -->
        <header id="header-page" <?= isset($current) && $current != 'home'?"style='background-color: #00A8AB; height: 83px; position: relative'":"";?> >
            <div class="container">
                <!-- LOGO -->
                <div class="logo">
                    <?if(current_language() == 'pt'):?>
                        <a href="<?=site_url($lang);?>"><img src="<?=base_url();?>media/img/logo_pt.png" alt="Image"></a>
                    <?else:?>
                        <a href="<?=site_url($lang);?>"><img src="<?=base_url();?>media/img/logo.png" alt="Image"></a>
                    <?endif;?>
                    <a id="isologo" href="#about"><img src="<?=base_url();?>media/img/empresab_new2.png" alt="Image"></a>

                    <!-- Esta imagen la agrego para que ya la traiga en el onload y no tarde en cambiarla al modificarle el src al isologo -->
                    <img class="hidden" src="<?=base_url();?>media/img/empresab_new.png" alt="Image">

                </div>
                <!-- END / LOGO -->
                
                <!-- NAVIGATION -->
                
                <nav class="navigation pi-navigation" data-responsive="1200">
                    <ul class="nav menu-list">
                    <?if(isset($this->data['current']) && $this->data['current'] == 'home'):?>
                        <li class="idioma-mobile visible-xs visible-sm visible-md">
                            <a style="<?=current_language() == 'es'?'text-decoration: underline':'';?>" href="<?=str_replace($_SERVER['HTTP_HOST'].'/pt', 'www.elviajedeodiseo.com/es', current_url());?>" class="section-li">ARGENTINA</a> | 
                            <a style="<?=current_language() == 'pt'?'text-decoration: underline':'';?>" href="<?=str_replace($_SERVER['HTTP_HOST'].'/es', 'www.aviagemdeodiseo.com/pt', current_url());?>" class="section-li">BRASIL</a>
                        </li>
                        <li><a href="#hero" class="section-li"><?=lang('header - Home');?></a></li>
                        <li><a href="#about" id="link-about" class="section-li"><?=lang('header - Sobre Odiseo');?></a></li>
                        <li><a href="#services" class="section-li"><?=lang('header - Servicios');?></a></li>
                        <li><a href="#portfolio" class="section-li"><?=lang('header - Casos');?></a></li>
                        <li><a href="#testimonials" class="section-li">Ernesto Van Peborgh</a></li>
                        <?if(!$mobile):?>
                        <li><a href="#novedades" class="section-li"><?=lang('header - Novedades');?></a></li>
                        <?endif;?>
                        <li><a href="#equipo" class="section-li"><?=lang('header - Nuestra Red');?></a></li>
                        <div class="language hidden-xs hidden-sm hidden-md">
                            <a href="#" class="section-li">
                                <img class="select-pais img-responsive" src="<?=base_url();?>media/img/mundo.png">
                            </a>
                            <div class="paises">
                                <p><a style="<?=current_language() == 'es'?'text-decoration: underline':'';?>" href="<?=str_replace($_SERVER['HTTP_HOST'].'/pt', 'www.elviajedeodiseo.com/es', current_url());?>">ARGENTINA</a></p>
                                <p><a style="<?=current_language() == 'pt'?'text-decoration: underline':'';?>" href="<?=str_replace($_SERVER['HTTP_HOST'].'/es', 'www.aviagemdeodiseo.com/pt', current_url());?>">BRASIL</a></p>
                            </div>
                        </div>
                        <!--<li><a href="#" class="section-li"><img class="select-pais img-responsive" src="<?=base_url();?>media/img/mundo.png"></a></li>-->
                    <?else:?>
                        <li class="idioma-mobile visible-xs visible-sm visible-md">
                            <a style="<?=current_language() == 'es'?'text-decoration: underline':'';?>" href="<?=str_replace($_SERVER['HTTP_HOST'].'/pt', 'www.elviajedeodiseo.com/es', current_url());?>" class="section-li">ARGENTINA</a> | 
                            <a style="<?=current_language() == 'pt'?'text-decoration: underline':'';?>" href="<?=str_replace($_SERVER['HTTP_HOST'].'/es', 'www.aviagemdeodiseo.com/pt', current_url());?>" class="section-li">BRASIL</a>
                        </li>
                        <li><a href="<?=site_url();?>#hero" class="section-li"><?=lang('header - Home');?></a></li>
                        <li><a href="<?=site_url();?>#about" id="link-about" class="section-li"><?=lang('header - Sobre Odiseo');?></a></li>
                        <li><a href="<?=site_url();?>#services" class="section-li"><?=lang('header - Servicios');?></a></li>
                        <li class="<?=$this->data['current'] == 'casos'?'active':'';?>"><a href="<?=site_url();?>/casos" class="section-li"><?=lang('header - Casos');?></a></li>
                        <li class="<?=$this->data['current'] == 'ernesto'?'active':'';?>"><a href="<?=site_url();?>/ernesto" class="section-li">Ernesto Van Peborgh</a></li>
                        <?if(!$mobile):?>
                        <li class="<?=$this->data['current'] == 'novedades'?'active':'';?>"><a href="<?=site_url();?>/novedades" class="section-li"><?=lang('header - Novedades');?></a></li>
                        <?endif;?>
                        <li><a href="<?=site_url();?>#equipo" class="section-li"><?=lang('header - Nuestra Red');?></a></li>
                        
                        <div class="language hidden-xs hidden-sm hidden-md">
                            <a href="#" class="section-li">
                                <img class="select-pais img-responsive" src="<?=base_url();?>media/img/mundo.png">
                            </a>
                            <div class="paises">
                                <p><a style="<?=current_language() == 'es'?'text-decoration: underline':'';?>" href="<?=str_replace($_SERVER['HTTP_HOST'].'/es', 'www.elviajedeodiseo.com/es', current_url());?>">ARGENTINA</a></p>
                                <p><a style="<?=current_language() == 'pt'?'text-decoration: underline':'';?>" href="<?=str_replace($_SERVER['HTTP_HOST'].'/pt', 'www.aviagemdeodiseo.com/pt', current_url());?>">BRASIL</a></p></div>
                        </div>
                        <!--<li><a href="#" class="section-li"><img class="select-pais img-responsive" src="<?=base_url();?>media/img/mundo.png"></a></li>-->
                    <?endif;?>
                    </ul>

                    <!-- SEARCH -->
                    <!--
                    <span class="toggle-search">
                        <i class="fa fa-search"></i>
                    </span>
                    -->
                    <!-- END / SEARCH -->
                </nav>
                <!-- END / NAVIGATION -->

                <!-- OPEN MENU RESPONSIVE -->
                <a class="open-menu-responsive" href="<?=base_url();?>media/#">
                    <div class="hamburger">
                        <span class="item item-1"></span>
                        <span class="item item-2"></span>
                        <span class="item item-3"></span>
                    </div>
                </a>
                <!-- END / OPEN MENU RESPONSIVE -->

            </div><!-- /container -->
            <!-- CLOSE MENU RESPONSIVE -->
            <a class="close-menu-responsive" href="<?=base_url();?>media/#">
                <span class="item item-1"></span>
                <span class="item item-2"></span>
            </a>
            <!-- END / CLOSE MENU RESPONSIVE -->
        </header>
        <!-- END / HEADER PAGE -->