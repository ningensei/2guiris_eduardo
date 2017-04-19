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

                        <form method="post" action="#">
                            <div class="row 50%">
                                <div class="6u 12u(mobile)">
                                    <input type="text" name="name" id="name" placeholder="Nombre" />
                                </div>
                                <div class="6u 12u(mobile)">
                                    <input type="text" name="email" id="email" placeholder="Email" />
                                </div>
                            </div>
                            <div class="row 50%">
                                <div class="12u">
                                    <input type="text" name="subject" id="subject" placeholder="Asunto" />
                                </div>
                            </div>
                            <div class="row 50%">
                                <div class="12u">
                                    <textarea name="message" id="message" placeholder="Mensaje"></textarea>
                                </div>
                            </div>
                            <div class="row 50%">
                                <div class="12u">
                                    <a href="#" class="button">Enviar Mensaje</a>
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
                                <p> San Jose 3354<br />
                                    Buenos Aires<br />
                                    Argentina
                                </p>
                            </li>
                            <li>
                                <h3>Mail</h3>
                                <p><a href="#">infpo@eduardokusnir.com</a></p>
                            </li>
                            <li>
                                <h3>Telefono:</h3>
                                <p>0000-0000</p>
                            </li>
                        </ul>
                    </section>
                </div>

        </div>
    </div>
</div>


<?=$footer;?>