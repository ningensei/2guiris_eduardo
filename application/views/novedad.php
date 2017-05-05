<?=$header;?>

<!-- Main -->
<div id="main">
    <?=$breadcrumbs;?>
    <div class="container novedad">

        <!-- Content -->
            <div class="row">
                
                    <div id="content" class="12u">
                        
                        

                        <article>
                            <header>
                                <h2><?=$novedad->titulo;?></h2>
                                <h3><?=$novedad->bajada?></h3>
                            </header>

                            <?php if(file_exists('./uploads/novedades/'.$novedad->id.'/'.$novedad->imagen)):?>
                                <div style="text-align: center;">
                                    <img style="float:right; padding: 0 15px;max-width: 500px;" src="<?=base_url();?>uploads/novedades/<?=$novedad->id;?>/<?=$novedad->imagen;?>" alt="" class="image featured" />
                                </div>
                            <?php endif;?>

                            <p>
                                <?=nl2br($novedad->texto);?>
                            </p>
                            
                            
                        </article>
                    </div>
                
            </div>

    </div>
</div>

<?=$footer;?>