

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
    <?php echo TbHtml::labelTb("Revenue Village:"); ?>
</div>

<div class='form-inline' role="form">

    
        <?php
        if (Yii::app()->user->name == 'admin') {

            echo TbHtml::dropDownListControlGroup(get_class($model) . '_' . $attribute . '_dist_code', '', District::model()->listAll(),array('label'=>'District:'));
        } else {
            $userDesignation = Designation::model()->getDesignationModelByUser(Yii::app()->user->id);
            if ($userDesignation)
                $dist = $userDesignation->district_code;
            else
                $dist = null;
            echo '<span>' . $dist . '</span>';
            echo TbHtml::textField(get_class($model) . '_' . $attribute . '_dist_code', $dist, array('type' => 'hidden'));
        }
        ?>
   

    
    
      <?php   $url="'".Yii::app()->createUrl("/Basedata/RevenueVillage/getRevenueVillagesByTehsil/t/")."'";?>
            
      
        <?php echo TbHtml::dropDownListControlGroup(get_class($model) . '_' . $attribute . '_' . 'tehsilDropDown', '', Tehsil::model()->listAll(), array('label'=>'Tehsil:','empty' => 'None', 'onChange' => 'js:' .'populateDropdown('.$url.'+'."'/'+"."$(this).val(),"."'".get_class($model) . '_' . $attribute."')")); ?>
   
  
 
   
        <?php echo TbHtml::activeDropDownListControlGroup($model, $attribute, array()); ?>
    
</div> 