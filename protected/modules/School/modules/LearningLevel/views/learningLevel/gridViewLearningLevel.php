<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php 
$y=array();
foreach($arrayOfLL as $subject=>$subjectLL)
{
    
    $content='<table class="table">
        <tr><th>'.Yii::t('app','Level').'</th>'.
            '<th>'.Yii::t('app','Skill Category').'</th>'.
                '<th>'.Yii::t('app','Skill').'</th>'.
            '<th>'.Yii::t('app','Value').'</th>'.'</tr>';
     foreach ($subjectLL as $level=>$array)
     {
         foreach ($array as $x)
         {
             $content.="<tr><td>$level</td><td>".$x['category']."</td><td>".$x['name']."</td><td>".$x['value'].$x['unit_lang']."</td></tr>";
         }
        
     }
     $content.="</table>";
         array_push($y,array('label'=>$subject,'content'=>$content));        
    
}

     echo TbHtml::tabbableTabs($y); ?>