<div class="modal fade" id="modalPedidosProd" tabindex="-1" role="dialog" aria-labelledby="modalPedidosProd" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Seleccionar Producto</h5>
                <button type="button" class="close" onclick="cerrarLupa()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <div class="row">
                    <div class="col-4">
                        <select id="select-prod">
                        </select>
                    </div>
                    <div class="col-4">
                        <input id="cantidad-prod" type="number" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="agregarProducto()">Agregar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#modalPedidosProd').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var idprod = button.data('idprod');

            $('#select-prod').empty();

            $.ajax({
                url: "http://127.0.0.1:8000/api/getproductos",
                method: "GET"
            }).then(function(data) {
                for (var prod in data) {
                    var prodObj = data[prod];

                    var option = $('<option>', {
                        value: prodObj.id,
                        text: prodObj.nombre
                    });

                    $('#select-prod').append(option);

                }
            });

            if (idprod) {
                $('#select-prod').val(idprod);
            }

        });
    });

    function cerrarLupa() {
        $("#modalPedidosProd").modal('hide');
    }

    function agregarProducto() {
        var button = $(event.relatedTarget);
        var idprod = button.data('idprod');

        if (idprod) {

        } else {

            var prod = $('#select-prod').val();
            var prodnomb = $('#select-prod option:selected').text();
            var cant = $('#cantidad-prod').val();

            var prod_div = $(`<div class="row" id='item-${prod}'>
                                <div class="col-4">
                                    <p class="col text-right">${prodnomb}</p>
                                    <input name="productos[]" value="${prod}" type="number" hidden />
                                </div>
                                <div class="col-4">
                                    <p class="col text-right">${cant}</p>
                                    <input name="cantidad[]" value="${cant}" type="text" hidden />
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-primary" onclick="updateItem(${prod})">
                                        U
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="eliminarItem(${prod})">
                                        D
                                    </button>
                                </div>
                            </div>`);

            $('#modal-body').append(prod_div);
        }

        cerrarLupa();

    }
</script>