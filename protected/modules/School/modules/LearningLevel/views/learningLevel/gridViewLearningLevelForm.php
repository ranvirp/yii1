<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php 
$y=array();
$arrayOfSL=  SkillLevel::model()->listAllSkilLevel();
foreach($arrayOfSL as $subject=>$subjectLL)
{
    
    $content='<table class="table">
        <tr><th>'.Yii::t('app','Level').'</th>'.
            '<th>'.Yii::t('app','Skill Category').'</th>'.
                '<th>'.Yii::t('app','Skill').'</th>'.
            '<th>'.Yii::t('app','Previous Value').'</th>'.
            '<th>'.Yii::t('app','Present Value').'</th>'.'</tr>';
     foreach ($subjectLL as $level=>$array)
     {
         foreach ($array as $x)
         {
             $content.="<tr><td>$level</td><td>".$x['category']."</td><td >"."<span class='skilllevel-".$x['id']."'>".$x['name']."</span></td><td>";
             if (isset($arrayOfLL[$subject][$level]))
             {
                 foreach ($arrayOfLL[$subject][$level] as $setSL)
                 {
                     if ($setSL['id']==$x['id'])
                     {
                         $content.=$setSL['value'];
                     }
                 }
             }
             $content.="</td>";
             $content.="<td>";
              $content.=TbHtml::textField('value['.$x['id'].']','',array('value_id'=>$x['id']));
              $content.="</td>";
             $content.= "<td>".$x['unit_lang']."</td></tr>";
         }
        
     }
     $content.="</table>";
         array_push($y,array('label'=>$subject,'content'=>$content));        
    
}

     echo TbHtml::tabbableTabs($y); ?>