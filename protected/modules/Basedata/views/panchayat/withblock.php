<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/*
 * @param $name of panchayat column
 */
?>
<script>
	function populateBlock(value)
	 {
		 $.get('<?php echo $this->createUrl('Basedata/getBlocksByDistrict/d') ?>'+'/'+value),
		 function(data)
		 {
			 data = $.parseJSON(data);
			 var htmlAppend='<option>None</option>';
			  $.each(data.data,function(key,value)
         {
        htmlToAppend +="<option value='"+key+"'>" + value  + "</option>";
         });

               
                 $('#<?php echo $name.'_block'?>').html(htmlToAppend);    
           
		 }
	 }
	 function populatePanchayat(value)
	 {
		 $.get('<?php echo $this->createUrl('Basedata/getPanchayatsByBlock/d') ?>'+'/'+value),
		 function(data)
		 {
			 data = $.parseJSON(data);
			 var htmlAppend='<option>None</option>';
			  $.each(data.data,function(key,value)
         {
        htmlToAppend +="<option value='"+key+"'>" + value  + "</option>";
         });

               
                 $('#<?php echo $name;?>').html(htmlToAppend);    
           
		 }
	 }
	</script>
<?php
 echo "<label for='".$name.'_district'."'>".Yii::t('app','District').'</label>';
echo TbHtml::dropDownList($name.'_district','', array_merge(array(''=>'None'),District::model()->listAll()),array('onChange'=>'js:populateBlock($(this).value)'));
echo "<label for='".$name.'_block'."'>".Yii::t('app','Block').'</label>';
echo TbHtml::dropDownList($name.'_block',null,array(),array('onChange'=>'js:populatePanchayat($(this).value)'));
echo "<label for='".$name."'>".Yii::t('app','Panchayat').'</label>';
echo TbHtml::dropDownList($name, null, array(),array('onChange'=>'js:populateBlock()'));

?>
