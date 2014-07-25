<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UtilityController extends Controller

{
    public function actionTest()
    {
        $this->render('test');
    }
   public static function monthDropdown($name="month", $selected=null)
{
        $dd = '<select name="'.$name.'" id="'.$name.'">';

        $months = array(
                1 => Yii::t('app','January'),
                2 => Yii::t('app','February'),
                3 => Yii::t('app','March'),
                4 => Yii::t('app','April'),
                5 => Yii::t('app','May'),
                6 => Yii::t('app','June'),
                7 => Yii::t('app','July'),
                8 => Yii::t('app','August'),
                9 => Yii::t('app','September'),
                10 =>Yii::t('app', 'October'),
                11 => Yii::t('app','November'),
                12 => Yii::t('app','December'));
        /*** the current month ***/
        return $months;
        $selected = is_null($selected) ? date('n', time()) : $selected;

        for ($i = 1; $i <= 12; $i++)
        {
                $dd .= '<option value="'.$i.'"';
                if ($i == $selected)
                {
                        $dd .= ' selected';
                }
                /*** get the month ***/
                $dd .= '>'.$months[$i].'</option>';
        }
        $dd .= '</select>';
        return $dd;
}



    
}

