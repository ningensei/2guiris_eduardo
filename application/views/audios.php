<?=$header;?>

<!-- Main -->
    <div id="main">
        <?=$breadcrumbs;?>
        <div class="container audios">
            <div class="row">
                <!-- Content -->
                <?php $count = 1;?>
                <?php foreach($audios as $audio): ?>
                    
                        <div id="content" class="item 6u 12u(mobile)">

                            <article>
                                <?=$audio->iframe;?>

                                <header>
                                    <h2><?=$audio->nombre;?></h2>
                                </header>
                                <p><?=nl2br($audio->descripcion);?></p>

                                
                                
                            </article>
                        </div>  
                    
                    

                    <?php $count ++;?>
                <?php endforeach; ?>
            </div>

            <div class="row paginador">
                <?=$paginador;?>
            </div>

        </div>
        

    </div>

<?=$footer;?>