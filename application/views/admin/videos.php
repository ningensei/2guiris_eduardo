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
            <span>Desde aquí se pueden agregar editar o eliminar los Videos</span>
        </div>
        
        <form id="frmSearch" method="post" action="<?php echo $route;?>" class="form-horizontal page-stats" style="width:300px">
            <div class="form-group">
                <label class="col-md-2 control-label">Buscar:</label>
                <div class="input-group col-md-10"> 
                    <input type="text" name="keywords" class="form-control" value="<?php echo @$keywords;?>"> 
                    <input type="hidden" id="sort" name="sort" value="<?php echo isset($sort)?$sort:"";?>"/>
                    <input type="hidden" id="sortType" name="sortType" value="<?php echo isset($sortType)?$sortType:"ASC";?>"/>
                    <span class="input-group-btn"> 
                        <button class="btn btn-default" type="submit">Buscar</button> 
                    </span> 
                </div>
            </div>
        </form>                 
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
                                <?php echo $this->admin->th('nombre', 'Nombre', true);?>
                                <?php echo $this->admin->th('descripcion', 'Descripcion', true);?>
                                <?php echo $this->admin->th('url', 'URL', true);?>
                                <?php echo $this->admin->th('host', 'Video Host', true);?>
                                <?php echo $this->admin->th('timestamp', 'Fecha de Creación', true);?>
                                
                                <?php echo $this->admin->th('opciones', 'Opciones', false, array('width'=>'150px'));?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data->result() as $row): ?>
                            <tr class="<?php echo alternator('odd', 'even');?>">
                                <?php echo $this->admin->td($row->nombre);?>
                                <?php echo $this->admin->td($row->descripcion);?>
                                <?php echo $this->admin->td($row->url);?>
                                <?php echo $this->admin->td($row->host);?>
                                <?php echo $this->admin->td($row->timestamp);?>
                                <td style="vertical-align: middle;">
                                    <a href="<?php echo $route;?>/edit/<?php echo $row->id;?>" class="icon-edit">&nbsp;Editar</a> | 
                                    <a href="<?php echo $route;?>/delete/<?php echo $row->id;?>" class="icon-remove delete">&nbsp;Borrar</a>
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
                    
                    <div class="row">
                        <div class="table-footer">
                            <div class="col-md-12 text-center">
                                <a class="btn btn-primary" href="<?php echo $route;?>/add">Agregar nuevo Video</a>
                            </div>
                            <div class="col-md-6">
                                <?php echo $pages; ?>
                            </div>
                        </div>
                    </div>
                    
                </div> <!-- /.col-md-12 -->
                
            </div>
        
        </div> <!-- /.col-md-12 -->
        <!-- /Example Box -->
    </div> <!-- /.row -->
    <!-- /Page Content -->

<?php echo $footer;?>