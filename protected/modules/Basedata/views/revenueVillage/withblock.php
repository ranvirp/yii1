<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/*
 * @param $name of panchayat column
 */
?>


	<div class="elem-horizontal">
		
<?php
echo "<div class='form-label '>";
 echo "<label for='".$name.'_district'."'>".Yii::t('app','District').'</label>';
echo TbHtml::dropDownList($name.'_district',null,District::model()->listAll(),array('empty'=>'None','onChange'=>'js:populateBlock($(this).val())'));
echo "</div>";
echo "<div class='form-label'>";

echo "<label for='".$name.'_block'."'>".Yii::t('app','Block').'</label>';
echo TbHtml::dropDownList($name.'_block', null, array('2'=>'Hi'),array('onChange'=>'js:populatePanchayat($(this).val())'));
echo "</div>";
echo "<div class='form-label'>";

echo "<label for='".$name."_panchayat'>".Yii::t('app','Panchayat').'</label>';
echo TbHtml::dropDownList($name.'_panchayat', null, array(),array('onChange'=>'js:populateRevenueVillages($(this).val())'));
echo "</div>";
echo "<div class='form-label'>";

echo "<label for='".$name."'>".Yii::t('app','Panchayat').'</label>';
echo TbHtml::dropDownList($name, '', array());
echo "</div>";
?>
	</div>
<script>
	function populateBlock(value)
	 {
		 $.get('<?php echo $this->createUrl('/Basedata/block/getBlocksByDistrict/d'); ?>'+'/'+value,
		 function(data)
		 {
			 data = $.parseJSON(data);
			 var htmlToAppend='<option>None</option>';
			  $.each(data,function(key,value)
              {
                htmlToAppend +="<option value='"+key+"'>" + value  + "</option>";
              }
);
	               var name='<?php echo $name;?>';
				   //name ='School_location_code'
                 $('#'+name+'_block').html(htmlToAppend);  
				
		 }
		 );
	 }
	 function populatePanchayat(value)
	 {
		 $.get('<?php echo $this->createUrl('/Basedata/panchayat/getPanchayatsByBlock/b') ?>'+'/'+value,
		 function(data)
		 {
			 data = $.parseJSON(data);
			 var htmlToAppend='<option>None</option>';
			  $.each(data,function(key,value)
         {
        htmlToAppend +="<option value='"+key+"'>" + value  + "</option>";
         }

            );   
                 $('#<?php echo $name;?>'+'_panchayat').html(htmlToAppend);    
           
		 });
	 }
	function populateRevenueVillages(value)
	 {
		 $.get('<?php echo $this->createUrl('/Basedata/revenueVillage/getRevenueVillagesByPanchayat/p') ?>'+'/'+value,
		 function(data)
		 {
			 data = $.parseJSON(data);
			 var htmlToAppend='<option>None</option>';
			  $.each(data,function(key,value)
         {
           htmlToAppend +="<option value='"+key+"'>" + value  + "</option>";
         }
) ;          
		      
                 $('#<?php echo $name;?>').html(htmlToAppend);    
           
		 });
	 }
	</script>
	<script>
		//$('#<?php echo $name.'_district';?>').change(populateBlock($(this).val()));
		
		</script>
	<style>
		.form-label select
		{
			width:90%;
			overflow: hidden;
		}
		.elem-horizontal
		{
			height:95%;
		}
			.elem-horizontal .form-label
			{
				display:inline-block;
				font-size: 10px;
				line-height:20px;
				width:22%;
				padding:0px;
			}
		</style>