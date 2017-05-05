<?=$header;?>

<!-- Main -->
<div id="main">
    <div class="container">

        <div class="row">

            <!-- Content -->
                <div id="content" class="8u 12u(mobile)">
                    <section class="12u">

                        <header>
                            <h2>Contacto</h2>
                        </header>

                        <form id="formContacto" method="post" action="#">
                            <div class="row 50%">
                                <div class="6u 12u(mobile)">
                                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" />
                                </div>
                                <div class="6u 12u(mobile)">
                                    <input type="text" name="email" id="email" placeholder="Email" />
                                </div>
                            </div>
                            <div class="row 50%">
                                <div class="12u">
                                    <input type="text" name="asunto" id="asunto" placeholder="Asunto" />
                                </div>
                            </div>
                            <div class="row 50%">
                                <div class="12u">
                                    <textarea name="mensaje" id="mensaje" placeholder="Mensaje"></textarea>
                                </div>
                            </div>
                            <div class="row 50%">
                                <div class="12u">
                                    <input type="submit" class="button" value="Enviar Mensaje">
                                    <a href="#" class="button alt">Limpiar</a>
                                </div>
                            </div>
                        </form>
                    </section>

                </div>

            <!-- Sidebar -->
                <div id="sidebar" class="4u 12u(mobile)">
                    <section>
                        <ul class="info">
                            <li>
                                <h3>Dirección</h3>
                                <p> 
                                    <?=nl2br($contacto->direccion);?>
                                </p>
                            </li>
                            <li>
                                <h3>Mail</h3>
                                <p><a href="#"><?=$contacto->email;?></a></p>
                            </li>
                            <li>
                                <h3>Telefono:</h3>
                                <p><?=$contacto->telefono;?></p>
                            </li>
                        </ul>
                    </section>
                </div>

        </div>
    </div>
</div>


<?=$footer;?>