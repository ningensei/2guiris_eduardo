<!DOCTYPE HTML>
<!--
    Venue by Pixelarity
    pixelarity.com | hello@pixelarity.com
    License: pixelarity.com/license
-->
<html>
    <head>
        <title>Eduardo Kusnir</title>
        <meta name="keywords" content="Eduardo, Kusnir, Compositor, Música Contemporanea, Director de orquesta, <?=$current;?>">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="media/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="<?=base_url();?>media/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>media/css/custom.css">
        <!--[if lte IE 8]><link rel="stylesheet" href="media/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="media/css/ie9.css" /><![endif]-->
        <?php if(isset($cssFiles)):?>
            <?php foreach($cssFiles as $href):?>
                <link rel="stylesheet" type="text/css" href="<?=$href;?>">
            <?php endforeach;?>
        <?php endif;?>
    </head>
    <body class="homepage" id="body-<?=$current;?>">
        <div id="page-wrapper">

            <!-- Header -->
                <div id="header">
                    <div class="container">


                        <!-- Nav mobile -->
                        <div class="visible-xs">
                            <h1 id="logo-mobile"><a href="<?=site_url();?>"><img src="<?=site_url();?>media/img/logo_mobile.png" alt="Imagen Eduardo" /></a></h1>

                            <nav class="visible-xs" id="nav">
                                <ul>
                                    <li>
                                        <a href="#">CATALOGO</a>
                                        <ul>
                                            <li><a href="<?=site_url('audios');?>">AUDIOS</a></li>
                                            <li><a href="<?=site_url('videos');?>">VIDEOS</a></li>
                                            <li><a href="<?=site_url('partituras');?>">PARTITURAS</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?=site_url('biografia');?>">Biografía</a></li>
                                    <li><a href="<?=site_url('novedades');?>">NOVEDADES</a></li>
                                    <li class="break"><a href="<?=site_url('tesis');?>">TESIS</a></li>
                                    <li><a href="<?=site_url('imagenes');?>">IMAGENES</a></li>
                                    <li><a href="<?=site_url('contacto');?>">Contacto</a></li>
                                </ul>
                            </nav>
                        </div>

                        <!-- Nav Desktop -->
                        <div class="hidden-xs desktopNav-container">
                            <nav id="nav1">
                                <ul>
                                    <li>
                                        <a href="#">CATALOGO</a>
                                        <ul>
                                            <li><a href="<?=site_url('audios');?>">AUDIOS</a></li>
                                            <li><a href="<?=site_url('videos');?>">VIDEOS</a></li>
                                            <li><a href="<?=site_url('partituras');?>">PARTITURAS</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?=site_url('biografia');?>">Biografía</a></li>
                                    <li><a href="<?=site_url('novedades');?>">NOVEDADES</a></li>
                                </ul>
                            </nav>
                                    <h1 id="logo"><a href="<?=site_url();?>"><img src="<?=site_url();?>media/img/logo.png" alt="Imagen Eduardo" /></a></h1>
                            <nav id="nav2">
                                <ul>
                                    <li><a href="<?=site_url('tesis');?>">TESIS</a></li>
                                    <li><a href="<?=site_url('imagenes');?>">IMAGENES</a></li>
                                    <li><a href="<?=site_url('contacto');?>">Contacto</a></li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>

            