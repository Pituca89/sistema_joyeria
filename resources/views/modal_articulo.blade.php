<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="path_h" value="@if($data==1){{$articulos[0]->path}}@endif" name="path_h">
    <div class="modal fade" id="modal_articulo">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>{{$title}}</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>                  
                </div>
                <div class="modal-body">
                    <div class="form-row"> 
                        <div class="form-group col-md-6">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="" class="col-form-label">DESCRIPCIÓN</label>
                                    <input id="name" class="form-control" type="text" value="@if($data==1){{$articulos[0]->nombre}}@endif" name="nombre">
                                </div>   
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="" class="col-form-label">CÓDIGO DE BARRAS</label>
                                    <input class="form-control" type="text" value="@if($data==1){{$articulos[0]->codigo_barras}}@endif" name="codigo_barras">
                                </div>   
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="" class="col-form-label">PESO ORO (EN GRAMOS)</label>
                                    <input class="form-control" type="text" value="@if($data==1){{$articulos[0]->peso}}@endif" name="peso">
                                </div>    
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="file-loading">
                                        <input type="file" name="path" id="file_img" data-initial-preview="{{($data==1) ? $articulos[0]->path : ""}}" value="@if($data==1){{$articulos[0]->path}}@endif" accept="image/*">    
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="" class="col-form-label">STOCK MINIMO (OPCIONAL)</label>
                            <input class="form-control" type="text" value="@if($data==1){{$articulos[0]->valor_minimo}}@endif" name="valor_minimo">
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="" class="col-form-label">STOCK ACTUAL</label>
                            <input class="form-control" type="text" value="@if($data==1){{$articulos[0]->valor_actual}}@endif" name="valor_actual">
                        </div>    
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="" class="col-form-label">PRECIO COMPRA</label>
                            <input class="form-control" type="text" value="@if($data==1){{$articulos[0]->valor_compra}}@endif" name="valor_compra">
                        </div> 
                        <div class="form-group col-md-4">
                            <label for="" class="col-form-label">MONEDA</label>
                            <select name="moneda" id="" class="form-control">
                                <option value="dolar">DOLAR</option>
                                <option value="pesos">PESOS</option>
                                <option value="oro">ORO</option>
                            </select>
                        </div>   
                        <div class="form-group col-md-4">
                            <label for="" class="col-form-label">PRECIO VENTA</label>
                            <input class="form-control" type="text" value="@if($data==1){{$articulos[0]->valor_venta}}@endif" name="valor_venta">
                        </div>  
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="CREAR">
                </div>
            </div>
        </div>
    </div>
</form>