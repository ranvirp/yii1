<?php
$schemeoptions = Schemes::model()->listAllAsOptions();
$designation_types_options = Designation_types::model()->listAllAsOptions();
?>
<form role="form" method="post" action="<?php echo $this->createUrl('issues/create') ?>">

	<div class="row">
		<div class="col-md-4">
			<label>Scheme</label>
			<select class="form-control" id="schemeid" name="issues[schemeid]" onClick="$.post('<?php echo Yii::app()->createUrl('issues/getTags'); ?>',{'schemeid':$(this).val()},function(data){$('#tagid').html(data)})">
				<?php echo $schemeoptions; ?>
			</select>
		</div>
		<div class="col-md-8">
			<label>To</label>
			<select class="form-control" id="designation_types" name="dt" onClick="$.post('<?php echo Yii::app()->createUrl('issues/getLevelDetails'); ?>',{'designation_type':$(this).val()},function(data){$('#to').html(data)})">
				<?php echo $designation_types_options; ?>
			</select>
			<select id="to" class="form-control" name="issues[to]" onclick=" ">

			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<label>Subject</label>
			<select id="tagid" class="form-control" name="issues[tagid]" onclick=" ">

			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="issues[description]">Description</label>
				<textarea class="form-control" rows="4" name="issues[description]"></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<button type="submit" class="btn btn-success">Submit</button>
		</div>
	</div>
</form>