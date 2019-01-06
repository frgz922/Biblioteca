@extends('layouts.app')

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
                                <a class="nav-link active" href="#consulta" role="tab" data-toggle="tab"
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
                            
                            
                            <div class="tab-pane active show" id="consulta">
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
                                                    <select class="form-control" id="filterclasificacion"
                                                            name="filterclasificacion">
                                                        <option value="" class="disabled">Seleccione la Clasificación
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
                                                    <select class="form-control" id="filterclasificacion"
                                                            name="filterclasificacion">
                                                        <option value="" class="disabled">Seleccione la clasificacion
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