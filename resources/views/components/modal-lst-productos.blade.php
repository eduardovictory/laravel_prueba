<div class="modal fade" id="modalLstProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <!-- Modal -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Filtros</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <p class="col text-right">Nombre:</p>
                    </div>
                    <div class="col-8">
                        <input id="nombre" type="text" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="col text-right">Precio:</p>
                    </div>
                    <div class="col-8">
                        <input id="precio" type="number" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="col text-right">Tipo:</p>
                    </div>
                    <div class="col-8" id="tip1">
                        <!-- <x-tipificador-select campo="tipo_producto" /> -->
                        <x-tipificador-lupa2 campo="tipo_producto" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="col text-right">Deposito:</p>
                    </div>
                    <div class="col-8" id="tip2">
                        <x-tipificador-lupa2 campo="deposito_producto" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="redirigirUsers()">Buscar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function redirigirUsers() {

        const precio = document.getElementById('precio').value;
        const nombre = document.getElementById('nombre').value;
        const tipo = document.getElementById('tipificador-tipo_producto').value;
        const deposito = document.getElementById('tipificador-deposito_producto').value;

        const url = "{{ route('lstproductos')}}" + '?precio=' + encodeURIComponent(precio) + '&nombre=' + encodeURIComponent(nombre) + '&tipo_producto=' + encodeURIComponent(tipo) + '&deposito_producto=' + encodeURIComponent(deposito);
        window.location.href = url;
    }

    // $("#btnCerrarModal").click(function() {
    //     $("#modalLstProd").modal('hide');
    // });
</script>