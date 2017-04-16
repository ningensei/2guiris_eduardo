<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $label;?> <?php if($is_required){ ?><span class="required">*</span><?php } ?></label>
	<div class="col-md-9">
		<input type="text" id="<?php echo $name;?>" name="<?php echo $name;?>" class="form-control <?php echo $class;?> <?php echo ($is_required)?'required':'';?> <?php echo $limit ? 'limited' : '';?>" <?php echo $limit ? 'data-limit="'.$limit.'"' : '';?> value="<?php echo set_value($name, $value);?>" <?php echo ($readonly)?'disabled':'';?> style="<?php echo $style;?>">
		<span><small><b><?php echo (isset($note) && $note)?$note:'';?></b></small></span>
		<?php if ($limit): ?>
		<span class="countinfo"><span><?php echo $limit - strlen($value);?></span> caracteres disponibles</span>
		<?php endif; ?>
		<label for="<?php echo $name;?>" generated="true" class="has-error help-block" style="display:none;"></label>
	</div>
</div>