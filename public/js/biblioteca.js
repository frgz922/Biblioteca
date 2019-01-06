//! moment.js locale configuration

;
(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' &&
        typeof require === 'function' ? factory(require('../moment')) :
        typeof define === 'function' && define.amd ? define(['../moment'], factory) :
        factory(global.moment)
}(this, (function (moment) {
    'use strict';


    var monthsShortDot = 'ene._feb._mar._abr._may._jun._jul._ago._sep._oct._nov._dic.'.split('_'),
        monthsShort = 'ene_feb_mar_abr_may_jun_jul_ago_sep_oct_nov_dic'.split('_');

    var monthsParse = [/^ene/i, /^feb/i, /^mar/i, /^abr/i, /^may/i, /^jun/i, /^jul/i, /^ago/i, /^sep/i, /^oct/i, /^nov/i, /^dic/i];
    var monthsRegex = /^(enero|febrero|marzo|abril|mayo|junio|julio|agosto|septiembre|octubre|noviembre|diciembre|ene\.?|feb\.?|mar\.?|abr\.?|may\.?|jun\.?|jul\.?|ago\.?|sep\.?|oct\.?|nov\.?|dic\.?)/i;

    var es = moment.defineLocale('es', {
        months: 'enero_febrero_marzo_abril_mayo_junio_julio_agosto_septiembre_octubre_noviembre_diciembre'.split('_'),
        monthsShort: function (m, format) {
            if (!m) {
                return monthsShortDot;
            } else if (/-MMM-/.test(format)) {
                return monthsShort[m.month()];
            } else {
                return monthsShortDot[m.month()];
            }
        },
        monthsRegex: monthsRegex,
        monthsShortRegex: monthsRegex,
        monthsStrictRegex: /^(enero|febrero|marzo|abril|mayo|junio|julio|agosto|septiembre|octubre|noviembre|diciembre)/i,
        monthsShortStrictRegex: /^(ene\.?|feb\.?|mar\.?|abr\.?|may\.?|jun\.?|jul\.?|ago\.?|sep\.?|oct\.?|nov\.?|dic\.?)/i,
        monthsParse: monthsParse,
        longMonthsParse: monthsParse,
        shortMonthsParse: monthsParse,
        weekdays: 'domingo_lunes_martes_miércoles_jueves_viernes_sábado'.split('_'),
        weekdaysShort: 'dom._lun._mar._mié._jue._vie._sáb.'.split('_'),
        weekdaysMin: 'do_lu_ma_mi_ju_vi_sá'.split('_'),
        weekdaysParseExact: true,
        longDateFormat: {
            LT: 'H:mm',
            LTS: 'H:mm:ss',
            L: 'DD/MM/YYYY',
            LL: 'D [de] MMMM [de] YYYY',
            LLL: 'D [de] MMMM [de] YYYY H:mm',
            LLLL: 'dddd, D [de] MMMM [de] YYYY H:mm'
        },
        calendar: {
            sameDay: function () {
                return '[hoy a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
            },
            nextDay: function () {
                return '[mañana a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
            },
            nextWeek: function () {
                return 'dddd [a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
            },
            lastDay: function () {
                return '[ayer a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
            },
            lastWeek: function () {
                return '[el] dddd [pasado a la' + ((this.hours() !== 1) ? 's' : '') + '] LT';
            },
            sameElse: 'L'
        },
        relativeTime: {
            future: 'en %s',
            past: 'hace %s',
            s: 'unos segundos',
            ss: '%d segundos',
            m: 'un minuto',
            mm: '%d minutos',
            h: 'una hora',
            hh: '%d horas',
            d: 'un día',
            dd: '%d días',
            M: 'un mes',
            MM: '%d meses',
            y: 'un año',
            yy: '%d años'
        },
        dayOfMonthOrdinalParse: /\d{1,2}º/,
        ordinal: '%dº',
        week: {
            dow: 1, // Monday is the first day of the week.
            doy: 4 // The week that contains Jan 4th is the first week of the year.
        }
    });

    return es;

})));

