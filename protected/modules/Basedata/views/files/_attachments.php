<?php
        $this->widget('xupload.XUpload', array(
            'url' => Yii::app()->createUrl("/Basedata/files/uploadFile",array('field'=>'files')),
           // 'model' => $model,//An instance of our model
            //'attribute' => 'attachments',
			'name'=>'files',
			'htmlOptions' => array('id'=>'files'),
            'multiple' => true,
			'showForm'=>false,
            //Our custom upload template
            'uploadView' => 'application.views.site.upload',
            //our custom download template
            'downloadView' => 'application.views.site.download',
            'options' => array(//Additional javascript options
                //This is the submit callback that will gather
                //the additional data  corresponding to the current file
				'model'=>$modelName,
				'modelId'=>$modelId,
                'submit' => "js:function (e, data) {
                    var inputs = data.context.find(':input');
                    data.formData = inputs.serializeArray();
                    return true;
                }"
            ),
        ));
        ?>

