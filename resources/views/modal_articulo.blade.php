<form action="@if($data==1){{url('ingresos/'.$articulos[0]->id.'')}} @endif" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($data==1)
        @method('PUT')
    @endif
    @foreach ($material as $item)
    <input type="hidden" id="{{$item->id.'h'}}" name="" value="{{$item->hechura}}">
    <input type="hidden" id="{{$item->id.'p'}}" name="" value="{{$item->precio}}">
    @endforeach
    <input type="hidden" id="path_h" value="@if($data==1) {{$articulos[0]->path}} @endif" name="path_h">
    <input type="hidden" id="hechura_valor" value="{{$hechura}}" name="">
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
                                    <input id="name" required="required" class="form-control" type="text" value="@if($data==1){{$articulos[0]->nombre}}@endif" name="nombre">
                                </div>   
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="" class="col-form-label">CÓDIGO DE BARRAS</label>
                                    <input class="form-control" required="required" type="text" value="@if($data==1){{$articulos[0]->codigo_barras}}@endif" name="codigo_barras">
                                </div>   
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="" class="col-form-label">PESO ORO (EN GRAMOS)</label>
                                    <input class="form-control" type="text" id="peso" value="@if($data==1){{$articulos[0]->peso}}@else{{1}}@endif" name="peso">
                                </div>    
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="" class="col-form-label">MATERIAL</label>
                                    <select name="material_id" id="material_id" class="form-control">
                                        <option value="0">SELECCIONA UN MATERIAL</option>
                                        @foreach ($material as $item)
                                        <option value="{{$item->id}}" @if($data==1 && $articulos[0]->material_id == $item->id) selected="selected" @endif>{{$item->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>    
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="" class="col-form-label">PROVEEDOR</label>
                                    <select name="provider_id" id="provider_id" class="form-control">
                                        <option value="todos">SELECCIONA UN PROVEEDOR</option>
                                        @foreach ($proveedor as $item)
                                        <option value="{{$item->id}}" @if($data==1 && $articulos[0]->provider_id == $item->id) selected="selected" @endif>{{$item->nombre}}</option>  
                                        @endforeach                                        
                                    </select>
                                </div>   
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="" class="col-form-label">&nbsp;</label>
                                    <input class="form-control btn btn-info" type="button" id="refresh" name="" value="REFRESH">
                                </div> 
                            </div>
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
                            <input class="form-control" required="required" type="text" value="@if($data==1){{$articulos[0]->valor_actual}}@endif" name="valor_actual">
                        </div>    
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="" class="col-form-label">COSTO</label>
                            <input id="costo" class="form-control" required="required" type="text" value="@if($data==1){{$articulos[0]->valor_compra}}@endif" name="valor_compra">
                        </div>
                        <!-- 
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">MONEDA</label>
                            <select name="moneda" id="moneda" class="form-control">
                                <option value="dolar">SELECCIONE MONEDA</option>
                                <option value="dolar">DOLAR</option>
                                <option value="pesos">PESOS</option>
                            </select>
                        </div>   
                        -->
                        <div class="form-group col-md-4">
                            <label for="" class="col-form-label">MULTIPLICADOR</label>
                            <input id="multiplicador" required="required" class="form-control" type="text" value="1" name="multiplicador">
                        </div> 
                        <div class="form-group col-md-4">
                            <label for="" class="col-form-label">PRECIO VENTA</label>
                            <input id="dolar" required="required" class="form-control" type="text" value="@if($data==1){{$articulos[0]->valor_dolar}}@endif" name="valor_dolar">
                            <!--<input id="pesos" required="required" class="form-control" type="text" value="@if($data==1){{$articulos[0]->valor_venta}}@endif" name="valor_pesos">-->
                        </div>  
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" onclick="document.location.href='{{ url('config') }}'" class="btn btn-warning" value="CONFIGURACIÓN">
                    @if ($data==1)
                        <input type="submit" class="btn btn-primary" value="GUARDAR">
                    @else
                        <input type="submit" class="btn btn-primary" value="CREAR">
                    @endif                   
                </div>
            </div>
        </div>
    </div>
</form>