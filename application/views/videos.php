<?=$header;?>

<!-- Main -->
<div id="main">

    <?=$breadcrumbs;?>

    <div class="container videos">

        <!-- Content -->

            <?php foreach($videos as $video): ?>

                <div id="content" class="item 6u 12u(mobile)">
                    <article>
                        <header>
                            <h2><?=$video->nombre;?></h2>
                        </header>

                        <iframe width="100%" height="300" src="<?=$video->url;?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> 

                        <?=nl2br($video->descripcion);?>
                        
                    </article>
                </div>

            <?php endforeach;?>
            

    </div>
</div>

<?=$footer;?>