<!-- Modal -->
<div class="modal fade" id="modalProductos" tabindex="-1" role="dialog" aria-labelledby="modalProductos" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('newproducto') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input name="id" id="id" type="number" hidden />
                    <div class="row">
                        <div class="col-4">
                            <p class="col text-right">Nombre:</p>
                        </div>
                        <div class="col-8">
                            <input name="nombre" id="nombre" type="text" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="col text-right">Observacion:</p>
                        </div>
                        <div class="col-8">
                            <input name="observacion" id="observacion" type="text" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="col text-right">Precio:</p>
                        </div>
                        <div class="col-8">
                            <input name="precio" id="precio" type="number" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="col text-right">Tipo:</p>
                        </div>
                        <div class="col-8" id="tip1">
                            <x-tipificador-select campo="tipo_producto" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="col text-right">Deposito:</p>
                        </div>
                        <div class="col-8" id="tip2">
                            <x-tipificador-select campo="deposito_producto" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#modalProductos').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var idprod = button.data('idprod');

            if (idprod) {

                $.ajax({
                    url: "http://127.0.0.1:8000/api/getproductos?id=" + idprod,
                    method: "GET"
                }).then(function(data) {
                    for (var prod in data) {
                        var prodObj = data[prod];

                        $('#id').val(prodObj.id);
                        $('#nombre').val(prodObj.nombre);
                        $('#observacion').val(prodObj.observacion);
                        $('#precio').val(prodObj.precio);
                        $('#tipificador-tipo_producto').val(prodObj.tipo_producto);
                        $('#tipificador-deposito_producto').val(prodObj.deposito_producto);
                    }
                });

            }

        });
    });
</script>