<form> 
<!-- The fileinput-button span is used to style the file input field as button -->
<span class="btn btn-success fileinput-button">
<i class="glyphicon glyphicon-plus"></i>
<span>Add files...</span>

<!-- The file input field used as target for the file upload widget -->
<input id="fileupload" type="file" name="files[]" multiple>

</span>
 </form>
<br>
<br>
<!-- The global progress bar -->
<div id="progress" class="progress">
<div class="progress-bar progress-bar-success"></div>
</div>
<!-- The container for the uploaded files -->
<div id="files" class="files"></div>


<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
'use strict';
// Change this to the location of your server-side upload handler:
var url = '<?php echo Yii::app()->createUrl('/Basedata/files/uploadFile',array('field'=>'files'));?>',
uploadButton = $('<button/>')
.addClass('btn btn-primary')
.prop('disabled', true)
.text('Processing...')
.on('click', function () {
var $this = $(this),
data = $this.data();
$this
.off('click')
.text('Abort')
.on('click', function () {
$this.remove();
data.abort();
});
data.submit().always(function () {
$this.remove();
});
});
$('#fileupload').fileupload({
url: url,
dataType: 'json',
autoUpload: false,
acceptFileTypes: /(\.|\/)(gif|jpe?g|png|pdf)$/i,
maxFileSize: 5000000, // 5 MB
// Enable image resizing, except for Android and Opera,
// which actually support image resizing, but fail to
// send Blob objects via XHR requests:
disableImageResize: /Android(?!.*Chrome)|Opera/
.test(window.navigator.userAgent),
previewMaxWidth: 100,
previewMaxHeight: 100,
previewCrop: true
}).on('fileuploadadd', function (e, data) {
data.context = $('<div/>').appendTo('#files');
$.each(data.files, function (index, file) {
var node = $('<p/>')
.append($('<span/>').text(file.name));
if (!index) {
node
.append('<br>')
.append(uploadButton.clone(true).data(data));
}
node.appendTo(data.context);
});
}).on('fileuploadprocessalways', function (e, data) {
var index = data.index,
file = data.files[index],
node = $(data.context.children()[index]);
if (file.preview) {
node
.prepend('<br>')
.prepend(file.preview);
}
if (file.error) {
node
.append('<br>')
.append($('<span class="text-danger"/>').text(file.error));
}
if (index + 1 === data.files.length) {
data.context.find('button')
.text('Upload')
.prop('disabled', !!data.files.error);
}
}).on('fileuploadprogressall', function (e, data) {
var progress = parseInt(data.loaded / data.total * 100, 10);
$('#progress .progress-bar').css(
'width',
progress + '%'
);
}).on('fileuploaddone', function (e, data) {
$.each(data.result, function (index, file) {
	$('#<?php echo get_class($model);?>-attachments').append('<input type="hidden" name="fileid[<?php echo $attribute;?>][]" value="'+file.id+'" >');
if (file.url) {
var link = $('<a>')
.attr('target', '_blank')
.prop('href', file.url)
.prop('title',file.name)
.prop('class','thumbnail image-responsive');
$(data.context).prop('class','col-md-2');
$(data.context.children()[index])
.wrap(link)
;
;
} else if (file.error) {
var error = $('<span class="text-danger"/>').text(file.error);
$(data.context.children()[index])
.append('<br>')
.append(error);
}
});
}).on('fileuploadfail', function (e, data) {
$.each(data.files, function (index) {
var error = $('<span class="text-danger"/>').text('File upload failed.');
$(data.context.children()[index])
.append('<br>')
.append(error);
});
}).prop('disabled', !$.support.fileInput)
.parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>


