<div class="modal fade" id="editAutorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">Editar Autor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                           <label for="editNombreAutor" class="bmd-label-floating">
                                Nombre del Autor
                            </label>
                            <input type="text" class="form-control" id="editNombreAutor"
                                   name="editNombreAutor">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="editApellidoAutor" class="bmd-label-floating">
                            Apellido del Autor
                            </label>
                            <input type="text" class="form-control" id="editApellidoAutor"
                                   name="editApellidoAutor">
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="idAutor" value="">
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="editarAutorBtn" onclick="editarAutor($('#idAutor').val())">Guardar</button>
            </div>
        </div>
    </div>
</div>
