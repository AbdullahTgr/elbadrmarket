<!DOCTYPE html>
<html>
<head>
<title></title>
<meta name="_token" content="{{ csrf_token() }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
</head>
<style type="text/css">
img {
display: block;
max-width: 100%;
}
.preview {
overflow: hidden;
width: 400px; 
height: 400px;
margin: 10px;
border: 1px solid red;
}
.modal-lg{
max-width: 1000px !important;
}
</style>
<body>
<div class="container">
<input id="itf" type="file" name="image" style="display: none" class="image ttt">

<img class="base64data" src="">

</div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="modalLabel">اضف صورة</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="img-container"  style="direction: ltr">
<div class="row">
<div class="col-md-8">
<img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
</div>
<div class="col-md-4">
<div class="preview"></div>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
<button type="button" class="btn btn-primary" id="crop">Crop</button>
<button type="button" class="btn btn-primary" id="uwc">Upload Without Crop</button>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
var $modal = $('#modal');
var image = document.getElementById('image');
var cropper;
$("body").on("change", ".image", function(e){
    var files = e.target.files;
    var done = function (url) {
    image.src = url;
    $modal.modal('show');
};

var reader;
var file;
var url;
if (files && files.length > 0) {
file = files[0];
if (URL) {
done(URL.createObjectURL(file));
} else if (FileReader) {
reader = new FileReader();
reader.onload = function (e) {
done(reader.result);
};
reader.readAsDataURL(file);
}
}
});


$modal.on('shown.bs.modal', function () {
cropper = new Cropper(image, {
aspectRatio: 1,
viewMode: 3,
preview: '.preview'
});
}).on('hidden.bs.modal', function () {
cropper.destroy();
cropper = null;
});



$("#crop").click(function(){
    canvas = cropper.getCroppedCanvas({
    width: 400,
    height: 400,
    });
crp();
})

$("#uwc").click(function(){
nocrp();
})

function crp(){
    canvas.toBlob(function(blob) {
url = URL.createObjectURL(blob);
var reader = new FileReader();
reader.readAsDataURL(blob); 

reader.onloadend = function() {
var base64data = reader.result; 
$.ajax({
type: "POST",
dataType: "json",
url: "crop-image-upload",
data: {'_token': $('meta[name="_token"]').attr('content'), 'image': base64data,'url':$('.imgdest').val()}, 
success: function(data){
    $(".bb").attr('src',base64data);
    $modal.modal('hide');

}
});
}
});


}




function nocrp(){
    
var base64=$('.fullimg').val(); 


$.ajax({
type: "POST",
dataType: "json",
url: "crop-image-upload",
data: {'_token': $('meta[name="_token"]').attr('content'),'nocrop':'nocrop','image':base64,'url':$('.imgdest').val()}, 
success: function(data){
    $(".bb").attr('src',base64);
    $modal.modal('hide');
}
});


}



</script>
</body>
</html> 