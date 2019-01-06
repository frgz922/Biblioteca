<div class="modal fade" id="editClasificacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">Editar Clasificacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="editNombreClasificacion" class="bmd-label-floating">
                                Nombre de la Clasificacion
                            </label>
                            <input type="text" class="form-control" id="editNombreClasificacion"
                                   name="editNombreClasificacion">
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="idClasificacion" value="">
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="editarClasificacionBtn" onclick="editarClasificacion($('#idClasificacion').val())">Guardar</button>
            </div>
        </div>
    </div>
</div>
