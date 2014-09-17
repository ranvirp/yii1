
<script>
  function <?php echo get_class($model).'_'.$attribute.'_';?>populateLevels(value)
  
  {
	  dist=$('#'+'<?php echo get_class($model);?>'+'_'+'<?php echo $attribute;?>'+'_dist_code').val();
      $.get('<?php echo Yii::app()->createUrl('/Basedata/designation/GetByTypeJSON/id');?>'+'/'+value+'/dist/'+dist,
          function(data)
          {
              data = $.parseJSON(data)
            
               
                var htmlToAppend='';
              $.each(data,function(key,value)
         {
        htmlToAppend +="<option value='"+key+"'>" + value  + "</option>";
         });

                 
                 $('#'+'<?php echo get_class($model);?>'+'_'+'<?php echo $attribute;?>').html(htmlToAppend);    
            
          }
              
            )
  }
    function <?php echo get_class($model).'_'.$attribute.'_';?>populateDesignationTypes(value)
  {
      $.get('<?php echo Yii::app()->createUrl('/Basedata/designationType/GetDesignationTypesJSON/id');?>'+'/'+value,
          function(data)
          {
              data = $.parseJSON(data)
            
               
                var htmlToAppend='';
              $.each(data,function(key,value)
         {
        htmlToAppend +="<option value='"+key+"'>" + value  + "</option>";
         });

                 
                 $('#'+'<?php echo get_class($model);?>'+'_'+'<?php echo $attribute;?>'+'_designation_type_id').html(htmlToAppend);    
            
          }
              
            )
  }
  </script>
	<div class='form-inline well'>
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
Designation
<span class="required">*</span>
</label>
	
	<?php echo TbHtml::dropDownList(get_class($model).'_'.$attribute.'_'.'deptDropDown', '', Department::model()->listAll(),array('empty'=>'None','onChange'=>'js:'.get_class($model).'_'.$attribute.'_'.'populateDesignationTypes($(this).val())'));?>
	</div>	
		<div class='form-group'>
			<label class="required" >
Designation Type
<span class="required">*</span>
</label>
		<?php   echo TbHtml::dropDownList(get_class($model).'_'.$attribute.'_designation_type_id','',array(),array('id'=>get_class($model).'_'.$attribute.'_designation_type_id','onChange'=>'js:'.get_class($model).'_'.$attribute.'_'.'populateLevels($(this).val())'));  ?>
		</div>	
    <div class='form-group'>
		<label class="required">
Designation:
<span class="required">*</span>
</label>
    <?php   echo TbHtml::activeDropDownList($model,$attribute,array());  ?>
		</div>	
		</div>
