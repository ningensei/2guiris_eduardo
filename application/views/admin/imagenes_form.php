<?php echo $header;?>

    <!--=== Page Header ===-->
    <div class="page-header">
        <div class="page-title">
            <h3><?php echo implode(" &raquo; ", $this->breadcrumbs);?></h3>
            <span>Ingresa un nombre de referencia, y sube la imagen.</span>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12"> 
            <div class="widget box">
                <div class="widget-content">
                    <form id="formEdit" class="form-horizontal row-border" method="post" action="<?php echo $route;?>/save" enctype="multipart/form-data" onsubmit="return validar();">
                        
                            <?php $this->admin->showErrors(); ?>
                            
                            <?php echo $this->admin->input('titulo', 'Título / Epígrafe', '', $row);?>
                            
                            <div class="col-md-12">
                                <div class="form-group box_upload">
                                    <h3>
                                        <b>Imagen</b>
                                    </h3>
                                    
                                    <?php
                                    $imagen = base_url() . "media/admin/assets/img/no-image.png";
                                    $existe = false;
                                    if (isset($row->foto) && $row->foto != '' && file_exists("./uploads/".$currentModule."/".$row->id."/".$row->foto)) {
                                        $imagen = base_url() . "mthumb.php?src=".base_url()."uploads/".$currentModule."/".$row->id."/".$row->foto."&h=200";
                                        $existe = true;
                                    }
                                    ?>
                                    
                                    <div class="box_img_upload" style="background:url(<?=$imagen;?>) center 50% no-repeat;" id="foto_img">
                                        <a href="#" class="img_upload_edit img_upload_edit_imagen">editar</a>
                                        <a href="#" class="img_upload_delete" id="lnkBorrar" rel="<?="/uploads/".$currentModule."/".(isset($row->id)?$row->id:'')."/".(isset($row->imagen)?($row->imagen):'');?>" style="<?=($existe)?'':'display:none; '?>">borrar</a>
                                        
                                        <div class="img_loader img_loader_imagen"><img src="<?=site_url('media/admin/assets/img/ajax-loader.gif');?>" alt=""/></div>
                                    </div>
                                    <p>Recuerde guardar para aplicar los cambios sobre la foto.</p>
                                </div>
                            </div>

                            <iframe class="upload_iframe" name="iframe" id="iframe" src="<?=site_url('admin/'.$currentModule.'/iframe_imagen');?>"></iframe>
    
                            
                            

                            <div class="form-actions">
                                <input type="hidden" name="id" id="id" value="<?php if (isset($row->id)) echo $row->id;?>" />  
                                <input type="submit" id="btnSubmit" value="Grabar" class="btn btn-primary">
                                <a class="btn btn-default" href="<?=$route;?>">Cancelar</a>
                            </div>

                            
                            <input type="hidden" name="imagen" id="imagen">
                        </div>
                    </form>

                    <form method="post" action="<?php echo site_url('admin/'.$currentModule.'/upload_imagen');?>" enctype="multipart/form-data" id="frmUpload" target="iframe">
                        <input type="file" name="foto_upload" id="foto_upload" style="visibility:hidden;"/>
                        <input type="hidden" name="id" id="id" value="<?php if (isset($row->id)) echo $row->id;?>" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        
        $('#foto_upload').change(function(){
            $('.img_loader_imagen').show();
            $('#frmUpload').submit();
        });

        $('.img_upload_edit_imagen').on('click',function(){
            $('#foto_upload').trigger('click');
        });

        $('#lnkBorrar').on('click',function(e){
            e.preventDefault();
            
            $.post("<?=site_url('admin/ajaxtools/deletefile');?>", {filename:this.rel}, function(result){
                if (result != '')
                    alert('File does not exist');
                
                $('#foto_img').css('background', 'url(<?=base_url();?>mthumb.php?src=/media/admin/assets/img/no-image.png&w=200&h=200)');
                $('#lnkBorrar').attr('rel','').hide();
            });
        });

        function finishUpload(file) {
            data = file.split('/');
            $('#imagen').val(data[data.length-1]);
            $('#foto_img').css('background', 'url(<?=base_url();?>mthumb.php?src='+file+'&h=200) center top no-repeat');
            $('#lnkBorrar').attr('rel',file).show();
            $('.img_loader_imagen').hide();
        }

        function alertError(error) {
            alert(error);
        }

    </script>
    
        
<?php echo $footer; ?>