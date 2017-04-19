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
        <link rel="stylesheet" href="media/css/main.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="media/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="media/css/ie9.css" /><![endif]-->
    </head>
    <body class="homepage">
        <div id="page-wrapper">

            <!-- Header -->
                <div id="header">
                    <div class="container">
                        
                        <!-- Logo -->

                            <h1 id="logo"><a href="<?=site_url();?>"><img src="<?=base_url();?>media/img/<?=$mobile ? 'logo_mobile.png' : 'logo.jpg';?>" alt="Imagen Eduardo" /></a></h1>

                        <!-- Nav -->
                            <nav id="nav">
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
                </div>

            