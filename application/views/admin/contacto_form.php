<?php echo $header;?>

    <!--=== Page Header ===-->
    <div class="page-header">
        <div class="page-title">
            <h3><?php echo implode(" &raquo; ", $this->breadcrumbs);?></h3>
            <span>Ingresar la información de contacto</span>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12"> 
            <div class="widget box">
                <div class="widget-content">
                    <form id="formEdit" class="form-horizontal row-border" method="post" action="<?php echo $route;?>/save" enctype="multipart/form-data" onsubmit="return validar();">
                        
                            <?php $this->admin->showErrors(); ?>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Dirección <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <div class="input-group" style="width:100%;">
                                        <textarea rows="8" id="texto_enriquecido" name="direccion" class="form-control"><?php echo @$row->direccion;?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php echo $this->admin->input('email', 'Email', '', $row, $required=true);?>
                            <?php echo $this->admin->input('telefono', 'Teléfono', '', $row, $required=true);?>
                            
                            

                            <div class="form-actions">
                                <input type="hidden" name="id" id="id" value="<?php if (isset($row->id)) echo $row->id;?>" />  
                                <input type="submit" id="btnSubmit" value="Grabar" class="btn btn-primary">
                                <a class="btn btn-default" href="<?=$route;?>">Cancelar</a>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
        
<?php echo $footer; ?>