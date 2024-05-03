@extends('auth.layouts')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    MENU
                </div>
                <div class="card-body">
                    <div class="row flex-row">
                        <button onclick="cambiar_menu(0)" class="btn btn-primary m-2" style="width: 75%;">
                            Usuario
                        </button>
                        <button onclick="cambiar_menu(0)" class="btn btn-primary m-2" style="width: 75%;">
                            Productos
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div id="menu-titulo" class="card-header">
                    &nbsp;
                </div>
                <div class="card-body" id="menu">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="componentes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
</div> -->

<div id="componentes">

</div>

<script>
    var menus = [{
        titulo: 'Producto',
        submenu: [{
            titulo: 'Listado Producto',
            tipo: 'modal',
            componente: 'modal-lst-productos.blade',
            modal: 'modalLstProd'
        }, {
            titulo: 'Agregar Producto',
            tipo: 'modal',
            componente: 'modal-productos3.blade',
            modal: 'modalProductos',
            data: {
                title: 'Nuevo Producto'
            }
        }]
    }]

    function cambiar_menu(id) {
        $('#menu-titulo').text(menus[id].titulo);
        $('#menu').empty();

        var aux_menu = menus[id].submenu;

        for (var m_ in aux_menu) {

            var m = aux_menu[m_];

            var boton_sm = $(`<button onclick="abrir_menu(${id},${m_})" type="button" class="btn btn-primary m-2"> ${m.titulo} </button>`);

            $('#menu').append(boton_sm);

        }

    }

    function abrir_menu(m, sm) {
        $('#componentes').empty();

        var data = {
            componente: menus[m].submenu[sm].componente,
            data: menus[m].submenu[sm].data
        }

        $.ajax({
            url: '{{ route("renderizar_componente") }}',
            method: 'GET',
            data: data,
            success: function(response) {
                $('#componentes').append(response);
                $(`#${menus[m].submenu[sm].modal}`).modal('show');
            }
        });
    }
</script>

@endsection