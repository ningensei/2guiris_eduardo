<?=$header;?>

<style>.item{width: 30.5%; background: white; padding: 20px 10px; margin: 10px;}</style>
<!-- Main -->
<div id="main">
    <?=$breadcrumbs;?>
    <div class="container novedades">

        <!-- Content -->
            <div class="row">
                <?php foreach($novedades as $n):?>
                    <div id="content" class="item 4u 12u(mobile)">
                        
                        <?php if(file_exists('./uploads/novedades/'.$n->id.'/'.$n->imagen)):?>
                            <img src="<?=base_url();?>uploads/novedades/<?=$n->id;?>/<?=$n->imagen;?>" alt="" class="image featured" />
                        <?php endif;?>

                        <article>
                            <header>
                                <h2><?=$n->titulo;?></h2>
                            </header>
                            <p><?=$n->bajada?></p>
                            <a href="<?=site_url('novedades/ver/'.$n->id);?>" class="button">Leer más</a>                                
                        </article>
                    </div>
                <?php endforeach;?>
            </div>

    </div>
</div>

<?=$footer;?>