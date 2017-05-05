<?=$header;?>

<!-- Main -->
<div id="main3">
    <div class="container tesis">

        <!-- Content -->
            <div class="row">
                <div id="content" class="6u 12u(mobile)">
                    <article>
                    <header>
                            <h2>Tesis</h2>
                            <span class="byline"><?=$tesis->titulo;?></span>
                            <p><?=nl2br($tesis->descripcion);?></p>
                        </header>

                        <span class="byline">Para ver online en formato pdf:</span>
                        <ul>
                            <!-- Archivos PDF -->
                            <?php foreach($tesis_archivos as $file):?>
                                <li><?=$file->nombre;?> <a href="<?=site_url('uploads/tesis/'.$file->id.'/'.$file->archivo);?>"><span class="icon fa-file-pdf-o"></span></a></li>
                            <?php endforeach;?> 
                        </ul>
                        
                                                            
                    </article>
                </div>
                
                
            </div>

    </div>
</div>

<?=$footer;?>