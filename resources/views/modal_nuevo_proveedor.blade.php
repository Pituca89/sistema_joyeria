<!-- Modal -->
<form action="{{ url('proveedor') }}" method="POST">
    @csrf
<div class="modal fade" id="nuevo_proveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">NUEVO PROVEEDOR</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="" class="col-form-label">NOMBRE</label>
                    <input required="required" class="form-control" type="text" value="" name="nombre">
                </div>  
            </div>
            <div class="form-row">
            <div class="form-group col-md-12">
                <label for="" class="col-form-label">CUIT</label>
                <input class="form-control" type="text" value="" name="cuit">
            </div>  
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
          <button type="submit" class="btn btn-primary">GUARDAR</button>
        </div>
      </div>
    </div>
  </div>
</form>