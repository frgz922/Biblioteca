<div class="modal fade" id="editLibroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">Editar Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="editNombreLibro" class="bmd-label-floating">
                                Nombre del Libro
                            </label>
                            <input type="text" class="form-control" id="editNombreLibro"
                                   name="editNombreLibro">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group" style="margin-top: 22px!important;">
                            <select class="form-control" id="editAutor"
                                    name="editAutor">
                                <option value="" class="disabled">Seleccione el Autor</option>
                                @foreach($autores as $autor)
                                    <option value="{{ $autor['id'] }}">{{ $autor['nombre_autor']. ' '. $autor['apellido_autor'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group" style="margin-top: 22px!important;">
                            <select class="form-control" id="editclasificacion"
                                    name="editclasificacion">
                                <option value="" class="disabled">Seleccione la Clasificación</option>
                                @foreach($clasificaciones as $clasificacion)
                                    <option value="{{ $clasificacion['id'] }}">{{ $clasificacion['nombre_clasificacion'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                {{--<div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="editFechaPub" class="bmd-label-floating">
                                Fecha de Publicación
                            </label>
                            <input type="text" class="form-control datetimepicker" id="editFechaPub"
                                   name="editFechaPub" value="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group" style="margin-top: 22px!important;">
                            <select class="form-control" id="editclasificacion"
                                    name="editclasificacion">
                                <option value="" class="disabled">Seleccione la clasificacion</option>
                                @foreach($clasificaciones as $clasificacion)
                                    <option value="{{ $clasificacion['id'] }}">{{ $clasificacion['nombre_clasificacion'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>--}}
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                            <button class="btn btn-success btn-fab btn-fab-mini btn-round"
                                    data-toggle="tooltip"
                                    data-placement="top" title="" data-container="body"
                                    data-original-title="Seleccionar Thumbnail del Libro"
                                    onclick="inputFileEdit(2)">
                                <i class="material-icons">file_upload</i>
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-5" style="margin-top: -22px!important;">
                        <div class="form-group">
                            <input type="text" class="form-control" id="imageEditNombre" disabled
                                   placeholder="Seleccionar Thumbnail, formatos: JPG y PNG">
                        </div>
                        <input type="file" id="imageEdit" name="imageEdit" style="display: none"
                               accept=".jpg,.png">
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <button class="btn btn-success btn-fab btn-fab-mini btn-round"
                                    data-toggle="tooltip"
                                    data-placement="top" title="" data-container="body"
                                    data-original-title="Seleccionar Archivo"
                                    onclick="inputFileEdit(1)">
                                <i class="material-icons">file_upload</i>
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-5" style="margin-top: -22px!important;">
                        <div class="form-group">
                            <input type="text" class="form-control" id="editnombreArchivo" disabled
                                   placeholder="Seleccionar archivo, formatos: PDF">
                        </div>
                        <input type="file" id="editarchivo" name="editarchivo" style="display: none"
                               accept=".pdf">
                    </div>
                </div>
            </div>
            <input type="hidden" id="idLibro" value="">
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="editarLibroBtn" onclick="editarLibro($('#idLibro').val())">Guardar</button>
            </div>
        </div>
    </div>
</div>