$(document).ready(function () {
    $('#autoresTable').DataTable({
        "language": {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "infoPostFix": "",
            "search": "Búsqueda:",
            "url": "",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        // "order": [[ 6, "desc" ]]
    });
    $('#clasificacionesTable').DataTable({
        "language": {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "infoPostFix": "",
            "search": "Búsqueda:",
            "url": "",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        // "order": [[ 6, "desc" ]]
    });

});

var inputFile = function (tipo) {

    if (tipo === 1) {
        var archivo = $('#archivo'),
            nombreArchivo = $('#nombreArchivo');
        archivo.click();
        archivo.change(function () {
            if (archivo.val() === '') {
                nombreArchivo.val('')
            } else {
                nombreArchivo.val(archivo[0].files[0].name)
            }
        });
    } else {
        var thumbnail = $('#image'),
            imagenNombre = $('#imageNombre');
        thumbnail.click();
        thumbnail.change(function () {
            if (thumbnail.val() === '') {
                imagenNombre.val('')
            } else {
                imagenNombre.val(thumbnail[0].files[0].name)
            }
        });
    }

};

var inputFileEdit = function (tipo) {

    if (tipo === 1) {
        var archivo = $('#editarchivo'),
            nombreArchivo = $('#editnombreArchivo');
        archivo.click();
        archivo.change(function () {
            if (archivo.val() === '') {
                nombreArchivo.val('')
            } else {
                nombreArchivo.val(archivo[0].files[0].name)
            }
        });
    } else {
        var thumbnail = $('#imageEdit'),
            imagenNombre = $('#imageEditNombre');
        thumbnail.click();
        thumbnail.change(function () {
            if (thumbnail.val() === '') {
                imagenNombre.val('')
            } else {
                imagenNombre.val(thumbnail[0].files[0].name)
            }
        });
    }

};

var showMsjModal = function (id, funcion) {
    $('#msjLabel').html('Eliminar Registro');
    var modal = $('#msjModal'),
        button = $('#masterButton');
    modal.find('.modal-body').html('¿Está seguro que desea eliminar el registro seleccionado?');
    button.html('Eliminar');
    if (funcion === 1) {
        button.unbind('click').bind('click', function (e) {
            deleteLibro(id);
        });
    } else if (funcion === 2) {

        button.unbind('click').bind('click', function (e) {
            deleteAutor(id);
        });
    } else if (funcion === 3) {

        button.unbind('click').bind('click', function (e) {
            deleteClasificacion(id);
        });
    }
    modal.modal('show');
};


var consultarLibros = function () {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'api/biblioteca/',
        error: function () {
            alert.html('<p>An error has occurred</p>');
        },
        dataType: 'json',
        type: 'GET',
        success: function (data) {
            $('#wait').modal('hide');

            var cardBook = $('#cardBook');

            cardBook.html('');
            var booksRefreshed = '';
            $.each(data.data, function (index, value) {
                booksRefreshed = '<div class="col-sm-12"><div class="card" style="margin-top: 0!important;"><div class="card-body"><div class="row"><div class="col-sm-4"><img src="' + value.url_thumbnail + '" alt="" id="thumbnail" class="img-thumbnail center-img img-raised rounded" style="display: block!important;margin-left: auto!important;margin-right: auto!important;"></div><div class="col-sm-8"><div class=""><b class="title">Titulo: </b> ' + value.nombre_libro + '<br><b class="title">Autor: </b> ' + value.autor.nombre_autor + ' ' + value.autor.apellido_autor + '<br><b class="title">Clasificacion: </b> ' + value.clasificacion.nombre_clasificacion + /*'<br><b class="title">Fecha Pub: </b> ' + value.fecha_pub + */ '</div><br><a href="' + value.url_libro + '" class="btn btn-success btn-just-icon btn-sm" data-toggle="tooltip" data-placement="top" title="" data-container="body" data-original-title="Ver" target="_blank"><i class="fa fa-eye"></i></a><button class="btn btn-info btn-just-icon btn-sm" data-toggle="tooltip" data-placement="top" title="" data-container="body" onclick="libroPorID(' + value.id + ')" data-original-title="Editar"><i class="fa fa-edit"></i></button><button class="btn btn-danger btn-just-icon btn-sm" data-toggle="tooltip" data-placement="top" title="" data-container="body" data-original-title="Eliminar" onclick="showMsjModal(' + value.id + ',' + 1 + ')"><i class="fa fa-remove"></i></button></div></div></div></div></div>';


                cardBook.append(booksRefreshed);

            });

            $('[data-toggle="tooltip"]').tooltip();

        },
    });

};

