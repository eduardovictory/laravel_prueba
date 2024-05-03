<!-- Modal -->
<div class="modal fade" id="modalPedidos" tabindex="-1" role="dialog" aria-labelledby="modalPedidos" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Editar pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('updatepedido') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input name="id" id="id" type="number" hidden />
                    <div class="row">
                        <div class="col-4">
                            <p class="col text-right">Nombre:</p>
                        </div>
                        <div class="col-8">
                            <input name="nombre_usuario" id="nombre_usuario" type="text" />
                        </div>
                    </div>
                    <div id="modal-body"></div>
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
        $('#modalPedidos').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var idpedido = button.data('idpedido');

            if (idpedido) {

                $.ajax({
                    url: "http://127.0.0.1:8000/api/getpedidos?id=" + idpedido,
                    method: "GET"
                }).then(function(data) {

                    $('#modal-body').empty();

                    for (var ped in data) {
                        var pedidoObj = data[ped];

                        $('#id').val(pedidoObj.id);
                        $('#nombre_usuario').val(pedidoObj.nombre_usuario);

                        var prod = $(`<div class="row"><div class="col-4">
                                        <p class="col text-right">${pedidoObj.nombre}</p>
                                        <input name="productos[]" value="${pedidoObj.producto_id}" type="number" hidden />
                                    </div>
                                    <div class="col-8">
                                        <input name="cantidad[]" value="${pedidoObj.cantidad}" type="text" />
                                    </div></div>`);

                        $('#modal-body').append(prod);

                    }
                });

            }

        });
    });
</script>