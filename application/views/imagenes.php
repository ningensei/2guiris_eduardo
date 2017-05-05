<?=$header;?>

<!-- Main -->
<div id="main">

    <div class="container">
        <?=$breadcrumbs;?>
        <div class="imagenes" style="display: none;"">
            <?php foreach($imagenes as $img):?>

                <?php if(file_exists('./uploads/imagenes/'.$img->id.'/'.$img->imagen)):?>
                
                    <section class="item 4u 12u(mobile)">
                        <img style="margin: 0;" src="<?=base_url('uploads/imagenes/'.$img->id.'/'.$img->imagen);?>" alt="" class="image featured" />
                        <?=$img->titulo;?>
                    </section>

                <?php endif;?>

            <?php endforeach;?>
        </div>
    </div>
</div>


<?=$footer;?>