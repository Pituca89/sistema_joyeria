<form action="@if(!empty($articulo_edit)){{url('venta/'.$articulo_edit->id.'')}}@endif" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modal_venta">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Editar Articulo</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>                  
                </div>
                <div class="modal-body">
                    <div class="form-row"> 
                        <div class="form-group col-md-12">
                            <div class="form-row">
                                <label for="" class="col-form-label">DESCRIPCIÓN</label>
                                <input id="name" class="form-control" disabled="disabled" type="text" value="@if(!empty($articulo_edit)){{$articulo_edit->nombre}}@endif" name="nombre">           
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="" class="col-form-label">CANTIDAD</label>
                            <input class="form-control" id="cantidad" type="text" onfocus="this.select();" onkeyup="document.getElementById('subtotal').value = this.value * document.getElementById('precio').value;" value="@if(!empty($articulo_edit)){{$articulo_edit->cantidad}}@endif" name="cantidad">
                        </div>    
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="" class="col-form-label">COSTO</label>
                            <input class="form-control" id="precio" type="text" disabled="disabled" value="@if(!empty($articulo_edit)){{$articulo_edit->precio}}@endif" name="precio">
                        </div>   
                        <div class="form-group col-md-6">
                            <label for="" class="col-form-label">SUBTOTAL</label>
                            <input class="form-control" type="text" disabled="disabled" id="subtotal" value="@if(!empty($articulo_edit)){{$articulo_edit->subtotal_pesos}}@endif" name="subtotal_pesos">
                        </div> 
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="GUARDAR">                  
                </div>
            </div>
        </div>
    </div>
</form>