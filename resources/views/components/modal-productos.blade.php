<!-- Modal -->
<div class="modal fade" @if(!empty($id)) id="modalProductos-{{ $id }}" @else id="modalProductos" @endif tabindex="-1" role="dialog" aria-labelledby="modalProductos" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">@if(!empty($id)) Editar Producto {{$id}} @else Nuevo Producto @endif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <form action="{{ route('new.producto') }}" method="POST"> -->
            <form action="{{ route('new.producto', ['id' => $id]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <p class="col text-right">Nombre:</p>
                        </div>
                        <div class="col-8">
                            <input name="nombre" id="nombre" type="text" value="{{ $nombre }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="col text-right">Observacion:</p>
                        </div>
                        <div class="col-8">
                            <input name="observacion" id="observacion" type="text" value="{{ $observacion }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="col text-right">Precio:</p>
                        </div>
                        <div class="col-8">
                            <input name="precio" id="precio" type="number" value="{{ $precio }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="col text-right">{{ $tipo_producto }}:</p>
                        </div>
                        <div class="col-8">
                            <x-tipificador-select campo="tipo_producto" tipo_num="{{ $tipo_producto }}" id="{{ $id }}" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="sumbit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>