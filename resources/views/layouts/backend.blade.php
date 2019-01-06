<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Biblioteca' }}</title>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
    <link href="{{ asset('css/material-kit.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.material.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/biblioteca.css') }}" rel="stylesheet">


</head>
<body>
<div id="app">
    <nav class="navbar navbar-inverse navbar-expand-lg bg-dark fixed-top" color-on-scroll="100" id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="{{ route('home') }}">Biblioteca Virtual</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button class="btn btn-sm btn-info" rel="tooltip" title="" data-original-title="Añadir Libro"  data-toggle="modal" data-target="#createLibroModal">
                            <i class="fa fa-plus"></i>
                            &nbsp;
                            <i class="fa fa-book"></i>
                        </button>
                    </li>
                    <li class="nav-item">&nbsp;</li>
                    <li class="nav-item">
                        <button class="btn btn-sm btn-success" rel="tooltip" title="" data-original-title="Añadir Autor" data-toggle="modal" data-target="#createAutorModal">
                            <i class="fa fa-plus"></i>
                            &nbsp;
                            <i class="fa fa-user"></i>
                        </button>
                    </li>
                    <li class="nav-item">&nbsp;</li>
                    <li class="nav-item">
                        <button class="btn btn-sm btn-primary" rel="tooltip" title="" data-original-title="Añadir Clasificación" data-toggle="modal" data-target="#createClasificacionModal">
                            <i class="fa fa-plus"></i>
                            &nbsp;
                            <i class="material-icons">import_contacts</i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br>
    @yield('content')
</div>


<div class="modal fade" id="msjModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-link" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info" id="masterButton"></button>
            </div>
        </div>
    </div>
</div>


<!-- Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-material-design.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/material-kit.js?v=2.0.2') }}"></script>
<script src="{{ asset('js/datatables.min.js') }}"></script>
{{--<script src="{{ asset('js/dropdown.js') }}"></script>--}}
<script src="{{ asset('js/biblioteca.js') }}"></script>
{{--<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>--}}

@yield('script')

<script>
    $(document).ready(function() {

        //init DateTimePickers
        $(function () {
            $('#editFechaPub').datetimepicker({
                locale: 'es',
                format: 'DD/MM/YYYY',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }

            });
        });

        $(function () {
            $('#fechaPub').datetimepicker({
                locale: 'es',
                format: 'DD/MM/YYYY',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }

            });
        });

        $(function () {
            $('#filterFechaPub').datetimepicker({
                locale: 'es',
                format: 'DD/MM/YYYY',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }

            });
        });
        // Sliders Init
        // materialKit.initSliders();
    });
</script>
</body>
</html>
