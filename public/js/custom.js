$(document).ready(function(){
    var url1 = document.getElementById('path_h').value
    var ruta = document.getElementById('path_h').value.split("/")
    $('#file_img').fileinput({
        language:'es',
        //initialPreview: [url1],
        initialPreviewAsData: true,
        allowedFileExtensions:['jpg','jpeg','png'],
        maxFileSize:1000,
        showUpload:true,
        showClose:true,
        overwriteInitial: true,
        //deleteUrl: ruta[1],
        dropZoneEnabled:true,
        initialCaption: ruta[1],
        theme: "gly",
    });
    /*
    document.getElementById('pesos').style.display = 'none';
    const selectElement = document.querySelector('#moneda');
    
    selectElement.addEventListener('change', (event) => {
        if(selectElement.value == 'dolar'){
            document.getElementById('dolar').style.display = 'block';
            document.getElementById('pesos').style.display = 'none';
        }else{
            document.getElementById('pesos').style.display = 'block';
            document.getElementById('dolar').style.display = 'none';
        }
    });
    */
    const selectElement1 = document.querySelector('#material_id');
    const inputPeso = document.getElementById('peso');
    const inputMulti = document.getElementById('multiplicador');
    selectElement1.addEventListener('change', (event) => {
        calculoCosto();
    });
    inputPeso.addEventListener('keyup',(event)=>{
        calculoCosto();
    });
    inputMulti.addEventListener('keyup',(event)=>{
        calculoCosto();
    });

    const refresh = document.getElementById('refresh');
    refresh.addEventListener('click',(event)=>{
        calculoCosto();
    });

    function calculoCosto(){
        var id = selectElement1.value;
        var multi_costo = document.getElementById(id+'p').value;
        var hechura = document.getElementById(id+'h').value;
        var peso = document.getElementById('peso').value;
        var hechura_valor = document.getElementById('hechura_valor').value;
        var multi_precio = document.getElementById('multiplicador').value;
        document.getElementById('costo').value = parseFloat(peso*multi_costo);
        if(hechura == 0){
            document.getElementById('dolar').value = Math.ceil(parseFloat(peso*multi_costo*multi_precio));
        }else{
            document.getElementById('dolar').value = Math.ceil(parseFloat((peso*multi_costo*multi_precio)+parseFloat(hechura_valor)));
        }
    };
});
 