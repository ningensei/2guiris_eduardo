<?=$header;?>

<style>.item{width: 30.5%; background: white; padding: 20px 10px; margin: 10px;}</style>
<!-- Main -->
<div id="main">
    <?=$breadcrumbs;?>
    <div class="container otros">

        <!-- Content -->
            <div class="row">
                <?php foreach($otros as $o):?>
                    <div id="content" class="item 4u 12u(mobile)">
                        
                        <?php if(file_exists('./uploads/otros/'.$o->id.'/'.$o->imagen)):?>
                            <img src="<?=base_url();?>uploads/otros/<?=$o->id;?>/<?=$o->imagen;?>" alt="" class="image featured" />
                        <?php endif;?>

                        <article>
                            <header>
                                <h2><?=$o->titulo;?></h2>
                            </header>
                            <p><?=$o->bajada?></p>
                            <a href="<?=site_url('otros/ver/'.$o->id);?>" class="button">Leer más</a>                                
                        </article>
                    </div>
                <?php endforeach;?>
            </div>

            <div class="row paginador">
                <?=$paginador;?>
            </div>

    </div>
</div>

<?=$footer;?>