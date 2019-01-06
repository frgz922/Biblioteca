<div class="modal fade" id="createClasificacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">Nueva Clasificación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="nombreClasificacion" class="bmd-label-floating">
                                Nombre de la Clasificación
                            </label>
                            <input type="text" class="form-control" id="nombreClasificacion"
                                   name="nombreClasificacion">
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="idClasificacion" value="">
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="guardarClasificacionBtn" onclick="guardarClasificacion()">Guardar</button>
            </div>
        </div>
    </div>
</div>
