<?=$header;?>

<div class="owl-carousel owl-theme">
    
        <img class="img-responsive" src="<?=base_url('media/img/slide-1.jpg');?>">
    
        <img class="img-responsive" src="<?=base_url('media/img/slide-2.jpg');?>">
    
        <img class="img-responsive" src="<?=site_url('media/img/slide-3.jpg');?>">
</div>
<!-- Featured -->
<div id="featured">
    <div class="container">
        <div class="row">

            <?php foreach($novedades as $novedad):?>
                <section class="4u 12u(mobile)">
                    <header>
                        <?php if(file_exists('./uploads/novedades/'.$novedad->id.'/'.$novedad->imagen)):?>
                            <img src="<?=base_url();?>uploads/novedades/<?=$novedad->id;?>/<?=$novedad->imagen;?>" alt="" class="image featured"/>
                        <?php endif;?>
                        <h2><?=$novedad->titulo;?></h2>
                    </header>
                    <div class="box-style">
                        <p><?=$novedad->bajada;?></p>
                    </div>
                    <a href="<?=site_url()?>novedades/ver/<?=$novedad->id;?>" class="button">Leer más</a>
                </section>
            <?php endforeach;?>

        </div>
    </div>
</div>

<!-- Main -->
<div id="main">
    <div class="container">
        <section>
            <header>
                <h2>Catalogo</h2>
                <span class="byline">Separé mis trabajos en 3 categorías.</span>
            </header>
            <span class="divider">&nbsp;</span>
        </section>
        <div class="row">
            <section class="4u 12u(mobile)">
                <img src="<?=base_url();?>media/img/audio2.jpg" alt="" class="image featured" />
                <h3>AUDIOS</h3>
                <span class="details">La Panadería, Lili no Baila Tango, Tres Piezas para Piano y más.</span>
                <a href="<?=site_url('audios');?>" class="button">- VER - </a>
            </section>
            <section class="4u 12u(mobile)">
                <img src="<?=base_url();?>media/img/video2.jpg" alt="" class="image featured" />
                <h3>VIDEOS</h3>
                <span class="details">El Cisnecito, La Batutita Loca, La Panadería y más.</span>
                <a href="<?=site_url('videos');?>" class="button">- VER - </a>
            </section>
            <section class="4u 12u(mobile)">
                <img src="<?=base_url();?>media/img/musica.jpg" alt="" class="image featured" />
                <h3>PARTITURAS</h3>
                <span class="details">Blancanieves, Tres Piezas para Piano, Soplos y mas.</span>
                <a href="<?=site_url('partituras');?>" class="button">- VER - </a>
            </section>
        </div>
    </div>
</div>

<?=$footer;?>