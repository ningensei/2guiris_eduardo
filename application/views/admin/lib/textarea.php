<? if ($twolines): ?>
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $label;?></label>
</div>
<div class="form-group">
	<div class="col-md-9">
		<textarea rows="<?php echo isset($rows)?$rows:7;?>" cols="<?php echo isset($cols)?$cols:50;?>" id="<?php echo $name;?>" name="<?php echo $name;?>" class="<?php echo ($chars_limit!='')?'limited':'';?> form-control <?php echo $class;?>" <?php echo ($chars_limit!='')?('data-limit="'.$chars_limit.'"'):'';?>><?php echo set_value($name, $value);?></textarea>
		<? if ($chars_limit): ?>
		<span class="countinfo"><span><?php echo $chars_limit - strlen($value);?></span> caracteres disponibles</span>
		<? endif; ?>
	</div>
</div>
<? else: ?>
<div class="form-group">
	<label class="col-md-3 control-label"><?php echo $label;?></label>
	<div class="col-md-9">
		<div class="input-group" style="width:100%;">
			<textarea rows="<?php echo isset($rows)?$rows:7;?>" id="<?php echo $name;?>" name="<?php echo $name;?>" class="<?php echo ($chars_limit!='')?'limited':'';?> form-control <?php echo $class;?>" <?php echo ($chars_limit!='')?('data-limit="'.$chars_limit.'"'):'';?>><?php echo set_value($name.'', $value);?></textarea>
			<? if ($chars_limit): ?>
			<span class="countinfo"><span><?php echo $chars_limit - strlen($value);?></span> caracteres disponibles</span>
			<? endif; ?>
		</div>
	</div>
</div>
<? endif; ?>