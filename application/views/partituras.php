<?=$header;?>

<!-- Main2 -->
<div id="main2">
    <div class="container">

        <!-- Content -->
            <div class="row">
                <div id="content" class="12u">
                    <article>
                        <ul class="text-left">
                            <?php foreach($partituras as $partitura):?>
                                <li><?=$partitura->nombre;?> <a target="_blank" href="<?=site_url('uploads/partituras/'.$partitura->id.'/'.$partitura->archivo);?>"><span class="icon fa-file-pdf-o"></span></a></li>
                            <?php endforeach;?>
                        
                        </ul>
                        
                    </article>
                </div>
                
                
            </div>

    </div>
</div>

<?=$footer;?>