var libroPorID = function (id) {
    var nombreLibro = $('#editNombreLibro'),
        fechaPub = $('#editFechaPub'),
        autor = $('#editAutor'),
        clasificacion = $('#editclasificacion'),
        modal = $('#editLibroModal'),
        idlibro = $('#idLibro'),
        hostName = $(location).attr('hostname'),
        alert = $('#success-alert');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'api/biblioteca/' + id,
        data: {
            id: id
        },
        error: function () {
            alert.html('<p>An error has occurred</p>');
        },
        dataType: 'json',
        success: function (data) {
            $("#imageEdit").val('');
            $.each(data, function (index, value) {
                idlibro.val(value.id);
                nombreLibro.val(value.nombre_libro);
                nombreLibro.trigger('change');
                fechaPub.val(value.fecha_pub);
                fechaPub.trigger('change');
                autor.val(value.id_autor);
                clasificacion.val(value.id_clasificacion);


            });


            modal.modal('show');

        },
        type: 'GET'
    });
};

var guardarLibro = function () {
    var nombreLibro = $('#nombreLibro'),
        fechaPub = $('#fechaPub'),
        autor = $('#autor'),
        clasificacion = $('#clasificacion'),
        thumbnail = $('#image'),
        alert = $('#success-alert'),
        nombreArchivo = $('#nombreArchivo');

    var datos = new FormData();
    $.each($('#archivo')[0].files, function (i, file) {
        datos.append('archivo', file);
        datos.append('nombre_libro', nombreLibro.val());
        datos.append('fecha_pub', fechaPub.val());
        datos.append('id_autor', autor.val());
        datos.append('id_clasificacion', clasificacion.val());
    });

    $.each($('#image')[0].files, function (i, file) {
        datos.append('thumbnail', file);
    });
    if ($("#archivo")[0].files.length > 0) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: 'api/biblioteca',
            data: datos,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#wait').modal('show');
                $('#guardarLibroBtn').prop("disabled", true);
            },
            error: function () {
                $('#info').html('<p>An error has occurred</p>');
            },
            success: function (response) {

                if (response.success === true) {
                    nombreLibro.val('');
                    nombreLibro.trigger('change');
                    fechaPub.val('');
                    fechaPub.trigger('change');
                    autor.val('');
                    autor.trigger('change');
                    clasificacion.val('');
                    clasificacion.trigger('change');
                    nombreArchivo.val('');
                    nombreArchivo.trigger('change');
                    thumbnail.val('');
                    thumbnail.trigger('change');
                    $('#createLibroModal').modal('hide');
                    $('#wait').modal('hide');
                    alert.html('');
                    alert.addClass('alert-success');
                    alert.removeClass('alert-danger');
                    alert.append('<strong>Registro guardado exitosamente.</strong>');
                    alert.fadeTo(2000, 500).slideUp(500, function () {
                        alert.slideUp(500);
                    });

                    $('#guardarLibroBtn').prop("disabled", false);
                    consultarLibros();

                } else {
                    $('#createLibroModal').modal('hide');
                    alert.html('');
                    alert.removeClass('alert-success');
                    alert.addClass('alert-danger');
                    var msj = response.response;
                    alert.append('<strong>Ha ocurrido un error al momento de guardar del registro. Los siguientes campos son requeridos:<ul><li>Nombre del Libro.</li><li>Fecha de Publicación del Libro</li><li>Autor del Libro</li><li>Archivo digital en formato PDF DOCX del Libro.</li><li>Clasificacion del Libro</li></ul></strong>');

                    alert.fadeTo(3000, 800).slideUp(800, function () {
                        alert.slideUp(800);
                    });
                }
            }
        });
    } else {
        $('#createLibroModal').modal('hide');
        alert.html('');
        alert.removeClass('alert-success');
        alert.addClass('alert-danger');
        alert.append('<strong>Debe llenar el formulario con los datos correspondientes.</strong>');
        alert.fadeTo(2000, 500).slideUp(500, function () {
            alert.slideUp(500);
        });
    }
};

