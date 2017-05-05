<?=$header;?>

<!-- Main -->
<div id="main">
    <div class="container">

        <div class="row">

            <!-- Content -->
                <div id="content" class="8u 12u(mobile)">

                <!-- BIOGRAFIA -->
                    <article>
                        <header>
                            <h2>Biografía</h2>
                            <span class="byline">Eduardo Kusnir nació en Buenos Aires, Argentina, donde inicia como pianista.</span>
                        </header>
                        <p>Continúa durante cinco años sus estudios musicales en el Conservatorio Nacional de Sofía, Bulgaria (Konstantin Ganev, piano, Vladi Simeonov, dirección de orquesta). A partir de allí comienza su carrera profesional. En 1962 es invitado por el Ballet Nacional de Cuba para encargarse de la dirección musical de la compañía. Durante tres años dirige un gran número de obras para ballet, realizando una extensa gira por viaja la ex Unión Soviética y China (presentaciones en Moscú, San Petersburgo, Stalingrado, Pekín, Shangai, Cantón, etc.).</p>
                        <div class="imagen_izquierda 12u">
                            <img src="<?=base_url();?>/media/img/biografia3.jpg" alt="" class="image featured3"/>
                            <blockquote>"Conservatorio Nacional de Sofía, Bulgaria"</blockquote>
                        </div>
                        <p>De regreso en Buenos Aires obtiene una beca para estudios avanzados de composición y música electrónica en el “Centro Latinoamericano de Altos Estudios Musicales” (CLAEM) del  Instituto Torcuato di Tella, recibiendo clases de Gerardo Gandini, Francisco Kroepfl y Luis de Pablo, entre otros. Realiza su primera composición electrónica, titulada La Panadería (1970), que más adelante se convertiría en La Gran Panadería, en su versión sinfónica.</p>
                        <div class="12u">
                        <img src="<?=base_url();?>/media/img/ditella.jpg" alt="" class="image featured2" />
                        <blockquote>"Instituto Di Tella - Universidad Torcuato Di Tella"</blockquote>
                        </div>
                        <p>Viaja a Francia, donde en 1974 recibe su doctorado en Estética de la Universidad de París 8, bajo la tutela de Daniel Charles, con una tesis que glosa sobre su personal visión del teatro musical. Desde entonces, Eduardo Kusnir alterna actividades de compositor, intérprete y docente. Ha sido dos veces profesor visitante de la Universidad de Puerto Rico (de 1977 a 1978 y de 1995 a 1998). En Caracas fue fundador de la cátedra de música electroacústica del Conservatorio Nacional de Música “Juan José Landaeta”, mientras que en la Universidad Central de Venezuela fue profesor en la Escuela de Artes y co-fundador del “Centro de Documentación e Investigaciónes Acústico-Musicales” (CEDIAM).</p>
                        <div class="imagen_izquierda 12u">
                        <img src="<?=base_url();?>/media/img/biografia2.jpg" alt="" class="image featured3" />
                        <blockquote>"niversidad de París 8"</blockquote>
                        </div>
                        <p>Específicamente como compositor, Kusnir se ha concentrado en la creación electroacústica, a veces con elementos teatrales y combinaciones instrumentales acústicas, en donde el humor y situaciones absurdas son delicadamente expuestos. Sin embargo, especialmente a partir de 2003,   el género sinfónico y las obras de cámara y escénicas (su ópera breve “La vida en Mutancio” se estrenó en octubre de 2012), adquieren mayor presencia. Sus composiciones se han ejecutado en Europa y las Américas. El sello francés “Chistophée éléctronique” ha sacado la luz su único CD comercial.</p>
                        <div class="12u">
                            <img src="<?=base_url();?>/media/img/biografia1.jpg" alt="" class="image featured2" />
                            <blockquote>Ópera breve “La vida en Mutancio”</blockquote>
                        </div>
                        <p>Nuevamente de regreso en su país natal, en el año 2001 se incorpora como restaurador encargado de la digitalización de archivos sonoros en el Instituto Nacional de Musicología “Carlos Vega”. En 2011 coordinó el festival latinoamericano “Resonancias de la modernidad” en conmemoración del 50 aniversario de la fundación del CLAEM, evento auspiciado por la Secretaría de Cultura de la Nación.</p>
                        <p>Ha ejercido como crítico musical y columnistas en los diarios “El Nacional” (Venezuela) y “El Nuevo Día (San Juan de Puerto Rico).</p>

                    <!-- DISTINCIONES -->
                        <section style="margin-top: 50px;">
                        <header>
                            <h2>Distinciones</h2>
                        </header>
                        <p>BECAS, PREMIOS, ENCARGOS, PUBLICACIONES Y DISTINCIONES:</p>
                        <ul class="style1">
                            <?php foreach($distinciones as $distincion):?>
                                <li><?=$distincion->nombre;?></li>
                            <?php endforeach;?>
                            
                        </ul>
                    </section>

                    </article>
                </div>

            <!-- ENLACES DE INTERES (sidebar) -->
                <div id="sidebar" class="4u 12u(mobile)">

                    <section>
                        <header>
                            <h2>Enlaces de interes</h2>
                        </header>
                        <ul class="style1">
                            <?php foreach($enlaces as $enlace):?>
                                <li><a href="<?=$enlace->url;?>"><?=$enlace->nombre;?></a></li>
                            <?php endforeach;?>
                        </ul>
                        
                    </section>

                    

                </div>

        </div>
    </div>
</div>
<?=$footer;?>