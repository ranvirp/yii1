

  <style>
  .well1
  {
      background-color: #fff;
    border-color: #ddd;
    border-radius: 4px 4px 0 0;
    border-width: 1px;
    box-shadow: none;
    margin-left: 0;
    margin-right: 0;
    padding: 2px;
    border-style:solid;
  }
  </style>
  <div class="row">
  <?php echo TbHtml::labelTb("Designation:");?>
  </div>
	<div class='form-inline well1'>
		<div class='form-group'>
      <label>
District:
</label>
    <?php
    
	 if (Yii::app()->user->name=='admin')
	 {
		 
		 echo TbHtml::dropDownList(get_class($model).'_'.$attribute.'_dist_code', '', District::model()->listAll());
	 }
	 else 
	 {
		 $userDesignation=Designation::model()->getDesignationModelByUser(Yii::app()->user->id);
				if ($userDesignation)
					$dist=$userDesignation->district_code;
				else $dist=null;
				echo '<span>'.$dist.'</span>';
		 echo TbHtml::textField(get_class($model).'_'.$attribute.'_dist_code', $dist, array('type'=>'hidden'));
	 }
	
	?>
	</div>
		<div class='form-group'>
		<label class="required">
Department
<span class="required">*</span>
</label>
	<?php 
        $url1=Yii::app()->createUrl('/Basedata/designation/GetByTypeJSON/id');
        $url=Yii::app()->createUrl('/Basedata/designationType/GetDesignationTypesJSON/id');
        $dist="$('#'+'".get_class($model)."'+'_'+'".$attribute."'+'_dist_code').val()";
        $id1="'".get_class($model).'_'.$attribute."'";
        $id="'".get_class($model).'_'.$attribute."_designation_type_id"."'";
        ?>
	<?php 
        echo TbHtml::dropDownList(get_class($model).'_'.$attribute.'_'.'deptDropDown', '', Department::model()->listAll(),array('empty'=>'None','onChange'=>'js:'."populateDropdown('".$url."'+'/'+$(this).val()+'/dist/'+".$dist.",".$id.")"));
        ?>
	</div>	
		<div class='form-group'>
			<label class="required" >
Designation Type
<span class="required">*</span>
</label>
		<?php   echo TbHtml::dropDownList(get_class($model).'_'.$attribute.'_designation_type_id','',array(),array('id'=>get_class($model).'_'.$attribute.'_designation_type_id','onChange'=>'js:'."populateDropdown('".$url1."'+'/'+$(this).val()+'/dist/'+".$dist.",".$id1.")"));
                ?>
		</div>	
    <div class='form-group'>
		<label class="required">
Designation:
<span class="required">*</span>
</label>
    <?php
    $url=Yii::app()->createUrl('/Basedata/designation/GetUserName/id/');
    $id="'".get_class($model).'_'.$attribute.'_username'."'";
    echo TbHtml::activeDropDownList($model,$attribute,array(),array('empty'=>'None','onChange'=>'js:'."populateHtml('".$url."'+'/'+$(this).val(),".$id.")"));  ?>
		</div>	
            <div class="help-block" id=<?php echo $id;?>>
		</div>