var editarLibro = function (id) {
    var nombreLibro = $('#editNombreLibro'),
        fechaPub = $('#editFechaPub'),
        autor = $('#editAutor'),
        clasificacion = $('#editclasificacion'),
        thumbnail = $('#imageEdit'),
        alert = $('#success-alert'),
        nombreArchivo = $('#editnombreArchivo');

    var datos = new FormData();
    jQuery.each(jQuery('#editarchivo')[0].files, function (i, file) {
        datos.append('_method', 'PUT');
        datos.append('archivo', file);
        datos.append('nombre_libro', nombreLibro.val());
        datos.append('fecha_pub', fechaPub.val());
        datos.append('id_autor', autor.val());
        datos.append('id_clasificacion', clasificacion.val());
        datos.append('id', id);

    });

    $.each($('#imageEdit')[0].files, function (i, file) {
        datos.append('thumbnail', file);
    });

    if ($("#editarchivo")[0].files.length > 0) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'api/biblioteca/' + id,
            type: 'POST',
            data: datos,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#wait').modal('show');
                $('#editarLibroBtn').prop("disabled", true);
            },

            complete: function () {
                $('#wait').modal('hide');
                $('#editarLibroBtn').prop("disabled", false);
            },
            error: function () {
                $('#info').html('<p>An error has occurred</p>');
            },
            success: function (response) {

                if (response.success === true) {
                    nombreLibro.val('');
                    nombreLibro.trigger('change');
                    fechaPub.val('');
                    fechaPub.trigger('change');
                    autor.val('');
                    autor.trigger('change');
                    clasificacion.val('');
                    clasificacion.trigger('change');
                    nombreArchivo.val('');
                    nombreArchivo.trigger('change');
                    thumbnail.val('');
                    thumbnail.trigger('change');
                    $('#editLibroModal').modal('hide');
                    alert.html('');
                    alert.append('<strong>Registro guardado exitosamente.</strong>');
                    alert.fadeTo(2000, 500).slideUp(500, function () {
                        alert.slideUp(500);
                    });

                    consultarLibros();

                } else {
                    $('#editLibroModal').modal('hide');
                    alert.html('');
                    alert.removeClass('alert-success');
                    alert.addClass('alert-danger');
                    var msj = response.response;
                    alert.append('<strong>Ha ocurrido un error al momento de guardar del registro. Los siguientes campos son requeridos:<ul><li>Nombre del Libro.</li><li>Fecha de Publicación del Libro</li><li>Autor del Libro</li><li>Archivo digital en formato PDF DOCX del Libro.</li><li>Clasificacion del Libro</li></ul></strong>');

                    alert.fadeTo(3000, 800).slideUp(800, function () {
                        alert.slideUp(800);
                    });
                }
            }
        });
    } else {
        $('#editLibroModal').modal('hide');
        alert.html('');
        alert.removeClass('alert-success');
        alert.addClass('alert-danger');
        alert.append('<strong>Debe llenar el formulario con los datos correspondientes.</strong>');
        alert.fadeTo(2000, 500).slideUp(500, function () {
            alert.slideUp(500);
        });
    }
};

var deleteLibro = function (id) {
    var alert = $('#success-alert');
    // $('#msjModal').modal('hide');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'api/biblioteca/' + id,
        data: {
            id: id
        },
        error: function () {
            alert.html('<p>An error has occurred</p>');
        },
        dataType: 'json',
        success: function (data) {
            $('#msjModal').modal('hide');
            alert.html('');
            if (data.eliminado === 0) {
                alert.removeClass('alert-success');
                alert.addClass('alert-danger');
            }
            alert.append('<strong>' + data.msj + '</strong>');


            alert.fadeTo(2000, 500).slideUp(500, function () {
                alert.slideUp(500);
            });
            // $('#tr' + id).remove();
            consultarLibros();
        },
        type: 'DELETE'
    });
};

