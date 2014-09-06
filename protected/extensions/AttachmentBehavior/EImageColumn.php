<?php
/**
 * EImageColumn class file.
 *
 * This column assumes that the filename is saved as a path to the
 * image that is to be rendered. If no pathPrefix is given, it 
 * assumes Yii::app()->baseUrl as a prefix for the image. This is
 * designed to work with the Attachment Behavior extension for YII.
 * 
 * Example Usage:
 *
 
    SAVE THIS FILE AS EImageColumn.php under extenstions/AttachmentBehavior or where you
    have the extension AttachmentBehavior Saved.  If it's different from above change the next
    line accordingly.
 
    in config/main.php
    'import'=>array(
                'application.extensions.AttachmentBehavior.*',
    ),
 
    Then you can call it in a grid view like so
 
 
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'photo-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        array(
        'class'=>'EImageColumn',
        'name' => 'filename',
        'htmlOptions' => array('style' => 'width: 60px; height: 60px; !important; margin: 5px;'),
        'headerHtmlOptions' => array('style'=>'text-align:center; vertical-align;'),    
    ),
)); ?>
 *
 * skworden
 */
 
Yii::import('zii.widgets.grid.CGridColumn');
 
/**
 * CImageColumn represents a grid view column that displays an image, and optional, a link
 *
 */
class EImageColumn extends CGridColumn
{
    public $name;
    public $value;
 
    public $sortable;
 
    // Path to the image. 
    public $pathPrefix = null;
    public $pathSuffix = null;
 
    // wraps htmlOptions for the image/for the link
    public $htmlOptions = array();
    public $linkHtmlOptions = array();
 
    // alt attribute for the <image> tag
    public $alt = '';
 
    // optional: link
    public $link = false;
 
    public $filter = false;
 
    public function init()
    {
        parent::init();
        if($this->pathPrefix === null)
            $this->pathPrefix = Yii::app()->basePath.'/../'.UtilityController::$uploadPath . '/';
        if($this->name===null)
            throw new CException(Yii::t('zii','Please specify a name for AImageColumn.'));
    }
 
    protected function renderHeaderCellContent()
    {
        if($this->grid->enableSorting && $this->sortable && $this->name!==null)
            echo $this->grid->dataProvider->getSort()->link($this->name,$this->header);
        else if($this->name!==null && $this->header===null)
        {
            if($this->grid->dataProvider instanceof CActiveDataProvider)
                echo CHtml::encode($this->grid->dataProvider->model->getAttributeLabel($this->name));
            else
                echo CHtml::encode($this->name);
        }
        else
            parent::renderHeaderCellContent();
    }
 
    protected function renderDataCellContent($row,$data)
    {
       
 
       if (file_exists($this->pathPrefix.'/'.$data->Attachment)) {
            $image = CHtml::image(Yii::app()->createUrl('/utility/'.$data->Attachment),
            $this->alt,
            $this->htmlOptions);
        } 
        else
        {
            $image = CHtml::image($this->pathPrefix . $data->{$this->name},
                $this->alt,
                $this->htmlOptions);
        }
		
        echo CHtml::image(Yii::app()->createUrl('/utility/'.$data->getAttachment('thumb')),$this->alt,$this->htmlOptions);
    }
}