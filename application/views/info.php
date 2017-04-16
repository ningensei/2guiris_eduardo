<?php echo $header;?>

<!-- Instagram -->
<section class="content">
    
    <p><?php echo nl2br(@$info->texto);?></p>
    <a href="mailto:<?php echo @$info->email;?>"><?php echo @$info->email;?></a>

</section>
<!-- End Instagram -->

<?php echo $footer;?>