var guardarAutor = function () {
    var nombreAutor = $('#nombreAutor'),
        apellidoAutor = $('#apellidoAutor'),
        alert = $('#success-alert');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'api/autores',
        data: {
            nombre_autor: nombreAutor.val(),
            apellido_autor: apellidoAutor.val()
        },
        beforeSend: function () {
            $('#wait').modal('show');
            $('#guardarAutorBtn').prop("disabled", true);
        },
        error: function () {
            $('#info').html('<p>An error has occurred</p>');
        },
        dataType: 'json',
        success: function (data) {

            if (data.success === true) {
                nombreAutor.val('');
                nombreAutor.trigger('change');
                apellidoAutor.val('');
                apellidoAutor.trigger('change');
                $('#createAutorModal').modal('hide');
                alert.html('');
                alert.removeClass('alert-danger');
                alert.addClass('alert-success');
                alert.append('<strong>Registro guardado exitosamente.</strong>');
                alert.fadeTo(2000, 500).slideUp(500, function () {
                    alert.slideUp(500);
                });

                $('#guardarAutorBtn').prop("disabled", false);
                consultarAutores();
            } else {
                $('#createAutorModal').modal('hide');
                alert.html('');
                alert.removeClass('alert-success');
                alert.addClass('alert-danger');
                var msj = data.response;
                alert.append('<strong>Ha ocurrido un error al momento de guardar del registro. Los siguientes campos son requeridos:<ul><li>Nombre del Autor.</li><li>Apellido del Autor</li></ul></strong>');

                alert.fadeTo(3000, 800).slideUp(800, function () {
                    alert.slideUp(800);
                });
            }

        },
        type: 'POST'
    });
};

var autorPorID = function (id) {
    var nombreAutor = $('#editNombreAutor'),
        apellidoAutor = $('#editApellidoAutor'),
        idautor = $('#idAutor'),
        modal = $('#editAutorModal'),
        alert = $('#success-alert');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'api/autores/' + id,
        data: {
            id: id
        },
        error: function () {
            alert.html('<p>An error has occurred</p>');
        },
        dataType: 'json',
        success: function (data) {
            idautor.val(data.id);
            nombreAutor.val(data.nombre_autor);
            nombreAutor.trigger('change');
            apellidoAutor.val(data.apellido_autor);
            apellidoAutor.trigger('change');

            modal.modal('show');

        },
        type: 'GET'
    });
};

var editarAutor = function (id) {
    var nombreAutor = $('#editNombreAutor'),
        apellidoAutor = $('#editApellidoAutor'),
        alert = $('#success-alert');

    var datos = new FormData();
    datos.append('_method', 'PUT');
    datos.append('nombre_autor', nombreAutor.val());
    datos.append('apellido_autor', apellidoAutor.val());
    datos.append('id', id);

    if (nombreAutor.length > 0 && apellidoAutor.length > 0) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'api/autores/' + id,
            type: 'POST',
            data: datos,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#wait').modal('show');
                $('#editarAutorBtn').prop("disabled", true);
            },

            complete: function () {
                $('#wait').modal('hide');
                $('#editarAutorBtn').prop("disabled", false);
            },
            error: function () {
                $('#info').html('<p>An error has occurred</p>');
            },
            success: function (response) {
                if (response.success === true) {
                    nombreAutor.val('');
                    nombreAutor.trigger('change');
                    apellidoAutor.val('');
                    apellidoAutor.trigger('change');
                    $('#editAutorModal').modal('hide');
                    alert.html('');
                    alert.append('<strong>Registro guardado exitosamente.</strong>');
                    alert.fadeTo(2000, 500).slideUp(500, function () {
                        alert.slideUp(500);
                    });

                    consultarAutores();

                } else {
                    $('#editAutorModal').modal('hide');
                    alert.html('');
                    alert.removeClass('alert-success');
                    alert.addClass('alert-danger');
                    var msj = response.response;
                    alert.append('<strong>Ha ocurrido un error al momento de guardar del registro. Los siguientes campos son requeridos:<ul><li>Nombre del Autor.</li><li>Apellido del Autor</li></ul></strong>');

                    alert.fadeTo(3000, 800).slideUp(800, function () {
                        alert.slideUp(800);
                    });
                }
            }
        });
    } else {
        $('#editAutorModal').modal('hide');
        alert.html('');
        alert.removeClass('alert-success');
        alert.addClass('alert-danger');
        alert.append('<strong>Debe llenar el formulario con los datos correspondientes.</strong>');
        alert.fadeTo(2000, 500).slideUp(500, function () {
            alert.slideUp(500);
        });
    }
};

