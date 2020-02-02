$(document).ready(function(){
    var url1 = document.getElementById('path_h').value
    var ruta = document.getElementById('path_h').value.split("/")
    $('#file_img').fileinput({
        language:'es',
        //initialPreview: [url1],
        initialPreviewAsData: true,
        allowedFileExtensions:['jpg','jpeg','png'],
        maxFileSize:1000,
        initialPreviewConfig: [
            {caption: ruta[1], filename: ruta[1], downloadUrl: url1, size: 930321, width: "120px", key: 1}
        ],
        showUpload:true,
        showClose:true,
        overwriteInitial: true,
        //deleteUrl: ruta[1],
        dropZoneEnabled:true,
        initialCaption: ruta[1],
        theme: "gly",
    });
});
 