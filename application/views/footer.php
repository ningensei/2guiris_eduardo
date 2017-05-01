<!-- Copyright -->
                <div id="copyright">
                    <div class="container">
                        Copyright &copy; Eduardo Kusnir. All rights reserved.
                    </div>
                </div>

        </div>

        <!-- Scripts -->
            <script src="<?=base_url();?>media/js/jquery.min.js"></script>
            <script src="<?=base_url();?>media/js/jquery.dropotron.min.js"></script>
            <script src="<?=base_url();?>media/js/skel.min.js"></script>
            <script src="<?=base_url();?>media/js/util.js"></script>
            <!--[if lte IE 8]><script src="<?=base_url();?>media/js/ie/respond.min.js"></script><![endif]-->
            <script src="<?=base_url();?>media/js/main.js"></script>

            <?php if(isset($jsFiles)):?>
                <?php foreach($jsFiles as $src):?>
                    <script type="text/javascript" src="<?=$src;?>"></script>
                <?php endforeach;?>
            <?php endif;?>

    </body>
</html>