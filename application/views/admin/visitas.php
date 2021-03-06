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
            <span>Estadísticas de visitas al sitio</span>
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


    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div style="outline: 2px solid orange!important;" class="statbox widget box box-shadow">
                <div class="widget-content">
                    <div class="visual blue">
                        <i class="icon-user"></i>
                    </div>
                    <div class="title">Total de sesiones únicas por usuario</div>
                    <div class="value">
                        <?=$total_sesiones;?>
                    </div>
                </div>
            </div> <!-- /.smallstat -->
        </div>
        <div class="col-sm-6 col-md-3">
            <div style="outline: 2px solid orange!important;" class="statbox widget box box-shadow">
                <div class="widget-content">
                    <div class="visual red">
                        <i class="icon-user"></i>
                    </div>
                    <div class="title">Total de visitas a todas las secciones</div>
                    <div class="value">
                        <?=$total_visitas;?>
                    </div>
                </div>
            </div> <!-- /.smallstat -->
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="statbox widget box box-shadow">
                <div class="widget-content">
                    <div class="visual purple">
                        <i style="font-size: 20px;" class="fa fa-home" aria-hidden="true"></i>
                    </div>
                    <div class="title">Total de visitas a la Página Principal</div>
                    <div class="value">
                        <?=$total_home;?>
                    </div>
                </div>
            </div> <!-- /.smallstat -->
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="statbox widget box box-shadow">
                <div class="widget-content">
                    <div class="visual cyan">
                        <i style="font-size: 20px;" class="fa fa-book" aria-hidden="true"></i>
                    </div>
                    <div class="title">Total de visitas a la sección biografía</div>
                    <div class="value">
                        <?=$total_biografia;?>
                    </div>
                </div>
            </div> <!-- /.smallstat -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="statbox widget box box-shadow">
                <div class="widget-content">
                    <div class="visual yellow">
                        <i style="font-size: 20px;" class="fa fa-file-text-o" aria-hidden="true"></i>
                    </div>
                    <div class="title">Total de visitas a la sección novedades</div>
                    <div class="value">
                        <?=$total_novedades;?>
                    </div>
                </div>
            </div> <!-- /.smallstat -->
        </div>
    
        <div class="col-sm-6 col-md-3">
            <div class="statbox widget box box-shadow">
                <div class="widget-content">
                    <div class="visual green">
                        <i style="font-size: 20px;" class="fa fa-font" aria-hidden="true"></i>
                    </div>
                    <div class="title">Total de visitas a la sección tesis</div>
                    <div class="value">
                        <?=$total_tesis;?>
                    </div>
                </div>
            </div> <!-- /.smallstat -->
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="statbox widget box box-shadow">
                <div class="widget-content">
                    <div class="visual coral">
                        <i style="font-size: 18px;" class="fa fa-picture-o" aria-hidden="true"></i>
                    </div>
                    <div class="title">Total de visitas a las imágenes</div>
                    <div class="value">
                        <?=$total_imagenes;?>
                    </div>
                </div>
            </div> <!-- /.smallstat -->
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="statbox widget box box-shadow">
                <div class="widget-content">
                    <div class="visual forestgreen">
                        <i style="font-size: 20px;" class="fa fa-headphones" aria-hidden="true"></i>
                    </div>
                    <div class="title">Total de visitas a la sección de Audios</div>
                    <div class="value">
                        <?=$total_audios;?>
                    </div>
                </div>
            </div> <!-- /.smallstat -->
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="statbox widget box box-shadow">
                <div class="widget-content">
                    <div class="visual forestgreen">
                        <i style="font-size: 20px;" class="fa fa-video-camera" aria-hidden="true"></i>
                    </div>
                    <div class="title">Total de visitas a la sección de videos</div>
                    <div class="value">
                        <?=$total_videos;?>
                    </div>
                </div>
            </div> <!-- /.smallstat -->
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="statbox widget box box-shadow">
                <div class="widget-content">
                    <div class="visual forestgreen">
                        <i style="font-size: 20px;" class="fa fa-music" aria-hidden="true"></i>
                    </div>
                    <div class="title">Total de visitas a la sección de partituras</div>
                    <div class="value">
                        <?=$total_partituras;?>
                    </div>
                </div>
            </div> <!-- /.smallstat -->
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="statbox widget box box-shadow">
                <div class="widget-content">
                    <div class="visual forestgreen">
                        <i style="font-size: 18px;" class="fa fa-comment-o" aria-hidden="true"></i>
                    </div>
                    <div class="title">Total de visitas a la sección de contacto</div>
                    <div class="value">
                        <?=$total_contacto;?>
                    </div>
                </div>
            </div> <!-- /.smallstat -->
        </div>
    </div>



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
                                <?php echo $this->admin->th('timestamp', 'Fecha', true);?>
                                <?php echo $this->admin->th('seccion', 'Sección', true);?>
                                <?php echo $this->admin->th('ip', 'IP', true);?>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data->result() as $row): ?>
                            <tr class="<?php echo alternator('odd', 'even');?>">
                                <?php echo $this->admin->td($row->timestamp);?>
                                <?php echo $this->admin->td($row->seccion);?>
                                <?php echo $this->admin->td($row->ip);?>
                                
                            </tr>
                            <?php endforeach; ?>
                            <?php if (count($data->result()) == 0): ?>
                            <tr>
                                <td colspan="3" align="center" style="padding:30px 0;">
                                    No se encontraron resultados.
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="table-footer">
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