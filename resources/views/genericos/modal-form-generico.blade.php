<!-- Modal -->
<div class="modal fade" @if(!empty($datos['id'])) id="{{ $model }}-{{ $datos['id'] }}" @else id="{{ $model }}" @endif tabindex="-1" role="dialog" aria-labelledby="modalGenerico" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">@if(!empty($datos['id'])) Editar - {{ $datos['id'] }} @else Nuevo @endif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('generico.new', ['model' => $model, 'id' => $datos['id']]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    @yield('content')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="sumbit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <form action="{{ route('generico.new') }}" method="POST"> -->