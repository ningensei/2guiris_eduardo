<?=$header;?>

<!-- Main -->
<div id="main">
    <?=$breadcrumbs;?>
    <div class="container otro">

        <!-- Content -->
            <div class="row">
                
                    <div id="content" class="12u">
                        
                        

                        <article>
                            <header>
                                <h2><?=$otro->titulo;?></h2>
                                <h3><?=$otro->bajada?></h3>
                            </header>

                            <?php if(file_exists('./uploads/otros/'.$otro->id.'/'.$otro->imagen)):?>
                                <div style="text-align: center;">
                                    <img style="float:right; padding: 0 15px;max-width: 500px;" src="<?=base_url();?>uploads/otros/<?=$otro->id;?>/<?=$otro->imagen;?>" alt="" class="image featured" />
                                </div>
                            <?php endif;?>

                            <p>
                                <?=nl2br($otro->texto);?>
                            </p>
                            
                            
                        </article>
                    </div>
                
            </div>

    </div>
</div>

<?=$footer;?>