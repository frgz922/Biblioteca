<div class="modal fade" id="createLibroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">Nuevo Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nombreLibro" class="bmd-label-floating">
                                Nombre del Libro
                            </label>
                            <input type="text" class="form-control" id="nombreLibro"
                                   name="nombreLibro">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group" style="margin-top: 22px!important;">
                            <select class="form-control" id="autor"
                                    name="autor">
                                <option value="" class="disabled">Seleccione el Autor</option>
                                @foreach($autores as $autor)
                                    <option value="{{ $autor['id'] }}">{{ $autor['nombre_autor']. ' '. $autor['apellido_autor'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group" style="margin-top: 22px!important;">
                            <select class="form-control" id="clasificacion"
                                    name="clasificacion">
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
                            <label for="fechaPub">
                                Fecha de Publicación
                            </label>
                            <input type="text" class="form-control datetimepicker" id="fechaPub"
                                   name="fechaPub" value="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group" style="margin-top: 22px!important;">
                            <select class="form-control" id="clasificacion"
                                    name="clasificacion">
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
                                    onclick="inputFile(2)">
                                <i class="material-icons">file_upload</i>
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-5" style="margin-top: -22px!important;">
                        <div class="form-group">
                            <input type="text" class="form-control" id="imageNombre" disabled
                                   placeholder="Seleccionar Thumbnail, formatos: JPG y PNG">
                        </div>
                        <input type="file" id="image" name="image" style="display: none"
                               accept=".jpg,.png">
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <button class="btn btn-success btn-fab btn-fab-mini btn-round"
                                    data-toggle="tooltip"
                                    data-placement="top" title="" data-container="body"
                                    data-original-title="Seleccionar Archivo"
                                    onclick="inputFile(1)">
                                <i class="material-icons">file_upload</i>
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-5" style="margin-top: -22px!important;">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nombreArchivo" disabled
                                   placeholder="Seleccionar archivo, formatos: PDF">
                        </div>
                        <input type="file" id="archivo" name="archivo" style="display: none"
                               accept=".pdf">
                    </div>
                </div>
            </div>
            <input type="hidden" id="idLibro" value="">
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="guardarLibroBtn" onclick="guardarLibro()">Guardar</button>
            </div>
        </div>
    </div>
</div>
