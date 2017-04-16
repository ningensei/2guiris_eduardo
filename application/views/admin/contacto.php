<?php echo $header; ?>

    <?php if ($saved): ?>
        <br/>
        <div class="alert alert-success fade in"> 
            <i class="icon-remove close" data-dismiss="alert"></i> 
            <strong>&iexcl;Operación completada!</strong> Los datos fueron guardados con éxito.
        </div>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
        <br/>
        <div class="alert alert-danger fade in"> 
            <i class="icon-remove close" data-dismiss="alert"></i> 
            <strong>Error!</strong> <?=$this->session->flashdata('error');?>
        </div>
    <?php endif; ?>
    <?php if (!empty($warning)): ?>
        <br/>
        <div class="alert alert-warning fade in"> 
            <i class="icon-remove close" data-dismiss="alert"></i> 
            <strong>&iexcl;Atención!</strong> <?=$this->session->flashdata('error');?>
        </div>
    <?php endif; ?>

    <!--=== Page Header ===-->
    <div class="page-header">
        <div class="page-title">
            <h3><?php echo implode(" &raquo; ", $this->breadcrumbs);?></h3>
            <span>Desde aquí se puede modificar la información de contacto</span>
        </div>
        
                
    </div>
    <!-- /Page Header -->

    <!--=== Page Content ===-->
    <div class="row">
        <!--=== Example Box ===-->
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> <?=$totalRows;?> registro<?=$totalRows == 1 ? '' : 's';?> disponible<?=$totalRows == 1 ? '' : 's';?></h4>
                </div>
                
                <div class="widget-content" style="display: block;">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-hover  table-striped">
                        <thead>
                            <tr>
                                <?php echo $this->admin->th('direccion', 'Dirección', true);?>
                                <?php echo $this->admin->th('email', 'Email', true);?>
                                <?php echo $this->admin->th('telefono', 'Teléfono', true);?>
                                <?php echo $this->admin->th('timestamp', 'Fecha de Creación', true);?>
                                
                                <?php echo $this->admin->th('opciones', 'Opciones', false, array('width'=>'150px'));?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data->result() as $row): ?>
                            <tr class="<?php echo alternator('odd', 'even');?>">
                                <?php echo $this->admin->td($row->direccion);?>
                                <?php echo $this->admin->td($row->email);?>
                                <?php echo $this->admin->td($row->telefono);?>
                                <?php echo $this->admin->td($row->timestamp);?>
                                <td>
                                    <a href="<?php echo $route;?>/edit/<?php echo $row->id;?>" class="icon-edit">&nbsp;Editar</a> | 
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if (count($data->result()) == 0): ?>
                            <tr>
                                <td colspan="5" align="center" style="padding:30px 0;">
                                    No se encontraron resultados.
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    
                    
                </div> <!-- /.col-md-12 -->
                
            </div>
        
        </div> <!-- /.col-md-12 -->
        <!-- /Example Box -->
    </div> <!-- /.row -->
    <!-- /Page Content -->

<?php echo $footer;?>