var consultarAutores = function () {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'api/autores',

        error: function () {
            $('#info').html('<p>An error has occurred</p>');
        },
        dataType: 'json',
        success: function (data) {
            $('#wait').modal('hide');
            var table = $('#autoresTable').DataTable();
            var selectAutores = $('#autor');
            var selectAutoresEdit = $('#editAutor');

            table.rows().remove().draw();
            selectAutores.html('');
            selectAutoresEdit.html('');
            selectAutores.append('<option value="" class="disabled">Seleccione el Autor</option>');
            $.each(data, function (index, value) {
                table.rows.add($(
                    '<tr id="tr' + value.id + '"><td>' + value.nombre_autor + '</td><td>' + value.apellido_autor + '</td><td><button class="btn btn-info btn-just-icon btn-sm" data-toggle="tooltip" data-placement="top" title="" data-container="body" onclick="autorPorID(' + value.id + ')" data-original-title="Editar"><i class="fa fa-edit"></i></button><button class="btn btn-danger btn-just-icon btn-sm" data-toggle="tooltip" data-placement="top" title="" data-container="body" onclick="showMsjModal(' + value.id + ', ' + 2 + ')" data-original-title="Eliminar"> <i class="fa fa-remove"></i></button></td></tr>'
                )).draw();

                selectAutores.append('<option value="' + value.id + '">' + value.nombre_autor + ' ' + value.apellido_autor + '</option>');
                selectAutoresEdit.append('<option value="' + value.id + '">' + value.nombre_autor + ' ' + value.apellido_autor + '</option>');

            });
            $('[data-toggle="tooltip"]').tooltip();
        },
        type: 'GET'
    });
};

var deleteAutor = function (id) {
    var alert = $('#success-alert');
    // $('#msjModal').modal('hide');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'api/autores/' + id,
        data: {
            id: id
        },
        error: function () {
            alert.html('<p>An error has occurred</p>');
        },
        dataType: 'json',
        success: function (data) {
            $('#msjModal').modal('hide');
            alert.html('');
            if (data.eliminado === 0) {
                alert.removeClass('alert-success');
                alert.addClass('alert-danger');
            }
            alert.append('<strong>' + data.msj + '</strong>');


            alert.fadeTo(2000, 500).slideUp(500, function () {
                alert.slideUp(500);
            });
            // $('#tr' + id).remove();
            consultarAutores();
        },
        type: 'DELETE'
    });
};

var guardarClasificacion = function () {
    var nombreClasificacion = $('#nombreClasificacion'),
        alert = $('#success-alert');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'api/clasificaciones',
        data: {
            nombre_clasificacion: nombreClasificacion.val(),
        },
        dataType: 'json',
        beforeSend: function () {
            $('#wait').modal('show');
            $('#guardarClasificacionBtn').prop("disabled", true);
        },
        error: function () {
            $('#info').html('<p>An error has occurred</p>');
        },
        type: 'POST',
        success: function (data) {
            if (data.success === true) {
                nombreClasificacion.val('');
                nombreClasificacion.trigger('change');
                $('#createClasificacionModal').modal('hide');
                alert.html('');
                alert.removeClass('alert-danger');
                alert.addClass('alert-success');
                alert.append('<strong>Registro guardado exitosamente.</strong>');
                alert.fadeTo(2000, 500).slideUp(500, function () {
                    alert.slideUp(500);
                });

                $('#wait').modal('hide');
                $('#guardarClasificacionBtn').prop("disabled", false);
                consultarClasificaciones();
            } else {
                $('#createClasificacionModal').modal('hide');
                alert.html('');
                alert.removeClass('alert-success');
                alert.addClass('alert-danger');
                var msj = data.response;
                alert.append('<strong>Ha ocurrido un error al momento de guardar del registro. Los siguientes campos son requeridos:<ul><li>Nombre de la Clasificacion.</li></ul></strong>');

                alert.fadeTo(3000, 800).slideUp(800, function () {
                    alert.slideUp(800);
                });
            }

        },
    });
};

