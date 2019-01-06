@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 {{--offset-1--}}">
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="nav nav-pills nav-pills-info nav-pills-icons flex-column" role="tablist"
                            style="position: fixed">
                            <!--
                            color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                        -->
                            <li class="nav-item">
                                <a class="nav-link active show" href="#libros" role="tab" data-toggle="tab"
                                   aria-selected="false">
                                    <i class="material-icons">library_books</i> Libros
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#autores" role="tab" data-toggle="tab"
                                   aria-selected="true">
                                    <i class="material-icons">people</i> Autores
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#clasificaciones" role="tab" data-toggle="tab"
                                   aria-selected="true">
                                    <i class="material-icons">import_contacts</i> Clasificaciones
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#consulta" role="tab" data-toggle="tab"
                                   aria-selected="true">
                                    <i class="material-icons">search</i> Consulta de Libros
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="alert alert-success" id="success-alert" style="display: none">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active show" id="libros">
                                <div class="row" id="cardBook">
                                    @foreach($libros as $libro)
                                        <div class="col-sm-12">
                                            <div class="card" style="margin-top: 0!important;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <img src="{{ $libro['url_thumbnail'] }}" alt=""
                                                                 id="thumbnail"
                                                                 class="img-thumbnail center-img img-raised rounded"
                                                                 style="display: block!important;margin-left: auto!important;margin-right: auto!important;">
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <b class="title">Titulo: </b> {{ $libro['nombre_libro'] }}
                                                                <br>
                                                                <b class="title">Autor: </b> {{ $libro['autor']['nombre_autor'].' '.$libro['autor']['apellido_autor'] }}
                                                                <br>
                                                                <b class="title">Clasificacion: </b> {{ $libro['clasificacion']['nombre_clasificacion'] }}
                                                                <br>
                                                                {{--<b class="title">Fecha
                                                                    Pub: </b> {{ $libro['fecha_pub'] }}--}}
                                                            </div>
                                                            <br>
                                                            <a href="{{ asset('storage/'.$libro['url_libro']) }}"
                                                               class="btn btn-success btn-just-icon btn-sm"
                                                               data-toggle="tooltip"
                                                               data-placement="top" title="" data-container="body"
                                                               data-original-title="Ver" target="_blank">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <button class="btn btn-info btn-just-icon btn-sm"
                                                                    data-toggle="tooltip"
                                                                    data-placement="top" title="" data-container="body"
                                                                    onclick="libroPorID({{ $libro['id'] }})"
                                                                    data-original-title="Editar">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button class="btn btn-danger btn-just-icon btn-sm"
                                                                    data-toggle="tooltip"
                                                                    data-placement="top" title="" data-container="body"
                                                                    onclick="showMsjModal('{{ $libro["id"] }}', 1)"
                                                                    data-original-title="Eliminar">
                                                                <i class="fa fa-remove"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{ $libros->links() }}
                            </div>
                            <div class="tab-pane" id="autores">
                                <div class="card" style="margin-top: 0!important;">
                                    <div class="card-body">
                                        <h4 class="title text-primary">Listado de Autores</h4>
                                        <table class="table table-striped"
                                               style="white-space: nowrap" id="autoresTable">
                                            <thead>
                                            <tr>
                                                <th scope="col">Nombre Autor</th>
                                                <th scope="col">Apellido Autor</th>
                                                <th scope="col">Acción</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($autores as $autor)
                                                <tr>
                                                    <td>{{ $autor['nombre_autor'] }}</td>
                                                    <td>{{ $autor['apellido_autor'] }}</td>
                                                    <td>
                                                        <button class="btn btn-info btn-just-icon btn-sm"
                                                                data-toggle="tooltip"
                                                                data-placement="top" title="" data-container="body"
                                                                onclick="autorPorID({{ $autor['id'] }})"
                                                                data-original-title="Editar">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-just-icon btn-sm"
                                                                data-toggle="tooltip"
                                                                data-placement="top" title="" data-container="body"
                                                                onclick="showMsjModal('{{ $autor["id"] }}', 2)"
                                                                data-original-title="Eliminar">
                                                            <i class="fa fa-remove"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="clasificaciones">
                                <div class="card" style="margin-top: 0!important;">
                                    <div class="card-body">
                                        <h4 class="title text-primary">Listado de Clasificaciones</h4>
                                        <table class="table table-striped"
                                               style="white-space: nowrap" id="clasificacionesTable">
                                            <thead>
                                            <tr>
                                                <th scope="col">Nombre Clasificacion</th>
                                                <th scope="col">Acción</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($clasificaciones as $clasificacion)
                                                <tr>
                                                    <td>{{ $clasificacion['nombre_clasificacion'] }}</td>
                                                    <td>
                                                        <button class="btn btn-info btn-just-icon btn-sm"
                                                                data-toggle="tooltip"
                                                                data-placement="top" title="" data-container="body"
                                                                onclick="clasificacionPorID({{ $clasificacion['id'] }})"
                                                                data-original-title="Editar">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-just-icon btn-sm"
                                                                data-toggle="tooltip"
                                                                data-placement="top" title="" data-container="body"
                                                                onclick="showMsjModal('{{ $clasificacion["id"] }}', 3)"
                                                                data-original-title="Eliminar">
                                                            <i class="fa fa-remove"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="consulta">
                                <div class="card" style="margin-top: 0!important;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="filterNombreLibro">
                                                        Nombre del Libro
                                                    </label>
                                                    <input type="text" class="form-control" id="filterNombreLibro"
                                                           name="filterNombreLibro">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group" style="margin-top: 22px!important;">
                                                    <select class="form-control" id="filterAutor"
                                                            name="filterAutor">
                                                        <option value="" class="disabled">Seleccione el Autor</option>
                                                        @foreach($autores as $autor)
                                                            <option value="{{ $autor['id'] }}">{{ $autor['nombre_autor']. ' '. $autor['apellido_autor'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group" style="margin-top: 22px!important;">
                                                    <select class="form-control" id="filterClasificacion"
                                                            name="filterClasificacion">
                                                        <option value="" class="disabled">Seleccione la Clasificacion
                                                        </option>
                                                        @foreach($clasificaciones as $clasificacion)
                                                            <option value="{{ $clasificacion['id'] }}">{{ $clasificacion['nombre_clasificacion'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{--<div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="filterFechaPub">
                                                        Fecha de Publicación
                                                    </label>
                                                    <input type="text" class="form-control datetimepicker"
                                                           id="filterFechaPub"
                                                           name="filterFechaPub" value="">
                                                </div>
                                            </div>--}}
                                        </div>
                                        {{--<div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group" style="margin-top: 22px!important;">
                                                    <select class="form-control" id="filterAutor"
                                                            name="filterAutor">
                                                        <option value="" class="disabled">Seleccione el Autor</option>
                                                        @foreach($autores as $autor)
                                                            <option value="{{ $autor['id'] }}">{{ $autor['nombre_autor']. ' '. $autor['apellido_autor'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group" style="margin-top: 22px!important;">
                                                    <select class="form-control" id="filterClasificacion"
                                                            name="filterClasificacion">
                                                        <option value="" class="disabled">Seleccione la Clasificacion
                                                        </option>
                                                        @foreach($clasificaciones as $clasificacion)
                                                            <option value="{{ $clasificacion['id'] }}">{{ $clasificacion['nombre_clasificacion'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="text-right">
                                            <button type="button" id="consultar"
                                                    class="btn btn-info btn-just-icon" rel="tooltip"
                                                    title="Buscar" onclick="filterLibros()"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="title text-primary" id="header" style="display:none;">Resultados de la
                                    Búsqueda</h4>
                                <div id="filterCard" class="row" style="display: none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('subviews.crearLibro')
    @include('subviews.editarLibro')
    @include('subviews.crearAutor')
    @include('subviews.editarAutor')
    @include('subviews.crearClasificacion')
    @include('subviews.editarClasificacion')
    @include('subviews.porFavorEspere')
@endsection
@section('script')
    {{--<script>
        $(document).ready(function () {
            thumbnail();
        });
    </script>--}}


@endsection

