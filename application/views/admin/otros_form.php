<?php echo $header;?>

    <!--=== Page Header ===-->
    <div class="page-header">
        <div class="page-title">
            <h3><?php echo implode(" &raquo; ", $this->breadcrumbs);?></h3>
            <span>Agregar/Editar un texto</span>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12"> 
            <div class="widget box">
                <div class="widget-content">
                    <form id="formEdit" class="form-horizontal row-border" method="post" action="<?php echo $route;?>/save" enctype="multipart/form-data" onsubmit="return validar();">
                        
                            <?php $this->admin->showErrors(); ?>
                            
                            <?php echo $this->admin->input('titulo', 'Título', '', $row, $required=true);?>
                            <?php echo $this->admin->file('imagen', 'Imagen', '', isset($row->imagen) ? $row->imagen : '', '/uploads/novedades/' . (isset($row->id) ? $row->id : '') .'/', $required=true);?>
                            <?php echo $this->admin->input('bajada', 'Subtítulo', '', $row, $required=true);?>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Texto Informativo <span class="required">*</span></label>
                                <div class="col-md-9">
                                    <div class="input-group" style="width:100%;">
                                        <textarea rows="8" id="texto_enriquecido" name="texto" class="form-control"><?php echo @$row->texto;?></textarea>
                                    </div>
                                </div>
                            </div>
                            


                            
                            

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