var consultarClasificaciones = function () {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'api/clasificaciones',

        error: function () {
            $('#info').html('<p>An error has occurred</p>');
        },
        dataType: 'json',
        type: 'GET',
        success: function (data) {
            $('#wait').modal('hide');
            var table = $('#clasificacionesTable').DataTable();
            var selectClasificaciones = $('#clasificacion');
            var selectClasificacionesEdit = $('#editClasificacion');

            table.rows().remove().draw();
            selectClasificaciones.html('');
            selectClasificacionesEdit.html('');
            selectClasificaciones.append('<option value="" class="disabled">Seleccione la Clasificacion</option>');

            $.each(data, function (index, value) {
                table.rows.add($(
                    '<tr id="tr' + value.id + '"><td>' + value.nombre_clasificacion + '</td><td><button class="btn btn-info btn-just-icon btn-sm" data-toggle="tooltip" data-placement="top" title="" data-container="body" onclick="clasificacionPorID(' + value.id + ')" data-original-title="Editar"><i class="fa fa-edit"></i></button><button class="btn btn-danger btn-just-icon btn-sm" data-toggle="tooltip" data-placement="top" title="" data-container="body" onclick="showMsjModal(' + value.id + ', ' + 3 + ')" data-original-title="Eliminar"> <i class="fa fa-remove"></i></button></td></tr>'
                )).draw();

                selectClasificaciones.append('<option value="' + value.id + '">' + value.nombre_clasificacion + '</option>');
                selectClasificacionesEdit.append('<option value="' + value.id + '">' + value.nombre_clasificacion + '</option>');
            });
            $('[data-toggle="tooltip"]').tooltip();
        },
    });
};

var clasificacionPorID = function (id) {
    var nombreClasificacion = $('#editNombreClasificacion'),
        idClasificacion = $('#idClasificacion'),
        modal = $('#editClasificacionModal'),
        alert = $('#success-alert');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'api/clasificaciones/' + id,
        data: {
            id: id
        },
        error: function () {
            alert.html('<p>An error has occurred</p>');
        },
        dataType: 'json',
        success: function (data) {
            idClasificacion.val(data.id);
            nombreClasificacion.val(data.nombre_clasificacion);
            nombreClasificacion.trigger('change');

            modal.modal('show');

        },
        type: 'GET'
    });
};

var editarClasificacion = function (id) {
    var nombreClasificacion = $('#editNombreClasificacion'),
        alert = $('#success-alert');

    var datos = new FormData();
    datos.append('_method', 'PUT');
    datos.append('nombre_clasificacion', nombreClasificacion.val());
    datos.append('id', id);

    if (nombreClasificacion.length > 0) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'api/clasificaciones/' + id,
            type: 'POST',
            data: datos,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#wait').modal('show');
                $('#editarClasificacionBtn').prop("disabled", true);
            },

            complete: function () {
                $('#wait').modal('hide');
                $('#editarClasificacionBtn').prop("disabled", false);
            },
            error: function () {
                $('#info').html('<p>An error has occurred</p>');
            },
            success: function (response) {
                if (response.success === true) {
                    nombreClasificacion.val('');
                    nombreClasificacion.trigger('change');
                    $('#editClasificacionModal').modal('hide');
                    alert.html('');
                    alert.append('<strong>Registro guardado exitosamente.</strong>');
                    alert.fadeTo(2000, 500).slideUp(500, function () {
                        alert.slideUp(500);
                    });

                    consultarClasificaciones();

                } else {
                    $('#editClasificacionModal').modal('hide');
                    alert.html('');
                    alert.removeClass('alert-success');
                    alert.addClass('alert-danger');
                    var msj = response.response;
                    alert.append('<strong>Ha ocurrido un error al momento de guardar del registro. Los siguientes campos son requeridos:<ul><li>Nombre de la Clasificacion.</li></ul></strong>');

                    alert.fadeTo(3000, 800).slideUp(800, function () {
                        alert.slideUp(800);
                    });
                }
            }
        });
    } else {
        $('#editClasificacionModal').modal('hide');
        alert.html('');
        alert.removeClass('alert-success');
        alert.addClass('alert-danger');
        alert.append('<strong>Debe llenar el formulario con los datos correspondientes.</strong>');
        alert.fadeTo(2000, 500).slideUp(500, function () {
            alert.slideUp(500);
        });
    }
};

