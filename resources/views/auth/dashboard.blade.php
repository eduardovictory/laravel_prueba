@extends('auth.layouts')
@section('content')

<!-- <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
                @else
                <div class="alert alert-success">
                    ya estas logueado
                </div>
                @endif
            </div>
        </div>
    </div>
</div> -->

<div class="container">
    <div class="row justify-content-center m-3">
        <div class="col-md-3">
            <input type="text" style="width: 80%;" onchange="buscarMenu(this.value)">
            <span style="width: 20%;">🔎</spap>
        </div>
    </div>
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

<div id="componentes">
</div>

<script>
    // var menus = [{
    //     titulo: 'Producto',
    //     submenu: [{
    //         titulo: 'Listado Producto',
    //         tipo: 'modal',
    //         componente: 'modal-lst-productos.blade',
    //         modal: 'modalLstProd'
    //     }, {
    //         titulo: 'Agregar Producto',
    //         tipo: 'modal',
    //         componente: 'modal-productos3.blade',
    //         modal: 'modalProductos',
    //         data: {
    //             title: 'Nuevo Producto'
    //         }
    //     }]
    // }]

    let menus = @json($menus);

    function cambiar_menu(id) {
        $('#menu-titulo').text(menus[id].titulo);
        $('#menu').empty();

        var aux_menu = menus[id].submenu;

        for (var m_ in aux_menu) {

            var m = aux_menu[m_];

            addMenu(id, m_, m.titulo);

        }

    }

    function addMenu(me, subme, titulo) {
        var boton_sm = $(`<button onclick="abrir_menu(${me},${subme})" type="button" class="btn btn-primary m-2"> ${titulo} </button>`);

        $('#menu').append(boton_sm);
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

    function buscarMenu(menu_tit) {

        $('#menu').empty();

        menus.forEach((menu, index_m) => {
            menu.submenu.forEach((submenu, index_sm) => {
                // Verificar si el título contiene la palabra clave
                if (submenu.titulo.toLowerCase().includes(menu_tit.toLowerCase())) {
                    addMenu(index_m, index_sm, submenu.titulo);
                }
            });

        });
    }
</script>

@endsection