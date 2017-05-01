<?=$header;?>

<!-- Main -->
    <div id="main">
        <?=$breadcrumbs;?>
        <div class="container audios">

            <!-- Content -->
            <?php $count = 1;?>
            <?php foreach($audios as $audio): ?>
                <!-- <?php if($count == 1):?>
                <div class="row">
                <?php endif;?> -->
                    <div id="content" class="item 6u 12u(mobile)">

                        <article>
                            <?=$audio->iframe;?>

                            <header>
                                <h2><?=$audio->nombre;?></h2>
                            </header>
                            <p><?=nl2br($audio->descripcion);?></p>

                            
                            
                        </article>
                    </div>  
                <!-- <?php if($count%2 == 0 && $count < count($audios)):?>
                </div>
                <div class="row">
                <?php endif;?>
                 -->
                <?php if($count == count($audios)):?>
                </div>
                <?php endif;?>

                <?php $count ++;?>
            <?php endforeach; ?>

    </div>

<?=$footer;?>