var deleteClasificacion = function (id) {
    var alert = $('#success-alert');
    // $('#msjModal').modal('hide');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'api/clasificaciones/' + id,
        data: {
            id: id
        },
        error: function () {
            alert.html('<p>An error has occurred</p>');
        },
        dataType: 'json',
        success: function (data) {
            $('#msjModal').modal('hide');
            alert.html('');
            if (data.eliminado === 0) {
                alert.removeClass('alert-success');
                alert.addClass('alert-danger');
            }
            alert.append('<strong>' + data.msj + '</strong>');


            alert.fadeTo(2000, 500).slideUp(500, function () {
                alert.slideUp(500);
            });
            // $('#tr' + id).remove();
            consultarClasificaciones();
        },
        type: 'DELETE'
    });
};

var filterLibros = function () {

    var filterNombreLibro = $('#filterNombreLibro'),
        // filterFechaPub = $('#filterFechaPub'),
        filterAutor = $('#filterAutor'),
        filterClasificacion = $('#filterClasificacion');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'api/filterLibros',
        error: function () {
            alert.html('<p>An error has occurred</p>');
        },
        dataType: 'json',
        data: {
            autor: filterAutor.val(),
            nombreLibro: filterNombreLibro.val(),
            // fechaPub: filterFechaPub.val(),
            clasificacion: filterClasificacion.val()
        },
        success: function (data) {
            var cardBook = $('#filterCard');

            cardBook.html('');
            var booksRefreshed = '';
            var header = $('#header');

            if (data.success == true) {
                $.each(data.result, function (index, value) {
                    booksRefreshed = '<div class="col-sm-12"><div class="card"><div class="card-body"><div class="row"><div class="col-sm-4"><img src="' + value.url_thumbnail + '" alt="" id="thumbnail" class="img-thumbnail center-img img-raised rounded" style="display: block!important;margin-left: auto!important;margin-right: auto!important;"></div><div class="col-sm-8"><div class=""><b class="title">Titulo: </b> ' + value.nombre_libro + '<br><b class="title">Autor: </b> ' + value.autor.nombre_autor + ' ' + value.autor.apellido_autor + '<br><b class="title">Clasificacion: </b> ' + value.clasificacion.nombre_clasificacion + /*'<br><b class="title">Fecha Pub: </b> ' + value.fecha_pub + */ '</div><br><a href="' + value.url_libro + '" class="btn btn-success btn-just-icon btn-sm" data-toggle="tooltip" data-placement="top" title="" data-container="body" data-original-title="Ver" target="_blank"><i class="fa fa-eye"></i></a><button class="btn btn-info btn-just-icon btn-sm" data-toggle="tooltip" data-placement="top" title="" data-container="body" onclick="libroPorID(' + value.id + ')" data-original-title="Editar"><i class="fa fa-edit"></i></button><button class="btn btn-danger btn-just-icon btn-sm" data-toggle="tooltip" data-placement="top" title="" data-container="body" data-original-title="Eliminar" onclick="showMsjModal(' + value.id + ',' + 1 + ')"><i class="fa fa-remove"></i></button></div></div></div></div></div>';


                    cardBook.append(booksRefreshed);
                });

                header.show();
                cardBook.show()
            } else {
                booksRefreshed = data.msg;
            }

            $('[data-toggle="tooltip"]').tooltip();

        },
        type: 'GET'
    });

};