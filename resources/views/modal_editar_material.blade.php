<!-- Modal -->
<form @if (!empty($ematerial)) action="{{ url('material/'.$ematerial->id.'') }}" @endif method="POST">
    @method('PUT')
    @csrf
<div class="modal fade" id="editar_material" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">NUEVO MATERIAL</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
                <label for="" class="col-form-label">NOMBRE</label>
                <input required="required" class="form-control" type="text" value="@if(!empty($ematerial)){{$ematerial->descripcion}}@endif" name="descripcion">
            </div>  
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
                <label for="" class="col-form-label">MULTIPLICADOR</label>
                <input required="required" class="form-control" type="text" value="@if(!empty($ematerial)){{$ematerial->precio}}@endif" name="precio">
            </div>  
          </div>
          <div class="form-check col-md-12">
            <input class="form-check-input" type="radio" name="hechura" id="exampleRadios1" value="1" @if(!empty($ematerial) && $ematerial->hechura == 1) checked @endif>
            <label class="form-check-label" for="exampleRadios1">
              Con Hechura
            </label>
          </div>
          <div class="form-check col-md-12">
            <input class="form-check-input" type="radio" name="hechura" id="exampleRadios2" value="0" @if(!empty($ematerial) && $ematerial->hechura == 0) checked @endif>
            <label class="form-check-label" for="exampleRadios2">
              Sin Hechura
            </label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
          <button type="submit" class="btn btn-success">GUARDAR</button>
        </div>
      </div>
    </div>
  </div>
</form>