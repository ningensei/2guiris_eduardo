<?=$header;?>

<!-- Main -->
<div id="main">

    <?=$breadcrumbs;?>
    
    <div class="container composiciones">

        <div class="row">


            <!-- Content -->
                <div id="content" class="8u 12u(mobile)">

                <!-- COMPOSICIONES -->
                    <article>
                        <header>
                            <h2>Listado de composiciones</h2>
                        <p class="subtitle"><b>Dispositivo</b>, lugar y fecha de composición.</p>
                        </header>
                        <section>
                            <?php foreach($composiciones as $composicion):?>
                                <p><b><?=strtoupper($composicion->titulo);?></b> (<?=$composicion->dispositivo;?>; <?=$composicion->lugar;?>, <?=$composicion->ano;?>)</p>    
                            <?php endforeach;?>
                        </section>
                        
                        
                    </article>
                </div>
                
        </div>
    </div>
</div>
<?=$footer;?>